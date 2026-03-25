@extends('layouts.app')

@php($active = 'overview')

@section('title', 'Painel Executivo - Visão Geral | Cruzeiro')

@section('topbar')
    <header class="h-[64px] bg-surface border-b border-border flex items-center justify-between px-6 shrink-0 z-10">
        <h2 class="font-heading text-xl font-bold text-text">Visão Geral</h2>
        <div class="flex items-center gap-3">
            <div class="flex items-center border border-border rounded bg-background px-3 py-1.5 cursor-pointer hover:border-text/30 transition-colors">
                <span class="material-symbols-outlined text-text-muted text-lg mr-2">calendar_auto</span>
                <span class="text-sm font-medium text-text">Mês Atual</span>
                <span class="material-symbols-outlined text-text-muted text-sm ml-2">expand_more</span>
            </div>
            <button class="flex items-center justify-center bg-primary text-white px-4 py-1.5 rounded text-[13px] font-bold uppercase tracking-wider hover:bg-primary/90 transition-colors">
                Exportar
            </button>
        </div>
    </header>
@endsection

@section('content')
    <div class="flex-1 overflow-auto p-6">
        <div class="max-w-[1440px] mx-auto flex flex-col gap-6">
            @if (! $analyticsAvailable)
                <div class="rounded border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                    Não foi possível carregar os indicadores do banco. Execute o arquivo
                    <code>database/sql/painel-executivo-mysql.sql</code>
                    e confirme se a conexão MySQL está ativa.
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded">
                    <p class="text-sm font-medium text-text-muted uppercase tracking-wide">Receita Total</p>
                    <div class="flex items-end justify-between">
                        <p class="font-heading text-[32px] font-bold leading-none text-text">
                            {{ $kpis ? 'R$ '.number_format((float) $kpis->receita_total, 2, ',', '.') : 'R$ 0,00' }}
                        </p>
                        <span class="flex items-center text-success text-sm font-bold bg-success/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">database</span>lojas</span>
                    </div>
                </div>
                <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded">
                    <p class="text-sm font-medium text-text-muted uppercase tracking-wide">Ticket Médio Global</p>
                    <div class="flex items-end justify-between">
                        <p class="font-heading text-[32px] font-bold leading-none text-text">
                            {{ $kpis ? 'R$ '.number_format((float) $kpis->ticket_medio, 2, ',', '.') : 'R$ 0,00' }}
                        </p>
                        <span class="flex items-center text-primary text-sm font-bold bg-primary/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">sell</span>mix atual</span>
                    </div>
                </div>
                <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded">
                    <p class="text-sm font-medium text-text-muted uppercase tracking-wide">Itens Vendidos</p>
                    <div class="flex items-end justify-between">
                        <p class="font-heading text-[32px] font-bold leading-none text-text">
                            {{ $kpis ? number_format((float) $kpis->itens_vendidos, 0, ',', '.') : '0' }}
                        </p>
                        <span class="flex items-center text-success text-sm font-bold bg-success/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">shopping_bag</span>volumetria</span>
                    </div>
                </div>
                <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded">
                    <p class="text-sm font-medium text-text-muted uppercase tracking-wide">Royalties Estimados</p>
                    <div class="flex items-end justify-between">
                        <p class="font-heading text-[32px] font-bold leading-none text-text">
                            {{ $kpis ? 'R$ '.number_format((float) $kpis->royalties, 2, ',', '.') : 'R$ 0,00' }}
                        </p>
                        <span class="flex items-center text-accent text-sm font-bold bg-accent/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">workspace_premium</span>10%</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-surface border border-border rounded flex flex-col">
                    <div class="p-5 border-b border-border flex justify-between items-center">
                        <h3 class="font-heading text-lg font-bold">Receita diária das lojas</h3>
                        <div class="flex gap-4 text-sm font-medium">
                            <div class="flex items-center gap-1.5"><div class="w-3 h-3 bg-primary rounded-sm"></div><span>Receita</span></div>
                        </div>
                    </div>
                    <div class="p-5 h-[400px] flex flex-col justify-end relative">
                        @php
                            $maxDailyRevenue = max(1, (float) $dailySales->max('receita'));
                        @endphp
                        <div class="absolute left-5 top-5 bottom-8 flex flex-col justify-between text-xs text-text-muted font-medium w-16">
                            <span>R$ {{ number_format($maxDailyRevenue, 0, ',', '.') }}</span>
                            <span>R$ {{ number_format($maxDailyRevenue * 0.66, 0, ',', '.') }}</span>
                            <span>R$ {{ number_format($maxDailyRevenue * 0.33, 0, ',', '.') }}</span>
                            <span>R$ 0</span>
                        </div>
                        <div class="ml-12 h-full flex items-end justify-between gap-2 grid-bg-lines pb-6 relative">
                            @forelse ($dailySales as $day)
                                @php
                                    $height = max(8, (((float) $day->receita / $maxDailyRevenue) * 100));
                                @endphp
                                <div class="w-full flex flex-col justify-end h-full">
                                    <div class="w-full rounded-t bg-primary/90" style="height: {{ $height }}%;"></div>
                                </div>
                            @empty
                                <div class="flex h-full w-full items-center justify-center text-sm text-text-muted">
                                    Sem dados diários para exibir.
                                </div>
                            @endforelse
                        </div>
                        <div class="ml-12 flex justify-between text-xs text-text-muted font-medium mt-2">
                            @foreach ($dailySales as $day)
                                <span class="w-full text-center">{{ \Illuminate\Support\Carbon::parse($day->data_venda)->format('d/m') }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-6">
                    <div class="bg-surface border border-border rounded flex flex-col h-full">
                        <div class="p-4 border-b border-border">
                            <h3 class="font-heading text-base font-bold">Destaques do Período</h3>
                        </div>
                        <div class="p-0 flex flex-col divide-y divide-border">
                            @forelse ($topProducts->take(4) as $product)
                                <div class="p-4 flex justify-between items-center hover:bg-background/50 transition-colors">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-bold">{{ $product->produto }}</span>
                                        <span class="text-xs text-text-muted">{{ $product->categoria ?: 'Sem categoria' }}</span>
                                    </div>
                                    <span class="text-sm font-bold text-success">{{ number_format((float) $product->quantidade, 0, ',', '.') }} un</span>
                                </div>
                            @empty
                                <div class="p-4 text-sm text-text-muted">Nenhum destaque disponível.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
