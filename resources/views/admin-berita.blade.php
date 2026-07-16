<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Informasi (Pengumuman & Agenda)') }}
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

            <!-- FORM TAMBAH -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Buat Informasi Baru</h3>
                    
                    <form action="{{ route('admin.berita.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-input-label for="category" value="Pilih Kategori" />
                                <select name="category" id="category" onchange="toggleAgendaFields(this.value)" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="Pengumuman">Pengumuman</option>
                                    <option value="Agenda">Agenda Desa</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="title" value="Judul" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" placeholder="Contoh: Jadwal Posyandu..." required />
                            </div>
                        </div>

                        <div id="agenda_fields" style="display: none;" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 bg-yellow-50 border border-yellow-200 p-4 rounded-md shadow-sm">
                            <div>
                                <x-input-label for="event_date" value="Tanggal Pelaksanaan" class="text-yellow-800" />
                                <x-text-input id="event_date" name="event_date" type="date" class="mt-1 block w-full border-yellow-300 focus:border-yellow-500 focus:ring-yellow-500" />
                            </div>
                            <div>
                                <x-input-label for="event_time" value="Waktu / Jam" class="text-yellow-800" />
                                <x-text-input id="event_time" name="event_time" type="time" class="mt-1 block w-full border-yellow-300 focus:border-yellow-500 focus:ring-yellow-500" />
                            </div>
                            <div>
                                <x-input-label for="event_location" value="Lokasi Acara" class="text-yellow-800" />
                                <x-text-input id="event_location" name="event_location" type="text" class="mt-1 block w-full border-yellow-300 focus:border-yellow-500 focus:ring-yellow-500" placeholder="Cth: Balai Desa" />
                            </div>
                        </div>

                        <script>
                            function toggleAgendaFields(kategori) {
                                let agendaBox = document.getElementById('agenda_fields');
                                if(kategori === 'Agenda') {
                                    agendaBox.style.display = 'grid';
                                } else {
                                    agendaBox.style.display = 'none';
                                }
                            }
                        </script>

                        <div class="mb-6">
                            <x-input-label for="content" value="Isi Informasi (Opsional)" class="mb-1" />
                            <textarea id="contentEditor" name="content" class="rich-editor w-full rounded-md border-gray-300 shadow-sm" rows="5"></textarea>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                tinymce.init({
                                    selector: '.rich-editor', // Pastikan class textarea-nya sesuai
                                    
                                    // 1. Tambahkan plugin 'image'
                                    plugins: 'lists link image code wordcount', 
                                    
                                    // 2. Tambahkan tombol 'image' di toolbar
                                    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link image', 
                                    
                                    menubar: false,
                                    height: 400,

                                    // 3. Tambahkan Handler Upload Gambar
                                    images_upload_handler: function (blobInfo, progress) {
                                        return new Promise((resolve, reject) => {
                                            let formData = new FormData();
                                            // Masukkan file gambar
                                            formData.append('file', blobInfo.blob(), blobInfo.filename());
                                            // Masukkan token keamanan Laravel
                                            formData.append('_token', '{{ csrf_token() }}'); 

                                            // Kirim ke rute Laravel
                                            fetch('{{ route('upload.image') }}', {
                                                method: 'POST',
                                                body: formData
                                            })
                                            .then(response => {
                                                if (!response.ok) throw new Error('Gagal mengunggah: ' + response.status);
                                                return response.json();
                                            })
                                            .then(json => {
                                                if (!json || typeof json.location != 'string') {
                                                    throw new Error('Respon JSON tidak valid');
                                                }
                                                // Sukses! Masukkan URL gambar ke dalam teks editor
                                                resolve(json.location); 
                                            })
                                            .catch(error => {
                                                reject(error.message);
                                            });
                                        });
                                    },
                                    
                                    setup: function (editor) {
                                        editor.on('change', function () {
                                            editor.save(); 
                                        });
                                    }
                                });
                            });
                        </script>
                        
                        <div class="flex justify-end">
                            <x-primary-button>{{ __('Publish Sekarang') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- TABEL DAFTAR -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Daftar Informasi Terpublikasi</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                                    <th class="p-4 border-b font-semibold">Tanggal</th>
                                    <th class="p-4 border-b font-semibold">Kategori</th>
                                    <th class="p-4 border-b font-semibold">Judul</th>
                                    <th class="p-4 border-b font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($berita as $item)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4 text-sm text-gray-500">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="p-4">
                                        <span class="px-2 py-1 text-xs rounded-full {{ $item->category == 'Pengumuman' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }} font-bold">
                                            {{ $item->category }}
                                        </span>
                                    </td>
                                    <td class="p-4 font-medium text-gray-800">{{ $item->title }}</td>
                                    <td class="p-4 text-center">
                                        <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit">{{ __('Hapus') }}</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center text-gray-500 italic">Belum ada informasi yang dibuat.</td>
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