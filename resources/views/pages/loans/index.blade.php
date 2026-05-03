<x-app-layout>
    <div x-data="{ issueLoan: false }" class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl space-y-3">
                    <p class="section-label">Loans</p>
                    <h1 class="section-heading">Loan portfolio management</h1>
                    <p class="text-sm leading-7 text-slate-600">Connect your loan module to show requests, disbursements, and repayment health.</p>
                </div>
                <x-button icon="fa-hand-holding-dollar" x-on:click="issueLoan = true">Issue loan</x-button>
            </div>
        </section>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Active Loans" value="—" subtitle="Connect loan records" icon="fa-hand-holding-dollar" tone="emerald" />
            <x-stat-card title="Outstanding Balance" value="—" subtitle="Connect exposure metrics" icon="fa-scale-balanced" tone="blue" />
            <x-stat-card title="Repayment Rate" value="—" subtitle="Connect repayment performance" icon="fa-arrow-trend-up" tone="gold" />
            <x-stat-card title="Pending Requests" value="—" subtitle="Connect approvals queue" icon="fa-clipboard-list" tone="slate" />
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.15fr_0.85fr]">
            <x-chart-card title="Loan repayment trend" subtitle="Connect a chart source to render repayment performance">
                <div class="flex h-[300px] items-center justify-center rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 text-center">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">No chart data yet</p>
                        <p class="mt-1 text-sm text-slate-500">The loan trend chart will appear once connected.</p>
                    </div>
                </div>
            </x-chart-card>

            <div class="premium-card-muted p-6">
                <p class="section-label">Quick controls</p>
                <div class="mt-5 space-y-3">
                    <x-button href="{{ route('members') }}" variant="dark" class="w-full" icon="fa-list-check">Approve pending requests</x-button>
                    <x-button href="{{ route('payments') }}" variant="secondary" class="w-full" icon="fa-bell">Send repayment reminder</x-button>
                    <x-button href="{{ route('reports') }}" variant="secondary" class="w-full" icon="fa-file-invoice">Generate loan statement</x-button>
                </div>
                <div class="mt-6 rounded-[1.5rem] bg-slate-50 p-5">
                    <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Risk bucket</p>
                    <p class="mt-3 text-sm text-slate-500">Risk segmentation will show here once loan data is connected.</p>
                </div>
            </div>
        </section>

        <x-table-card title="Loan pipeline" subtitle="Connect live requests to populate this table">
            <table class="premium-table">
                <thead>
                    <tr>
                        <th>Borrower</th>
                        <th>Purpose</th>
                        <th>Amount</th>
                        <th>Tenure</th>
                        <th>Rate</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-sm text-slate-500">
                            No loan records connected yet.
                        </td>
                    </tr>
                </tbody>
            </table>
        </x-table-card>

        <x-modal open="issueLoan" title="Issue new loan" maxWidth="2xl">
            <form class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Borrower</label>
                    <select class="premium-select">
                        <option>Select borrower</option>
                    </select>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Amount</label>
                    <input type="text" class="premium-input" placeholder="Enter amount" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Tenure</label>
                    <select class="premium-select">
                        <option>Select tenure</option>
                    </select>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Rate</label>
                    <input type="text" class="premium-input" placeholder="Enter interest rate" />
                </div>
                <div class="sm:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Purpose</label>
                    <textarea rows="4" class="premium-input" placeholder="Explain the loan purpose and repayment profile"></textarea>
                </div>
                <div class="flex flex-wrap justify-end gap-3 sm:col-span-2">
                    <x-button variant="secondary" type="button" x-on:click="issueLoan = false">Cancel</x-button>
                    <x-button>Issue loan</x-button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
