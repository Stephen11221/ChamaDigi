<x-app-layout>
    <div x-data="{ sendInvoice: false }" class="space-y-8">
        <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm shadow-slate-200/50">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Payments</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Payment operations</h1>
                    <p class="mt-2 text-sm text-slate-600">Run payment workflows and monitor settlement status.</p>
                </div>
                <button @click="sendInvoice = true" class="inline-flex items-center justify-center rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400">Send invoice</button>
            </div>
        </section>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Settled</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 12.8M</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Due</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 2.4M</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Failed</p>
                <p class="mt-4 text-3xl font-semibold text-rose-600">KES 260K</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Refunds</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 54K</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900">Payment volume</h2>
                        <p class="mt-1 text-sm text-slate-500">Trend of settled payments.</p>
                    </div>
                </div>
                <div class="mt-6 h-[300px]"><canvas id="paymentVolumeChart" class="h-full w-full"></canvas></div>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Methods</h2>
                    <p class="mt-1 text-sm text-slate-500">Payment channel distribution.</p>
                </div>
                <div class="mt-6 h-[300px]"><canvas id="paymentMethodsChart" class="h-full w-full"></canvas></div>
            </div>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-lg font-semibold text-slate-900">Latest payments</h2>
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-emerald-700">Live</span>
            </div>
            <div class="mt-6 overflow-hidden rounded-[1.5rem] border border-slate-200">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Amount</th>
                            <th>Channel</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @foreach ([
                            ['member' => 'Mercy N.', 'amount' => 'KES 22,300', 'channel' => 'M-Pesa', 'date' => '2026-04-29', 'status' => 'Settled'],
                            ['member' => 'Samuel O.', 'amount' => 'KES 48,500', 'channel' => 'Card', 'date' => '2026-04-28', 'status' => 'Failed'],
                            ['member' => 'Zuri L.', 'amount' => 'KES 34,000', 'channel' => 'Bank', 'date' => '2026-04-27', 'status' => 'Settled'],
                        ] as $payment)
                            <tr>
                                <td>{{ $payment['member'] }}</td>
                                <td class="font-semibold text-slate-900">{{ $payment['amount'] }}</td>
                                <td>{{ $payment['channel'] }}</td>
                                <td>{{ $payment['date'] }}</td>
                                <td>
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $payment['status'] === 'Settled' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">{{ $payment['status'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="sendInvoice" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-6">
            <div class="w-full max-w-2xl rounded-[2rem] bg-white p-8 shadow-2xl">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-900">Send invoice</h2>
                        <p class="mt-1 text-sm text-slate-500">Create payment reminders for members or group accounts.</p>
                    </div>
                    <button @click="sendInvoice = false" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">Close</button>
                </div>
                <form class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Member</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>Mercy N.</option>
                            <option>Samuel O.</option>
                            <option>Zuri L.</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Amount</label>
                        <input type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="KES 22,300" />
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Payment method</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>M-Pesa</option>
                            <option>Bank transfer</option>
                            <option>Card</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Due date</label>
                        <input type="date" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" />
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm font-semibold text-slate-700">Notes</label>
                        <textarea rows="4" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="Add a custom payment note or reminder details."></textarea>
                    </div>
                </form>
                <div class="mt-6 flex justify-end gap-3">
                    <button @click="sendInvoice = false" class="rounded-3xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                    <button class="rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-400">Send invoice</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const volumeCanvas = document.getElementById('paymentVolumeChart');
            if (volumeCanvas) {
                new Chart(volumeCanvas, {
                    type: 'line',
                    data: {
                        labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
                        datasets: [{
                            label: 'Settled payments',
                            data: [1.7, 1.9, 2.3, 2.7, 3.0, 3.4],
                            borderColor: '#0f766e',
                            backgroundColor: 'rgba(15,118,110,0.18)',
                            fill: true,
                            tension: 0.35,
                            pointRadius: 3,
                            pointBackgroundColor: '#0f766e'
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
            const methodsCanvas = document.getElementById('paymentMethodsChart');
            if (methodsCanvas) {
                new Chart(methodsCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: ['M-Pesa', 'Bank', 'Card'],
                        datasets: [{
                            data: [58, 27, 15],
                            backgroundColor: ['#10b981', '#2563eb', '#f59e0b']
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
