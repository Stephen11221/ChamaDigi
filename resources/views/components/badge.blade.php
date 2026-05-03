@props([
    'variant' => 'success',
    'icon' => null,
])

@php
    $styles = [
        'success' => 'bg-emerald-100 text-emerald-700 ring-1 ring-emerald-200',
        'info' => 'bg-blue-100 text-blue-700 ring-1 ring-blue-200',
        'warning' => 'bg-amber-100 text-amber-700 ring-1 ring-amber-200',
        'danger' => 'bg-rose-100 text-rose-700 ring-1 ring-rose-200',
        'dark' => 'bg-slate-100 text-slate-700 ring-1 ring-slate-200',
        'gold' => 'bg-amber-50 text-amber-800 ring-1 ring-amber-200',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold '.$styles[$variant]]) }}>
    @if ($icon)
        <i class="fa-solid {{ $icon }} text-[10px]"></i>
    @endif
    {{ $slot }}
</span>
