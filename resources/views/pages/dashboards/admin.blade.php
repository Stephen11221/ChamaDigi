<x-app-layout>
    <div class="space-y-8">
        <section class="premium-card overflow-hidden">
            <div class="grid gap-8 px-6 py-8 lg:grid-cols-[1.3fr_0.7fr] lg:px-8 lg:py-10">
                <div class="space-y-6">
                    <div class="flex flex-wrap items-center gap-3">
                        <x-badge variant="gold" icon="fa-shield-halved">Admin dashboard</x-badge>
                        <span class="text-sm text-slate-500">{{ $today ?? now()->format('l, d F Y') }}</span>
                    </div>
                    <div class="max-w-3xl space-y-4">
                        <h1 class="text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">Welcome back, {{ Auth::user()->name }}.</h1>
                        <p class="text-base leading-8 text-slate-600">Manage users, monitor activity, and keep the entire platform aligned from one control center.</p>
                    </div>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <x-stat-card title="Platform coverage" value="All modules" subtitle="Admin visibility across the system" icon="fa-layer-group" tone="emerald" />
                    <x-stat-card title="Risk posture" value="Stable" subtitle="Track anomalies and permissions" icon="fa-triangle-exclamation" tone="gold" />
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
