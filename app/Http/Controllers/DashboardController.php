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

            return [
                'analyticsAvailable' => true,
                'analyticsError' => null,
                'kpis' => $kpis,
                'dailySales' => $dailySales,
                'topProducts' => $topProducts,
                'categories' => $this->normalizeCategories($categories),
                'storesRanking' => $stores,
            ];
        } catch (Throwable $exception) {
            return [
                'analyticsAvailable' => false,
                'analyticsError' => $exception->getMessage(),
                'kpis' => null,
                'dailySales' => collect(),
                'topProducts' => collect(),
                'categories' => collect(),
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
}
