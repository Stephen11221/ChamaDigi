<x-app-layout>
    <div x-data="{ recordPayment: false }" class="space-y-8">
        <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm shadow-slate-200/50">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Contributions</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Collection management</h1>
                    <p class="mt-2 text-sm text-slate-600">Track payments, pending contributions and late settlements.</p>
                </div>
                <button @click="recordPayment = true" class="inline-flex items-center justify-center rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400">Record payment</button>
            </div>
        </section>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-5">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm xl:col-span-2">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total collected</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 26.5M</p>
                <p class="mt-2 text-sm text-slate-500">Committed contributions this cycle.</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Paid count</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">1,048</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Pending</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">72</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Late payments</p>
                <p class="mt-4 text-3xl font-semibold text-rose-600">14</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Monthly collection</h2>
                        <p class="mt-1 text-sm text-slate-500">Bar chart shows contributions by month.</p>
                    </div>
                </div>
                <div class="mt-6 h-[300px]">
                    <canvas id="collectionBarChart" class="h-full w-full"></canvas>
                </div>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Collection trend</h2>
                        <p class="mt-1 text-sm text-slate-500">Line chart shows payment momentum.</p>
                    </div>
                </div>
                <div class="mt-6 h-[300px]">
                    <canvas id="collectionTrendChart" class="h-full w-full"></canvas>
                </div>
            </div>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Recent contribution log</h2>
                    <p class="mt-1 text-sm text-slate-500">Latest incoming payments and references.</p>
                </div>
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-emerald-700">Updated 2m ago</span>
            </div>
            <div class="mt-6 overflow-hidden rounded-[1.5rem] border border-slate-200">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Amount</th>
                            <th>Month</th>
                            <th>Date</th>
                            <th>Method</th>
                            <th>Reference</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @foreach ([
                            ['member' => 'Jane W.', 'amount' => 'KES 18,500', 'month' => 'Apr', 'date' => '2026-04-22', 'method' => 'M-Pesa', 'ref' => 'MPESA-6732', 'status' => 'Paid'],
                            ['member' => 'Elijah T.', 'amount' => 'KES 22,000', 'month' => 'Apr', 'date' => '2026-04-20', 'method' => 'Bank', 'ref' => 'BANK-9981', 'status' => 'Pending'],
                            ['member' => 'Miriam K.', 'amount' => 'KES 15,000', 'month' => 'Apr', 'date' => '2026-04-18', 'method' => 'Card', 'ref' => 'CARD-1133', 'status' => 'Paid'],
                        ] as $item)
                            <tr>
                                <td>{{ $item['member'] }}</td>
                                <td class="font-semibold text-slate-900">{{ $item['amount'] }}</td>
                                <td>{{ $item['month'] }}</td>
                                <td>{{ $item['date'] }}</td>
                                <td>{{ $item['method'] }}</td>
                                <td>{{ $item['ref'] }}</td>
                                <td>
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $item['status'] === 'Paid' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">{{ $item['status'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="recordPayment" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-6">
            <div class="w-full max-w-2xl rounded-[2rem] bg-white p-8 shadow-2xl">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-900">Record payment</h2>
                        <p class="mt-1 text-sm text-slate-500">Capture a new member payment in one flow.</p>
                    </div>
                    <button @click="recordPayment = false" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">Close</button>
                </div>
                <form class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Member</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>Jane W.</option>
                            <option>Elijah T.</option>
                            <option>Miriam K.</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Amount</label>
                        <input type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="KES 18,500" />
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Payment method</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>M-Pesa</option>
                            <option>Bank</option>
                            <option>Card</option>
                            <option>Cash</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Reference</label>
                        <input type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="MPESA-6748" />
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm font-semibold text-slate-700">Payment date</label>
                        <input type="date" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" />
                    </div>
                </form>
                <div class="mt-6 flex justify-end gap-3">
                    <button @click="recordPayment = false" class="rounded-3xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                    <button class="rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-400">Save payment</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const barCanvas = document.getElementById('collectionBarChart');
            if (barCanvas) {
                new Chart(barCanvas, {
                    type: 'bar',
                    data: {
                        labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
                        datasets: [{
                            label: 'Collections',
                            data: [3.1, 3.4, 3.7, 4.1, 4.4, 4.9],
                            backgroundColor: '#10b981',
                            borderRadius: 16,
                            barThickness: 24
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { display: false } },
                        scales: {
                            x: { grid: { display: false }, ticks: { color: '#64748b' } },
                            y: { grid: { color: '#e2e8f0' }, ticks: { color: '#64748b', callback: value => 'KES ' + value + 'M' } }
                        }
                    }
                });
            }
            const trendCanvas = document.getElementById('collectionTrendChart');
            if (trendCanvas) {
                new Chart(trendCanvas, {
                    type: 'line',
                    data: {
                        labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
                        datasets: [{
                            label: 'Trend',
                            data: [2.8, 3.1, 3.3, 3.6, 4.0, 4.4],
                            borderColor: '#2563eb',
                            backgroundColor: 'rgba(37,99,235,0.18)',
                            fill: true,
                            tension: 0.35,
                            pointRadius: 3,
                            pointBackgroundColor: '#2563eb'
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
        });
    </script>
    @endpush
</x-app-layout>
