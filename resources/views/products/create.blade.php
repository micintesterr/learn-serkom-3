<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-gray-800 leading-tight">
                Tambah Barang Baru
            </h2>
            <a href="{{ route('products.index') }}" class="text-sm font-bold text-gray-500 hover:underline uppercase tracking-tight">
                &larr; Batal
            </a>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white border border-gray-300 shadow-sm overflow-hidden">
                <div class="p-4 bg-gray-100 border-b border-gray-200">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Input Data Inventaris</p>
                </div>

                <form action="{{ route('products.store') }}" method="POST" id="product-form" class="p-6">
                    @csrf
                    
                    <div class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Nama Produk</label>
                            <input type="text" name="nama_produk"
                                value="{{ old('nama_produk') }}"
                                placeholder="Masukkan nama barang..."
                                class="w-full border-gray-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('nama_produk') ? 'border-red-500 bg-red-50' : '' }}"
                                data-validation="required|max:255">
                            <p class="text-red-600 text-[10px] mt-1 font-bold uppercase field-error">@error('nama_produk') {{ $message }} @enderror</p>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Deskripsi (Opsional)</label>
                            <textarea name="deskripsi_produk" rows="3"
                                placeholder="Keterangan singkat produk..."
                                class="w-full border-gray-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('deskripsi_produk') ? 'border-red-500 bg-red-50' : '' }}"
                                data-validation="max:1000">{{ old('deskripsi_produk') }}</textarea>
                            <p class="text-red-600 text-[10px] mt-1 font-bold uppercase field-error">@error('deskripsi_produk') {{ $message }} @enderror</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Harga Jual (Rp)</label>
                                <input type="number" name="harga_produk"
                                    value="{{ old('harga_produk') }}"
                                    placeholder="0"
                                    class="w-full border-gray-300 rounded text-sm font-mono focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('harga_produk') ? 'border-red-500 bg-red-50' : '' }}"
                                    data-validation="required|numeric|min:0">
                                <p class="text-red-600 text-[10px] mt-1 font-bold uppercase field-error">@error('harga_produk') {{ $message }} @enderror</p>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Stok Unit</label>
                                <input type="number" name="stok_produk"
                                    value="{{ old('stok_produk') }}"
                                    placeholder="0"
                                    class="w-full border-gray-300 rounded text-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('stok_produk') ? 'border-red-500 bg-red-50' : '' }}"
                                    data-validation="required|integer|min:0">
                                <p class="text-red-600 text-[10px] mt-1 font-bold uppercase field-error">@error('stok_produk') {{ $message }} @enderror</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8 gap-2 pt-4 border-t border-gray-200">
                        <a href="{{ route('products.index') }}"
                            class="px-4 py-2 text-xs font-bold text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100 uppercase transition">
                            Kembali
                        </a>
                        <button type="submit"
                            class="px-6 py-2 text-xs font-bold text-white bg-blue-600 rounded hover:bg-blue-700 shadow-sm uppercase transition">
                            Simpan Barang
                        </button>
                    </div>
                </form>
            </div>
            
            <p class="text-center mt-6 text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                Internal Inventory System — v1.0
            </p>
        </div>
    </div>

    <script>
        const form = document.getElementById('product-form');
        const fields = form.querySelectorAll('[data-validation]');

        const validators = {
            required: v => v.trim() !== '' || 'Wajib diisi',
            max: (v, a) => v.length <= Number(a) || `Maks ${a} karakter`,
            numeric: v => v === '' || !isNaN(v) || 'Harus angka',
            integer: v => v === '' || Number.isInteger(Number(v)) || 'Harus bulat',
            min: (v, a) => v === '' || Number(v) >= Number(arg) || `Minimal ${a}`,
        };

        function validateField(f) {
            const rules = f.dataset.validation.split('|');
            let error = '';
            for (const r of rules) {
                const [rule, arg] = r.split(':');
                const res = validators[rule](f.value, arg);
                if (res !== true) { error = res; break; }
            }
            const errNode = f.closest('div').querySelector('.field-error');
            errNode.textContent = error;
            f.style.borderColor = error ? '#dc2626' : ''; 
            return !error;
        }

        fields.forEach(f => {
            f.addEventListener('blur', () => validateField(f));
            f.addEventListener('input', () => validateField(f));
        });

        form.addEventListener('submit', (e) => {
            let valid = true;
            fields.forEach(f => { if (!validateField(f)) valid = false; });
            if (!valid) e.preventDefault();
        });
    </script>
</x-app-layout>