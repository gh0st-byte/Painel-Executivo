@extends('layouts.app')

@php($active = 'matchday')

@section('title', 'Painel Executivo - Bilheteria & Matchday | Cruzeiro')

@section('topbar')
    <header class="h-[64px] bg-surface border-b border-border flex items-center justify-between px-6 shrink-0 z-10">
        <div class="flex items-center gap-3">
            <h2 class="font-heading text-xl font-bold text-text">Bilheteria &amp; Matchday</h2>
        </div>
        <div class="flex items-center gap-3">
            <div class="flex items-center border border-border rounded bg-background px-3 py-1.5 cursor-pointer hover:border-text/30 transition-colors">
                <span class="material-symbols-outlined text-text-muted text-lg mr-2">calendar_month</span>
                <span class="text-sm font-medium text-text">Próximo Jogo</span>
                <span class="material-symbols-outlined text-text-muted text-sm ml-2">expand_more</span>
            </div>
            <button class="flex items-center justify-center bg-primary text-white px-4 py-1.5 rounded text-[13px] font-bold uppercase tracking-wider hover:bg-primary/90 transition-colors">
                Exportar
            </button>
        </div>
    </header>
@endsection

@section('content')
    <div class="flex-1 overflow-y-auto p-6">
        <div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h2 class="font-heading text-3xl font-bold tracking-tight mb-1 text-text">Bilheteria &amp; Matchday</h2>
                <p class="text-text-muted text-sm font-medium">Cruzeiro vs. Atlético-MG - Campeonato Brasileiro</p>
            </div>
            <div class="text-right">
                <p class="text-xs text-text-muted font-bold uppercase tracking-wider mb-1">Data da Partida</p>
                <p class="text-sm font-bold text-text">Dom, 22 de Out • 16:00 • Mineirão</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-surface border border-border rounded p-5 flex flex-col justify-between"><p class="text-xs text-text-muted font-bold uppercase tracking-wider mb-2">Ingressos Vendidos</p><div class="flex items-baseline gap-2"><span class="text-3xl font-bold text-text">42.500</span><span class="text-sm font-bold text-success flex items-center"><span class="material-symbols-outlined text-sm">arrow_upward</span>12%</span></div></div>
            <div class="bg-surface border border-border rounded p-5 flex flex-col justify-between"><p class="text-xs text-text-muted font-bold uppercase tracking-wider mb-2">Ocupação Atual</p><div class="flex items-baseline gap-2"><span class="text-3xl font-bold text-text">75%</span><span class="text-sm text-text-muted font-medium">de 56.400 cap.</span></div><div class="w-full bg-border h-1.5 rounded-full mt-3 overflow-hidden"><div class="bg-accent h-full" style="width: 75%"></div></div></div>
            <div class="bg-surface border border-border rounded p-5 flex flex-col justify-between"><p class="text-xs text-text-muted font-bold uppercase tracking-wider mb-2">Receita Estimada</p><div class="flex items-baseline gap-2"><span class="text-3xl font-bold text-text">R$ 1.25M</span></div></div>
            <div class="bg-surface border border-border rounded p-5 flex flex-col justify-between"><p class="text-xs text-text-muted font-bold uppercase tracking-wider mb-2">Ticket Médio</p><div class="flex items-baseline gap-2"><span class="text-3xl font-bold text-text">R$ 65,00</span><span class="text-sm font-bold text-alert flex items-center"><span class="material-symbols-outlined text-sm">arrow_downward</span>2%</span></div></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 flex flex-col gap-6">
                <div class="bg-surface border border-border rounded p-6 hidden md:block">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-text">Ocupação Mineirão</h3>
                        <div class="flex gap-4 text-xs font-medium text-text-muted">
                            <div class="flex items-center gap-1.5"><div class="w-3 h-3 rounded-sm bg-primary"></div>Disponível</div>
                            <div class="flex items-center gap-1.5"><div class="w-3 h-3 rounded-sm bg-accent"></div>Esgotado</div>
                            <div class="flex items-center gap-1.5"><div class="w-3 h-3 rounded-sm bg-border"></div>Bloqueado</div>
                        </div>
                    </div>
                    <div class="relative w-full h-80 bg-gray-50 border border-border rounded flex items-center justify-center overflow-hidden">
                        <div class="relative w-64 h-64 border-4 border-border rounded-full flex items-center justify-center">
                            <div class="w-24 h-40 border-2 border-border bg-white rounded-sm relative">
                                <div class="absolute top-1/2 w-full border-t-2 border-border"></div>
                                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 border-2 border-border rounded-full"></div>
                            </div>
                            <div class="absolute top-0 left-0 w-full h-1/4 bg-accent opacity-80 rounded-t-full border-b-2 border-white"></div>
                            <div class="absolute bottom-0 left-0 w-full h-1/4 bg-primary opacity-80 rounded-b-full border-t-2 border-white"></div>
                            <div class="absolute top-1/4 left-0 w-1/4 h-1/2 bg-primary opacity-60 rounded-l-full border-r-2 border-white"></div>
                            <div class="absolute top-1/4 right-0 w-1/4 h-1/2 bg-border opacity-80 rounded-r-full border-l-2 border-white"></div>
                        </div>
                    </div>
                </div>

                <div class="bg-surface border border-border rounded overflow-hidden">
                    <div class="p-4 border-b border-border bg-gray-50">
                        <h3 class="text-sm font-bold text-text uppercase tracking-wider">Detalhamento por Setor</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm whitespace-nowrap">
                            <thead class="bg-background text-text-muted text-xs font-bold uppercase border-b border-border">
                                <tr><th class="px-4 py-3">Setor</th><th class="px-4 py-3">Capacidade</th><th class="px-4 py-3">Vendidos</th><th class="px-4 py-3">Ocupação</th><th class="px-4 py-3 text-right">Receita (R$)</th></tr>
                            </thead>
                            <tbody class="divide-y divide-border">
                                <tr class="hover:bg-gray-50 transition-colors cursor-pointer"><td class="px-4 py-3"><div class="flex items-center gap-2"><div class="w-2 h-8 bg-accent rounded-sm"></div><span class="font-bold text-text">Amarelo Sup.</span></div></td><td class="px-4 py-3 text-text-muted">8.500</td><td class="px-4 py-3 font-medium text-text">8.500</td><td class="px-4 py-3"><div class="flex items-center gap-2"><span class="text-xs font-bold text-accent">100%</span><div class="w-16 h-1.5 bg-border rounded-full overflow-hidden"><div class="bg-accent h-full w-full"></div></div></div></td><td class="px-4 py-3 text-right font-medium text-text">R$ 425.000</td></tr>
                                <tr class="hover:bg-gray-50 transition-colors cursor-pointer"><td class="px-4 py-3"><div class="flex items-center gap-2"><div class="w-2 h-8 bg-primary rounded-sm"></div><span class="font-bold text-text">Vermelho Sup.</span></div></td><td class="px-4 py-3 text-text-muted">12.000</td><td class="px-4 py-3 font-medium text-text">9.600</td><td class="px-4 py-3"><div class="flex items-center gap-2"><span class="text-xs font-bold text-primary">80%</span><div class="w-16 h-1.5 bg-border rounded-full overflow-hidden"><div class="bg-primary h-full w-4/5"></div></div></div></td><td class="px-4 py-3 text-right font-medium text-text">R$ 576.000</td></tr>
                                <tr class="hover:bg-gray-50 transition-colors cursor-pointer"><td class="px-4 py-3"><div class="flex items-center gap-2"><div class="w-2 h-8 bg-primary/60 rounded-sm"></div><span class="font-bold text-text">Roxo Inf.</span></div></td><td class="px-4 py-3 text-text-muted">6.000</td><td class="px-4 py-3 font-medium text-text">3.600</td><td class="px-4 py-3"><div class="flex items-center gap-2"><span class="text-xs font-bold text-primary">60%</span><div class="w-16 h-1.5 bg-border rounded-full overflow-hidden"><div class="bg-primary/60 h-full w-3/5"></div></div></div></td><td class="px-4 py-3 text-right font-medium text-text">R$ 216.000</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="bg-surface border border-border rounded p-5">
                    <div class="mb-4"><h3 class="text-sm font-bold text-text uppercase tracking-wider mb-1">Curva de Vendas</h3><p class="text-xs text-text-muted">Ritmo de vendas vs Dias para o jogo</p></div>
                    <div class="h-48 w-full border-b border-l border-border relative flex items-end">
                        <div class="w-full h-full absolute inset-0 bg-gradient-to-t from-primary/20 to-transparent flex items-end pb-[1px]">
                            <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                                <path class="text-primary opacity-20" d="M0,100 L0,90 C20,90 30,70 50,50 C70,30 80,20 100,10 L100,100 Z" fill="currentColor"></path>
                                <path d="M0,90 C20,90 30,70 50,50 C70,30 80,20 100,10" fill="none" stroke="#0F4C92" stroke-width="2"></path>
                            </svg>
                        </div>
                        <div class="absolute -bottom-6 w-full flex justify-between text-[10px] text-text-muted font-medium"><span>-10d</span><span>-5d</span><span>Hoje</span></div>
                    </div>
                </div>

                <div class="bg-surface border border-border rounded p-5 flex-1">
                    <div class="mb-4"><h3 class="text-sm font-bold text-text uppercase tracking-wider mb-1">Receita por Setor</h3></div>
                    <div class="flex flex-col gap-4">
                        <div class="w-full"><div class="flex justify-between text-xs font-medium mb-1"><span class="text-text">Vermelho Sup.</span><span class="text-text-muted">R$ 576k</span></div><div class="w-full h-2 bg-background rounded-sm overflow-hidden"><div class="bg-primary h-full w-[80%]"></div></div></div>
                        <div class="w-full"><div class="flex justify-between text-xs font-medium mb-1"><span class="text-text">Amarelo Sup.</span><span class="text-text-muted">R$ 425k</span></div><div class="w-full h-2 bg-background rounded-sm overflow-hidden"><div class="bg-accent h-full w-[60%]"></div></div></div>
                        <div class="w-full"><div class="flex justify-between text-xs font-medium mb-1"><span class="text-text">Roxo Inf.</span><span class="text-text-muted">R$ 216k</span></div><div class="w-full h-2 bg-background rounded-sm overflow-hidden"><div class="bg-primary/60 h-full w-[30%]"></div></div></div>
                        <div class="w-full"><div class="flex justify-between text-xs font-medium mb-1"><span class="text-text">Camarotes</span><span class="text-text-muted">R$ 150k</span></div><div class="w-full h-2 bg-background rounded-sm overflow-hidden"><div class="bg-text h-full w-[20%]"></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
