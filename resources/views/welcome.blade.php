@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="position-relative" style="background-image: url('https://source.unsplash.com/1600x900/?mountain,village'); background-size: cover; background-position: center; min-height: 60vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.6;"></div>
    
    <div class="container position-relative z-index-1 d-flex flex-column justify-content-center h-100 text-white" style="padding-top: 10vh;">
        <p class="mb-1 text-uppercase fw-bold text-success">Selamat Datang di</p>
        <h1 class="display-4 fw-bold">Desa Arjosari</h1>
        <p class="lead">Kec. Kalipare, Kab. Malang, Jawa Timur 65165</p>
        
        <div class="d-flex gap-3 mt-4">
            <a href="#" class="btn btn-success px-4 py-2 fw-semibold rounded-pill">Profil Desa</a>
            <a href="#" class="btn btn-outline-light px-4 py-2 fw-semibold rounded-pill">Lihat Peta Desa</a>
        </div>
    </div>
</div>

<!-- Statistik Section (Grid System) -->
<div class="container" style="margin-top: -50px; position: relative; z-index: 2;">
    <div class="row g-4">
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm rounded-4 text-center py-4 h-100">
                <div class="card-body">
                    <i class="bi bi-people text-success fs-1 mb-2"></i>
                    <h3 class="fw-bold text-success mb-0">7.019</h3>
                    <p class="text-muted small mb-0">Penduduk (Jiwa)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm rounded-4 text-center py-4 h-100">
                <div class="card-body">
                    <i class="bi bi-house-door text-success fs-1 mb-2"></i>
                    <h3 class="fw-bold text-success mb-0">1.940</h3>
                    <p class="text-700 small mb-0">Keluarga (KK)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm rounded-4 text-center py-4 h-100">
                <div class="card-body">
                    <i class="bi bi-map text-success fs-1 mb-2"></i>
                    <h3 class="fw-bold text-success mb-0">1.490,7</h3>
                    <p class="text-muted small mb-0">Luas Wilayah (Ha)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm rounded-4 text-center py-4 h-100">
                <div class="card-body">
                    <i class="bi bi-geo-alt text-success fs-1 mb-2"></i>
                    <h3 class="fw-bold text-success mb-0">6</h3>
                    <p class="text-muted small mb-0">Dusun</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Layanan & Informasi Section -->
<div class="container" style="margin-top: 5rem;">
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Layanan & Informasi</h4>
        <p class="text-muted small">Akses layanan dan informasi desa dengan mudah</p>
    </div>
    <div class="row g-4">
        <div class="col-md-3 col-6">
            <a href="#" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3"><i class="bi bi-file-earmark-text text-success fs-4"></i></div>
                        <h6 class="fw-bold text-dark">Profil Desa</h6>
                        <p class="text-muted small mb-0">Sejarah, visi misi & struktur</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="#" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3"><i class="bi bi-megaphone text-danger fs-4"></i></div>
                        <h6 class="fw-bold text-dark">Pengaduan</h6>
                        <p class="text-muted small mb-0">Sampaikan keluhan dan saran</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="#" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3"><i class="bi bi-bag text-warning fs-4"></i></div>
                        <h6 class="fw-bold text-dark">Produk Desa</h6>
                        <p class="text-muted small mb-0">Produk unggulan & UMKM</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="#" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3"><i class="bi bi-map text-primary fs-4"></i></div>
                        <h6 class="fw-bold text-dark">Peta Desa</h6>
                        <p class="text-muted small mb-0">Peta wilayah & fasilitas</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Berita Terbaru Section -->
<div class="container mb-5" style="margin-top: 5rem;">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h4 class="fw-bold mb-1">Berita Terbaru</h4>
            <p class="text-muted small mb-0">Informasi dan berita terkini</p>
        </div>
        <a href="#" class="text-success text-decoration-none fw-semibold small">Lihat Semua <i class="bi bi-arrow-right"></i></a>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://source.unsplash.com/800x400/?meeting,village" class="card-img-top" alt="Berita 1" style="height: 200px; object-fit: cover;">
                <div class="card-body p-4">
                    <span class="badge bg-success bg-opacity-10 text-success mb-2">Informasi Publik</span>
                    <h5 class="fw-bold mb-2">Musyawarah Desa Arjosari Bahas APBD 2024</h5>
                    <p class="text-muted small mb-3">Pemerintah Desa Arjosari menggelar musyawarah perencanaan pembangunan desa...</p>
                    <p class="text-muted small mb-0"><i class="bi bi-calendar3 me-1"></i> 28 Juni 2026</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://source.unsplash.com/800x400/?agriculture,farm" class="card-img-top" alt="Berita 2" style="height: 200px; object-fit: cover;">
                <div class="card-body p-4">
                    <span class="badge bg-success bg-opacity-10 text-success mb-2">Potensi Desa</span>
                    <h5 class="fw-bold mb-2">Panen Raya Jagung Hibrida</h5>
                    <p class="text-muted small mb-3">Kelompok tani di Dusun Krajan berhasil melakukan panen raya jagung hibrida...</p>
                    <p class="text-muted small mb-0"><i class="bi bi-calendar3 me-1"></i> 25 Juni 2026</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bagian Potensi Desa -->
