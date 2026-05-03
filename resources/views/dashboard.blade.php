<x-app-layout>
    <div class="space-y-8">
        <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm shadow-slate-200/50">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Executive overview</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Hello, {{ Auth::user()->name }}.</h1>
                    <p class="mt-2 text-sm text-slate-600">Your Chama portfolio and member health metrics are ready.</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row">
                    <button class="inline-flex items-center justify-center rounded-3xl bg-[#1e3a5f] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 transition hover:bg-[#163252]">Schedule meeting</button>
                    <button class="inline-flex items-center justify-center rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400">Quick loan</button>
                    <button class="inline-flex items-center justify-center rounded-3xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Record contribution</button>
                </div>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.8fr_1fr]">
            <div class="space-y-6">
                <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                    <div class="rounded-[2rem] bg-gradient-to-br from-[#10b981] to-[#059669] p-6 text-white shadow-xl shadow-emerald-500/10">
                        <p class="text-sm uppercase tracking-[0.2em] text-emerald-100/80">Total Balance</p>
                        <p class="mt-4 text-3xl font-semibold">KES 48.2M</p>
                        <p class="mt-2 text-sm text-emerald-100/90">Strong year-to-date capital</p>
                    </div>
                    <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Monthly Contributions</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">KES 6.4M</p>
                        <p class="mt-2 text-sm text-slate-500">11% above target</p>
                    </div>
                    <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Active Loans</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">38</p>
                        <p class="mt-2 text-sm text-slate-500">Healthy repayment flow</p>
                    </div>
                    <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total Investments</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">KES 12.7M</p>
                        <p class="mt-2 text-sm text-slate-500">Diversified portfolio</p>
                    </div>
                </div>

                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-4 pb-4">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">Savings growth</h2>
                            <p class="mt-1 text-sm text-slate-500">Six months performance trend</p>
                        </div>
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-600">+18.4% growth</span>
                    </div>
                    <div class="h-[300px]">
                        <canvas id="savingsGrowthChart" class="h-full w-full"></canvas>
                    </div>
                </div>

                <div class="grid gap-6 xl:grid-cols-[1fr_0.9fr]">
                    <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                        <h3 class="text-base font-semibold text-slate-900">Growth summary</h3>
                        <div class="mt-6 grid gap-4 sm:grid-cols-3">
                            <div class="rounded-3xl bg-slate-50 p-4 text-center">
                                <p class="text-sm text-slate-500">Highest month</p>
                                <p class="mt-3 text-xl font-semibold text-slate-900">Dec</p>
                            </div>
                            <div class="rounded-3xl bg-slate-50 p-4 text-center">
                                <p class="text-sm text-slate-500">Avg. growth</p>
                                <p class="mt-3 text-xl font-semibold text-slate-900">KES 1.1M</p>
                            </div>
                            <div class="rounded-3xl bg-slate-50 p-4 text-center">
                                <p class="text-sm text-slate-500">Growth rate</p>
                                <p class="mt-3 text-xl font-semibold text-slate-900">18.4%</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h3 class="text-base font-semibold text-slate-900">Recent activity</h3>
                            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-emerald-700">Live</span>
                        </div>
                        <div class="mt-6 space-y-4">
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 hover:border-emerald-200 transition">
                                <div class="flex items-center justify-between gap-3">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">Grace N.</p>
                                        <p class="text-sm text-slate-500">Contribution received</p>
                                    </div>
                                    <p class="text-sm font-semibold text-emerald-600">+ KES 180,000</p>
                                </div>
                            </div>
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 hover:border-slate-300 transition">
                                <div class="flex items-center justify-between gap-3">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">Kofi D.</p>
                                        <p class="text-sm text-slate-500">Loan installment paid</p>
                                    </div>
                                    <p class="text-sm font-semibold text-emerald-600">+ KES 45,000</p>
                                </div>
                            </div>
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 hover:border-slate-300 transition">
                                <div class="flex items-center justify-between gap-3">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">M-Pesa settlement</p>
                                        <p class="text-sm text-slate-500">Inbound payment confirmed</p>
                                    </div>
                                    <p class="text-sm font-semibold text-rose-600">- KES 45,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-semibold text-slate-900">Quick actions</h3>
                    <div class="mt-5 grid gap-3">
                        <button class="w-full rounded-3xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800">Create member</button>
                        <button class="w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Record payment</button>
                        <button class="w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Review loan requests</button>
                    </div>
                </div>
                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-base font-semibold text-slate-900">Portfolio mix</h3>
                            <p class="mt-1 text-sm text-slate-500">Asset allocation snapshot</p>
                        </div>
                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-emerald-700">Stable</span>
                    </div>
                    <div class="mt-6 h-64">
                        <canvas id="portfolioChart" class="h-full w-full"></canvas>
                    </div>
                </div>
                <div class="rounded-[2rem] border border-slate-200 bg-gradient-to-br from-white via-slate-50 to-emerald-50 p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <h3 class="text-base font-semibold text-slate-900">Upcoming meeting</h3>
                            <p class="mt-1 text-sm text-slate-500">Savings governance review</p>
                        </div>
                        <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-emerald-700">Tomorrow</span>
                    </div>
                    <div class="mt-6 space-y-4">
                        <div class="rounded-3xl bg-white p-4 shadow-sm">
                            <p class="text-sm font-semibold text-slate-900">10:00 AM</p>
                            <p class="mt-1 text-sm text-slate-500">Boardroom, Nairobi</p>
                        </div>
                        <div class="rounded-3xl bg-white p-4 shadow-sm">
                            <p class="text-sm font-semibold text-slate-900">Agenda</p>
                            <p class="mt-1 text-sm text-slate-500">Review contributions, loan pipeline, investment returns.</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-amber-400/10 text-amber-600">🏆</div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Top contributor</p>
                            <p class="text-sm text-slate-500">Hawa K. — KES 201,000</p>
                        </div>
                    </div>
                    <div class="mt-5 rounded-3xl bg-slate-50 p-4 text-sm text-slate-500">This champion has led monthly collection for 8 consecutive cycles.</div>
                </div>
            </aside>
        </section>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const savingsCanvas = document.getElementById('savingsGrowthChart');
            if (savingsCanvas) {
                new Chart(savingsCanvas, {
                    type: 'line',
                    data: {
                        labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
                        datasets: [{
                            label: 'Savings Growth',
                            data: [4.9, 5.3, 5.9, 6.2, 6.8, 7.4],
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16,185,129,0.18)',
                            fill: true,
                            tension: 0.35,
                            pointRadius: 3,
                            pointBackgroundColor: '#10b981'
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: false },
                        },
                        scales: {
                            x: { grid: { display: false }, ticks: { color: '#64748b' } },
                            y: { grid: { color: '#e2e8f0' }, ticks: { color: '#64748b' }, beginAtZero: false }
                        }
                    }
                });
            }

            const portfolioCanvas = document.getElementById('portfolioChart');
            if (portfolioCanvas) {
                new Chart(portfolioCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: ['M-Pesa', 'Fixed Deposit', 'Real Estate', 'Bonds'],
                        datasets: [{
                            data: [42, 21, 18, 19],
                            backgroundColor: ['#10b981', '#0f172a', '#d4af37', '#2563eb'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { position: 'bottom', labels: { color: '#475569' } }
                        }
                    }
                });
            }
        });
    </script>
    @endpush
</x-app-layout>
