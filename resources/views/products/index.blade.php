<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex flex-1 items-center gap-6">
                <h2 class="text-xl font-bold text-gray-900 whitespace-nowrap">
                    Data Inventaris
                </h2>
                
                <form method="GET" action="{{ route('products.index') }}" class="flex-1 max-w-md">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" 
                            placeholder="Cari nama barang atau ID..." 
                            class="w-full pl-4 pr-10 py-1.5 bg-gray-50 border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 transition-all">
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('products.export') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-50 transition">
                    Export
                </a>
                <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 shadow-sm transition flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Produk
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F8FAFC] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-white border-l-4 border-blue-600 shadow-sm rounded-r-lg flex items-center gap-3">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Produk</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Stok</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        @forelse($products as $product)
                            <tr class="hover:bg-blue-50/50 transition-colors">
                                <td class="p-4 text-sm font-mono text-gray-400">{{ $product->id }}</td>
                                <td class="p-4">
                                    <div class="text-sm font-bold text-gray-900">{{ $product->nama_produk }}</div>
                                    <div class="text-xs text-gray-500">{{ Str::limit($product->deskripsi_produk, 50) ?: 'Tidak ada deskripsi' }}</div>
                                </td>
                                <td class="p-4 text-sm font-semibold text-blue-600">
                                    Rp{{ number_format($product->harga_produk,0,',','.') }}
                                </td>
                                <td class="p-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold">
                                        {{ $product->stok_produk }} unit
                                    </span>
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex justify-end gap-3 text-sm font-bold">
                                        <a href="{{ route('products.edit',$product->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                        <button onclick='openDeleteModal({{ $product->id }}, @json($product->nama_produk))' class="text-red-500 hover:text-red-700">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-12 text-center text-gray-400 text-sm">
                                    Belum ada data barang...
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(id, name) {
            if(confirm('Hapus produk ' + name + '?')) {
                let form = document.createElement('form');
                form.action = '/products/' + id;
                form.method = 'POST';
                form.innerHTML = `@csrf @method('DELETE')`;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-app-layout>