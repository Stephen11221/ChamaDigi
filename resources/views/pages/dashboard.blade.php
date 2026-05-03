<x-app-layout>
    @php
        $today = now()->format('l, d F Y');
    @endphp

    <div class="space-y-8">
        <section class="premium-card overflow-hidden">
            <div class="grid gap-8 px-6 py-8 lg:grid-cols-[1.3fr_0.7fr] lg:px-8 lg:py-10">
                <div class="space-y-6">
                    <div class="flex flex-wrap items-center gap-3">
                        <x-badge variant="gold" icon="fa-sparkles">Executive dashboard</x-badge>
                        <span class="text-sm text-slate-500">{{ $today }}</span>
                    </div>

                    <div class="max-w-3xl space-y-4">
                        <h1 class="text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">
                            Welcome back, {{ Auth::user()->name }}.
                        </h1>
                        <p class="text-base leading-8 text-slate-600">
                            Here is a premium overview of savings, loans, investments, and member activity across your Chama ecosystem.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <x-button href="{{ route('members') }}" icon="fa-user-plus">Add member</x-button>
                        <x-button href="{{ route('contributions') }}" variant="secondary" icon="fa-receipt">Record contribution</x-button>
                        <x-button href="{{ route('meetings') }}" variant="dark" icon="fa-calendar-days">Schedule meeting</x-button>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <div class="rounded-[1.75rem] bg-gradient-to-br from-[#1e3a5f] via-[#12253d] to-[#059669] p-6 text-white shadow-[0_35px_90px_-45px_rgba(15,23,42,0.75)]">
                        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-slate-200/80">Portfolio health</p>
                        <p class="mt-4 text-3xl font-semibold">Connect data</p>
                        <p class="mt-2 text-sm text-slate-100/80">Live balances will appear here once your finance feed is wired.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-200 bg-white/90 p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-slate-500">Security</p>
                        <p class="mt-3 text-xl font-semibold text-slate-900">Ready to connect</p>
                        </div>
                            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <i class="fa-solid fa-shield-halved"></i>
                            </span>
                        </div>
                        <p class="mt-3 text-sm text-slate-500">Transactions and operational logs are aligned with enterprise controls.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Total Balance" value="—" subtitle="Connect your ledger" icon="fa-coins" tone="emerald" />
            <x-stat-card title="Monthly Contributions" value="—" subtitle="Connect your collections feed" icon="fa-wallet" tone="blue" />
            <x-stat-card title="Active Loans" value="—" subtitle="Connect your loan module" icon="fa-hand-holding-dollar" tone="slate" />
            <x-stat-card title="Total Investments" value="—" subtitle="Connect your investment module" icon="fa-building-columns" tone="gold" />
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
            <div class="space-y-6">
                <x-chart-card title="Savings growth" subtitle="Six month trajectory and contribution momentum" class="h-full">
                    <div class="h-[320px]">
                        <div class="flex h-full items-center justify-center rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 text-center">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">No chart data yet</p>
                                <p class="mt-1 text-sm text-slate-500">Connect a savings source to render performance trends.</p>
                            </div>
                        </div>
                    </div>
                </x-chart-card>

                <div class="grid gap-6 lg:grid-cols-2">
                    <x-table-card title="Recent activity" subtitle="Latest operations across the platform">
                        <table class="premium-table">
                            <thead>
                                <tr>
                                <th>Activity</th>
                                <th>Action</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-sm text-slate-500">
                                    No recent activity yet. Connect your data sources to populate this feed.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </x-table-card>

                    <x-table-card title="Upcoming meetings" subtitle="Boardroom sessions and member reviews">
                        <table class="premium-table">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Meeting</th>
                                    <th>Venue</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                <tr class="hover:bg-slate-50/70">
                                    <td class="px-6 py-4 font-semibold text-slate-900">10:00 AM</td>
                                    <td class="px-6 py-4">Savings governance review</td>
                                    <td class="px-6 py-4">Boardroom, Nairobi</td>
                                </tr>
                                <tr class="hover:bg-slate-50/70">
                                    <td class="px-6 py-4 font-semibold text-slate-900">2:30 PM</td>
                                    <td class="px-6 py-4">Loan approvals committee</td>
                                    <td class="px-6 py-4">Virtual / Zoom</td>
                                </tr>
                                <tr class="hover:bg-slate-50/70">
                                    <td class="px-6 py-4 font-semibold text-slate-900">Saturday</td>
                                    <td class="px-6 py-4">Annual strategy retreat</td>
                                    <td class="px-6 py-4">Kigali Resort</td>
                                </tr>
                            </tbody>
                        </table>
                    </x-table-card>
                </div>
            </div>

            <aside class="space-y-6">
                <x-chart-card title="Portfolio mix" subtitle="Asset allocation snapshot">
                    <div class="h-[260px]">
                        <div class="flex h-full items-center justify-center rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 text-center">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">No portfolio data yet</p>
                                <p class="mt-1 text-sm text-slate-500">Connect investment accounts to visualize the mix.</p>
                            </div>
                        </div>
                    </div>
                </x-chart-card>

                <div class="premium-card-muted p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="section-label">ROI summary</p>
                            <p class="mt-2 text-sm text-slate-500">Performance by investment bucket</p>
                        </div>
                        <x-badge variant="gold">Connect data</x-badge>
                    </div>
                    <div class="mt-6 space-y-4">
                        <div>
                            <div class="mb-2 flex items-center justify-between text-sm">
                                <span class="text-slate-600">Fixed deposit</span>
                                <span class="font-semibold text-slate-900">—</span>
                            </div>
                            <div class="h-2 rounded-full bg-slate-100">
                                <div class="h-2 w-[76%] rounded-full bg-gradient-to-r from-emerald-500 to-emerald-600"></div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-2 flex items-center justify-between text-sm">
                                <span class="text-slate-600">Property</span>
                                <span class="font-semibold text-slate-900">—</span>
                            </div>
                            <div class="h-2 rounded-full bg-slate-100">
                                <div class="h-2 w-[58%] rounded-full bg-gradient-to-r from-blue-500 to-blue-600"></div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-2 flex items-center justify-between text-sm">
                                <span class="text-slate-600">Treasury bills</span>
                                <span class="font-semibold text-slate-900">—</span>
                            </div>
                            <div class="h-2 rounded-full bg-slate-100">
                                <div class="h-2 w-[44%] rounded-full bg-gradient-to-r from-amber-400 to-amber-500"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="premium-card-muted p-6">
                    <p class="section-label">Quick actions</p>
                    <div class="mt-5 grid gap-3">
                        <x-button href="{{ route('members') }}" variant="dark" icon="fa-user-plus" class="w-full">Create member</x-button>
                        <x-button href="{{ route('payments') }}" variant="secondary" icon="fa-receipt" class="w-full">Record payment</x-button>
                        <x-button href="{{ route('loans') }}" variant="secondary" icon="fa-handshake" class="w-full">Review loans</x-button>
                    </div>
                </div>

                <div class="premium-card-muted overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-50 to-white px-6 py-5">
                        <p class="section-label">Top contributor</p>
                        <div class="mt-4 flex items-center gap-4">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-400 to-amber-500 text-sm font-semibold text-slate-950">
                                HK
                            </div>
                            <div>
                            <p class="text-base font-semibold text-slate-900">Top contributor</p>
                            <p class="text-sm text-slate-500">Connect member data to highlight leaders.</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-sm leading-7 text-slate-600">This member has led monthly collection for 8 consecutive cycles and continues to set the benchmark for participation.</p>
                    </div>
                </div>
            </aside>
        </section>
    </div>

    @push('scripts')
    @endpush
</x-app-layout>
