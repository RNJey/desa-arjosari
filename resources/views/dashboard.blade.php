<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Desa') }}
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Ubah Data Statistik Desa</h3>

                    <form action="{{ route('settings.update') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="penduduk" value="Jumlah Penduduk (Jiwa)" />
                                <x-text-input id="penduduk" name="penduduk" type="text" class="mt-1 block w-full" :value="$settings['penduduk'] ?? ''" required />
                            </div>

                            <div>
                                <x-input-label for="kk" value="Jumlah Keluarga (KK)" />
                                <x-text-input id="kk" name="kk" type="text" class="mt-1 block w-full" :value="$settings['kk'] ?? ''" required />
                            </div>

                            <div>
                                <x-input-label for="luas" value="Luas Wilayah (Ha)" />
                                <x-text-input id="luas" name="luas" type="text" class="mt-1 block w-full" :value="$settings['luas'] ?? ''" required />
                            </div>

                            <div>
                                <x-input-label for="dusun" value="Jumlah Dusun" />
                                <x-text-input id="dusun" name="dusun" type="text" class="mt-1 block w-full" :value="$settings['dusun'] ?? ''" required />
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-primary-button>
                                {{ __('Simpan Perubahan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>