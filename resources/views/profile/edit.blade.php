<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <h2 class="font-black text-xl text-gray-900 leading-tight uppercase tracking-tighter">
                {{ __('Pengaturan Akun Admin') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-white border border-gray-300 rounded-none overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-300 rounded-none overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="bg-white border border-red-200 rounded-none overflow-hidden">
                <div class="p-6 sm:p-8 bg-red-50/30">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>