<div class="container mb-5">
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Potensi Desa</h4>
        <p class="text-muted small">Potensi dan keunggulan Desa Arjosari</p>
    </div>
    <div class="row g-3">
        @php
            $potensi = [
                ['title' => 'Pertanian', 'desc' => 'Lahan subur 8 Ha', 'img' => 'https://source.unsplash.com/400x300/?vegetables,farm'],
                ['title' => 'UMKM', 'desc' => '45 unit usaha aktif', 'img' => 'https://source.unsplash.com/400x300/?store,market'],
                ['title' => 'Wisata', 'desc' => 'Alam & budaya lokal', 'img' => 'https://source.unsplash.com/400x300/?nature,village'],
                ['title' => 'Budaya', 'desc' => 'Seni tradisi Jawa', 'img' => 'https://source.unsplash.com/400x300/?dance,culture']
            ];
        @endphp
        
        @foreach($potensi as $p)
        <div class="col-md-3 col-6">
            <div class="card border-0 rounded-4 overflow-hidden position-relative" style="height: 150px;">
                <img src="{{ $p['img'] }}" class="w-100 h-100 object-fit-cover" alt="{{ $p['title'] }}">
                <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                    <h6 class="text-white fw-bold mb-0">{{ $p['title'] }}</h6>
                    <small class="text-white opacity-75" style="font-size: 0.75rem;">{{ $p['desc'] }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- 3 Widget Info -->
<div class="container mb-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-4"><i class="bi bi-graph-up-arrow text-success me-2"></i> Info Pembangunan</h6>
                    <div class="mb-3"><div class="d-flex justify-content-between small mb-1"><span>Jalan Desa</span><span class="fw-bold text-success">85%</span></div><div class="progress" style="height: 6px;"><div class="progress-bar bg-success" style="width: 85%;"></div></div></div>
                    <div class="mb-3"><div class="d-flex justify-content-between small mb-1"><span>Irigasi</span><span class="fw-bold text-success">70%</span></div><div class="progress" style="height: 6px;"><div class="progress-bar bg-success" style="width: 70%;"></div></div></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-3"><i class="bi bi-star text-warning me-2"></i> Status IDM</h6>
                    <div class="text-center bg-success bg-opacity-10 rounded-3 py-3 mb-4">
                        <h2 class="fw-bold text-success mb-1">0.7245</h2>
                        <span class="badge bg-success rounded-pill px-3">Maju</span>
                    </div>
                    <div class="d-flex justify-content-between small border-bottom pb-2 mb-2"><span>Indeks Sosial</span><span class="fw-bold">0.6890</span></div>
                    <div class="d-flex justify-content-between small"><span>Indeks Ekonomi</span><span class="fw-bold">0.7120</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-4"><i class="bi bi-calendar-event text-primary me-2"></i> Agenda Desa</h6>
                    <div class="d-flex mb-3">
                        <div class="text-center me-3" style="min-width: 50px;"><div class="fw-bold text-success">20</div><div class="small text-success">Jan</div></div>
                        <div><div class="fw-semibold small">Rapat BPD</div><div class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-clock"></i> 09:00 WIB</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner Pengaduan -->
<div class="container mb-5">
    <div class="bg-success text-white rounded-4 p-4 p-md-5 position-relative overflow-hidden shadow">
        <div class="position-relative z-index-1">
            <div class="d-flex align-items-center mb-2"><i class="bi bi-megaphone me-2"></i> <small class="text-uppercase tracking-wide">Layanan Masyarakat</small></div>
            <h2 class="fw-bold mb-3">Sampaikan Pengaduan Anda</h2>
            <p class="mb-4">Kami siap mendengar dan menyelesaikan setiap masalah dengan cepat</p>
            <a href="#" class="btn btn-outline-light rounded-pill px-4">Informasi Pengaduan <i class="bi bi-chevron-down ms-2"></i></a>
        </div>
        <div class="position-absolute top-0 end-0 bg-white opacity-10 rounded-circle" style="width: 300px; height: 300px; transform: translate(30%, -30%);"></div>
    </div>
</div>
@endsection