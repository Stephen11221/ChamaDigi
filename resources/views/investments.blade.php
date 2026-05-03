<x-app-layout>
    <div x-data="{ addInvestment: false }" class="space-y-8">
        <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm shadow-slate-200/50">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Investments</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Portfolio performance</h1>
                    <p class="mt-2 text-sm text-slate-600">Track investments, returns and ROI across asset classes.</p>
                </div>
                <button @click="addInvestment = true" class="inline-flex items-center justify-center rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400">Add investment</button>
            </div>
        </section>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-5">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm xl:col-span-2">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total invested</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 9.6M</p>
                <p class="mt-2 text-sm text-slate-500">Capital currently committed.</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Current value</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 10.8M</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Returns</p>
                <p class="mt-4 text-3xl font-semibold text-emerald-600">KES 1.2M</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Avg ROI</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">12.5%</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Portfolio growth</h2>
                <p class="mt-1 text-sm text-slate-500">Net investment value over time.</p>
                <div class="mt-6 h-[300px]"><canvas id="portfolioGrowthChart" class="h-full w-full"></canvas></div>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Distribution</h2>
                <p class="mt-1 text-sm text-slate-500">Where capital is allocated.</p>
                <div class="mt-6 h-[300px]"><canvas id="investmentDistributionChart" class="h-full w-full"></canvas></div>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-3">
            @foreach ([
                ['title' => 'Money Market Fund', 'type' => 'Money Market', 'roi' => '8.2%', 'returns' => 'KES 420,000', 'maturity' => '2026-10-12'],
                ['title' => 'Nairobi Real Estate', 'type' => 'Real Estate', 'roi' => '14.5%', 'returns' => 'KES 520,000', 'maturity' => '2027-03-29'],
                ['title' => 'Government Bond', 'type' => 'Government Bond', 'roi' => '10.0%', 'returns' => 'KES 310,000', 'maturity' => '2026-12-05'],
            ] as $investment)
                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $investment['title'] }}</p>
                            <p class="mt-1 text-sm text-slate-500">{{ $investment['type'] }}</p>
                        </div>
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-slate-700">ROI {{ $investment['roi'] }}</span>
                    </div>
                    <div class="mt-6 space-y-3 text-sm text-slate-500">
                        <div class="flex items-center justify-between">
                            <span>Returns</span>
                            <span class="font-semibold text-slate-900">{{ $investment['returns'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Maturity</span>
                            <span class="font-semibold text-slate-900">{{ $investment['maturity'] }}</span>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between gap-3">
                        <button class="rounded-3xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">View</button>
                        <button class="rounded-3xl bg-emerald-500 px-4 py-3 text-sm font-semibold text-white hover:bg-emerald-400">Update</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div x-show="addInvestment" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-6">
            <div class="w-full max-w-2xl rounded-[2rem] bg-white p-8 shadow-2xl">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-900">Add investment</h2>
                        <p class="mt-1 text-sm text-slate-500">Record a new asset allocation and target ROI.</p>
                    </div>
                    <button @click="addInvestment = false" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">Close</button>
                </div>
                <form class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Investment name</label>
                        <input type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="Emerald Treasury Fund" />
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Type</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>Money Market</option>
                            <option>Real Estate</option>
                            <option>Government Bond</option>
                            <option>Fixed Deposit</option>
                            <option>Stocks</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Amount</label>
                        <input type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="KES 1,000,000" />
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">ROI target</label>
                        <input type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="12%" />
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm font-semibold text-slate-700">Duration</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>6 months</option>
                            <option>12 months</option>
                            <option>24 months</option>
                        </select>
                    </div>
                </form>
                <div class="mt-6 flex justify-end gap-3">
                    <button @click="addInvestment = false" class="rounded-3xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                    <button class="rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-400">Add investment</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const growthCanvas = document.getElementById('portfolioGrowthChart');
            if (growthCanvas) {
                new Chart(growthCanvas, {
                    type: 'line',
                    data: {
                        labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
                        datasets: [{
                            label: 'Portfolio value',
                            data: [7.2, 7.6, 8.1, 8.4, 9.1, 9.6],
                            borderColor: '#1e40af',
                            backgroundColor: 'rgba(30,64,175,0.18)',
                            fill: true,
                            tension: 0.35,
                            pointRadius: 3,
                            pointBackgroundColor: '#1e40af'
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { display: false } },
                        scales: {
                            x: { grid: { display: false }, ticks: { color: '#64748b' } },
                            y: { grid: { color: '#e2e8f0' }, ticks: { color: '#64748b' } }
                        }
                    }
                });
            }
            const distributionCanvas = document.getElementById('investmentDistributionChart');
            if (distributionCanvas) {
                new Chart(distributionCanvas, {
                    type: 'pie',
                    data: {
                        labels: ['Stocks', 'Real Estate', 'Bonds', 'Money Market'],
                        datasets: [{
                            data: [31, 24, 20, 25],
                            backgroundColor: ['#0f172a', '#10b981', '#d4af37', '#6366f1']
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { position: 'bottom', labels: { color: '#475569' } } }
                    }
                });
            }
        });
    </script>
    @endpush
</x-app-layout>
