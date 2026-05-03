<x-app-layout>
    <div class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl space-y-3">
                    <p class="section-label">Audit Logs</p>
                    <h1 class="section-heading">Operational audit trail</h1>
                    <p class="text-sm leading-7 text-slate-600">Connect your audit source to display changes, approvals, and sensitive actions.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <x-button variant="secondary" icon="fa-filter">Filter logs</x-button>
                    <x-button icon="fa-download">Export CSV</x-button>
                </div>
            </div>
        </section>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Events Today" value="—" subtitle="Connect audit stream" icon="fa-shield-halved" tone="emerald" />
            <x-stat-card title="Critical Events" value="—" subtitle="Connect severity counts" icon="fa-triangle-exclamation" tone="gold" />
            <x-stat-card title="Approvals" value="—" subtitle="Connect approval data" icon="fa-check-double" tone="blue" />
            <x-stat-card title="User Actions" value="—" subtitle="Connect actor summaries" icon="fa-user-pen" tone="slate" />
        </section>

        <section class="grid gap-6 xl:grid-cols-[0.8fr_1.2fr]">
            <x-chart-card title="Activity density" subtitle="Connect event volume data to render this chart">
                <div class="flex h-[280px] items-center justify-center rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 text-center">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">No chart data yet</p>
                        <p class="mt-1 text-sm text-slate-500">The audit chart will appear after data connection.</p>
                    </div>
                </div>
            </x-chart-card>

            <x-table-card title="Recent audit events" subtitle="Connect audit records to populate this table">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Actor</th>
                            <th>Action</th>
                            <th>Resource</th>
                            <th>Timestamp</th>
                            <th>Severity</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-slate-500">
                                No audit events connected yet.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </x-table-card>
        </section>
    </div>
</x-app-layout>
