<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Budaya & Adat Desa') }}
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Tambah Data Budaya</h3>
                    
                    <form action="{{ route('admin.budaya.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-input-label for="kategori" value="Kategori Budaya" />
                                <select name="kategori" id="kategori" class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm">
                                    <option value="Seni Tradisi">Seni Tradisi</option>
                                    <option value="Peninggalan">Situs Peninggalan</option>
                                    <option value="Adat Istiadat">Adat Istiadat</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="nama_budaya" value="Nama Objek (Cth: Wayang Kulit / Recha Gathel)" />
                                <x-text-input id="nama_budaya" name="nama_budaya" type="text" class="mt-1 block w-full" required />
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="deskripsi" value="Deskripsi Lengkap" />
                            <textarea name="deskripsi" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" rows="3"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 bg-gray-50 p-4 rounded border">
                            <div>
                                <x-input-label for="ikon" value="Ikon Bootstrap (Opsional)" />
                                <x-text-input id="ikon" name="ikon" type="text" class="mt-1 block w-full" placeholder="Cth: bi-people atau bi-bank" />
                                <p class="text-xs text-gray-500 mt-1">Cari ikon di: icons.getbootstrap.com</p>
                            </div>
                            <div>
                                <x-input-label for="info_tambahan" value="Info Label Bawah (Khusus Seni Tradisi)" />
                                <x-text-input id="info_tambahan" name="info_tambahan" type="text" class="mt-1 block w-full" placeholder="Cth: Menyerap 2 Tenaga Kesenian" />
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>{{ __('Simpan Data') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Daftar Budaya & Situs</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                                    <th class="p-4 border-b font-semibold">Nama Objek</th>
                                    <th class="p-4 border-b font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($budaya as $item)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4">
                                        <p class="font-bold text-gray-800">{{ $item->nama_budaya }}</p>
                                        <p class="text-xs font-semibold text-green-600 mt-1">{{ $item->kategori }}</p>
                                    </td>
                                    <td class="p-4 text-center">
                                        <form action="{{ route('admin.budaya.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                            @csrf @method('DELETE')
                                            <x-danger-button type="submit">{{ __('Hapus') }}</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="2" class="p-4 text-center text-gray-500 italic">Belum ada data.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>