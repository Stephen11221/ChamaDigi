<x-app-layout>
    <div class="space-y-8">
        <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm shadow-slate-200/50">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Reports & analytics</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Financial scorecard</h1>
                    <p class="mt-2 text-sm text-slate-600">Generate operational and financial reports with ease.</p>
                </div>
                <button class="inline-flex items-center justify-center rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400">Generate report</button>
            </div>
        </section>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Revenue</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 18.2M</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Expenses</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">KES 7.3M</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Net income</p>
                <p class="mt-4 text-3xl font-semibold text-emerald-600">KES 10.9M</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Active members</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">1,102</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Financial overview</h2>
                <p class="mt-1 text-sm text-slate-500">Visualize revenue and expense trends.</p>
                <div class="mt-6 space-y-4">
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-slate-500">Quarterly revenue</p>
                                <p class="mt-2 text-2xl font-semibold text-slate-900">KES 5.8M</p>
                            </div>
                            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-emerald-700">+16%</span>
                        </div>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-slate-500">Cash flow</p>
                                <p class="mt-2 text-2xl font-semibold text-slate-900">KES 2.1M</p>
                            </div>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-slate-700">Stable</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Custom report</h2>
                <p class="mt-1 text-sm text-slate-500">Export to your preferred format.</p>
                <div class="mt-6 space-y-4">
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Report type</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>Revenue summary</option>
                            <option>Cash flow</option>
                            <option>Member performance</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Period</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>Last 30 days</option>
                            <option>Last quarter</option>
                            <option>Year to date</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Format</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>PDF</option>
                            <option>Excel</option>
                            <option>CSV</option>
                        </select>
                    </div>
                    <button class="w-full rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-400">Generate report</button>
                </div>
            </div>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Report history</h2>
                    <p class="mt-1 text-sm text-slate-500">Download previously generated exports.</p>
                </div>
                <button class="rounded-3xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">View all</button>
            </div>
            <div class="mt-6 overflow-hidden rounded-[1.5rem] border border-slate-200">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Report</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @foreach ([
                            ['report' => 'April revenue', 'type' => 'PDF', 'date' => '2026-04-29', 'size' => '1.2 MB'],
                            ['report' => 'Member contribution', 'type' => 'Excel', 'date' => '2026-04-26', 'size' => '840 KB'],
                            ['report' => 'Cash flow analysis', 'type' => 'CSV', 'date' => '2026-04-24', 'size' => '320 KB'],
                        ] as $history)
                            <tr>
                                <td class="font-semibold text-slate-900">{{ $history['report'] }}</td>
                                <td>{{ $history['type'] }}</td>
                                <td>{{ $history['date'] }}</td>
                                <td>{{ $history['size'] }}</td>
                                <td>
                                    <div class="flex gap-2">
                                        <button class="rounded-3xl bg-slate-950 px-4 py-2 text-xs font-semibold text-white hover:bg-slate-800">Download</button>
                                        <button class="rounded-3xl border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">View</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
