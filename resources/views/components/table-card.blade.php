@props([
    'title',
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'premium-card-muted overflow-hidden']) }}>
    <div class="flex flex-col gap-4 border-b border-slate-200/80 bg-gradient-to-r from-white via-emerald-50/30 to-white px-6 py-5 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="section-label">{{ $title }}</p>
            @if ($subtitle)
                <p class="mt-2 text-sm text-slate-500">{{ $subtitle }}</p>
            @endif
        </div>

        @isset($actions)
            <div class="flex flex-wrap gap-3">
                {{ $actions }}
            </div>
        @endisset
    </div>

    @isset($filters)
        <div class="border-b border-slate-200/70 px-6 py-5">
            <div class="grid gap-3 lg:grid-cols-4">
                {{ $filters }}
            </div>
        </div>
    @endisset

    <div class="overflow-x-auto">
        {{ $slot }}
    </div>
</div>
