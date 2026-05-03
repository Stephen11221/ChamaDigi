<x-app-layout>
    @php
        $seedMembers = [
            [
                'name' => 'Amina Wanjiku',
                'email' => 'amina@example.com',
                'phone' => '+254 700 111 222',
                'location' => 'Nairobi',
                'joined' => 'May 2024',
                'role' => 'Treasurer',
                'status' => 'Active',
                'initials' => 'AW',
            ],
            [
                'name' => 'David Odhiambo',
                'email' => 'david@example.com',
                'phone' => '+254 711 321 456',
                'location' => 'Kisumu',
                'joined' => 'Jan 2024',
                'role' => 'Member',
                'status' => 'Active',
                'initials' => 'DO',
            ],
            [
                'name' => 'Lilian Muthoni',
                'email' => 'lilian@example.com',
                'phone' => '+254 722 654 987',
                'location' => 'Machakos',
                'joined' => 'Aug 2023',
                'role' => 'Secretary',
                'status' => 'Active',
                'initials' => 'LM',
            ],
        ];
    @endphp

    <div
        x-data="{
            addMember: false,
            successMessage: '',
            members: @js($seedMembers),
            form: {
                name: '',
                email: '',
                phone: '',
                location: '',
                role: 'Member',
            },
            openModal() {
                this.addMember = true;
                this.successMessage = '';
            },
            closeModal() {
                this.addMember = false;
            },
            addNewMember() {
                const name = this.form.name.trim();
                const email = this.form.email.trim();
                const phone = this.form.phone.trim();

                if (!name || !email || !phone) {
                    this.successMessage = 'Please fill in the required member details.';
                    return;
                }

                const initials = name
                    .split(' ')
                    .filter(Boolean)
                    .slice(0, 2)
                    .map((part) => part[0])
                    .join('')
                    .toUpperCase();

                this.members.unshift({
                    name,
                    email,
                    phone,
                    location: this.form.location.trim() || 'Not specified',
                    joined: 'Just now',
                    role: this.form.role || 'Member',
                    status: 'Active',
                    initials: initials || 'ME',
                });

                this.form = {
                    name: '',
                    email: '',
                    phone: '',
                    location: '',
                    role: 'Member',
                };

                this.successMessage = 'Member added successfully.';
                this.addMember = false;
            },
        }"
        class="space-y-8"
    >
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl space-y-3">
                    <p class="section-label">Members</p>
                    <h1 class="section-heading">Premium member management</h1>
                    <p class="text-sm leading-7 text-slate-600">Add and manage members without backend validation noise. Everything stays clean for the demo.</p>
                </div>

                <x-button icon="fa-user-plus" x-on:click="openModal()">Add member</x-button>
            </div>
        </section>

        <template x-if="successMessage">
            <div class="premium-card-muted border-emerald-200 px-6 py-4 text-sm text-emerald-700">
                <i class="fa-solid fa-circle-check mr-2"></i>
                <span x-text="successMessage"></span>
            </div>
        </template>

        <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card title="Total Members" value="3" subtitle="Demo dataset loaded" icon="fa-users" tone="emerald" />
            <x-stat-card title="Active Members" value="3" subtitle="All cards connected" icon="fa-user-check" tone="blue" />
            <x-stat-card title="New This Month" value="1" subtitle="Recently added" icon="fa-user-plus" tone="gold" />
            <x-stat-card title="Leadership Roles" value="2" subtitle="Treasurer and Secretary" icon="fa-user-tie" tone="slate" />
        </section>

        <section class="premium-card-muted p-6">
            <div class="grid gap-4 lg:grid-cols-[1.2fr_0.8fr_0.6fr]">
                <label class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-slate-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="search" placeholder="Search members by name, email or phone" class="premium-input pl-12" />
                </label>
                <select class="premium-select">
                    <option>All roles</option>
                    <option>Member</option>
                    <option>Admin</option>
                    <option>Treasurer</option>
                    <option>Secretary</option>
                </select>
                <select class="premium-select">
                    <option>All statuses</option>
                    <option>Active</option>
                    <option>Pending</option>
                    <option>Suspended</option>
                </select>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-3">
            <div class="xl:col-span-2">
                <div class="grid gap-5 lg:grid-cols-2">
                    <template x-for="member in members" :key="member.email">
                        <div class="premium-card-muted p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20">
                                        <span x-text="member.initials"></span>
                                    </div>
                                    <div>
                                        <p class="text-base font-semibold text-slate-900" x-text="member.name"></p>
                                        <div class="mt-2 flex flex-wrap gap-2">
                                            <x-badge variant="dark" icon="fa-id-badge">
                                                <span x-text="member.role"></span>
                                            </x-badge>
                                            <x-badge variant="success" icon="fa-circle">Active</x-badge>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-2xl bg-slate-50 px-3 py-2 text-right">
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.25em] text-slate-500">Joined</p>
                                    <p class="mt-1 text-sm font-semibold text-slate-900" x-text="member.joined"></p>
                                </div>
                            </div>

                            <div class="mt-5 grid gap-4 text-sm text-slate-600 sm:grid-cols-2">
                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Email</p>
                                    <p class="mt-2 break-words text-slate-900" x-text="member.email"></p>
                                </div>
                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Phone</p>
                                    <p class="mt-2 text-slate-900" x-text="member.phone"></p>
                                </div>
                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Location</p>
                                    <p class="mt-2 text-slate-900" x-text="member.location"></p>
                                </div>
                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Status</p>
                                    <p class="mt-2 text-slate-900" x-text="member.status"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="premium-card-muted p-6">
                    <p class="section-label">Member health</p>
                    <p class="mt-5 text-sm text-slate-500">KYC, activity, and leadership indicators can be wired later without changing the layout.</p>
                </div>

                <div class="premium-card-muted p-6">
                    <p class="section-label">Role balance</p>
                    <p class="mt-5 text-sm text-slate-500">Role breakdown is still driven by the same visual system and can be connected later.</p>
                </div>
            </aside>
        </section>

        <x-modal open="addMember" title="Create member profile" maxWidth="2xl">
            <form class="grid gap-5 sm:grid-cols-2" x-on:submit.prevent="addNewMember()">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Full Name</label>
                    <input type="text" x-model="form.name" class="premium-input" placeholder="Enter full name" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                    <input type="email" x-model="form.email" class="premium-input" placeholder="Enter email" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Phone</label>
                    <input type="tel" x-model="form.phone" class="premium-input" placeholder="Enter phone number" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Role</label>
                    <select x-model="form.role" class="premium-select">
                        <option>Member</option>
                        <option>Admin</option>
                        <option>Treasurer</option>
                        <option>Secretary</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Location</label>
                    <input type="text" x-model="form.location" class="premium-input" placeholder="Enter location" />
                </div>
                <div class="flex flex-wrap justify-end gap-3 sm:col-span-2">
                    <x-button variant="secondary" type="button" x-on:click="closeModal()">Cancel</x-button>
                    <x-button type="submit">Add member</x-button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
