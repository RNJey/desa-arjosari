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
                'pembagian-desa' => 'Pembagian Dusun', // <--- 1. UBAH DI SINI UNTUK SIDEBAR
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

    // 2. TRIK OVERRIDE JUDUL DATABASE UNTUK HEADER
    if ($page->slug == 'pembagian-desa') {
        $page->title = 'Pembagian Dusun'; 
    }

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

                @if($page->slug == 'pemerintahan' && isset($perangkatData) && $perangkatData->count() > 0)
                    <div class="mt-5 pt-4 border-top">
                        <h4 class="fw-bold text-center mb-5 text-dark">Struktur Organisasi Pemerintah Desa</h4>
                        
                        <div class="row g-4 justify-content-center">
                            @foreach($perangkatData as $item)
                                <div class="col-md-4 col-sm-6">
                                    <div class="card border-0 shadow-sm rounded-4 text-center h-100 overflow-hidden transition-hover">
                                        @if($item->foto_profil)
                                            <img src="{{ asset('storage/' . $item->foto_profil) }}" alt="{{ $item->nama }}" class="card-img-top object-fit-cover" style="height: 280px; object-position: top;">
                                        @else
                                            <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 280px;">
                                                <i class="bi bi-person-bounding-box text-secondary" style="font-size: 6rem;"></i>
                                            </div>
                                        @endif
                                        
                                        <div class="card-body p-4 bg-white z-index-1 position-relative" style="margin-top: -20px; border-radius: 20px 20px 0 0; box-shadow: 0 -10px 20px rgba(0,0,0,0.05);">
                                            <h6 class="fw-bold mb-1 text-dark">{{ $item->nama }}</h6>
                                            <p class="small text-success mb-0 fw-bold text-uppercase" style="letter-spacing: 0.5px;">{{ $item->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

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

                @if(isset($budayaData) && $budayaData->count() > 0)
                    <div class="mt-4 pt-2">
                        
                        @if($page->slug == 'seni-tradisi')
                            <div class="row g-4 mt-2">
                                @foreach($budayaData as $item)
                                    @php
                                        $warna = ['success', 'warning', 'primary', 'danger'];
                                        $warnaAktif = $warna[$loop->index % count($warna)];
                                        $ikon = $item->ikon ?? 'bi-music-note-beamed'; // Ikon default
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="card border-0 shadow-sm rounded-4 h-100 p-4 border-bottom border-4 border-{{ $warnaAktif }} text-center transition-hover">
                                            <div class="bg-{{ $warnaAktif }} bg-opacity-10 rounded-circle d-inline-flex p-3 mx-auto mb-3" style="width: 70px; height: 70px; align-items: center; justify-content: center;">
                                                <i class="bi {{ $ikon }} text-{{ $warnaAktif }} fs-2"></i>
                                            </div>
                                            <h5 class="fw-bold text-dark mb-2">{{ $item->nama_budaya }}</h5>
                                            <p class="text-muted small mb-4">{{ $item->deskripsi }}</p>
                                            @if($item->info_tambahan)
                                                <div class="mt-auto">
                                                    <span class="badge bg-light text-dark border p-2">{{ $item->info_tambahan }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        @elseif($page->slug == 'peninggalan')
                            <div class="mt-4">
                                @foreach($budayaData as $item)
                                    @php $ikon = $item->ikon ?? 'bi-bank'; @endphp
                                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden transition-hover">
                                        <div class="row g-0 h-100">
                                            <div class="col-md-3 bg-success bg-opacity-10 d-flex align-items-center justify-content-center p-4" style="min-height: 120px;">
                                                <i class="bi {{ $ikon }} text-success" style="font-size: 3.5rem;"></i>
                                            </div>
                                            <div class="col-md-9 p-4 d-flex flex-column justify-content-center">
                                                <h5 class="fw-bold mb-2">{{ $item->nama_budaya }}</h5>
                                                <p class="text-muted small mb-0" style="line-height: 1.6;">{{ $item->deskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        @elseif($page->slug == 'adat-istiadat')
                            <div class="row g-3 mt-3">
                                @foreach($budayaData as $item)
                                    @php $ikon = $item->ikon ?? 'bi-check-circle-fill'; @endphp
                                    <div class="col-md-6">
                                        <div class="p-3 bg-light rounded-3 border-start border-4 border-success d-flex align-items-center h-100 shadow-sm transition-hover">
                                            <i class="bi {{ $ikon }} text-success me-3 fs-4"></i> 
                                            <div>
                                                <span class="fw-bold d-block text-dark">{{ $item->nama_budaya }}</span>
                                                @if($item->deskripsi)
                                                    <small class="text-muted">{{ $item->deskripsi }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif

                @if(in_array($page->slug, ['apbdes', 'status-idm', 'indikator-idm']))
                    <div class="mt-4 pt-2">
                        
                        @if($page->slug == 'apbdes')
                            <div class="alert alert-success bg-opacity-10 border-success text-center mb-4 p-4 rounded-4 shadow-sm">
                                <h6 class="text-success fw-bold mb-2">Total Anggaran Belanja & Penerimaan</h6>
                                <h2 class="fw-bold text-dark mb-0">{{ $settings['apbdes_total'] ?? 'Rp 0' }}</h2>
                            </div>

                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm rounded-4 h-100 p-4 border-start border-4 border-primary bg-light">
                                        <h6 class="fw-bold text-primary mb-4"><i class="bi bi-arrow-down-circle text-primary me-2"></i> Pendapatan Desa</h6>
                                        <h3 class="fw-bold text-dark">{{ $settings['apbdes_pendapatan'] ?? 'Rp 0' }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm rounded-4 h-100 p-4 border-start border-4 border-danger bg-light">
                                        <h6 class="fw-bold text-danger mb-4"><i class="bi bi-arrow-up-circle text-danger me-2"></i> Alokasi Belanja</h6>
                                        <h3 class="fw-bold text-dark">{{ $settings['apbdes_belanja'] ?? 'Rp 0' }}</h3>
                                    </div>
                                </div>
                            </div>

                        @elseif($page->slug == 'status-idm')
                            <div class="text-center bg-success bg-opacity-10 rounded-4 py-5 mb-4 border border-success border-opacity-25 shadow-sm">
                                <h1 class="display-3 fw-bold text-success mb-2">{{ $settings['idm_skor'] ?? '0.0000' }}</h1>
                                <span class="badge bg-success rounded-pill px-4 py-2 fs-6 mb-2">STATUS: {{ strtoupper($settings['idm_status'] ?? 'Menunggu Data') }}</span>
                            </div>
                        
                        @elseif($page->slug == 'indikator-idm')
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100 border-bottom border-4 border-danger transition-hover">
                                        <i class="bi bi-heart-pulse text-danger fs-1 mb-2"></i>
                                        <h2 class="fw-bold mb-1">{{ $settings['idm_sosial'] ?? '0' }}</h2>
                                        <span class="small fw-semibold text-muted">Indeks Ketahanan Sosial</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100 border-bottom border-4 border-primary transition-hover">
                                        <i class="bi bi-shop text-primary fs-1 mb-2"></i>
                                        <h2 class="fw-bold mb-1">{{ $settings['idm_ekonomi'] ?? '0' }}</h2>
                                        <span class="small fw-semibold text-muted">Indeks Ketahanan Ekonomi</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                @endif
                @if(isset($pembangunanData) && $page->slug == 'info-pembangunan')
                    <div class="card border-0 shadow-sm rounded-4 p-4 mt-4 bg-light bg-opacity-50">
                        <h6 class="fw-bold mb-4"><i class="bi bi-cone-striped text-warning me-2"></i> Progres Infrastruktur Tahun Ini</h6>
                        
                        @forelse($pembangunanData as $item)
                            @php
                                $warna = $item->persentase == 100 ? 'success' : 'primary';
                                $animasi = $item->persentase < 100 ? 'progress-bar-striped progress-bar-animated' : '';
                            @endphp
                            <div class="mb-4">
                                <div class="d-flex justify-content-between small mb-1">
                                    <span>{{ $item->nama_proyek }}</span>
                                    <span class="fw-bold text-{{ $warna }}">{{ $item->persentase }}%</span>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-{{ $warna }} {{ $animasi }}" style="width: {{ $item->persentase }}%;"></div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-muted small py-4">Belum ada data progres pembangunan yang dipublikasikan.</div>
                        @endforelse
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
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSfU31A6HTz6y9jGRfQu8A__GA2pFwj_s3rPNSxxbfqQohUSYg/viewform?usp=header" target="_blank" class="btn btn-outline-light rounded-pill w-100 fw-bold">Isi Form Pengaduan</a>
                </div>
            </div>

        </div>
        
    </div>
</div>
@endsection