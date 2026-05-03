@props([
    'open' => 'open',
    'maxWidth' => '2xl',
    'title' => null,
])

@php
    $widths = [
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        '2xl' => 'max-w-5xl',
    ];
@endphp

<div x-show="{{ $open }}" x-cloak x-on:keydown.escape.window="{{ $open }} = false" class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6">
    <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm" x-on:click="{{ $open }} = false"></div>

    <div class="relative z-10 w-full {{ $widths[$maxWidth] ?? $widths['2xl'] }}">
        <div class="premium-card-muted overflow-hidden">
            <div class="flex items-center justify-between gap-4 border-b border-slate-200/80 px-6 py-5">
                <div>
                    @if ($title)
                        <p class="section-label">{{ $title }}</p>
                    @endif
                </div>
                <button type="button" x-on:click="{{ $open }} = false" class="rounded-2xl border border-slate-200 bg-white px-3 py-2 text-slate-500 transition hover:text-slate-900">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="p-6 sm:p-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
