<x-app-layout>
    <div class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="max-w-3xl space-y-3">
                <p class="section-label">Profile</p>
                <h1 class="section-heading">Personal profile and access</h1>
                <p class="text-sm leading-7 text-slate-600">Manage your profile, role, and account security in a clean premium account workspace.</p>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[0.75fr_1.25fr]">
            <div class="premium-card-muted p-6">
                @php
                    $name = Auth::user()->name ?? 'Chama User';
                    $initials = collect(explode(' ', $name))->filter()->take(2)->map(fn ($part) => mb_substr($part, 0, 1))->implode('');
                @endphp

                <div class="flex flex-col items-center text-center">
                    <div class="flex h-24 w-24 items-center justify-center rounded-[1.75rem] bg-gradient-to-br from-emerald-500 to-emerald-600 text-2xl font-semibold text-white shadow-lg shadow-emerald-500/20">
                        {{ $initials }}
                    </div>
                    <h2 class="mt-4 text-2xl font-semibold text-slate-900">{{ $name }}</h2>
                        <p class="mt-1 text-sm text-slate-500">{{ Auth::user()->role?->role_name ?? 'Member' }}</p>
                        <p class="mt-2 text-sm font-semibold text-slate-900">{{ Auth::user()->email ?? '—' }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 px-4 py-4">
                        <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Phone</p>
                        <p class="mt-2 text-sm font-semibold text-slate-900">{{ Auth::user()->phone ?? '—' }}</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="premium-card-muted p-6">
                    <p class="section-label">Update profile</p>
                    <form class="mt-5 grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Full name</label>
                            <input type="text" class="premium-input" value="{{ $name }}" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Role</label>
                            <select class="premium-select">
                                <option>{{ Auth::user()->role?->role_name ?? 'Member' }}</option>
                                <option>Admin</option>
                                <option>Treasurer</option>
                                <option>Secretary</option>
                                <option>Member</option>
                            </select>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                            <input type="email" class="premium-input" value="{{ Auth::user()->email ?? '' }}" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Phone</label>
                            <input type="tel" class="premium-input" value="{{ Auth::user()->phone ?? '' }}" />
                        </div>
                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Bio</label>
                            <textarea rows="4" class="premium-input" placeholder="Short profile summary"></textarea>
                        </div>
                    </form>
                </div>

                <div class="premium-card-muted p-6">
                    <p class="section-label">Security</p>
                    <div class="mt-5 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm font-semibold text-slate-900">Password</p>
                            <p class="mt-2 text-sm text-slate-500">Update your password regularly to keep the account safe.</p>
                        </div>
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm font-semibold text-slate-900">2FA</p>
                            <p class="mt-2 text-sm text-slate-500">Enable multi-factor authentication for sensitive changes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
