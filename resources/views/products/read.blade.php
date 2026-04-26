<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('products.index') }}" class="p-2 hover:bg-gray-100 rounded-lg transition text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-xl font-bold text-gray-900">Detail Produk</h2>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('products.edit', $product->id) }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition shadow-sm flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Data
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F8FAFC] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                
                <div class="p-8 border-b border-gray-100">
                    <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                        <div class="flex-1">
                            <p class="text-xs font-bold text-blue-600 uppercase tracking-wider mb-1">SKU: #PROD-{{ $product->id }}</p>
                            <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $product->nama_produk }}</h3>
                        </div>
                        <div class="w-full md:w-auto">
                            <div class="bg-blue-50 border border-blue-100 p-5 rounded-xl">
                                <p class="text-xs font-semibold text-blue-600 mb-1">Harga Retail</p>
                                <p class="text-2xl font-bold text-gray-900">Rp{{ number_format($product->harga_produk, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        
                        <div class="md:col-span-2">
                            <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                Deskripsi Produk
                            </h4>
                            <div class="p-5 bg-gray-50 rounded-xl border border-gray-100">
                                <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">
                                    {{ $product->deskripsi_produk ?? 'Tidak ada deskripsi tambahan untuk produk ini.' }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                Status Inventaris
                            </h4>
                            <div class="p-5 border border-gray-100 rounded-xl bg-white shadow-sm">
                                <div class="flex justify-between items-baseline mb-4">
                                    <span class="text-4xl font-black text-gray-900">{{ $product->stok_produk }}</span>
                                    <span class="text-xs font-bold text-gray-400 uppercase">Unit</span>
                                </div>
                                
                                @if($product->stok_produk > 5)
                                    <div class="flex items-center gap-2 px-3 py-1.5 bg-green-50 text-green-700 rounded-lg text-xs font-bold">
                                        <span class="relative flex h-2 w-2">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                        </span>
                                        Stok Aman
                                    </div>
                                @elseif($product->stok_produk > 0)
                                    <div class="flex items-center gap-2 px-3 py-1.5 bg-amber-50 text-amber-700 rounded-lg text-xs font-bold">
                                        <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                                        Stok Menipis
                                    </div>
                                @else
                                    <div class="flex items-center gap-2 px-3 py-1.5 bg-red-50 text-red-700 rounded-lg text-xs font-bold">
                                        <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                        Habis
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="px-8 py-5 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                    <span class="text-[11px] text-gray-400 font-medium">Terakhir diperbarui: {{ $product->updated_at->format('d M Y, H:i') }}</span>
                    <a href="{{ route('products.index') }}" class="text-sm font-bold text-gray-500 hover:text-gray-700 transition">
                        Tutup Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>