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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded">
                    <p class="text-sm font-medium text-text-muted uppercase tracking-wide">Receita Total</p>
                    <div class="flex items-end justify-between">
                        <p class="font-heading text-[32px] font-bold leading-none text-text">R$ 4.2M</p>
                        <span class="flex items-center text-success text-sm font-bold bg-success/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">trending_up</span>+5.2%</span>
                    </div>
                </div>
                <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded">
                    <p class="text-sm font-medium text-text-muted uppercase tracking-wide">Ticket Médio Global</p>
                    <div class="flex items-end justify-between">
                        <p class="font-heading text-[32px] font-bold leading-none text-text">R$ 185</p>
                        <span class="flex items-center text-warning text-sm font-bold bg-warning/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">trending_down</span>-1.5%</span>
                    </div>
                </div>
                <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded">
                    <p class="text-sm font-medium text-text-muted uppercase tracking-wide">Ingressos Vendidos</p>
                    <div class="flex items-end justify-between">
                        <p class="font-heading text-[32px] font-bold leading-none text-text">45.000</p>
                        <span class="flex items-center text-success text-sm font-bold bg-success/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">trending_up</span>+8.4%</span>
                    </div>
                </div>
                <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded">
                    <p class="text-sm font-medium text-text-muted uppercase tracking-wide">Sócio Torcedor Ativos</p>
                    <div class="flex items-end justify-between">
                        <p class="font-heading text-[32px] font-bold leading-none text-text">62.500</p>
                        <span class="flex items-center text-success text-sm font-bold bg-success/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">trending_up</span>+2.1%</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-surface border border-border rounded flex flex-col">
                    <div class="p-5 border-b border-border flex justify-between items-center">
                        <h3 class="font-heading text-lg font-bold">Receita por Canal (Lojas vs Bilheteria)</h3>
                        <div class="flex gap-4 text-sm font-medium">
                            <div class="flex items-center gap-1.5"><div class="w-3 h-3 bg-primary rounded-sm"></div><span>Lojas</span></div>
                            <div class="flex items-center gap-1.5"><div class="w-3 h-3 bg-accent rounded-sm"></div><span>Bilheteria</span></div>
                        </div>
                    </div>
                    <div class="p-5 h-[400px] flex flex-col justify-end relative">
                        <div class="absolute left-5 top-5 bottom-8 flex flex-col justify-between text-xs text-text-muted font-medium w-10">
                            <span>1.5M</span><span>1.0M</span><span>0.5M</span><span>0</span>
                        </div>
                        <div class="ml-12 h-full flex items-end justify-between gap-2 grid-bg-lines pb-6 relative">
                            <div class="w-full flex flex-col justify-end h-full"><div class="w-full bg-accent/80" style="height: 30%;"></div><div class="w-full bg-primary/90" style="height: 45%;"></div></div>
                            <div class="w-full flex flex-col justify-end h-full"><div class="w-full bg-accent/80" style="height: 40%;"></div><div class="w-full bg-primary/90" style="height: 50%;"></div></div>
                            <div class="w-full flex flex-col justify-end h-full"><div class="w-full bg-accent/80" style="height: 25%;"></div><div class="w-full bg-primary/90" style="height: 35%;"></div></div>
                            <div class="w-full flex flex-col justify-end h-full"><div class="w-full bg-accent/80" style="height: 55%;"></div><div class="w-full bg-primary/90" style="height: 40%;"></div></div>
                        </div>
                        <div class="ml-12 flex justify-between text-xs text-text-muted font-medium mt-2">
                            <span class="w-full text-center">Semana 1</span>
                            <span class="w-full text-center">Semana 2</span>
                            <span class="w-full text-center">Semana 3</span>
                            <span class="w-full text-center">Semana 4</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-6">
                    <div class="bg-surface border border-border rounded flex flex-col h-full">
                        <div class="p-4 border-b border-border">
                            <h3 class="font-heading text-base font-bold">Destaques do Período</h3>
                        </div>
                        <div class="p-0 flex flex-col divide-y divide-border">
                            <div class="p-4 flex justify-between items-center hover:bg-background/50 transition-colors"><div class="flex flex-col"><span class="text-sm font-bold">Camisa Oficial I 24/25</span><span class="text-xs text-text-muted">Operações Lojas</span></div><span class="text-sm font-bold text-success">+12% vol</span></div>
                            <div class="p-4 flex justify-between items-center hover:bg-background/50 transition-colors"><div class="flex flex-col"><span class="text-sm font-bold">Setor Amarelo Superior</span><span class="text-xs text-text-muted">Bilheteria</span></div><span class="text-sm font-bold">Esgotado</span></div>
                            <div class="p-4 flex justify-between items-center hover:bg-background/50 transition-colors"><div class="flex flex-col"><span class="text-sm font-bold">Plano Cabuloso</span><span class="text-xs text-text-muted">Sócio Torcedor</span></div><span class="text-sm font-bold text-success">+450 un</span></div>
                            <div class="p-4 flex justify-between items-center hover:bg-background/50 transition-colors"><div class="flex flex-col"><span class="text-sm font-bold">Copo Colecionável</span><span class="text-xs text-text-muted">Matchday Retail</span></div><span class="text-sm font-bold text-warning">Estoque Baixo</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
