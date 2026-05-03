<x-app-layout>
    <div x-data="{ scheduleMeeting: false }" class="space-y-8">
        <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm shadow-slate-200/50">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Meetings & events</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Member engagement schedule</h1>
                    <p class="mt-2 text-sm text-slate-600">Track upcoming meetings, status and attendance.</p>
                </div>
                <button @click="scheduleMeeting = true" class="inline-flex items-center justify-center rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400">Schedule meeting</button>
            </div>
        </section>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Upcoming</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">4</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Completed</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">18</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Attendance</p>
                <p class="mt-4 text-3xl font-semibold text-emerald-600">92%</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Agenda items</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">26</p>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            @foreach ([
                ['title' => 'Savings review', 'status' => 'Physical', 'date' => '2026-05-12', 'time' => '10:00 AM', 'location' => 'Nairobi HQ', 'attendance' => 88, 'type' => 'Physical'],
                ['title' => 'Loan approvals', 'status' => 'Virtual', 'date' => '2026-05-18', 'time' => '3:00 PM', 'location' => 'Zoom', 'attendance' => 95, 'type' => 'Virtual'],
                ['title' => 'Investment strategy', 'status' => 'Hybrid', 'date' => '2026-05-26', 'time' => '9:30 AM', 'location' => 'Nairobi Office', 'attendance' => 82, 'type' => 'Hybrid'],
            ] as $meeting)
                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-sm uppercase tracking-[0.22em] text-slate-500">{{ $meeting['type'] }}</p>
                            <h2 class="mt-3 text-xl font-semibold text-slate-900">{{ $meeting['title'] }}</h2>
                        </div>
                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-emerald-700">{{ $meeting['status'] }}</span>
                    </div>
                    <div class="mt-6 space-y-3 text-sm text-slate-500">
                        <div class="flex items-center justify-between">
                            <span>Date</span>
                            <span class="text-slate-900">{{ $meeting['date'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Time</span>
                            <span class="text-slate-900">{{ $meeting['time'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Location</span>
                            <span class="text-slate-900">{{ $meeting['location'] }}</span>
                        </div>
                    </div>
                    <div class="mt-6 rounded-3xl bg-slate-50 p-4 text-sm text-slate-600">
                        <p class="font-semibold text-slate-900">Agenda</p>
                        <p class="mt-2">Review savings, approve loans, and align investment priorities.</p>
                    </div>
                    <div class="mt-6 flex items-center justify-between gap-3 text-sm">
                        <span class="text-slate-500">Attendance</span>
                        <span class="font-semibold text-slate-900">{{ $meeting['attendance'] }}%</span>
                    </div>
                    <div class="mt-2 h-2.5 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full rounded-full bg-emerald-500" style="width: {{ $meeting['attendance'] }}%"></div>
                    </div>
                    <button class="mt-6 w-full rounded-3xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800">Join virtual</button>
                </div>
            @endforeach
        </div>

        <div x-show="scheduleMeeting" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-6">
            <div class="w-full max-w-2xl rounded-[2rem] bg-white p-8 shadow-2xl">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-900">Schedule meeting</h2>
                        <p class="mt-1 text-sm text-slate-500">Plan the next event with date, type and agenda.</p>
                    </div>
                    <button @click="scheduleMeeting = false" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">Close</button>
                </div>
                <form class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Title</label>
                        <input type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="Savings review" />
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Type</label>
                        <select class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>Physical</option>
                            <option>Virtual</option>
                            <option>Hybrid</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Date</label>
                        <input type="date" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" />
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Time</label>
                        <input type="time" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" />
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm font-semibold text-slate-700">Location</label>
                        <input type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="Nairobi Headquarters" />
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm font-semibold text-slate-700">Agenda</label>
                        <textarea rows="4" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="Define the topics and objectives for the meeting."></textarea>
                    </div>
                </form>
                <div class="mt-6 flex justify-end gap-3">
                    <button @click="scheduleMeeting = false" class="rounded-3xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                    <button class="rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-400">Schedule</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
