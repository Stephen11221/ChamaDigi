<x-app-layout>
    <div class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="max-w-3xl space-y-3">
                <p class="section-label">Profile</p>
                <h1 class="section-heading">Personal profile and access</h1>
                <p class="text-sm leading-7 text-slate-600">
                    Members can update their name, email, password, and profile image from this page.
                </p>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[0.9fr_1.1fr]">
            <div class="premium-card-muted p-6">
                @php
                    $name = Auth::user()->name ?? 'Chama User';
                    $initials = collect(explode(' ', $name))
                        ->filter()
                        ->take(2)
                        ->map(fn ($part) => mb_substr($part, 0, 1))
                        ->implode('');
                    $photo = Auth::user()->profile_photo ? asset('storage/'.Auth::user()->profile_photo) : null;
                @endphp

                <div class="flex flex-col items-center text-center">
                    <div class="flex h-28 w-28 items-center justify-center overflow-hidden rounded-[1.75rem] bg-gradient-to-br from-emerald-500 to-emerald-600 text-3xl font-semibold text-white shadow-lg shadow-emerald-500/20">
                        @if ($photo)
                            <img src="{{ $photo }}" alt="{{ $name }}" class="h-full w-full object-cover" />
                        @else
                            {{ $initials }}
                        @endif
                    </div>
                    <h2 class="mt-4 text-2xl font-semibold text-slate-900">{{ $name }}</h2>
                    <p class="mt-1 text-sm text-slate-500">{{ Auth::user()->role?->role_name ?? 'Member' }}</p>
                    <p class="mt-2 text-sm font-semibold text-slate-900">{{ Auth::user()->email ?? '—' }}</p>
                </div>

                <div class="mt-6 grid gap-4">
                    <div class="rounded-2xl bg-slate-50 px-4 py-4">
                        <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Phone</p>
                        <p class="mt-2 text-sm font-semibold text-slate-900">{{ Auth::user()->phone_number ?? '—' }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 px-4 py-4">
                        <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Status</p>
                        <p class="mt-2 text-sm font-semibold text-slate-900">{{ Auth::user()->status ?? '—' }}</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="premium-card-muted p-6">
                    <p class="section-label">Update profile</p>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-5 space-y-5">
                        @csrf
                        @method('patch')

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Full name</label>
                                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="premium-input" required />
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="premium-input" required />
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Profile image</label>
                                <input type="file" name="profile_photo" accept="image/*" class="premium-input py-2.5" />
                                @error('profile_photo')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-2 text-xs text-slate-500">PNG, JPG, or WebP up to 2MB.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save changes') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-slate-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>

                <div class="premium-card-muted p-6">
                    <p class="section-label">Update password</p>

                    <form method="POST" action="{{ route('password.update') }}" class="mt-5 space-y-5">
                        @csrf
                        @method('put')

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Current password</label>
                            <input type="password" name="current_password" class="premium-input" autocomplete="current-password" required />
                            @error('current_password', 'updatePassword')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">New password</label>
                                <input type="password" name="password" class="premium-input" autocomplete="new-password" required />
                                @error('password', 'updatePassword')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Confirm password</label>
                                <input type="password" name="password_confirmation" class="premium-input" autocomplete="new-password" required />
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update password') }}</x-primary-button>

                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-slate-600"
                                >{{ __('Password updated.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
