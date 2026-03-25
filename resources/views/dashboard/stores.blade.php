@extends('layouts.app')

@php($active = 'stores')

@section('title', 'Painel Executivo - Operações Lojas | Cruzeiro')

@section('topbar')
    <header class="h-[64px] bg-surface border-b border-border flex items-center justify-between px-6 shrink-0 z-10">
        <h2 class="font-heading text-xl font-bold text-text">Operações Lojas</h2>
        <div class="flex items-center gap-3">
            <div class="flex items-center border border-border rounded bg-background px-3 py-1.5 cursor-pointer hover:border-text/30 transition-colors">
                <span class="material-symbols-outlined text-text-muted text-lg mr-2">calendar_today</span>
                <span class="text-sm font-medium text-text">Últimos 7 dias</span>
                <span class="material-symbols-outlined text-text-muted text-sm ml-2">expand_more</span>
            </div>
            <button class="flex items-center justify-center gap-2 bg-primary text-white px-4 py-1.5 rounded text-[13px] font-bold uppercase tracking-wider hover:bg-primary/90 transition-colors">
                <span class="material-symbols-outlined text-[18px]">download</span>
                Exportar
            </button>
        </div>
    </header>
@endsection

@section('content')
    <div class="flex-1 overflow-y-auto p-6">
        @if (! $analyticsAvailable)
            <div class="mb-6 rounded border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                A consulta às views de lojas não está disponível. Execute o arquivo
                <code>database/sql/painel-executivo-mysql.sql</code>
                e valide a conexão do banco configurado no <code>.env</code>.
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-surface p-5 rounded border border-border shadow-sm flex flex-col justify-between">
                <div class="flex justify-between items-start mb-2"><p class="text-text-muted text-sm font-medium">Receita Lojas</p><span class="material-symbols-outlined text-primary text-[20px]">payments</span></div>
                <div class="flex items-baseline gap-2"><p class="text-2xl font-bold tracking-tight text-text">{{ $kpis ? 'R$ '.number_format((float) $kpis->receita_total, 2, ',', '.') : 'R$ 0,00' }}</p><span class="text-xs font-medium text-success bg-green-50 px-1.5 py-0.5 rounded flex items-center"><span class="material-symbols-outlined text-[12px] leading-none">database</span>base atual</span></div>
            </div>
            <div class="bg-surface p-5 rounded border border-border shadow-sm flex flex-col justify-between">
                <div class="flex justify-between items-start mb-2"><p class="text-text-muted text-sm font-medium">Ticket Médio</p><span class="material-symbols-outlined text-primary text-[20px]">receipt_long</span></div>
                <div class="flex items-baseline gap-2"><p class="text-2xl font-bold tracking-tight text-text">{{ $kpis ? 'R$ '.number_format((float) $kpis->ticket_medio, 2, ',', '.') : 'R$ 0,00' }}</p><span class="text-xs font-medium text-primary bg-primary/10 px-1.5 py-0.5 rounded flex items-center"><span class="material-symbols-outlined text-[12px] leading-none">local_mall</span>por item</span></div>
            </div>
            <div class="bg-surface p-5 rounded border border-border shadow-sm flex flex-col justify-between">
                <div class="flex justify-between items-start mb-2"><p class="text-text-muted text-sm font-medium">Itens Vendidos</p><span class="material-symbols-outlined text-primary text-[20px]">shopping_bag</span></div>
                <div class="flex items-baseline gap-2"><p class="text-2xl font-bold tracking-tight text-text">{{ $kpis ? number_format((float) $kpis->itens_vendidos, 0, ',', '.') : '0' }}</p><span class="text-xs font-medium text-success bg-green-50 px-1.5 py-0.5 rounded flex items-center"><span class="material-symbols-outlined text-[12px] leading-none">inventory_2</span>unidades</span></div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-surface rounded border border-border shadow-sm flex flex-col min-h-[400px]">
                <div class="p-4 border-b border-border flex justify-between items-center">
                    <h3 class="text-sm font-bold text-text">Evolução de Receita Diária</h3>
                    <button class="text-text-muted hover:text-text"><span class="material-symbols-outlined text-[18px]">more_vert</span></button>
                </div>
                <div class="flex-1 p-4 relative flex items-center justify-center">
                    <div class="absolute inset-x-4 top-4 bottom-8 border-l border-b border-border flex items-end">
                        <div class="absolute -left-16 top-0 bottom-0 flex flex-col justify-between text-[10px] text-text-muted h-full pb-0">
                            <span>{{ number_format($dailySalesChart['maxRevenue'], 0, ',', '.') }}</span>
                            <span>{{ number_format($dailySalesChart['maxRevenue'] * 0.75, 0, ',', '.') }}</span>
                            <span>{{ number_format($dailySalesChart['maxRevenue'] * 0.5, 0, ',', '.') }}</span>
                            <span>{{ number_format($dailySalesChart['maxRevenue'] * 0.25, 0, ',', '.') }}</span>
                            <span>0</span>
                        </div>
                        <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                            <line stroke="#e5e7eb" stroke-dasharray="2,2" stroke-width="0.5" x1="0" x2="100" y1="25" y2="25"></line>
                            <line stroke="#e5e7eb" stroke-dasharray="2,2" stroke-width="0.5" x1="0" x2="100" y1="50" y2="50"></line>
                            <line stroke="#e5e7eb" stroke-dasharray="2,2" stroke-width="0.5" x1="0" x2="100" y1="75" y2="75"></line>
                            @if ($dailySalesChart['points'] !== '')
                                <polyline fill="none" points="{{ $dailySalesChart['points'] }}" stroke="#0f54a3" stroke-width="2" vector-effect="non-scaling-stroke"></polyline>
                                <polygon fill="url(#blue-grad)" opacity="0.1" points="0,100 {{ $dailySalesChart['points'] }} 100,100"></polygon>
                            @endif
                            <defs>
                                <linearGradient id="blue-grad" x1="0%" x2="0%" y1="0%" y2="100%">
                                    <stop offset="0%" stop-color="#0f54a3"></stop>
                                    <stop offset="100%" stop-color="#ffffff" stop-opacity="0"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="absolute bottom-2 inset-x-4 flex justify-between text-[10px] text-text-muted">
                        @foreach ($dailySalesChart['labels'] as $label)
                            <span>{{ $label }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="bg-surface rounded border border-border shadow-sm overflow-hidden flex flex-col">
                    <div class="p-4 border-b border-border flex justify-between items-center bg-white">
                        <h3 class="text-sm font-bold text-text">Top 5 Produtos</h3>
                        <a class="text-xs font-medium text-primary hover:underline" href="#">Ver todos</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-background text-[11px] uppercase tracking-wider text-text-muted border-b border-border">
                                    <th class="px-4 py-3 font-medium">Produto</th>
                                    <th class="px-4 py-3 font-medium text-right">Quantidade</th>
                                    <th class="px-4 py-3 font-medium text-right">Preço Médio</th>
                                    <th class="px-4 py-3 font-medium text-right">Receita</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @forelse ($topProducts as $index => $product)
                                    <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-background' }} border-b border-border hover:bg-gray-50 cursor-pointer">
                                        <td class="px-4 py-3 font-medium text-text">
                                            <div class="flex items-center gap-3">
                                                @if (! empty($product->imagem_url))
                                                    <img alt="{{ $product->produto }}" class="h-10 w-10 rounded object-cover" src="{{ $product->imagem_url }}" />
                                                @else
                                                    <div class="flex h-10 w-10 items-center justify-center rounded bg-background text-text-muted">
                                                        <span class="material-symbols-outlined text-[16px]">image</span>
                                                    </div>
                                                @endif
                                                <div>
                                                    <div>{{ $product->produto }}</div>
                                                    <div class="text-xs font-medium text-text-muted">{{ $product->categoria ?: 'Sem categoria' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-right">{{ number_format((float) $product->quantidade, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3 text-right">R$ {{ number_format((float) $product->preco_medio, 2, ',', '.') }}</td>
                                        <td class="px-4 py-3 text-right font-medium">R$ {{ number_format((float) $product->receita, 2, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr class="bg-white">
                                        <td class="px-4 py-6 text-center text-text-muted" colspan="4">Nenhum produto disponível.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-surface rounded border border-border shadow-sm p-4 flex flex-col sm:flex-row items-center gap-6">
                    <div class="flex-1">
                        <h3 class="text-sm font-bold text-text mb-4">Distribuição por Categoria</h3>
                        <ul class="space-y-3">
                            @php($colors = ['bg-primary', 'bg-accent', 'bg-gray-400'])
                            @forelse ($categories as $index => $category)
                                <li class="flex items-center justify-between text-sm">
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 rounded-sm {{ $colors[$index] ?? 'bg-gray-400' }}"></div>
                                        <span>{{ $category->categoria ?: 'Sem categoria' }}</span>
                                    </div>
                                    <span class="font-medium">{{ number_format((float) $category->percentual, 1, ',', '.') }}%</span>
                                </li>
                            @empty
                                <li class="text-sm text-text-muted">Sem categorias calculadas.</li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="w-32 h-32 relative rounded-full shrink-0 flex items-center justify-center" style="background: conic-gradient(#0f54a3 0% {{ $categoryChart['firstPercent'] }}%, #d4af37 {{ $categoryChart['firstPercent'] }}% {{ $categoryChart['secondPercent'] }}%, #9ca3af {{ $categoryChart['secondPercent'] }}% 100%);">
                        <div class="w-20 h-20 bg-surface rounded-full absolute"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
