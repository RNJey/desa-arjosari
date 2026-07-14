<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Pengumuman & Berita') }}
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

            <!-- Notifikasi Error (Tambahkan kode ini) -->
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <p class="font-bold">Gagal Menyimpan!</p>
                    <ul class="list-disc ml-5 text-sm mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Buat Pengumuman Baru</h3>
                    
                    <form action="{{ route('admin.berita.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="title" value="Judul Pengumuman" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" placeholder="Contoh: Jadwal Posyandu Bulan Ini" required />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="content" value="Isi Pengumuman" class="mb-1" />
                            <textarea name="content" class="rich-editor w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>
                                {{ __('Publish Sekarang') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Daftar Pengumuman Terpublikasi</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                                    <th class="p-4 border-b font-semibold">Tanggal</th>
                                    <th class="p-4 border-b font-semibold">Judul Pengumuman</th>
                                    <th class="p-4 border-b font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($berita as $item)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4 text-sm text-gray-500">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="p-4 font-medium text-gray-800">{{ $item->title }}</td>
                                    <td class="p-4 text-center">
                                        <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?');">
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
                                    <td colspan="3" class="p-4 text-center text-gray-500 italic">Belum ada pengumuman yang dibuat.</td>
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