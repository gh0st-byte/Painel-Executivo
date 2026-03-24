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
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-surface p-5 rounded border border-border shadow-sm flex flex-col justify-between">
                <div class="flex justify-between items-start mb-2"><p class="text-text-muted text-sm font-medium">Receita Lojas</p><span class="material-symbols-outlined text-primary text-[20px]">payments</span></div>
                <div class="flex items-baseline gap-2"><p class="text-2xl font-bold tracking-tight text-text">R$ 450.000</p><span class="text-xs font-medium text-success bg-green-50 px-1.5 py-0.5 rounded flex items-center"><span class="material-symbols-outlined text-[12px] leading-none">trending_up</span>+5.2%</span></div>
            </div>
            <div class="bg-surface p-5 rounded border border-border shadow-sm flex flex-col justify-between">
                <div class="flex justify-between items-start mb-2"><p class="text-text-muted text-sm font-medium">Ticket Médio</p><span class="material-symbols-outlined text-primary text-[20px]">receipt_long</span></div>
                <div class="flex items-baseline gap-2"><p class="text-2xl font-bold tracking-tight text-text">R$ 285</p><span class="text-xs font-medium text-alert bg-red-50 px-1.5 py-0.5 rounded flex items-center"><span class="material-symbols-outlined text-[12px] leading-none">trending_down</span>-1.1%</span></div>
            </div>
            <div class="bg-surface p-5 rounded border border-border shadow-sm flex flex-col justify-between">
                <div class="flex justify-between items-start mb-2"><p class="text-text-muted text-sm font-medium">Total Pedidos</p><span class="material-symbols-outlined text-primary text-[20px]">shopping_bag</span></div>
                <div class="flex items-baseline gap-2"><p class="text-2xl font-bold tracking-tight text-text">1.578</p><span class="text-xs font-medium text-success bg-green-50 px-1.5 py-0.5 rounded flex items-center"><span class="material-symbols-outlined text-[12px] leading-none">trending_up</span>+3.4%</span></div>
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
                        <div class="absolute -left-12 top-0 bottom-0 flex flex-col justify-between text-[10px] text-text-muted h-full pb-0">
                            <span>80k</span><span>60k</span><span>40k</span><span>20k</span><span>0</span>
                        </div>
                        <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                            <line stroke="#e5e7eb" stroke-dasharray="2,2" stroke-width="0.5" x1="0" x2="100" y1="25" y2="25"></line>
                            <line stroke="#e5e7eb" stroke-dasharray="2,2" stroke-width="0.5" x1="0" x2="100" y1="50" y2="50"></line>
                            <line stroke="#e5e7eb" stroke-dasharray="2,2" stroke-width="0.5" x1="0" x2="100" y1="75" y2="75"></line>
                            <polyline fill="none" points="0,80 15,65 30,70 45,40 60,50 75,20 90,30 100,10" stroke="#0f54a3" stroke-width="2" vector-effect="non-scaling-stroke"></polyline>
                            <polygon fill="url(#blue-grad)" opacity="0.1" points="0,100 0,80 15,65 30,70 45,40 60,50 75,20 90,30 100,10 100,100"></polygon>
                            <defs>
                                <linearGradient id="blue-grad" x1="0%" x2="0%" y1="0%" y2="100%">
                                    <stop offset="0%" stop-color="#0f54a3"></stop>
                                    <stop offset="100%" stop-color="#ffffff" stop-opacity="0"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="absolute bottom-2 inset-x-4 flex justify-between text-[10px] text-text-muted">
                        <span>Seg</span><span>Ter</span><span>Qua</span><span>Qui</span><span>Sex</span><span>Sáb</span><span>Dom</span>
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
                                    <th class="px-4 py-3 font-medium text-right">Estoque</th>
                                    <th class="px-4 py-3 font-medium text-right">Vendas</th>
                                    <th class="px-4 py-3 font-medium text-right">Receita</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr class="bg-white border-b border-border hover:bg-gray-50 cursor-pointer">
                                    <td class="px-4 py-3 font-medium text-text flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-text-muted rotate-90">chevron_right</span>Camisa Oficial I 2024</td>
                                    <td class="px-4 py-3 text-right">450</td><td class="px-4 py-3 text-right">892</td><td class="px-4 py-3 text-right font-medium">R$ 312.110</td>
                                </tr>
                                <tr class="bg-gray-50 border-b border-border">
                                    <td class="px-4 py-3" colspan="4"><div class="h-20 w-full flex items-center justify-center border border-dashed border-gray-300 rounded bg-white"><span class="text-xs text-text-muted flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">show_chart</span>Gráfico de tendência histórico expandido</span></div></td>
                                </tr>
                                <tr class="bg-background border-b border-border hover:bg-gray-50 cursor-pointer"><td class="px-4 py-3 font-medium text-text flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-text-muted">chevron_right</span>Camisa Oficial II 2024</td><td class="px-4 py-3 text-right">120</td><td class="px-4 py-3 text-right">430</td><td class="px-4 py-3 text-right font-medium">R$ 150.450</td></tr>
                                <tr class="bg-white border-b border-border hover:bg-gray-50 cursor-pointer"><td class="px-4 py-3 font-medium text-text flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-text-muted">chevron_right</span>Blusa Moletom Viagem</td><td class="px-4 py-3 text-right"><span class="bg-red-100 text-alert px-2 py-0.5 rounded text-xs font-bold border border-red-200">0</span></td><td class="px-4 py-3 text-right">215</td><td class="px-4 py-3 text-right font-medium">R$ 64.285</td></tr>
                                <tr class="bg-background border-b border-border hover:bg-gray-50 cursor-pointer"><td class="px-4 py-3 font-medium text-text flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-text-muted">chevron_right</span>Boné Aba Reta Azul</td><td class="px-4 py-3 text-right">85</td><td class="px-4 py-3 text-right">190</td><td class="px-4 py-3 text-right font-medium">R$ 18.810</td></tr>
                                <tr class="bg-white hover:bg-gray-50 cursor-pointer"><td class="px-4 py-3 font-medium text-text flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-text-muted">chevron_right</span>Copo Térmico Escudo</td><td class="px-4 py-3 text-right text-orange-600 font-medium">12</td><td class="px-4 py-3 text-right">150</td><td class="px-4 py-3 text-right font-medium">R$ 14.850</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-surface rounded border border-border shadow-sm p-4 flex flex-col sm:flex-row items-center gap-6">
                    <div class="flex-1">
                        <h3 class="text-sm font-bold text-text mb-4">Distribuição por Categoria</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center justify-between text-sm"><div class="flex items-center gap-2"><div class="w-3 h-3 rounded-sm bg-primary"></div><span>Camisas</span></div><span class="font-medium">65%</span></li>
                            <li class="flex items-center justify-between text-sm"><div class="flex items-center gap-2"><div class="w-3 h-3 rounded-sm bg-accent"></div><span>Linha Casual</span></div><span class="font-medium">25%</span></li>
                            <li class="flex items-center justify-between text-sm"><div class="flex items-center gap-2"><div class="w-3 h-3 rounded-sm bg-gray-400"></div><span>Acessórios</span></div><span class="font-medium">10%</span></li>
                        </ul>
                    </div>
                    <div class="w-32 h-32 relative rounded-full shrink-0 flex items-center justify-center" style="background: conic-gradient(#0f54a3 0% 65%, #d4af37 65% 90%, #9ca3af 90% 100%);">
                        <div class="w-20 h-20 bg-surface rounded-full absolute"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
