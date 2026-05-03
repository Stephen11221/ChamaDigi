<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <x-badge variant="gold" icon="fa-lock">Secure Sign In</x-badge>
            <h2 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Welcome back</h2>
            <p class="text-sm leading-7 text-slate-600">Sign in to manage contributions, loans, investments, and member operations from one polished platform.</p>
        </div>

        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input id="email" class="mt-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <div class="flex items-center justify-between gap-3">
                    <x-input-label for="password" :value="__('Password')" />
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-500">Forgot password?</a>
                    @endif
                </div>
                <x-text-input id="password" class="mt-2" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <label for="remember_me" class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-600">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-emerald-500 focus:ring-emerald-100" name="remember">
                <span>Remember me on this device</span>
            </label>

            <div class="flex flex-col gap-3 sm:flex-row">
                <x-button type="submit" class="w-full">Sign in</x-button>
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-emerald-200 hover:bg-emerald-50">Create account</a>
            </div>
        </form>

        <div class="grid gap-3 sm:grid-cols-2">
            <div class="rounded-[1.5rem] bg-slate-50 p-4">
                <p class="text-sm font-semibold text-slate-900">Bank-grade security</p>
                <p class="mt-1 text-sm text-slate-500">Encrypted access built for enterprise finance teams.</p>
            </div>
            <div class="rounded-[1.5rem] bg-slate-50 p-4">
                <p class="text-sm font-semibold text-slate-900">M-Pesa ready</p>
                <p class="mt-1 text-sm text-slate-500">Designed for the Kenyan payment ecosystem.</p>
            </div>
        </div>
    </div>
</x-guest-layout>
