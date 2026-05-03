<x-app-layout>
    @php
        $reportHistory = [
            [
                'title' => 'Executive summary',
                'type' => 'PDF',
                'date' => '2026-05-01',
                'size' => '1.2 MB',
                'status' => 'Ready',
                'period' => 'Last 30 days',
            ],
            [
                'title' => 'Contribution performance',
                'type' => 'Excel',
                'date' => '2026-04-28',
                'size' => '860 KB',
                'status' => 'Ready',
                'period' => 'Quarter to date',
            ],
            [
                'title' => 'Loan portfolio view',
                'type' => 'CSV',
                'date' => '2026-04-25',
                'size' => '320 KB',
                'status' => 'Ready',
                'period' => 'Year to date',
            ],
        ];
    @endphp

    <div
        x-data="{
            showExport: false,
            showPreview: false,
            showFilters: true,
            successMessage: '',
            selectedReport: null,
            history: @js($reportHistory),
            form: {
                title: '',
                type: 'PDF',
                period: 'Last 30 days',
                category: 'Executive summary',
            },
            openExport() {
                this.successMessage = '';
                this.showExport = true;
            },
            openPreview(report) {
                this.selectedReport = report;
                this.showPreview = true;
            },
            generateReport() {
                const title = this.form.title.trim() || this.form.category;
                const report = {
                    title: title,
                    type: this.form.type,
                    date: new Date().toISOString().slice(0, 10),
                    size: this.form.type === 'CSV' ? '412 KB' : '1.4 MB',
                    status: 'Ready',
                    period: this.form.period,
                };

                this.history.unshift(report);
                this.selectedReport = report;
                this.successMessage = `${report.title} generated successfully.`;
                this.showExport = false;
                this.showPreview = true;
                this.form.title = '';
                this.form.type = 'PDF';
                this.form.period = 'Last 30 days';
                this.form.category = 'Executive summary';
            },
            downloadReport(report) {
                const safeName = report.title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
                const content = [
                    `Title: ${report.title}`,
                    `Type: ${report.type}`,
                    `Period: ${report.period}`,
                    `Generated: ${report.date}`,
                    `Status: ${report.status}`,
                ].join('\\n');

                const blob = new Blob([content], { type: 'text/plain;charset=utf-8' });
                const url = window.URL.createObjectURL(blob);
                const link = document.createElement('a');

                link.href = url;
                link.download = `${safeName || 'report'}.${report.type.toLowerCase() === 'csv' ? 'csv' : 'txt'}`;
                document.body.appendChild(link);
                link.click();
                link.remove();
                window.URL.revokeObjectURL(url);

                this.successMessage = `${report.title} download started.`;
            },
        }"
        class="space-y-8"
    >
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl space-y-3">
                    <p class="section-label">Reports</p>
                    <h1 class="section-heading">Financial reporting console</h1>
                    <p class="text-sm leading-7 text-slate-600">Generate polished board-ready reports, preview exports instantly, and download report summaries without leaving the page.</p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <x-button variant="secondary" icon="fa-folder-open" href="#report-history">View history</x-button>
                    <x-button icon="fa-file-export" x-on:click="openExport()">Generate report</x-button>
                </div>
            </div>
        </section>

        <template x-if="successMessage">
            <div class="premium-card-muted border-emerald-200 px-6 py-4 text-sm text-emerald-700">
                <i class="fa-solid fa-circle-check mr-2"></i>
                <span x-text="successMessage"></span>
            </div>
        </template>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Revenue" value="—" subtitle="Connect the finance feed" icon="fa-chart-line" tone="emerald" />
            <x-stat-card title="Expenses" value="—" subtitle="Connect operating costs" icon="fa-coins" tone="blue" />
            <x-stat-card title="Net position" value="—" subtitle="Connect profitability data" icon="fa-scale-balanced" tone="gold" />
            <x-stat-card title="Active members" value="—" subtitle="Connect membership data" icon="fa-users" tone="slate" />
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.25fr_0.75fr]">
            <x-chart-card title="Financial overview" subtitle="Connect the backend feed to render the chart">
                <div class="flex h-[300px] items-center justify-center rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 text-center">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">No report chart data yet</p>
                        <p class="mt-1 text-sm text-slate-500">This panel is ready for Chart.js or ApexCharts once data is available.</p>
                    </div>
                </div>
            </x-chart-card>

            <div class="premium-card-muted p-6">
                <p class="section-label">Report controls</p>
                <div class="mt-5 space-y-4 text-sm text-slate-600">
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <p class="font-semibold text-slate-900">Export formats</p>
                        <p class="mt-2">PDF, Excel, and CSV actions are available from the modal and table row buttons.</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <p class="font-semibold text-slate-900">Delivery</p>
                        <p class="mt-2">Each generated export is inserted into the history list for immediate preview or download.</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-4">
                        <p class="font-semibold text-slate-900">Audit-friendly</p>
                        <p class="mt-2">The layout leaves room for signed exports, approvals, and automated distribution later.</p>
                    </div>
                </div>
            </div>
        </section>

        <x-table-card title="Report history" subtitle="Preview or download previously generated exports" id="report-history">
            <x-slot name="actions">
                <x-button variant="outline" icon="fa-filter" type="button" x-on:click="showFilters = !showFilters">Filter</x-button>
                <x-button icon="fa-file-export" x-on:click="openExport()">New report</x-button>
            </x-slot>

            <x-slot name="filters">
                <div x-show="showFilters" x-cloak class="grid gap-3 lg:grid-cols-4">
                    <select class="premium-select">
                        <option>All types</option>
                        <option>PDF</option>
                        <option>Excel</option>
                        <option>CSV</option>
                    </select>
                    <select class="premium-select">
                        <option>All periods</option>
                        <option>Last 30 days</option>
                        <option>Quarter to date</option>
                        <option>Year to date</option>
                    </select>
                    <select class="premium-select">
                        <option>All status</option>
                        <option>Ready</option>
                        <option>Queued</option>
                    </select>
                    <label class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-slate-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="search" placeholder="Search reports" class="premium-input pl-12" />
                    </label>
                </div>
            </x-slot>

            <table class="premium-table">
                <thead>
                    <tr>
                        <th>Report</th>
                        <th>Type</th>
                        <th>Period</th>
                        <th>Date</th>
                        <th>Size</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    <template x-for="report in history" :key="report.title + report.date">
                        <tr>
                            <td class="font-semibold text-slate-900" x-text="report.title"></td>
                            <td x-text="report.type"></td>
                            <td x-text="report.period"></td>
                            <td x-text="report.date"></td>
                            <td x-text="report.size"></td>
                            <td>
                                <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-emerald-700" x-text="report.status"></span>
                            </td>
                            <td>
                                <div class="flex flex-wrap gap-2">
                                    <x-button variant="outline" type="button" icon="fa-eye" x-on:click="openPreview(report)">View</x-button>
                                    <x-button variant="secondary" type="button" icon="fa-download" x-on:click="downloadReport(report)">Download</x-button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </x-table-card>

        <x-modal open="showExport" title="Generate report" maxWidth="2xl">
            <form class="grid gap-5 sm:grid-cols-2" x-on:submit.prevent="generateReport()">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Report title</label>
                    <input type="text" x-model="form.title" class="premium-input" placeholder="Enter a custom report title" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Category</label>
                    <select x-model="form.category" class="premium-select">
                        <option>Executive summary</option>
                        <option>Contribution performance</option>
                        <option>Loan portfolio view</option>
                        <option>Investment snapshot</option>
                    </select>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Format</label>
                    <select x-model="form.type" class="premium-select">
                        <option>PDF</option>
                        <option>Excel</option>
                        <option>CSV</option>
                    </select>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Period</label>
                    <select x-model="form.period" class="premium-select">
                        <option>Last 30 days</option>
                        <option>Quarter to date</option>
                        <option>Year to date</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-600">
                        The generated export will be added to the report history immediately so the preview and download actions are available right away.
                    </div>
                </div>
                <div class="flex flex-wrap justify-end gap-3 sm:col-span-2">
                    <x-button variant="secondary" type="button" x-on:click="showExport = false">Cancel</x-button>
                    <x-button type="submit" icon="fa-file-export">Generate</x-button>
                </div>
            </form>
        </x-modal>

        <x-modal open="showPreview" title="Report preview" maxWidth="2xl">
            <div class="space-y-5">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="section-label">Selected report</p>
                    <div class="mt-4 grid gap-4 sm:grid-cols-2">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Title</p>
                            <p class="mt-2 text-sm font-semibold text-slate-900" x-text="selectedReport ? selectedReport.title : 'No report selected'"></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Format</p>
                            <p class="mt-2 text-sm font-semibold text-slate-900" x-text="selectedReport ? selectedReport.type : '—'"></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Period</p>
                            <p class="mt-2 text-sm font-semibold text-slate-900" x-text="selectedReport ? selectedReport.period : '—'"></p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Date</p>
                            <p class="mt-2 text-sm font-semibold text-slate-900" x-text="selectedReport ? selectedReport.date : '—'"></p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-end gap-3">
                    <x-button variant="secondary" type="button" x-on:click="showPreview = false">Close</x-button>
                    <x-button type="button" icon="fa-download" x-on:click="selectedReport && downloadReport(selectedReport)">Download</x-button>
                </div>
            </div>
        </x-modal>
    </div>
</x-app-layout>
