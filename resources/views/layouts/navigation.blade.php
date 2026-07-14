<nav x-data="{ open: false }" class="bg-emerald-700 border-b border-emerald-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center text-black font-bold">
                    Panel Admin Desa
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <!-- Menu Statistik -->
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-black">
                        Statistik
                    </x-nav-link>
                    
                    <!-- Menu Berita -->
                    <x-nav-link :href="route('admin.berita')" :active="request()->routeIs('admin.berita')" class="text-black">
                        Berita
                    </x-nav-link>

                    <!-- Menu Baru: Potensi -->
                    <x-nav-link :href="route('admin.potensi')" :active="request()->routeIs('admin.potensi')" class="text-black">
                        Potensi Desa
                    </x-nav-link>
                </div>
            </div>
            
            <div class="flex items-center">
                <a href="{{ url('/') }}" target="_blank" class="text-black text-sm hover:underline">Lihat Website &rarr;</a>
            </div>
        </div>
    </div>
</nav>