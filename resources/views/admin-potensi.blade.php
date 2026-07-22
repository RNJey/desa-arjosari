<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Potensi Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- Form Tambah Potensi -->
                    <form action="{{ route('admin.potensi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-input-label for="kategori" value="Pilih Kategori" />
                                <select name="kategori" id="kategori" class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm">
                                    <option value="Pertanian">Pertanian</option>
                                    <option value="Perkebunan">Perkebunan</option>
                                    <option value="Peternakan">Peternakan</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="nama_komoditas" value="Nama Komoditas (Contoh: Jagung / Sapi / Tebu)" />
                                <x-text-input id="nama_komoditas" name="nama_komoditas" type="text" class="mt-1 block w-full" required />
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="image" value="Upload Foto Komoditas (Opsional)" />
                            <input id="image" name="image" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" accept="image/*" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="deskripsi" value="Deskripsi (Opsional)" />
                            <textarea name="deskripsi" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" rows="2"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 bg-gray-50 p-4 rounded border">
                            <div>
                                <x-input-label for="info_1" value="Info Metrik Kiri (Misal: Luas 131 Ha / 2.938 Ekor)" />
                                <x-text-input id="info_1" name="info_1" type="text" class="mt-1 block w-full" />
                            </div>
                            <div>
                                <x-input-label for="info_2" value="Info Metrik Kanan (Misal: 4 Ton/Ha / Milik 1.525 warga)" />
                                <x-text-input id="info_2" name="info_2" type="text" class="mt-1 block w-full" />
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>{{ __('Simpan Data') }}</x-primary-button>
                        </div>
                    </form>

            <!-- Tabel Daftar Potensi -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Daftar Potensi Desa</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                                    <th class="p-4 border-b font-semibold">Foto</th>
                                    <th class="p-4 border-b font-semibold">Nama Potensi</th>
                                    <th class="p-4 border-b font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($potensi as $item)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" class="h-16 w-24 object-cover rounded shadow-sm" alt="Foto">
                                        @else
                                            <div class="h-16 w-24 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-500">No Image</div>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        <p class="font-bold text-gray-800">{{ $item->nama_komoditas }}</p>
                                        <p class="text-xs font-semibold text-green-600 mb-1">{{ $item->kategori }}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}</p>
                                    </td>
                                    <td class="p-4 text-center align-middle">
                                        <form action="{{ route('admin.potensi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus potensi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit">
                                                {{ __('Hapus') }}
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="p-4 text-center text-gray-500 italic">Belum ada data potensi desa.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>