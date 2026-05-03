<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <x-badge variant="gold" icon="fa-user-plus">Create Account</x-badge>
            <h2 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Open your Chama workspace</h2>
            <p class="text-sm leading-7 text-slate-600">Set up your team profile and start managing savings, loans, investments, and member activity with a premium dashboard experience.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" class="mt-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="national_id" :value="__('National ID')" />
                    <x-text-input id="national_id" class="mt-2" type="text" name="national_id" :value="old('national_id')" required autocomplete="off" />
                    <x-input-error :messages="$errors->get('national_id')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="phone" :value="__('Phone Number')" />
                    <x-text-input id="phone" class="mt-2" type="text" name="phone" :value="old('phone')" required autocomplete="tel" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="mt-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="role" :value="__('Role')" />
                    <select id="role" name="role" required class="mt-2 premium-select">
                        <option value="Member" {{ old('role') === 'Member' ? 'selected' : '' }}>Member</option>
                        <option value="Secretary" {{ old('role') === 'Secretary' ? 'selected' : '' }}>Secretary</option>
                        <option value="Treasurer" {{ old('role') === 'Treasurer' ? 'selected' : '' }}>Treasurer</option>
                        <option value="Admin" {{ old('role') === 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="location" :value="__('Location')" />
                    <x-text-input id="location" class="mt-2" type="text" name="location" :value="old('location')" required autocomplete="address-level2" />
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="mt-2" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="mt-2" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('login') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-500">Already have an account?</a>
                <x-button type="submit">Create account</x-button>
            </div>
        </form>

        <p class="text-xs leading-6 text-slate-500">
            By creating an account, you agree to the platform's terms of service and privacy policy.
        </p>
    </div>
</x-guest-layout>
