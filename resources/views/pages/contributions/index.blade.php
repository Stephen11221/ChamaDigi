<x-app-layout>
    <div x-data="{ recordPayment: false }" class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl space-y-3">
                    <p class="section-label">Contributions</p>
                    <h1 class="section-heading">Contribution intelligence</h1>
                    <p class="text-sm leading-7 text-slate-600">Connect your contribution feed to show collection totals, payment history, and trend charts.</p>
                </div>
                <x-button icon="fa-receipt" x-on:click="recordPayment = true">Record payment</x-button>
            </div>
        </section>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Total Collected" value="—" subtitle="Connect contribution data" icon="fa-sack-dollar" tone="emerald" />
            <x-stat-card title="Paid Members" value="—" subtitle="Connect payment status" icon="fa-user-check" tone="blue" />
            <x-stat-card title="Pending" value="—" subtitle="Connect reconciliation status" icon="fa-clock" tone="slate" />
            <x-stat-card title="Late Payments" value="—" subtitle="Connect overdue records" icon="fa-triangle-exclamation" tone="gold" />
        </section>

        <section class="grid gap-6 xl:grid-cols-2">
            <x-chart-card title="Monthly collection" subtitle="Connect a chart feed to render this view">
                <div class="flex h-[300px] items-center justify-center rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 text-center">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">No chart data yet</p>
                        <p class="mt-1 text-sm text-slate-500">The contribution chart will appear when connected to the backend.</p>
                    </div>
                </div>
            </x-chart-card>

            <x-chart-card title="Collection trend" subtitle="Monthly momentum and payment volume">
                <div class="flex h-[300px] items-center justify-center rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 text-center">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">No chart data yet</p>
                        <p class="mt-1 text-sm text-slate-500">Connect a trend source to display progress over time.</p>
                    </div>
                </div>
            </x-chart-card>
        </section>

        <x-table-card title="Recent contribution log" subtitle="Connect live transactions to populate this table">
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
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-sm text-slate-500">
                            No contribution records connected yet.
                        </td>
                    </tr>
                </tbody>
            </table>
        </x-table-card>

        <x-modal open="recordPayment" title="Record member payment" maxWidth="2xl">
            <form class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Member</label>
                    <select class="premium-select">
                        <option>Select member</option>
                    </select>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Amount</label>
                    <input type="text" class="premium-input" placeholder="Enter amount" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Method</label>
                    <select class="premium-select">
                        <option>Select method</option>
                    </select>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Reference</label>
                    <input type="text" class="premium-input" placeholder="Enter reference" />
                </div>
                <div class="sm:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Payment date</label>
                    <input type="date" class="premium-input" />
                </div>
                <div class="flex flex-wrap justify-end gap-3 sm:col-span-2">
                    <x-button variant="secondary" type="button" x-on:click="recordPayment = false">Cancel</x-button>
                    <x-button>Save payment</x-button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
