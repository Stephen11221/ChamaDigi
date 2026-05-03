<x-app-layout>
    <div x-data="{ recordPayment: false }" class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl space-y-3">
                    <p class="section-label">Payments</p>
                    <h1 class="section-heading">Payment rail and reconciliation</h1>
                    <p class="text-sm leading-7 text-slate-600">Connect your payment feeds to monitor settlement and reconciliation events.</p>
                </div>
                <x-button icon="fa-circle-plus" x-on:click="recordPayment = true">New payment</x-button>
            </div>
        </section>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Today" value="—" subtitle="Connect payment totals" icon="fa-money-bill-transfer" tone="emerald" />
            <x-stat-card title="Successful" value="—" subtitle="Connect settlement rates" icon="fa-circle-check" tone="blue" />
            <x-stat-card title="Pending" value="—" subtitle="Connect pending items" icon="fa-hourglass-half" tone="gold" />
            <x-stat-card title="Failed" value="—" subtitle="Connect failure alerts" icon="fa-triangle-exclamation" tone="slate" />
        </section>

        <section class="grid gap-6 xl:grid-cols-[0.8fr_1.2fr]">
            <div class="premium-card-muted p-6">
                <p class="section-label">Channels</p>
                <p class="mt-5 text-sm text-slate-500">Payment channels will appear here after your providers are connected.</p>
            </div>

            <x-table-card title="Payment ledger" subtitle="Connect live transactions to populate this table">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Member</th>
                            <th>Amount</th>
                            <th>Channel</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-slate-500">
                                No payment records connected yet.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </x-table-card>
        </section>

        <x-modal open="recordPayment" title="Create payment" maxWidth="2xl">
            <form class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Member</label>
                    <select class="premium-select"><option>Select member</option></select>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Amount</label>
                    <input type="text" class="premium-input" placeholder="Enter amount" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Channel</label>
                    <select class="premium-select"><option>Select channel</option></select>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Reference</label>
                    <input type="text" class="premium-input" placeholder="Enter reference" />
                </div>
                <div class="sm:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Notes</label>
                    <textarea rows="4" class="premium-input" placeholder="Optional payment notes or reconciliation memo"></textarea>
                </div>
                <div class="flex flex-wrap justify-end gap-3 sm:col-span-2">
                    <x-button variant="secondary" type="button" x-on:click="recordPayment = false">Cancel</x-button>
                    <x-button>Save payment</x-button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
