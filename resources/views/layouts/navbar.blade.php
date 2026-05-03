<header class="sticky top-0 z-30 border-b border-slate-200/70 bg-[#f8faf9]/80 backdrop-blur-xl">
    <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-3">
                <button type="button" x-on:click="sidebarOpen = true" class="inline-flex h-12 w-12 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-emerald-300 hover:text-emerald-600 lg:hidden">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div>
                    <p class="section-label">Executive workspace</p>
                    <h1 class="mt-1 text-lg font-semibold tracking-tight text-slate-900 sm:text-xl">
                        {{ Auth::user()->name ?? 'Chama Admin' }}
                    </h1>
                </div>
            </div>

            <div class="flex flex-1 flex-col gap-3 lg:max-w-3xl lg:flex-row lg:items-center">
                <label class="relative flex-1">
                    <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-slate-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="search" placeholder="Search members, contributions, loans, reports" class="premium-input pl-12" />
                </label>

                <div class="flex items-center gap-3">
                    <x-button href="{{ route('members') }}" variant="secondary" icon="fa-bolt" class="whitespace-nowrap">
                        Quick action
                    </x-button>

                    <button class="relative inline-flex h-12 w-12 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-emerald-300 hover:text-emerald-600">
                        <i class="fa-solid fa-bell"></i>
                        <span class="absolute right-2 top-2 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    </button>

                    @php
                        $name = Auth::user()->name ?? 'CP';
                        $initials = collect(explode(' ', $name))->filter()->take(2)->map(fn ($part) => mb_substr($part, 0, 1))->implode('');
                    @endphp

                    <div class="relative">
                        <button type="button" x-on:click="profileOpen = ! profileOpen" class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-2.5 text-left shadow-sm transition hover:border-emerald-300">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-sm font-semibold text-white">
                                {{ $initials }}
                            </div>
                            <div class="hidden sm:block">
                                <p class="text-sm font-semibold text-slate-900">{{ $name }}</p>
                                <p class="text-xs text-slate-500">{{ Auth::user()->role?->role_name ?? 'Member' }}</p>
                            </div>
                            <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
                        </button>

                        <div x-show="profileOpen" x-on:click.outside="profileOpen = false" x-cloak class="absolute right-0 mt-3 w-64 overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white shadow-[0_24px_70px_-35px_rgba(15,23,42,0.5)]">
                            <div class="border-b border-slate-100 bg-gradient-to-r from-white to-emerald-50 px-4 py-4">
                                <p class="text-sm font-semibold text-slate-900">{{ $name }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ Auth::user()->email ?? '' }}</p>
                            </div>
                            <div class="p-2">
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm text-slate-700 transition hover:bg-slate-50">
                                    <i class="fa-solid fa-user-gear w-4 text-center text-slate-400"></i>
                                    Profile settings
                                </a>
                                <a href="{{ route('settings') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm text-slate-700 transition hover:bg-slate-50">
                                    <i class="fa-solid fa-sliders w-4 text-center text-slate-400"></i>
                                    System settings
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center gap-3 rounded-2xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                        <i class="fa-solid fa-right-from-bracket w-4 text-center"></i>
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
