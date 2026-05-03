@props([
    'name',
    'email',
    'phone' => null,
    'location' => null,
    'joined' => null,
    'contribution' => null,
    'status' => 'Active',
    'role' => 'Member',
    'avatar' => null,
])

@php
    $initials = $avatar ?: collect(explode(' ', $name ?? ''))
        ->filter()
        ->take(2)
        ->map(fn ($part) => mb_substr($part, 0, 1))
        ->implode('');
@endphp

<div {{ $attributes->merge(['class' => 'premium-card-muted p-5']) }}>
    <div class="flex items-start justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20">
                {{ $initials }}
            </div>
            <div>
                <p class="text-base font-semibold text-slate-900">{{ $name }}</p>
                <div class="mt-2 flex flex-wrap gap-2">
                    <x-badge variant="dark" icon="fa-id-badge">{{ $role }}</x-badge>
                    <x-badge variant="{{ $status === 'Active' ? 'success' : 'warning' }}" icon="fa-circle">{{ $status }}</x-badge>
                </div>
            </div>
        </div>

        <div class="rounded-2xl bg-slate-50 px-3 py-2 text-right">
            <p class="text-[11px] font-semibold uppercase tracking-[0.25em] text-slate-500">Joined</p>
            <p class="mt-1 text-sm font-semibold text-slate-900">{{ $joined ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="mt-5 grid gap-4 text-sm text-slate-600 sm:grid-cols-2">
        <div class="rounded-2xl bg-slate-50 p-4">
            <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Email</p>
            <p class="mt-2 break-words text-slate-900">{{ $email }}</p>
        </div>
        <div class="rounded-2xl bg-slate-50 p-4">
            <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Phone</p>
            <p class="mt-2 text-slate-900">{{ $phone ?? '—' }}</p>
        </div>
        <div class="rounded-2xl bg-slate-50 p-4">
            <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Location</p>
            <p class="mt-2 text-slate-900">{{ $location ?? '—' }}</p>
        </div>
        <div class="rounded-2xl bg-slate-50 p-4">
            <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-500">Contribution</p>
            <p class="mt-2 text-slate-900">{{ $contribution ?? '—' }}</p>
        </div>
    </div>

    <div class="mt-5 flex flex-wrap gap-3">
        <x-button variant="dark" size="sm" icon="fa-pen-to-square">Edit</x-button>
        <x-button variant="secondary" size="sm" icon="fa-trash">Remove</x-button>
    </div>
</div>
