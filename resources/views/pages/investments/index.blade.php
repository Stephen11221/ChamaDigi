<x-app-layout>
    <div class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="max-w-3xl space-y-3">
                <p class="section-label">Investments</p>
                <h1 class="section-heading">Investment portfolio</h1>
                <p class="text-sm leading-7 text-slate-600">Connect your investment data to show portfolio value, yield, and holdings.</p>
            </div>
        </section>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Portfolio Value" value="—" subtitle="Connect investment records" icon="fa-building-columns" tone="emerald" />
            <x-stat-card title="Annual ROI" value="—" subtitle="Connect return metrics" icon="fa-arrow-trend-up" tone="gold" />
            <x-stat-card title="Liquid Assets" value="—" subtitle="Connect cash position" icon="fa-wallet" tone="blue" />
            <x-stat-card title="Active Holdings" value="—" subtitle="Connect holdings data" icon="fa-layer-group" tone="slate" />
        </section>

        <section class="grid gap-6 xl:grid-cols-[0.9fr_1.1fr]">
            <x-chart-card title="Portfolio mix" subtitle="Connect allocation data to render this chart">
                <div class="flex h-[300px] items-center justify-center rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 text-center">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">No chart data yet</p>
                        <p class="mt-1 text-sm text-slate-500">The portfolio mix will appear after data connection.</p>
                    </div>
                </div>
            </x-chart-card>

            <div class="premium-card-muted p-6">
                <p class="section-label">Investment summary</p>
                <p class="mt-4 text-sm text-slate-500">Holdings, returns, and risk bands will populate here once investment data is connected.</p>
            </div>
        </section>

        <x-table-card title="Holdings" subtitle="Connect active investments to populate this table">
            <table class="premium-table">
                <thead>
                    <tr>
                        <th>Asset</th>
                        <th>Category</th>
                        <th>Value</th>
                        <th>Yield</th>
                        <th>Maturity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-sm text-slate-500">
                            No investment records connected yet.
                        </td>
                    </tr>
                </tbody>
            </table>
        </x-table-card>
    </div>
</x-app-layout>
