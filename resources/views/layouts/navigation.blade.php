<nav x-data="{ open: false }" class="bg-white border-b border-gray-300 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end h-16">
            
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-bold uppercase tracking-tight rounded-none text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition-all">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-[#2563EB] text-white rounded-none flex items-center justify-center text-[10px]">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-2">
                                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-200 bg-gray-50">
                            <p class="text-[9px] font-black text-gray-400 uppercase tracking-[0.1em]">Sesi Aktif</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="text-xs font-bold uppercase hover:bg-blue-50 hover:text-[#2563EB]">
                            {{ __('Profil Akun') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    class="text-xs font-bold uppercase text-red-600 hover:bg-red-50"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Keluar Sistem') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-none text-gray-500 bg-gray-100 border border-gray-300 focus:outline-none">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-300">
        <div class="pt-2 pb-1 text-right"> <div class="px-4 py-3 bg-gray-100 border-b border-gray-200">
                <div class="font-black text-xs text-gray-900 uppercase">{{ Auth::user()->name }}</div>
                <div class="font-bold text-[10px] text-gray-500 uppercase">{{ Auth::user()->email }}</div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="border-none text-xs font-bold uppercase">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="border-none text-xs font-bold uppercase text-red-600"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Keluar') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>