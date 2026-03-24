@extends('layouts.app')

@php($active = 'reports')

@section('title', 'Painel Executivo - Relatórios | Cruzeiro')

@section('topbar')
    <header class="h-[64px] bg-surface border-b border-border flex items-center justify-between px-6 shrink-0 z-10">
        <h2 class="font-heading text-xl font-bold text-text">Relatórios</h2>
        <div class="flex items-center gap-3">
            <div class="flex items-center border border-border rounded bg-background px-3 py-1.5 cursor-pointer hover:border-text/30 transition-colors">
                <span class="material-symbols-outlined text-text-muted text-lg mr-2">calendar_auto</span>
                <span class="text-sm font-medium text-text">Mês Atual</span>
                <span class="material-symbols-outlined text-text-muted text-sm ml-2">expand_more</span>
            </div>
            <button class="flex items-center justify-center gap-2 px-4 py-1.5 bg-surface border border-border text-text text-[13px] font-bold uppercase tracking-wider rounded hover:bg-background transition-colors"><span class="material-symbols-outlined text-[16px]">picture_as_pdf</span>PDF Executivo</button>
            <button class="flex items-center justify-center gap-2 bg-primary text-white px-4 py-1.5 rounded text-[13px] font-bold uppercase tracking-wider hover:bg-primary/90 transition-colors"><span class="material-symbols-outlined text-[16px]">download</span>Baixar CSV</button>
        </div>
    </header>
@endsection

