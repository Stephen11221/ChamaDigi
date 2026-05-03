<x-app-layout>
    <div x-data="{ requestLoan: false, approveLoan: false }" class="space-y-8">
        <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm shadow-slate-200/50">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Loan management</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Disbursements and repayments</h1>
                    <p class="mt-2 text-sm text-slate-600">Monitor pipeline, repay schedule and interest exposure.</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row">
                    <button @click="requestLoan = true" class="inline-flex items-center justify-center rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400">Request loan</button>
                    <button @click="approveLoan = true" class="inline-flex items-center justify-center rounded-3xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Approve request</button>
                </div>
            </div>
        </section>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-5">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm xl:col-span-2">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total disbursed</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 14.9M</p>
                <p class="mt-2 text-sm text-slate-500">Loans released this quarter.</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Active loans</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">26</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Pending requests</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">9</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Outstanding</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 6.3M</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Repayment bar chart</h2>
                <p class="mt-1 text-sm text-slate-500">Monthly instalments and principal recovery.</p>
                <div class="mt-6 h-[300px]"><canvas id="loanRepaymentChart" class="h-full w-full"></canvas></div>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Loan status</h2>
                <p class="mt-1 text-sm text-slate-500">Current portfolio allocation.</p>
                <div class="mt-6 h-[300px]"><canvas id="loanStatusChart" class="h-full w-full"></canvas></div>
            </div>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-lg font-semibold text-slate-900">Loan tracker</h2>
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-emerald-700">4 due today</span>
            </div>
            <div class="mt-6 overflow-hidden rounded-[1.5rem] border border-slate-200">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Loan amount</th>
                            <th>Repayable</th>
                            <th>Duration</th>
                            <th>Progress</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @foreach ([
                            ['name' => 'Juma S.', 'amount' => 'KES 450,000', 'repay' => 'KES 522,500', 'duration' => '12m', 'progress' => 72, 'status' => 'Active'],
                            ['name' => 'Naomi P.', 'amount' => 'KES 320,000', 'repay' => 'KES 371,200', 'duration' => '9m', 'progress' => 54, 'status' => 'Active'],
                            ['name' => 'Peter M.', 'amount' => 'KES 180,000', 'repay' => 'KES 209,400', 'duration' => '6m', 'progress' => 93, 'status' => 'Almost done'],
                        ] as $loan)
                            <tr>
                                <td>{{ $loan['name'] }}</td>
                                <td class="font-semibold text-slate-900">{{ $loan['amount'] }}</td>
                                <td>{{ $loan['repay'] }}</td>
                                <td>{{ $loan['duration'] }}</td>
                                <td>
                                    <div class="h-2.5 w-full overflow-hidden rounded-full bg-slate-100">
                                        <div class="h-full rounded-full bg-emerald-500" style="width: {{ $loan['progress'] }}%"></div>
                                    </div>
                                    <p class="mt-2 text-xs text-slate-500">{{ $loan['progress'] }}%</p>
                                </td>
                                <td>
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $loan['status'] === 'Active' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-700' }}">{{ $loan['status'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="requestLoan" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-6">
            <div class="w-full max-w-2xl rounded-[2rem] bg-white p-8 shadow-2xl">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-900">Loan request</h2>
                        <p class="mt-1 text-sm text-slate-500">Create a new loan file with guarantor and terms.</p>
                    </div>
                    <button @click="requestLoan = false" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">Close</button>
                </div>
                <form class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Member name</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>Juma S.</option>
                            <option>Naomi P.</option>
                            <option>Peter M.</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Loan amount</label>
                        <input type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="KES 450,000" />
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Interest rate</label>
                        <input type="text" readonly value="5%" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-100 px-4 py-3 text-sm text-slate-600 outline-none" />
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Duration</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>6 months</option>
                            <option>9 months</option>
                            <option>12 months</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm font-semibold text-slate-700">Purpose</label>
                        <textarea rows="4" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="Working capital, school fees, investment, etc."></textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm font-semibold text-slate-700">Guarantor</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>Amara A.</option>
                            <option>Grace N.</option>
                        </select>
                    </div>
                </form>
                <div class="mt-6 flex justify-end gap-3">
                    <button @click="requestLoan = false" class="rounded-3xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                    <button class="rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-400">Submit request</button>
                </div>
            </div>
        </div>

        <div x-show="approveLoan" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-6">
            <div class="w-full max-w-xl rounded-[2rem] bg-white p-8 shadow-2xl">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-900">Loan approval</h2>
                        <p class="mt-1 text-sm text-slate-500">Review the request and approve or reject.</p>
                    </div>
                    <button @click="approveLoan = false" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">Close</button>
                </div>
                <div class="mt-8 grid gap-4">
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                        <p class="text-sm text-slate-500">Requested by</p>
                        <p class="mt-2 text-lg font-semibold text-slate-900">Hawa K.</p>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl border border-slate-200 bg-white p-5">
                            <p class="text-sm text-slate-500">Principal</p>
                            <p class="mt-2 text-xl font-semibold text-slate-900">KES 240,000</p>
                        </div>
                        <div class="rounded-3xl border border-slate-200 bg-white p-5">
                            <p class="text-sm text-slate-500">Total repayable</p>
                            <p class="mt-2 text-xl font-semibold text-slate-900">KES 252,000</p>
                        </div>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-5">
                        <p class="text-sm text-slate-500">Monthly repayment</p>
                        <p class="mt-2 text-xl font-semibold text-slate-900">KES 21,000</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <button @click="approveLoan = false" class="rounded-3xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Reject</button>
                    <button class="rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-400">Approve</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const repaymentCanvas = document.getElementById('loanRepaymentChart');
            if (repaymentCanvas) {
                new Chart(repaymentCanvas, {
                    type: 'bar',
                    data: {
                        labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
                        datasets: [{
                            label: 'Repayment',
                            data: [1.8, 2.1, 2.4, 2.5, 2.9, 3.3],
                            backgroundColor: '#059669',
                            borderRadius: 16,
                            barThickness: 20
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
            const statusCanvas = document.getElementById('loanStatusChart');
            if (statusCanvas) {
                new Chart(statusCanvas, {
                    type: 'pie',
                    data: {
                        labels: ['Active', 'Pending', 'Repaid'],
                        datasets: [{
                            data: [65, 20, 15],
                            backgroundColor: ['#10b981', '#f59e0b', '#64748b']
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
