<section class="max-w-2xl">
    <header class="mb-6">
        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <span class="w-1.5 h-6 bg-[#2563EB]"></span>
            {{ __('Keamanan Akun') }}
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            {{ __('Perbarui kata sandi secara berkala untuk keamanan data inventaris.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                {{ __('Kata Sandi Saat Ini') }}
            </label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="block w-full border-gray-300 rounded-md text-sm focus:ring-[#2563EB] focus:border-[#2563EB] transition-colors" 
                autocomplete="current-password" 
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1 text-xs font-semibold text-red-600" />
        </div>

        <div>
            <label for="update_password_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                {{ __('Kata Sandi Baru') }}
            </label>
            <input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="block w-full border-gray-300 rounded-md text-sm focus:ring-[#2563EB] focus:border-[#2563EB] transition-colors" 
                autocomplete="new-password" 
                placeholder="Minimal 8 karakter"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1 text-xs font-semibold text-red-600" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                {{ __('Konfirmasi Kata Sandi') }}
            </label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="block w-full border-gray-300 rounded-md text-sm focus:ring-[#2563EB] focus:border-[#2563EB] transition-colors" 
                autocomplete="new-password" 
                placeholder="Ulangi kata sandi baru"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1 text-xs font-semibold text-red-600" />
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-2.5 bg-[#2563EB] text-white text-xs font-bold uppercase rounded shadow-sm hover:bg-blue-700 transition-all active:scale-95">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'password-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-xs font-bold text-green-600 flex items-center gap-1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Tersimpan') }}
                </div>
            @endif
        </div>
    </form>
</section>