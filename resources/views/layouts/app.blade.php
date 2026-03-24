<!DOCTYPE html>
<html class="light" lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Painel Executivo | Cruzeiro')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Cabinet+Grotesk:wght@700&family=Satoshi:wght@500;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#0F4C92",
                        background: "#F3F4F6",
                        surface: "#FFFFFF",
                        text: {
                            DEFAULT: "#1E293B",
                            muted: "#9CA3AF"
                        },
                        border: "#E5E7EB",
                        accent: "#D4AF37",
                        alert: "#DC2626",
                        success: "#10B981",
                        warning: "#F59E0B"
                    },
                    fontFamily: {
                        heading: ['"Cabinet Grotesk"', 'sans-serif'],
                        body: ['"Satoshi"', 'sans-serif']
                    },
                    borderRadius: {
                        DEFAULT: "2px",
                        none: "0",
                        sm: "1px",
                        md: "2px",
                        lg: "4px",
                        full: "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Satoshi', sans-serif;
            background-color: #F3F4F6;
            color: #1E293B;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .font-heading {
            font-family: 'Cabinet Grotesk', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #F3F4F6;
        }

        ::-webkit-scrollbar-thumb {
            background: #9CA3AF;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #1E293B;
        }

        .grid-bg-lines {
            background-image: linear-gradient(#E5E7EB 1px, transparent 1px);
            background-size: 100% 40px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 4px;
        }

        th.sticky-col,
        td.sticky-col {
            position: sticky;
            left: 0;
            background-color: #FFFFFF;
            z-index: 10;
        }

        th.sticky-col {
            z-index: 11;
        }

        tr.data-row {
            height: 32px;
        }

        tr.data-row td {
            padding-top: 0;
            padding-bottom: 0;
            line-height: 32px;
            white-space: nowrap;
        }
    </style>
    @yield('head')
</head>
<body class="flex h-screen overflow-hidden bg-background">
    <aside class="flex h-full w-[240px] flex-col bg-primary text-white shrink-0">
        <div class="flex flex-col h-full justify-between p-4">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col">
                    <h1 class="font-heading text-lg font-bold leading-tight tracking-wide">Cruzeiro Esporte Clube</h1>
                    <p class="text-white/70 text-sm font-medium">Painel Executivo</p>
                </div>
                <nav class="flex flex-col gap-1">
                    <a class="flex items-center gap-3 px-3 py-2 rounded transition-colors {{ ($active ?? '') === 'overview' ? 'bg-white/10 border border-white/20' : 'hover:bg-white/5' }}" href="{{ route('dashboard.overview') }}">
                        <span class="material-symbols-outlined {{ ($active ?? '') === 'overview' ? 'text-white' : 'text-white/70' }}" @if(($active ?? '') === 'overview') style="font-variation-settings: 'FILL' 1;" @endif>house</span>
                        <span class="text-sm {{ ($active ?? '') === 'overview' ? 'font-bold tracking-wide text-white' : 'font-medium text-white/80' }}">Visão Geral</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded transition-colors {{ ($active ?? '') === 'stores' ? 'bg-white/10 border border-white/20' : 'hover:bg-white/5' }}" href="{{ route('dashboard.stores') }}">
                        <span class="material-symbols-outlined {{ ($active ?? '') === 'stores' ? 'text-white' : 'text-white/70' }}" @if(($active ?? '') === 'stores') style="font-variation-settings: 'FILL' 1;" @endif>storefront</span>
                        <span class="text-sm {{ ($active ?? '') === 'stores' ? 'font-bold tracking-wide text-white' : 'font-medium text-white/80' }}">Operações Lojas</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded transition-colors {{ ($active ?? '') === 'matchday' ? 'bg-white/10 border border-white/20' : 'hover:bg-white/5' }}" href="{{ route('dashboard.matchday') }}">
                        <span class="material-symbols-outlined {{ ($active ?? '') === 'matchday' ? 'text-white' : 'text-white/70' }}" @if(($active ?? '') === 'matchday') style="font-variation-settings: 'FILL' 1;" @endif>transit_ticket</span>
                        <span class="text-sm {{ ($active ?? '') === 'matchday' ? 'font-bold tracking-wide text-white' : 'font-medium text-white/80' }}">Bilheteria &amp; Matchday</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded transition-colors {{ ($active ?? '') === 'reports' ? 'bg-white/10 border border-white/20' : 'hover:bg-white/5' }}" href="{{ route('dashboard.reports') }}">
                        <span class="material-symbols-outlined {{ ($active ?? '') === 'reports' ? 'text-white' : 'text-white/70' }}" @if(($active ?? '') === 'reports') style="font-variation-settings: 'FILL' 1;" @endif>bar_chart</span>
                        <span class="text-sm {{ ($active ?? '') === 'reports' ? 'font-bold tracking-wide text-white' : 'font-medium text-white/80' }}">Relatórios</span>
                    </a>
                </nav>
            </div>
            <div class="flex items-center gap-3 px-3 py-2 border-t border-white/20 mt-auto pt-4">
                <div class="size-8 rounded-full bg-white/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-sm">person</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-bold">Diretoria</span>
                    <span class="text-xs text-white/60">admin@cruzeiro.com.br</span>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        @yield('topbar')
        @yield('content')
    </main>
</body>
</html>
