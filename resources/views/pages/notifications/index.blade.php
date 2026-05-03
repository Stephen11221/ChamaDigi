<x-app-layout>
    <div class="space-y-8">
        <section class="premium-card px-6 py-8 lg:px-8">
            <div class="max-w-3xl space-y-3">
                <p class="section-label">Notifications</p>
                <h1 class="section-heading">Notification center</h1>
                <p class="text-sm leading-7 text-slate-600">Connect your event stream to show alerts, reminders, and system notifications.</p>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.05fr_0.95fr]">
            <x-table-card title="Recent alerts" subtitle="Connect activity to populate the notification feed">
                <div class="rounded-[1.5rem] bg-slate-50 p-6 text-center text-sm text-slate-500">
                    No notifications connected yet.
                </div>
            </x-table-card>

            <div class="space-y-6">
                <div class="premium-card-muted p-6">
                    <p class="section-label">Notification preferences</p>
                    <p class="mt-4 text-sm text-slate-500">Preferences will be available once user settings are connected.</p>
                </div>

                <div class="premium-card-muted p-6">
                    <p class="section-label">Digest</p>
                    <p class="mt-4 text-sm text-slate-500">Daily digest scheduling will appear here when the notifications engine is live.</p>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
