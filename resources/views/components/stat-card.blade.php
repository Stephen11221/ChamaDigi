@props([
    'title',
    'value',
    'subtitle' => null,
    'icon' => 'fa-chart-line',
    'tone' => 'emerald',
    'trend' => null,
])

@php
    $tones = [
        'emerald' => 'from-emerald-500 to-emerald-600 text-white',
        'blue' => 'from-blue-500 to-blue-600 text-white',
        'gold' => 'from-amber-400 to-amber-500 text-slate-950',
        'slate' => 'from-slate-700 to-slate-900 text-white',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'premium-card-muted p-6']) }}>
    <div class="flex items-start justify-between gap-4">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-slate-500">{{ $title }}</p>
            <p class="mt-3 text-2xl font-semibold tracking-tight text-slate-900 sm:text-[1.75rem]">{{ $value }}</p>
            @if ($subtitle)
                <p class="mt-2 text-xs text-slate-500 sm:text-sm">{{ $subtitle }}</p>
            @endif
        </div>

        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br {{ $tones[$tone] ?? $tones['emerald'] }} shadow-lg shadow-slate-200/40">
            <i class="fa-solid {{ $icon }}"></i>
        </div>
    </div>

    @if ($trend)
        <div class="mt-5">
            {{ $trend }}
        </div>
    @endif
</div>
