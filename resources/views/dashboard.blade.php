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

            <form action="{{ route('settings.update') }}" method="POST">
                @csrf
                
                <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="font-bold text-lg text-gray-800 mb-4"><i class="bi bi-people me-2"></i> Statistik Dasar Desa</h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <x-input-label for="penduduk" value="Penduduk (Jiwa)" />
                                <x-text-input id="penduduk" name="penduduk" type="text" class="mt-1 w-full" :value="$settings['penduduk'] ?? ''" required />
                            </div>
                            <div>
                                <x-input-label for="kk" value="Keluarga (KK)" />
                                <x-text-input id="kk" name="kk" type="text" class="mt-1 w-full" :value="$settings['kk'] ?? ''" required />
                            </div>
                            <div>
                                <x-input-label for="luas" value="Luas Wilayah (Ha)" />
                                <x-text-input id="luas" name="luas" type="text" class="mt-1 w-full" :value="$settings['luas'] ?? ''" required />
                            </div>
                            <div>
                                <x-input-label for="dusun" value="Jumlah Dusun" />
                                <x-text-input id="dusun" name="dusun" type="text" class="mt-1 w-full" :value="$settings['dusun'] ?? ''" required />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="font-bold text-lg text-green-700 mb-4"><i class="bi bi-cash-coin me-2"></i> Transparansi APBDes</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <x-input-label for="apbdes_total" value="Total Anggaran (Cth: Rp 1.708.145.626)" />
                                <x-text-input id="apbdes_total" name="apbdes_total" type="text" class="mt-1 w-full border-green-300" :value="$settings['apbdes_total'] ?? ''" />
                            </div>
                            <div>
                                <x-input-label for="apbdes_pendapatan" value="Pendapatan (Cth: Rp 1.708 Juta)" />
                                <x-text-input id="apbdes_pendapatan" name="apbdes_pendapatan" type="text" class="mt-1 w-full border-green-300" :value="$settings['apbdes_pendapatan'] ?? ''" />
                            </div>
                            <div>
                                <x-input-label for="apbdes_belanja" value="Belanja (Cth: Rp 1.715 Juta)" />
                                <x-text-input id="apbdes_belanja" name="apbdes_belanja" type="text" class="mt-1 w-full border-green-300" :value="$settings['apbdes_belanja'] ?? ''" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="font-bold text-lg text-yellow-600 mb-4"><i class="bi bi-star me-2"></i> Status IDM (Indeks Desa Membangun)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <x-input-label for="idm_skor" value="Skor IDM (Cth: 0.7245)" />
                                <x-text-input id="idm_skor" name="idm_skor" type="text" class="mt-1 w-full border-yellow-300" :value="$settings['idm_skor'] ?? ''" />
                            </div>
                            <div>
                                <x-input-label for="idm_status" value="Status (Cth: Maju / Mandiri)" />
                                <x-text-input id="idm_status" name="idm_status" type="text" class="mt-1 w-full border-yellow-300" :value="$settings['idm_status'] ?? ''" />
                            </div>
                            <div>
                                <x-input-label for="idm_sosial" value="Skor Sosial (Cth: 0.6890)" />
                                <x-text-input id="idm_sosial" name="idm_sosial" type="text" class="mt-1 w-full border-yellow-300" :value="$settings['idm_sosial'] ?? ''" />
                            </div>
                            <div>
                                <x-input-label for="idm_ekonomi" value="Skor Ekonomi (Cth: 0.7120)" />
                                <x-text-input id="idm_ekonomi" name="idm_ekonomi" type="text" class="mt-1 w-full border-yellow-300" :value="$settings['idm_ekonomi'] ?? ''" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pb-12">
                    <x-primary-button class="py-3 px-6 text-lg">
                        {{ __('Simpan Semua Perubahan') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>