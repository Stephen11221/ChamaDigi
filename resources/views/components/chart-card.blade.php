@props([
    'title',
    'subtitle' => null,
    'action' => null,
])

<div {{ $attributes->merge(['class' => 'premium-card-muted overflow-hidden']) }}>
    <div class="flex flex-col gap-4 border-b border-slate-200/80 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="section-label">{{ $title }}</p>
            @if ($subtitle)
                <p class="mt-2 text-sm text-slate-500">{{ $subtitle }}</p>
            @endif
        </div>

        @if ($action)
            <div>
                {{ $action }}
            </div>
        @endif
    </div>

    <div class="p-6">
        {{ $slot }}
    </div>
</div>
