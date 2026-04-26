<section class="space-y-6">
    <header class="border-l-4 border-red-600 pl-4">
        <h2 class="text-lg font-bold text-gray-900 uppercase">
            {{ __('HAPUS AKUN') }}
        </h2>
        <p class="mt-1 text-xs text-gray-500 font-bold uppercase tracking-tight">
            {{ __('Tindakan ini permanen dan tidak bisa dibatalkan.') }}
        </p>
    </header>

    <div class="bg-white border-2 border-red-600 p-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="max-w-xl">
            <p class="text-xs text-gray-700 leading-tight">
                {{ __('Jika Anda menghapus akun ini, semua data inventaris dan profil akan dihapus dari sistem Elektronik Store. Pastikan Anda sudah membackup data jika diperlukan.') }}
            </p>
        </div>
        
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-4 py-2 bg-red-600 text-white text-xs font-bold uppercase rounded-none hover:bg-red-700 transition"
        >
            {{ __('PROSES HAPUS AKUN') }}
        </x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white border-4 border-red-600">
            @csrf
            @method('delete')

            <div class="mb-6">
                <h2 class="text-md font-black text-red-600 uppercase">
                    {{ __('KONFIRMASI KEAMANAN') }}
                </h2>
                <p class="text-xs font-bold text-gray-500 mt-1 uppercase">
                    {{ __('Masukkan password Anda untuk validasi penghapusan.') }}
                </p>
            </div>

            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full border-gray-300 rounded-none text-sm focus:ring-red-600 focus:border-red-600"
                    placeholder="{{ __('PASSWORD KONFIRMASI') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-[10px] font-bold uppercase" />
            </div>

            <div class="mt-8 flex justify-end gap-2 border-t border-gray-100 pt-4">
                <x-secondary-button 
                    x-on:click="$dispatch('close')"
                    class="px-4 py-2 bg-gray-200 text-gray-800 text-xs font-bold uppercase rounded-none hover:bg-gray-300"
                >
                    {{ __('BATAL') }}
                </x-secondary-button>

                <x-danger-button class="px-4 py-2 bg-red-600 text-white text-xs font-bold uppercase rounded-none hover:bg-red-800">
                    {{ __('KONFIRMASI HAPUS') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>