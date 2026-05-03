<x-app-layout>
    <div
        x-data="{
            saveMessage: '',
            supportOpen: false,
            supportTopic: '',
            openSupport(topic) {
                this.supportTopic = topic;
                this.supportOpen = true;
            },
            saveSettings() {
                this.saveMessage = 'Settings saved successfully.';
            },
        }"
        class="space-y-8"
    >
        <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm shadow-slate-200/50">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Settings</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Platform settings</h1>
                    <p class="mt-2 text-sm text-slate-600">Manage account, security and group preferences.</p>
                </div>
                <x-button type="button" icon="fa-floppy-disk" x-on:click="saveSettings()">Save changes</x-button>
            </div>
        </section>

        <template x-if="saveMessage">
            <div class="premium-card-muted border-emerald-200 px-6 py-4 text-sm text-emerald-700">
                <i class="fa-solid fa-circle-check mr-2"></i>
                <span x-text="saveMessage"></span>
            </div>
        </template>

        <div class="grid gap-6 xl:grid-cols-[0.9fr_0.6fr]">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Account settings</h2>
                <p class="mt-1 text-sm text-slate-500">Update your profile and security preferences.</p>
                <form class="mt-8 grid gap-6" x-on:submit.prevent="saveSettings()">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Full name</label>
                            <input type="text" value="Amina O." class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" />
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Email</label>
                            <input type="email" value="amina@chama.co.ke" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" />
                        </div>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Phone</label>
                            <input type="tel" value="+254 712 345 678" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" />
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-slate-700">Location</label>
                            <input type="text" value="Nairobi, Kenya" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none" />
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Notification preferences</label>
                        <div class="mt-4 grid gap-4 sm:grid-cols-2">
                            <label class="inline-flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 px-4 py-4">
                                <input type="checkbox" checked class="h-5 w-5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" />
                                <span class="text-sm text-slate-700">Email alerts</span>
                            </label>
                            <label class="inline-flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 px-4 py-4">
                                <input type="checkbox" class="h-5 w-5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" />
                                <span class="text-sm text-slate-700">SMS reminders</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-slate-700">Security</label>
                        <div class="mt-4 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                                <p class="text-sm text-slate-500">Two-factor auth</p>
                                <p class="mt-2 font-semibold text-slate-900">Enabled</p>
                            </div>
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                                <p class="text-sm text-slate-500">Recent logins</p>
                                <p class="mt-2 font-semibold text-slate-900">3 devices</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="space-y-6">
                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-slate-900">Chama preferences</h2>
                    <p class="mt-1 text-sm text-slate-500">Configure group and payment settings.</p>
                    <div class="mt-6 space-y-4 text-sm text-slate-700">
                        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                            <p class="font-semibold text-slate-900">Group rules</p>
                            <p class="mt-2 text-slate-500">Automated notifications for late contributions and meeting updates.</p>
                        </div>
                        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                            <p class="font-semibold text-slate-900">Payment gateway</p>
                            <p class="mt-2 text-slate-500">M-Pesa and bank integration ready for immediate deployment.</p>
                        </div>
                        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                            <p class="font-semibold text-slate-900">Data retention</p>
                            <p class="mt-2 text-slate-500">Members, contributions, and transaction logs stored securely.</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-slate-900">Support</h2>
                    <p class="mt-1 text-sm text-slate-500">Access help resources or contact support.</p>
                    <div class="mt-6 space-y-4">
                        <x-button variant="outline" type="button" class="w-full justify-start" x-on:click="openSupport('documentation')">Documentation</x-button>
                        <x-button variant="outline" type="button" class="w-full justify-start" x-on:click="openSupport('help')">Help centre</x-button>
                        <x-button variant="outline" type="button" class="w-full justify-start" x-on:click="openSupport('support')">Contact support</x-button>
                    </div>
                </div>
            </div>
        </div>

        <x-modal open="supportOpen" title="Support resources" maxWidth="lg">
            <div class="space-y-5">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5 text-sm text-slate-600">
                    <p class="font-semibold text-slate-900" x-text="supportTopic === 'documentation' ? 'Documentation' : supportTopic === 'help' ? 'Help centre' : 'Contact support'"></p>
                    <p class="mt-2" x-text="supportTopic === 'documentation' ? 'The documentation hub can be connected later to your internal knowledge base.' : supportTopic === 'help' ? 'This panel can be wired to FAQs, onboarding guides, and how-to articles.' : 'Reach the support team via email or phone once production contact details are added.'"></p>
                </div>
                <div class="flex justify-end">
                    <x-button type="button" variant="secondary" x-on:click="supportOpen = false">Close</x-button>
                </div>
            </div>
        </x-modal>
    </div>
</x-app-layout>
