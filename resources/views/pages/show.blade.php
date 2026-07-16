@extends('layouts.front')

@section('content')

@php
    // LOGIKA PENGELOMPOKAN MENU SIDEBAR
    $menuGroups = [
        'profil' => [
            'title' => 'Profil Desa',
            'icon' => 'bi-bank',
            'items' => [
                'sejarah-desa' => 'Sejarah Desa',
                'visi-misi' => 'Visi Misi',
                'pemerintahan' => 'Pemerintahan Desa',
                'data-kependudukan' => 'Data Kependudukan',
            ]
        ],
        'peta' => [
            'title' => 'Peta Desa',
            'icon' => 'bi-geo-alt',
            'items' => [
                'peta-wilayah' => 'Peta Wilayah',
                'pembagian-desa' => 'Pembagian Desa',
            ]
        ],
        'potensi' => [
            'title' => 'Potensi Desa',
            'icon' => 'bi-tree',
            'items' => [
                'pertanian' => 'Pertanian',
                'perkebunan' => 'Perkebunan',
                'peternakan' => 'Peternakan',
            ]
        ],
        'Berita' => [
            'title' => 'Pengumuman',
            'icon' => 'bi-megaphone',
            'items' => [
                'pengumuman' => 'Pengumuman',
                'agenda-desa' => 'Agenda Desa',
            ]
        ],
        'Budaya' => [
            'title' => 'Budaya Desa',
            'icon' => 'bi-music-note-beamed',
            'items' => [
                'seni-tradisi' => 'Seni & Tradisi',
                'peninggalan' => 'Peninggalan',
                'adat-istiadat' => 'Adat Istiadat',
            ]
        ],
        'Pembangunan' => [
            'title' => 'Pembangunan Desa',
            'icon' => 'bi-building',
            'items' => [
                'info-pembangunan' => 'Info Pembangunan',
                'apbdes' => 'APBDes',
                'dana-desa' => 'Dana Desa',
            ]
        ],
        'IDM' => [
            'title' => 'IDM Desa',
            'icon' => 'bi-people',
            'items' => [
                'status-idm' => 'Status IDM',
                'indikator-idm' => 'Indikator IDM',
                'perkembangan-idm' => 'Perkembangan IDM',
            ]
        ],
        
    ];

    // Cek halaman saat ini masuk ke grup mana
    $activeGroup = null;
    foreach($menuGroups as $key => $group) {
        if(array_key_exists($page->slug, $group['items'])) {
            $activeGroup = $group;
            break;
        }
    }

    // Fallback jika tidak ada di grup (misal halaman baru)
    if(!$activeGroup) {
        $activeGroup = [
            'title' => 'Menu Halaman',
            'icon' => 'bi-list',
            'items' => [$page->slug => $page->title]
        ];
    }
@endphp

