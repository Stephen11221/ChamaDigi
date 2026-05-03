<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <x-badge variant="gold" icon="fa-key">Reset Password</x-badge>
            <h2 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">Forgot your password?</h2>
            <p class="text-sm leading-7 text-slate-600">No problem. Enter your email and we will send a secure reset link so you can regain access quickly.</p>
        </div>

        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input id="email" class="mt-2" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-3 sm:flex-row">
                <x-button type="submit">Email reset link</x-button>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-emerald-200 hover:bg-emerald-50">Back to login</a>
            </div>
        </form>
    </div>
</x-guest-layout>
