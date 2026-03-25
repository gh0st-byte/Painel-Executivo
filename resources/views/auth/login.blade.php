<!DOCTYPE html>
<html class="light" lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Painel Executivo | Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Cabinet+Grotesk:wght@700&family=Satoshi:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Satoshi', sans-serif;
            background:
                radial-gradient(circle at top right, rgba(212, 175, 55, 0.28), transparent 28%),
                linear-gradient(135deg, #0b2c59 0%, #0f4c92 48%, #f3f4f6 48%, #f3f4f6 100%);
        }

        .font-heading {
            font-family: 'Cabinet Grotesk', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen text-slate-900">
    <div class="mx-auto flex min-h-screen max-w-7xl items-center px-6 py-12">
        <div class="grid w-full gap-10 lg:grid-cols-[1.2fr_0.8fr]">
            <section class="flex flex-col justify-between rounded bg-white/10 p-8 text-white backdrop-blur-sm lg:p-12">
                <div>
                    <span class="mb-6 inline-flex rounded-full border border-white/20 px-3 py-1 text-xs font-bold uppercase tracking-[0.28em] text-white/80">
                        Painel Executivo
                    </span>
                    <h1 class="font-heading max-w-xl text-4xl font-bold leading-tight lg:text-6xl">
                        Gestão comercial com foco em lojas físicas e performance de produto.
                    </h1>
                    <p class="mt-6 max-w-lg text-base text-white/78 lg:text-lg">
                        Acompanhe receita, produtos, giro e principais indicadores das operações locais em um único painel.
                    </p>
                </div>
                <div class="grid gap-4 sm:grid-cols-3">
                    <div class="rounded border border-white/15 bg-white/10 p-4">
                        <p class="text-xs uppercase tracking-[0.2em] text-white/60">Receita</p>
                        <p class="mt-3 text-2xl font-bold">Lojas</p>
                    </div>
                    <div class="rounded border border-white/15 bg-white/10 p-4">
                        <p class="text-xs uppercase tracking-[0.2em] text-white/60">Visão</p>
                        <p class="mt-3 text-2xl font-bold">Produtos</p>
                    </div>
                    <div class="rounded border border-white/15 bg-white/10 p-4">
                        <p class="text-xs uppercase tracking-[0.2em] text-white/60">Segurança</p>
                        <p class="mt-3 text-2xl font-bold">Acesso</p>
                    </div>
                </div>
            </section>

            <section class="rounded bg-white p-8 shadow-2xl shadow-slate-900/10 lg:p-10">
                <div class="mb-8">
                    <h2 class="font-heading text-3xl font-bold text-slate-900">Entrar</h2>
                    <p class="mt-2 text-sm text-slate-500">Use seu usuário corporativo para acessar o painel.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login.store') }}" class="space-y-5" method="POST">
                    @csrf

                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">E-mail</span>
                        <input
                            class="w-full rounded border-slate-200 px-4 py-3 text-sm focus:border-[#0f4c92] focus:ring-[#0f4c92]"
                            name="email"
                            placeholder="admin@cruzeiro.com.br"
                            required
                            type="email"
                            value="{{ old('email') }}"
                        />
                    </label>

                    <label class="block">
                        <span class="mb-2 block text-sm font-medium text-slate-700">Senha</span>
                        <input
                            class="w-full rounded border-slate-200 px-4 py-3 text-sm focus:border-[#0f4c92] focus:ring-[#0f4c92]"
                            name="password"
                            placeholder="Sua senha"
                            required
                            type="password"
                        />
                    </label>

                    <label class="flex items-center gap-3 text-sm text-slate-600">
                        <input class="rounded border-slate-300 text-[#0f4c92] focus:ring-[#0f4c92]" name="remember" type="checkbox" value="1" />
                        Manter sessão ativa neste dispositivo
                    </label>

                    <button class="w-full rounded bg-[#0f4c92] px-4 py-3 text-sm font-bold uppercase tracking-[0.18em] text-white transition hover:bg-[#0c3d74]" type="submit">
                        Acessar painel
                    </button>
                </form>

                <div class="mt-8 rounded bg-slate-50 px-4 py-3 text-xs text-slate-500">
                    Usuário padrão: <code>admin@cruzeiro.com.br</code><br />
                    Senha padrão: <code>password</code>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