<div class="py-5" style="background-color: #eef5f1;">
    <div class="container text-center py-4">
        <h1 class="fw-bold text-dark mb-3">{{ $page->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 small">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-success text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5" style="min-height: 50vh;">
    <div class="row g-4">
        
        <div class="col-lg-8 position-relative">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @auth
                <a href="{{ url('/halaman/'.$page->slug.'/edit') }}" class="btn btn-warning rounded-pill shadow-sm position-absolute top-0 end-0 mt-3 me-3 px-4 fw-bold transition-hover" style="z-index: 10;">
                    <i class="bi bi-pencil-square me-2"></i> Edit Halaman
                </a>
            @endauth

            <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                <div class="konten-halaman" style="line-height: 1.8; font-size: 1.05rem; color: #4a5568;">
                    {!! $page->content !!}
                </div>

                @if(isset($potensiData) && $potensiData->count() > 0)
                    <div class="mt-5 pt-2">
                        
                        @if($page->slug == 'pertanian')
                            <div class="row g-4 mt+2">
                                @foreach($potensiData as $item)
                                    @php
                                        $warna = ['warning', 'danger', 'success', 'primary'];
                                        $warnaAktif = $warna[$loop->index % count($warna)];
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="card border-0 shadow-sm rounded-4 h-100 transition-hover border-start border-{{ $warnaAktif }} border-4">
                                            <div class="card-body p-4 d-flex flex-column">
                                                <h5 class="fw-bold text-dark mb-2">{{ $item->nama_komoditas }}</h5>
                                                <p class="text-muted small mb-4" style="line-height: 1.6;">{{ $item->deskripsi }}</p>
                                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                                    @if($item->info_1)
                                                        <span class="badge bg-{{ $warnaAktif }} text-dark px-3 py-2 rounded-pill fw-semibold shadow-sm">{{ $item->info_1 }}</span>
                                                    @else <span></span> @endif
                                                    
                                                    @if($item->info_2)
                                                        <span class="text-{{ $warnaAktif }} fw-bold">{{ $item->info_2 }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        @elseif($page->slug == 'perkebunan')
                            <div class="table-responsive mt-4 rounded-3 shadow-sm border border-success border-opacity-25">
                                <table class="table table-hover text-center align-middle mb-0">
                                    <thead style="background-color: #d1e7dd; color: #0f5132;">
                                        <tr>
                                            <th class="py-3 border-0">Jenis Komoditas</th>
                                            <th class="py-3 border-0 border-start border-success border-opacity-25">Luas Lahan (Ha)</th>
                                            <th class="py-3 border-0 border-start border-success border-opacity-25">Hasil Panen (Ton/Ha)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        
                                        @foreach($potensiData as $item)
                                        <tr>
                                            <td class="py-3 fw-bold text-start ps-4 border-0 border-bottom"><i class="bi bi-tree text-success me-2"></i> {{ $item->nama_komoditas }}</td>
                                            <td class="py-3 border-0 border-bottom border-start text-muted">{{ $item->info_1 }}</td>
                                            <td class="py-3 border-0 border-bottom border-start text-success fw-bold">{{ $item->info_2 }}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>

                        @elseif($page->slug == 'peternakan')
                            <div class="row g-4 mt-2">
                                @foreach($potensiData as $item)
                                <div class="col-md-4 col-sm-6">
                                    <div class="card border-0 rounded-4 text-center h-100 p-4 transition-hover" style="background-color: #f8f9fa;">
                                        <div class="card-body d-flex flex-column justify-content-center align-items-center p-0">
                                            
                                            <h2 class="fw-bold text-success mb-2" style="font-size: 2.4rem; letter-spacing: -0.5px;">
                                                {{ $item->info_1 }}
                                            </h2>
                                            
                                            <h6 class="text-muted fw-normal mb-4" style="font-size: 1rem;">
                                                {{ $item->nama_komoditas }}
                                            </h6>
                                            
                                            <div class="mt-auto">
                                                <span class="badge bg-secondary rounded-pill px-3 py-2 text-white" style="font-size: 0.85rem; font-weight: 600;">
                                                    {{ $item->info_2 }}
                                                </span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-4">
            
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3"><i class="bi {{ $activeGroup['icon'] }} me-2"></i> {{ $activeGroup['title'] }}</h6>
                    <div class="list-group list-group-flush">
                        @foreach($activeGroup['items'] as $slug => $label)
                            <a href="{{ url('halaman/'.$slug) }}" class="list-group-item list-group-item-action px-0 border-0 {{ $page->slug == $slug ? 'text-success fw-bold' : 'text-dark' }}">
                                <i class="bi bi-chevron-right me-2 small"></i> {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 bg-success text-white text-center p-4">
                <div class="card-body">
                    <i class="bi bi-question-circle fs-1 mb-3"></i>
                    <h6 class="fw-bold mb-2">Butuh Bantuan?</h6>
                    <p class="small mb-4 text-white-50">Hubungi pemerintah desa untuk informasi lebih lanjut.</p>
                    <a href="{{ url('/#pengaduan-masyarakat') }}" class="btn btn-outline-light rounded-pill w-100">Kontak Kami</a>
                </div>
            </div>

        </div>
        
    </div>
</div>
@endsection