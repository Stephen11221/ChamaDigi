<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#1e3a5f">

        <title>{{ config('app.name', 'Chama Platform') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.8/dist/chart.umd.min.js"></script>

        @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

        @stack('styles')
    </head>
    <body class="min-h-screen font-sans text-slate-900 antialiased">
        <div class="grid min-h-screen lg:grid-cols-[1.05fr_0.95fr]">
            <section class="relative overflow-hidden bg-gradient-to-br from-[#1e3a5f] via-[#0f2742] to-[#059669] px-6 py-10 text-white sm:px-10 lg:px-12">
                <div class="absolute inset-0 opacity-50">
                    <div class="absolute left-0 top-0 h-72 w-72 rounded-full bg-emerald-400/25 blur-3xl"></div>
                    <div class="absolute right-0 top-24 h-80 w-80 rounded-full bg-amber-300/20 blur-3xl"></div>
                    <div class="absolute bottom-0 left-24 h-72 w-72 rounded-full bg-white/10 blur-3xl"></div>
                </div>

                <div class="relative flex h-full flex-col justify-between gap-10">
                    <div class="max-w-2xl space-y-8">
                        <div class="inline-flex items-center gap-3 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-white/90 backdrop-blur">
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white/15">
                                <i class="fa-solid fa-piggy-bank text-sm"></i>
                            </span>
                            Chama Platform
                        </div>

                        <div class="space-y-5">
                            <h1 class="max-w-xl text-3xl font-semibold tracking-tight text-white sm:text-4xl lg:text-5xl">
                                The premium operating system for African savings groups.
                            </h1>
                            <p class="max-w-xl text-sm leading-7 text-slate-100/85 sm:text-base">
                                Built for Chamas, SACCOs, cooperatives, NGOs, and investment clubs that need bank-grade clarity, elegant reporting, and a polished member experience.
                            </p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-3">
                            <div class="rounded-[1.75rem] border border-white/10 bg-white/10 p-5 shadow-[0_35px_90px_-45px_rgba(0,0,0,0.55)] backdrop-blur">
                                <p class="text-[11px] uppercase tracking-[0.28em] text-slate-200/75">Collections</p>
                                <p class="mt-4 text-xl font-semibold sm:text-2xl">Connect data</p>
                                <p class="mt-2 text-xs text-slate-200/80 sm:text-sm">Live metrics will appear here.</p>
                            </div>
                            <div class="rounded-[1.75rem] border border-white/10 bg-white/10 p-5 shadow-[0_35px_90px_-45px_rgba(0,0,0,0.55)] backdrop-blur">
                                <p class="text-[11px] uppercase tracking-[0.28em] text-slate-200/75">Security</p>
                                <p class="mt-4 text-xl font-semibold sm:text-2xl">Bank Grade</p>
                                <p class="mt-2 text-xs text-slate-200/80 sm:text-sm">Encrypted and audited</p>
                            </div>
                            <div class="rounded-[1.75rem] border border-white/10 bg-white/10 p-5 shadow-[0_35px_90px_-45px_rgba(0,0,0,0.55)] backdrop-blur">
                                <p class="text-[11px] uppercase tracking-[0.28em] text-slate-200/75">Mobile</p>
                                <p class="mt-4 text-xl font-semibold sm:text-2xl">M-Pesa Ready</p>
                                <p class="mt-2 text-xs text-slate-200/80 sm:text-sm">Fast payments and reconciliation</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-4 xl:grid-cols-[1.1fr_0.9fr]">
                        <div class="premium-glow rounded-[2rem] border border-white/10 bg-white/10 p-6 backdrop-blur">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.28em] text-emerald-100">Trust indicators</p>
                                    <p class="mt-3 text-lg font-semibold text-white">Investor-demo quality experience</p>
                                </div>
                                <div class="rounded-2xl bg-white/10 px-3 py-2 text-sm font-semibold text-emerald-100">
                                    <i class="fa-solid fa-shield-halved mr-2"></i>256-bit encryption
                                </div>
                            </div>
                            <div class="mt-6 grid gap-4 sm:grid-cols-3">
                                <div class="rounded-3xl bg-white/10 p-4">
                                    <p class="text-xs uppercase tracking-[0.25em] text-slate-300">Uptime</p>
                                    <p class="mt-2 text-lg font-semibold">Connect</p>
                                </div>
                                <div class="rounded-3xl bg-white/10 p-4">
                                    <p class="text-xs uppercase tracking-[0.25em] text-slate-300">Groups</p>
                                    <p class="mt-2 text-lg font-semibold">Connect</p>
                                </div>
                                <div class="rounded-3xl bg-white/10 p-4">
                                    <p class="text-xs uppercase tracking-[0.25em] text-slate-300">Settlement</p>
                                    <p class="mt-2 text-lg font-semibold">Connect</p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-[2rem] border border-white/10 bg-slate-950/35 p-6 backdrop-blur">
                            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-amber-200">Why teams trust us</p>
                            <ul class="mt-4 space-y-4 text-sm text-slate-100/85">
                                <li class="flex gap-3"><i class="fa-solid fa-circle-check mt-0.5 text-emerald-300"></i> Premium member dashboards with elegant reporting</li>
                                <li class="flex gap-3"><i class="fa-solid fa-circle-check mt-0.5 text-emerald-300"></i> Ready for contributions, loans, investments, and meetings</li>
                                <li class="flex gap-3"><i class="fa-solid fa-circle-check mt-0.5 text-emerald-300"></i> African-first fintech styling inspired by Stripe and M-Pesa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="flex items-center justify-center px-4 py-8 sm:px-8 lg:px-10">
                <div class="w-full max-w-xl">
                    <div class="premium-card-muted overflow-hidden">
                        <div class="border-b border-slate-200/80 bg-gradient-to-r from-white via-emerald-50/70 to-amber-50/80 px-6 py-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-slate-500">Secure portal</p>
                            <p class="mt-2 text-lg font-semibold text-slate-900">Welcome to Chama Platform</p>
                        </div>
                        <div class="p-6 sm:p-8">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @stack('scripts')
    </body>
</html>
