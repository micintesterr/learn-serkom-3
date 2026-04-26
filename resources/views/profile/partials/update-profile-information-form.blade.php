<section class="max-w-2xl">
    <header class="mb-6">
        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <span class="w-1.5 h-6 bg-[#2563EB]"></span>
            {{ __('Informasi Akun') }}
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            {{ __("Perbarui nama dan alamat email resmi Anda di sini.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5" :value="__('Nama Lengkap')" />
            <input 
                id="name" 
                name="name" 
                type="text" 
                class="block w-full border-gray-300 rounded-md text-sm focus:ring-[#2563EB] focus:border-[#2563EB] transition-colors" 
                value="{{ old('name', $user->name) }}" 
                required 
                autofocus 
                autocomplete="name" 
                placeholder="Nama Admin"
            />
            <x-input-error class="mt-1 text-xs font-semibold text-red-600" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5" :value="__('Alamat Email')" />
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="block w-full border-gray-300 rounded-md text-sm focus:ring-[#2563EB] focus:border-[#2563EB] transition-colors" 
                value="{{ old('email', $user->email) }}" 
                required 
                autocomplete="username" 
                placeholder="admin@elektronikstore.com"
            />
            <x-input-error class="mt-1 text-xs font-semibold text-red-600" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 bg-blue-50 border border-blue-100">
                    <p class="text-xs font-bold text-blue-800">
                        {{ __('Email Anda belum diverifikasi.') }}
                    </p>

                    <button form="send-verification" class="mt-1 text-[10px] font-black uppercase text-blue-600 hover:text-blue-800 underline">
                        {{ __('Kirim Ulang Verifikasi') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-1 text-[10px] font-bold text-green-600">
                            {{ __('Link baru telah dikirim.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-2.5 bg-[#2563EB] text-white text-xs font-bold uppercase rounded shadow-sm hover:bg-blue-700 transition-all active:scale-95">
                {{ __('Simpan Profil') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-xs font-bold text-green-600 flex items-center gap-1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Profil Diperbarui') }}
                </p>
            @endif
        </div>
    </form>
</section>