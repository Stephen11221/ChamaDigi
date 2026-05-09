<x-app-layout>
    <div class="space-y-8">
        <section class="premium-card overflow-hidden">
            <div class="grid gap-8 px-6 py-8 lg:grid-cols-[1.3fr_0.7fr] lg:px-8 lg:py-10">
                <div class="space-y-6">
                    <div class="flex flex-wrap items-center gap-3">
                        <x-badge variant="dark" icon="fa-user">Member dashboard</x-badge>
                        <span class="text-sm text-slate-500">{{ $today ?? now()->format('l, d F Y') }}</span>
                    </div>

                    <div class="max-w-3xl space-y-4">
                        <h1 class="text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">
                            Welcome back, {{ Auth::user()->name }}.
                        </h1>
                        <p class="text-base leading-8 text-slate-600">
                            Follow your savings, loan status, and payment activity from a personal home base.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <x-button href="{{ route('contributions') }}" icon="fa-wallet">View contributions</x-button>
                        <x-button href="{{ route('payments') }}" variant="secondary" icon="fa-receipt">Check payments</x-button>
                        <x-button href="{{ route('loans') }}" variant="dark" icon="fa-hand-holding-dollar">Loan status</x-button>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <x-stat-card title="My savings" value="—" subtitle="Personal contribution summary" icon="fa-wallet" tone="emerald" />
                    <x-stat-card title="Loan balance" value="—" subtitle="Current repayment position" icon="fa-hand-holding-dollar" tone="gold" />
                </div>
            </div>
        </section>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Contributions" value="—" subtitle="Your deposits" icon="fa-coins" tone="emerald" />
            <x-stat-card title="Payments" value="—" subtitle="Recent transactions" icon="fa-receipt" tone="blue" />
            <x-stat-card title="Meetings" value="—" subtitle="Member sessions" icon="fa-calendar-days" tone="slate" />
            <x-stat-card title="Notifications" value="—" subtitle="Updates for you" icon="fa-bell" tone="gold" />
        </section>
    </div>
</x-app-layout>
