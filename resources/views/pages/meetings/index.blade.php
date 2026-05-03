<x-app-layout>
    <div x-data="{ scheduleMeeting: false }" class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl space-y-3">
                    <p class="section-label">Meetings</p>
                    <h1 class="section-heading">Meeting operations</h1>
                    <p class="text-sm leading-7 text-slate-600">Connect your schedule feed to show upcoming meetings and attendance.</p>
                </div>
                <x-button icon="fa-calendar-plus" x-on:click="scheduleMeeting = true">Schedule meeting</x-button>
            </div>
        </section>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Upcoming" value="—" subtitle="Connect calendar data" icon="fa-calendar-day" tone="emerald" />
            <x-stat-card title="Attendance Rate" value="—" subtitle="Connect attendance metrics" icon="fa-people-group" tone="blue" />
            <x-stat-card title="Minutes Published" value="—" subtitle="Connect meeting outputs" icon="fa-file-pen" tone="gold" />
            <x-stat-card title="Action Items" value="—" subtitle="Connect task tracking" icon="fa-list-check" tone="slate" />
        </section>

        <section class="grid gap-6 xl:grid-cols-[0.95fr_1.05fr]">
            <div class="premium-card-muted p-6">
                <p class="section-label">Next meeting</p>
                <div class="mt-5 rounded-[1.75rem] bg-gradient-to-br from-[#1e3a5f] via-[#12253d] to-[#059669] p-6 text-white">
                    <p class="text-xs font-semibold uppercase tracking-[0.28em] text-slate-200/80">Connect schedule data</p>
                    <p class="mt-4 text-2xl font-semibold">No meeting data yet</p>
                    <p class="mt-3 text-sm leading-7 text-slate-100/80">The next scheduled meeting will appear here after data connection.</p>
                </div>
            </div>

            <x-table-card title="Upcoming meetings" subtitle="Connect your calendar to populate this table">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Meeting</th>
                            <th>Venue</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-sm text-slate-500">
                                No meetings connected yet.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </x-table-card>
        </section>

        <x-modal open="scheduleMeeting" title="Schedule a meeting" maxWidth="2xl">
            <form class="grid gap-5 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Meeting title</label>
                    <input type="text" class="premium-input" placeholder="Enter meeting title" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Date</label>
                    <input type="date" class="premium-input" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Time</label>
                    <input type="time" class="premium-input" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Venue</label>
                    <input type="text" class="premium-input" placeholder="Enter venue" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Meeting type</label>
                    <select class="premium-select">
                        <option>Select type</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Agenda</label>
                    <textarea rows="4" class="premium-input" placeholder="Outline key points for discussion"></textarea>
                </div>
                <div class="flex flex-wrap justify-end gap-3 sm:col-span-2">
                    <x-button variant="secondary" type="button" x-on:click="scheduleMeeting = false">Cancel</x-button>
                    <x-button>Save meeting</x-button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
