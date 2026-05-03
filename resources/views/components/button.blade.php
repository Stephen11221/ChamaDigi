@props([
    'variant' => 'primary',
    'type' => 'button',
    'icon' => null,
    'size' => 'md',
    'href' => null,
    'loading' => false,
    'disabled' => false,
])

@php
    $styles = [
        'primary' => 'premium-button premium-button-primary',
        'secondary' => 'premium-button premium-button-secondary',
        'danger' => 'premium-button premium-button-danger',
        'outline' => 'premium-button premium-button-outline',
        'dark' => 'premium-button premium-button-dark',
        'ghost' => 'premium-button bg-transparent text-gray-700 hover:bg-gray-100 focus:ring-gray-300',
    ];

    $sizes = [
        'sm' => '',
        'md' => '',
        'lg' => '',
    ];

    $class = trim(($styles[$variant] ?? $styles['primary']).' '.($sizes[$size] ?? ''));
    $isDisabled = $disabled || $loading;
@endphp

@if ($href)
    <a href="{{ $isDisabled ? '#' : $href }}" @if($isDisabled) aria-disabled="true" tabindex="-1" @endif {{ $attributes->merge(['class' => $class]) }}>
        @if ($loading)
            <span class="inline-flex h-3 w-3 animate-spin rounded-full border-2 border-current border-r-transparent"></span>
        @elseif ($icon)
            <i class="fa-solid {{ $icon }}"></i>
        @endif
        {{ $slot }}
    </a>
@else
    <button
        type="{{ $type }}"
        @disabled($isDisabled)
        aria-busy="{{ $loading ? 'true' : 'false' }}"
        {{ $attributes->merge(['class' => $class]) }}
    >
        @if ($loading)
            <span class="inline-flex h-3 w-3 animate-spin rounded-full border-2 border-current border-r-transparent"></span>
        @elseif ($icon)
            <i class="fa-solid {{ $icon }}"></i>
        @endif
        {{ $slot }}
    </button>
@endif
