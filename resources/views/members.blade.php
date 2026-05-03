<x-app-layout>
    <div x-data="{ addMember: false }" class="space-y-8">
        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm shadow-slate-200/50">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Members management</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Team roster and leaderboard</h1>
                    <p class="mt-2 text-sm text-slate-600">Search, filter and monitor members across roles and contributions.</p>
                </div>
                <button @click="addMember = true" class="inline-flex items-center justify-center rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-400">Add member</button>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total members</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">1,254</p>
                <p class="mt-2 text-sm text-slate-500">Trusted group membership.</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Active members</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">1,102</p>
                <p class="mt-2 text-sm text-slate-500">High participation this month.</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">New this month</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">68</p>
                <p class="mt-2 text-sm text-slate-500">Onboarding growth.</p>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Admins</p>
                <p class="mt-4 text-3xl font-semibold text-slate-900">12</p>
                <p class="mt-2 text-sm text-slate-500">Leadership and oversight.</p>
            </div>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <h2 class="text-lg font-semibold text-slate-900">Member directory</h2>
                    <p class="mt-1 text-sm text-slate-500">Search by name, role or status.</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row">
                    <label class="flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3">
                        <span class="text-slate-500">🔍</span>
                        <input type="search" placeholder="Search members" class="w-full bg-transparent outline-none text-sm text-slate-900" />
                    </label>
                    <select class="rounded-3xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm outline-none">
                        <option>All roles</option>
                        <option>Admin</option>
                        <option>Treasurer</option>
                        <option>Secretary</option>
                        <option>Member</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-3">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm xl:col-span-2">
                <div class="grid gap-4 md:grid-cols-2">
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Contribution total</p>
                        <p class="mt-4 text-2xl font-semibold text-slate-900">KES 32.8M</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Active this month</p>
                        <p class="mt-4 text-2xl font-semibold text-slate-900">97%</p>
                    </div>
                </div>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl border border-slate-200 p-5">
                        <p class="text-sm text-slate-500">Pending approvals</p>
                        <p class="mt-3 text-xl font-semibold text-slate-900">14</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 p-5">
                        <p class="text-sm text-slate-500">Verified KYC</p>
                        <p class="mt-3 text-xl font-semibold text-slate-900">92%</p>
                    </div>
                </div>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h3 class="text-base font-semibold text-slate-900">Role balance</h3>
                <div class="mt-4 space-y-4">
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-slate-500">Treasurer</p>
                            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase text-emerald-700">3</span>
                        </div>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">KES 7.9M</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-slate-500">Secretary</p>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase text-slate-500">5</span>
                        </div>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">KES 4.6M</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-3">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm xl:col-span-2">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-900">Member cards</h2>
                    <span class="text-sm text-slate-500">Latest activity</span>
                </div>
                <div class="mt-6 grid gap-4 lg:grid-cols-2">
                    @foreach (['Amara A.', 'Mwangi K.', 'Lilian M.', 'Joseph N.'] as $member)
                        <div class="rounded-3xl border border-slate-200 p-5 hover:border-emerald-300 transition">
                            <div class="flex items-center gap-4">
                                <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-emerald-500 text-xl font-semibold text-white">{{ strtoupper(substr($member, 0, 2)) }}</div>
                                <div>
                                    <p class="text-base font-semibold text-slate-900">{{ $member }}</p>
                                    <p class="text-sm text-slate-500">Member since 2023</p>
                                </div>
                            </div>
                            <div class="mt-5 flex items-center justify-between gap-3 text-sm">
                                <div>
                                    <p class="text-slate-500">Role</p>
                                    <p class="mt-1 text-slate-900">Member</p>
                                </div>
                                <div>
                                    <p class="text-slate-500">Status</p>
                                    <p class="mt-1 text-emerald-700">Active</p>
                                </div>
                            </div>
                            <div class="mt-5 flex items-center justify-between gap-3 text-sm text-slate-500">
                                <div>
                                    <p>Total savings</p>
                                    <p class="mt-1 text-slate-900">KES 120,000</p>
                                </div>
                                <div>
                                    <p>Contributions</p>
                                    <p class="mt-1 text-slate-900">KES 18,500</p>
                                </div>
                            </div>
                            <div class="mt-5 flex items-center gap-3">
                                <button class="rounded-3xl bg-slate-950 px-4 py-3 text-xs font-semibold text-white hover:bg-slate-800">Edit</button>
                                <button class="rounded-3xl border border-slate-200 px-4 py-3 text-xs font-semibold text-slate-700 hover:bg-slate-50">Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-900">Role badges</h3>
                <div class="mt-5 space-y-4">
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <p class="text-sm text-slate-500">Admin</p>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">12</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <p class="text-sm text-slate-500">Treasurer</p>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">8</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <p class="text-sm text-slate-500">Secretary</p>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">7</p>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="addMember" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 py-6">
            <div class="w-full max-w-2xl rounded-[2rem] bg-white p-8 shadow-2xl">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-900">Add member</h2>
                        <p class="mt-1 text-sm text-slate-500">Capture member credentials and role permissions.</p>
                    </div>
                    <button @click="addMember = false" class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">Close</button>
                </div>
                <form class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="member-name" class="text-sm font-semibold text-slate-700">Full Name</label>
                        <input id="member-name" type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="Amina W." />
                    </div>
                    <div>
                        <label for="member-id" class="text-sm font-semibold text-slate-700">National ID</label>
                        <input id="member-id" type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="12345678" />
                    </div>
                    <div>
                        <label for="member-email" class="text-sm font-semibold text-slate-700">Email</label>
                        <input id="member-email" type="email" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="amina@example.com" />
                    </div>
                    <div>
                        <label for="member-phone" class="text-sm font-semibold text-slate-700">Phone</label>
                        <input id="member-phone" type="tel" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="+254 700 000 000" />
                    </div>
                    <div>
                        <label for="member-location" class="text-sm font-semibold text-slate-700">Location</label>
                        <input id="member-location" type="text" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="Nairobi" />
                    </div>
                    <div>
                        <label for="member-role" class="text-sm font-semibold text-slate-700">Role</label>
                        <select id="member-role" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none">
                            <option>Member</option>
                            <option>Admin</option>
                            <option>Treasurer</option>
                            <option>Secretary</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="member-permission" class="text-sm font-semibold text-slate-700">Permissions</label>
                        <textarea id="member-permission" rows="4" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" placeholder="Can approve loans, manage contributions, or view financial reports."></textarea>
                    </div>
                </form>
                <div class="mt-6 flex justify-end gap-3">
                    <button @click="addMember = false" class="rounded-3xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                    <button class="rounded-3xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-400">Save member</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
