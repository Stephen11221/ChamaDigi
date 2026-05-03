<x-app-layout>
    <div class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="max-w-3xl space-y-3">
                <p class="section-label">Settings</p>
                <h1 class="section-heading">Platform configuration</h1>
                <p class="text-sm leading-7 text-slate-600">Configure branding, permissions, notifications, and operational preferences for the entire Chama workspace.</p>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[0.75fr_1.25fr]">
            <div class="premium-card-muted p-6">
                <p class="section-label">Preferences</p>
                <div class="mt-5 space-y-3">
                        <div class="rounded-2xl bg-slate-50 px-4 py-4">
                            <span class="text-sm text-slate-600">Connect settings data to show toggles and preferences.</span>
                        </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="premium-card-muted p-6">
                    <p class="section-label">Brand settings</p>
                    <form class="mt-5 grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Platform name</label>
                            <input type="text" class="premium-input" placeholder="Platform name" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Primary color</label>
                            <input type="text" class="premium-input" placeholder="Primary color" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Default currency</label>
                            <select class="premium-select">
                                <option>Select currency</option>
                            </select>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Timezone</label>
                            <select class="premium-select">
                                <option>Select timezone</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Brand tagline</label>
                            <textarea rows="4" class="premium-input" placeholder="Brand tagline"></textarea>
                        </div>
                    </form>
                </div>

                <div class="premium-card-muted p-6">
                    <p class="section-label">Access controls</p>
                    <div class="mt-5 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm font-semibold text-slate-900">Roles and permissions</p>
                            <p class="mt-2 text-sm text-slate-500">Configure who can approve, edit, or export financial records.</p>
                        </div>
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm font-semibold text-slate-900">Audit trail</p>
                            <p class="mt-2 text-sm text-slate-500">Track key operations for compliance and transparency.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
