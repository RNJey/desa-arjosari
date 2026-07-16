<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Info Pembangunan') }}
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

            <!-- Form Tambah -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Tambah Proyek Baru</h3>
                    
                    <form action="{{ route('admin.pembangunan.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-input-label for="nama_proyek" value="Nama Proyek (Cth: Pembangunan Jalan Makadam)" />
                                <x-text-input id="nama_proyek" name="nama_proyek" type="text" class="mt-1 block w-full" required />
                            </div>
                            <div>
                                <x-input-label for="persentase" value="Progres Persentase (0 - 100)" />
                                <x-text-input id="persentase" name="persentase" type="number" min="0" max="100" class="mt-1 block w-full" required />
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>{{ __('Simpan Data') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Daftar Proyek -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Daftar Progres Pembangunan</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                                    <th class="p-4 border-b font-semibold">Nama Proyek</th>
                                    <th class="p-4 border-b font-semibold">Progres</th>
                                    <th class="p-4 border-b font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pembangunan as $item)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4 font-bold text-gray-800">{{ $item->nama_proyek }}</td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $item->persentase }}%"></div>
                                            </div>
                                            <span class="text-sm font-bold text-gray-700">{{ $item->persentase }}%</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-center">
                                        <form action="{{ route('admin.pembangunan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus proyek ini?');">
                                            @csrf @method('DELETE')
                                            <x-danger-button type="submit">Hapus</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="p-4 text-center text-gray-500 italic">Belum ada data proyek.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>