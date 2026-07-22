<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Perangkat Desa') }}
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
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Tambah Perangkat Desa</h3>
                    
                    <form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <x-input-label for="nama" value="Nama Lengkap (Tanpa/Dengan Gelar)" />
                                <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" required />
                            </div>
                            <div>
                                <x-input-label for="jabatan" value="Jabatan (Cth: Kepala Desa)" />
                                <x-text-input id="jabatan" name="jabatan" type="text" class="mt-1 block w-full" required />
                            </div>
                            <div>
                                <x-input-label for="foto_profil" value="Foto Profil (Opsional, Rasio 3:4/Potret)" />
                                <input id="foto_profil" name="foto_profil" type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 border border-gray-300 rounded-md p-1" />
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
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Daftar Struktur Organisasi</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                                    <th class="p-4 border-b font-semibold">Foto</th>
                                    <th class="p-4 border-b font-semibold">Nama & Jabatan</th>
                                    <th class="p-4 border-b font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($perangkat as $item)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4">
                                        @if($item->foto_profil)
                                            <img src="{{ asset('storage/' . $item->foto_profil) }}" alt="Foto" class="h-16 w-16 rounded-full object-cover border shadow-sm">
                                        @else
                                            <div class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 border shadow-sm">
                                                <i class="bi bi-person fs-3 ms-3"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        <p class="font-bold text-gray-800">{{ $item->nama }}</p>
                                        <p class="text-sm font-semibold text-green-600 mt-1">{{ $item->jabatan }}</p>
                                    </td>
                                    <td class="p-4 text-center">
                                        <form action="{{ route('admin.perangkat.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                            @csrf @method('DELETE')
                                            <x-danger-button type="submit">Hapus</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="p-4 text-center text-gray-500 italic">Belum ada data perangkat desa.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>