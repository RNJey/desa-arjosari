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