@section('content')
    <div class="flex-1 flex flex-col p-6 overflow-hidden gap-4">
        <div class="flex items-end justify-between gap-4">
            <div>
                <h3 class="font-heading text-3xl font-bold tracking-tight text-text mb-1">Relatórios Financeiros</h3>
                <p class="text-sm font-medium text-text-muted">Visão consolidada de transações, origem e status operacional</p>
            </div>
            <div class="text-right hidden lg:block">
                <p class="text-xs text-text-muted font-bold uppercase tracking-wider mb-1">Atualização</p>
                <p class="text-sm font-bold text-text">24 de mar • 18:00</p>
            </div>
        </div>

        <div class="bg-surface border border-border rounded p-3 flex flex-wrap lg:flex-nowrap items-center gap-3 shrink-0">
            <div class="relative flex-1 min-w-[200px]">
                <span class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-text-muted text-[18px]">search</span>
                <input class="w-full h-8 pl-9 pr-3 text-sm border border-border rounded focus:ring-1 focus:ring-primary focus:border-primary placeholder:text-text-muted" placeholder="Buscar ID, Cliente ou Referência..." type="text" />
            </div>
            <div class="flex items-center gap-2 flex-wrap sm:flex-nowrap">
                <div class="relative min-w-[140px]"><select class="w-full h-8 pl-3 pr-8 text-sm border border-border rounded appearance-none focus:ring-1 focus:ring-primary focus:border-primary bg-surface cursor-pointer text-text"><option>Todas as Origens</option><option>Loja Física</option><option>E-commerce</option><option>Bilheteria Online</option><option>Sócio Torcedor</option></select><span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-text-muted text-[16px] pointer-events-none">expand_more</span></div>
                <div class="relative min-w-[140px]"><select class="w-full h-8 pl-3 pr-8 text-sm border border-border rounded appearance-none focus:ring-1 focus:ring-primary focus:border-primary bg-surface cursor-pointer text-text"><option>Categorias</option><option>Vestuário</option><option>Ingresso Avulso</option><option>Mensalidade ST</option><option>Alimentos &amp; Bebidas</option></select><span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-text-muted text-[16px] pointer-events-none">expand_more</span></div>
                <div class="relative min-w-[140px]"><select class="w-full h-8 pl-3 pr-8 text-sm border border-border rounded appearance-none focus:ring-1 focus:ring-primary focus:border-primary bg-surface cursor-pointer text-text"><option>Status</option><option>Concluído</option><option>Pendente</option><option>Cancelado</option></select><span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-text-muted text-[16px] pointer-events-none">expand_more</span></div>
            </div>
            <div class="flex items-center gap-1 min-w-[220px]">
                <input class="w-full h-8 px-2 text-sm border border-border rounded focus:ring-1 focus:ring-primary focus:border-primary text-text" type="date" />
                <span class="text-text-muted text-xs">até</span>
                <input class="w-full h-8 px-2 text-sm border border-border rounded focus:ring-1 focus:ring-primary focus:border-primary text-text" type="date" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded"><p class="text-sm font-medium text-text-muted uppercase tracking-wide">Receita Total</p><div class="flex items-end justify-between"><p class="font-heading text-[32px] font-bold leading-none text-text">R$ 6.8M</p><span class="flex items-center text-success text-sm font-bold bg-success/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">trending_up</span>+7.8%</span></div></div>
            <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded"><p class="text-sm font-medium text-text-muted uppercase tracking-wide">Transações</p><div class="flex items-end justify-between"><p class="font-heading text-[32px] font-bold leading-none text-text">1.402</p><span class="flex items-center text-success text-sm font-bold bg-success/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">trending_up</span>+4.3%</span></div></div>
            <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded"><p class="text-sm font-medium text-text-muted uppercase tracking-wide">Ticket Médio</p><div class="flex items-end justify-between"><p class="font-heading text-[32px] font-bold leading-none text-text">R$ 486</p><span class="flex items-center text-warning text-sm font-bold bg-warning/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">trending_down</span>-1.2%</span></div></div>
            <div class="bg-surface border border-border p-5 flex flex-col gap-2 rounded"><p class="text-sm font-medium text-text-muted uppercase tracking-wide">Pendências</p><div class="flex items-end justify-between"><p class="font-heading text-[32px] font-bold leading-none text-text">83</p><span class="flex items-center text-alert text-sm font-bold bg-alert/10 px-2 py-0.5 rounded"><span class="material-symbols-outlined text-[14px] mr-0.5">priority_high</span>Atenção</span></div></div>
        </div>

        <div class="flex-1 bg-surface border border-border rounded overflow-hidden flex flex-col">
            <div class="table-container flex-1 overflow-auto">
                <table class="w-full text-left border-collapse min-w-[1000px]">
                    <thead class="bg-background sticky top-0 z-20 shadow-[0_1px_0_#E5E7EB]">
                        <tr>
                            <th class="sticky-col py-2 px-4 text-xs font-bold text-text uppercase tracking-wider border-b border-r border-border w-[140px]">ID Transação</th>
                            <th class="py-2 px-4 text-xs font-bold text-text uppercase tracking-wider border-b border-border w-[160px]">Data/Hora</th>
                            <th class="py-2 px-4 text-xs font-bold text-text uppercase tracking-wider border-b border-border">Origem</th>
                            <th class="py-2 px-4 text-xs font-bold text-text uppercase tracking-wider border-b border-border">Categoria</th>
                            <th class="py-2 px-4 text-xs font-bold text-text uppercase tracking-wider border-b border-border">Cliente/Referência</th>
                            <th class="py-2 px-4 text-xs font-bold text-text uppercase tracking-wider border-b border-border text-right">Valor (R$)</th>
                            <th class="py-2 px-4 text-xs font-bold text-text uppercase tracking-wider border-b border-border w-[120px] text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-medium text-text divide-y divide-border">
                        <tr class="data-row hover:bg-background transition-colors"><td class="sticky-col px-4 border-r border-border font-mono text-xs text-text-muted">TXN-8932A</td><td class="px-4 text-text-muted text-xs">24/10/2023 14:32</td><td class="px-4">Loja Sede</td><td class="px-4">Vestuário</td><td class="px-4 truncate max-w-[200px]">João Silva (CPF: ***.123.***-45)</td><td class="px-4 text-right">349,90</td><td class="px-4 text-center"><span class="inline-flex items-center justify-center w-[80px] h-[20px] rounded bg-success/10 text-success text-[10px] font-bold uppercase tracking-wider border border-success/20">Concluído</span></td></tr>
                        <tr class="data-row hover:bg-background transition-colors"><td class="sticky-col px-4 border-r border-border font-mono text-xs text-text-muted">TXN-8931B</td><td class="px-4 text-text-muted text-xs">24/10/2023 14:28</td><td class="px-4">E-commerce</td><td class="px-4">Acessórios</td><td class="px-4 truncate max-w-[200px]">Maria Oliveira (Pedido #4599)</td><td class="px-4 text-right">89,50</td><td class="px-4 text-center"><span class="inline-flex items-center justify-center w-[80px] h-[20px] rounded bg-warning/10 text-warning text-[10px] font-bold uppercase tracking-wider border border-warning/20">Pendente</span></td></tr>
                        <tr class="data-row hover:bg-background transition-colors"><td class="sticky-col px-4 border-r border-border font-mono text-xs text-text-muted">TXN-8930C</td><td class="px-4 text-text-muted text-xs">24/10/2023 14:15</td><td class="px-4">Bilheteria Online</td><td class="px-4">Ingresso Avulso</td><td class="px-4 truncate max-w-[200px]">Setor Amarelo Superior (Qtd: 2)</td><td class="px-4 text-right">180,00</td><td class="px-4 text-center"><span class="inline-flex items-center justify-center w-[80px] h-[20px] rounded bg-success/10 text-success text-[10px] font-bold uppercase tracking-wider border border-success/20">Concluído</span></td></tr>
                        <tr class="data-row hover:bg-background transition-colors"><td class="sticky-col px-4 border-r border-border font-mono text-xs text-text-muted">TXN-8929D</td><td class="px-4 text-text-muted text-xs">24/10/2023 14:02</td><td class="px-4">Sócio Torcedor</td><td class="px-4">Mensalidade ST</td><td class="px-4 truncate max-w-[200px]">Plano Diamante - Ref: Out/23</td><td class="px-4 text-right">149,90</td><td class="px-4 text-center"><span class="inline-flex items-center justify-center w-[80px] h-[20px] rounded bg-alert/10 text-alert text-[10px] font-bold uppercase tracking-wider border border-alert/20">Cancelado</span></td></tr>
                        <tr class="data-row hover:bg-background transition-colors"><td class="sticky-col px-4 border-r border-border font-mono text-xs text-text-muted">TXN-8928E</td><td class="px-4 text-text-muted text-xs">24/10/2023 13:55</td><td class="px-4">Loja Mineirão</td><td class="px-4">Vestuário</td><td class="px-4 truncate max-w-[200px]">Venda Balcão #102</td><td class="px-4 text-right">299,90</td><td class="px-4 text-center"><span class="inline-flex items-center justify-center w-[80px] h-[20px] rounded bg-success/10 text-success text-[10px] font-bold uppercase tracking-wider border border-success/20">Concluído</span></td></tr>
                        <tr class="data-row hover:bg-background transition-colors"><td class="sticky-col px-4 border-r border-border font-mono text-xs text-text-muted">TXN-8927F</td><td class="px-4 text-text-muted text-xs">24/10/2023 13:40</td><td class="px-4">E-commerce</td><td class="px-4">Linha Casual</td><td class="px-4 truncate max-w-[200px]">Carlos Souza (Pedido #4598)</td><td class="px-4 text-right">120,00</td><td class="px-4 text-center"><span class="inline-flex items-center justify-center w-[80px] h-[20px] rounded bg-success/10 text-success text-[10px] font-bold uppercase tracking-wider border border-success/20">Concluído</span></td></tr>
                        <tr class="data-row hover:bg-background transition-colors"><td class="sticky-col px-4 border-r border-border font-mono text-xs text-text-muted">TXN-8926G</td><td class="px-4 text-text-muted text-xs">24/10/2023 13:22</td><td class="px-4">Bilheteria Sede</td><td class="px-4">Ingresso Avulso</td><td class="px-4 truncate max-w-[200px]">Setor Roxo Inferior (Qtd: 1)</td><td class="px-4 text-right">150,00</td><td class="px-4 text-center"><span class="inline-flex items-center justify-center w-[80px] h-[20px] rounded bg-warning/10 text-warning text-[10px] font-bold uppercase tracking-wider border border-warning/20">Pendente</span></td></tr>
                        <tr class="data-row hover:bg-background transition-colors"><td class="sticky-col px-4 border-r border-border font-mono text-xs text-text-muted">TXN-8925H</td><td class="px-4 text-text-muted text-xs">24/10/2023 13:10</td><td class="px-4">Loja Sede</td><td class="px-4">Acessórios</td><td class="px-4 truncate max-w-[200px]">Venda Balcão #101</td><td class="px-4 text-right">45,00</td><td class="px-4 text-center"><span class="inline-flex items-center justify-center w-[80px] h-[20px] rounded bg-success/10 text-success text-[10px] font-bold uppercase tracking-wider border border-success/20">Concluído</span></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="h-10 border-t border-border bg-surface flex items-center justify-between px-4 shrink-0">
                <span class="text-xs text-text-muted">Exibindo 1-8 de 1.402 registros</span>
                <div class="flex items-center gap-1">
                    <button class="w-8 h-6 flex items-center justify-center border border-border rounded text-text-muted hover:bg-background disabled:opacity-50" disabled><span class="material-symbols-outlined text-[16px]">chevron_left</span></button>
                    <button class="w-8 h-6 flex items-center justify-center border border-border bg-primary text-surface rounded text-xs font-bold">1</button>
                    <button class="w-8 h-6 flex items-center justify-center border border-border rounded text-text text-xs font-medium hover:bg-background">2</button>
                    <button class="w-8 h-6 flex items-center justify-center border border-border rounded text-text text-xs font-medium hover:bg-background">3</button>
                    <span class="text-xs text-text-muted px-1">...</span>
                    <button class="w-8 h-6 flex items-center justify-center border border-border rounded text-text hover:bg-background"><span class="material-symbols-outlined text-[16px]">chevron_right</span></button>
                </div>
            </div>
        </div>
    </div>
@endsection
