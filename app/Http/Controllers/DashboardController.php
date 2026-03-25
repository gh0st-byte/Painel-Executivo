<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Throwable;

class DashboardController extends Controller
{
    public function overview(): View
    {
        $analytics = $this->loadStoreAnalytics();

        return view('dashboard.overview', $analytics);
    }

    public function stores(): View
    {
        $analytics = $this->loadStoreAnalytics();

        return view('dashboard.stores', $analytics);
    }

    public function matchday(): View
    {
        return view('dashboard.matchday');
    }

    public function reports(): View
    {
        return view('dashboard.reports');
    }

    /**
     * @return array<string, mixed>
     */
    private function loadStoreAnalytics(): array
    {
        try {
            $kpis = DB::table($this->qualified('vw_st_loja_fisica_kpis'))->first();

            $dailySales = DB::table($this->qualified('vw_st_loja_fisica_diaria'))
                ->orderByDesc('data_venda')
                ->limit(7)
                ->get()
                ->reverse()
                ->values();

            $topProducts = DB::table($this->qualified('vw_st_loja_fisica_produtos'))
                ->orderByDesc('receita')
                ->limit(5)
                ->get();

            $categories = DB::table($this->qualified('vw_st_loja_fisica_produtos'))
                ->select(
                    'categoria',
                    DB::raw('SUM(receita) as receita'),
                    DB::raw('SUM(quantidade) as quantidade')
                )
                ->groupBy('categoria')
                ->orderByDesc('receita')
                ->limit(3)
                ->get();

            $stores = DB::table($this->qualified('vw_st_loja_fisica_lojas'))
                ->orderByDesc('receita')
                ->limit(5)
                ->get();

            $normalizedCategories = $this->normalizeCategories($categories);
            $chart = $this->buildDailyChart($dailySales);
            $categoryChart = $this->buildCategoryChart($normalizedCategories);

            return [
                'analyticsAvailable' => true,
                'analyticsError' => null,
                'kpis' => $kpis,
                'dailySales' => $dailySales,
                'dailySalesChart' => $chart,
                'topProducts' => $topProducts,
                'categories' => $normalizedCategories,
                'categoryChart' => $categoryChart,
                'storesRanking' => $stores,
            ];
        } catch (Throwable $exception) {
            return [
                'analyticsAvailable' => false,
                'analyticsError' => $exception->getMessage(),
                'kpis' => null,
                'dailySales' => collect(),
                'dailySalesChart' => [
                    'maxRevenue' => 1.0,
                    'points' => '',
                    'labels' => collect(),
                    'bars' => collect(),
                ],
                'topProducts' => collect(),
                'categories' => collect(),
                'categoryChart' => [
                    'firstPercent' => 0.0,
                    'secondPercent' => 0.0,
                ],
                'storesRanking' => collect(),
            ];
        }
    }

    private function qualified(string $table): string
    {
        $connection = config('database.default');
        $database = config("database.connections.{$connection}.database");

        return $database ? "{$database}.{$table}" : $table;
    }

    /**
     * @param  Collection<int, object>  $categories
     * @return Collection<int, object>
     */
    private function normalizeCategories(Collection $categories): Collection
    {
        $totalRevenue = (float) $categories->sum('receita');

        return $categories->map(function (object $category) use ($totalRevenue) {
            $category->percentual = $totalRevenue > 0
                ? ((float) $category->receita / $totalRevenue) * 100
                : 0;

            return $category;
        });
    }

    /**
     * @param  Collection<int, object>  $dailySales
     * @return array<string, mixed>
     */
    private function buildDailyChart(Collection $dailySales): array
    {
        $maxRevenue = max(1, (float) $dailySales->max('receita'));

        $points = $dailySales->values()->map(function (object $day, int $index) use ($dailySales, $maxRevenue) {
            $x = $dailySales->count() === 1 ? 50 : ($index / max(1, $dailySales->count() - 1)) * 100;
            $y = 100 - (((float) $day->receita / $maxRevenue) * 100);

            return round($x, 2).','.round(max(4, min(96, $y)), 2);
        })->implode(' ');

        $labels = $dailySales->map(function (object $day) {
            return \Illuminate\Support\Carbon::parse($day->data_venda)->format('d/m');
        })->values();

        $bars = $dailySales->map(function (object $day) use ($maxRevenue) {
            return max(8, (((float) $day->receita / $maxRevenue) * 100));
        })->values();

        return [
            'maxRevenue' => $maxRevenue,
            'points' => $points,
            'labels' => $labels,
            'bars' => $bars,
        ];
    }

    /**
     * @param  Collection<int, object>  $categories
     * @return array<string, float>
     */
    private function buildCategoryChart(Collection $categories): array
    {
        $firstPercent = (float) ($categories->get(0)->percentual ?? 0);
        $secondPercent = $firstPercent + (float) ($categories->get(1)->percentual ?? 0);

        return [
            'firstPercent' => $firstPercent,
            'secondPercent' => $secondPercent,
        ];
    }
}
