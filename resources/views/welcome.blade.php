@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="position-relative" style="background-image: url('{{ asset('images/banner-arjosari.JPEG') }}'); background-size: cover; background-position: center; min-height: 60vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.6;"></div>
    
    <div class="container position-relative z-index-1 d-flex flex-column justify-content-center h-100 text-white" style="padding-top: 10vh;">
        <p class="mb-1 text-uppercase fw-bold text-success">Selamat Datang di</p>
        <h1 class="display-4 fw-bold">Desa Arjosari</h1>
        <p class="lead">Kec. Kalipare, Kab. Malang, Jawa Timur 65165</p>
        
        <div class="d-flex gap-3 mt-4">
            <a href="{{ url('halaman/sejarah-desa') }}" class="btn btn-success px-4 py-2 fw-semibold rounded-pill">Profil Desa</a>
            <a href="{{ url('halaman/peta-wilayah') }}" class="btn btn-outline-light px-4 py-2 fw-semibold rounded-pill">Lihat Peta Desa</a>
        </div>
    </div>
</div>

<!-- Statistik Section -->
<div class="container" style="margin-top: -50px; position: relative; z-index: 2;">
    <div class="row g-4">
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm rounded-4 text-center py-4 h-100">
                <div class="card-body">
                    <i class="bi bi-people text-success fs-1 mb-2"></i>
                    <h3 class="fw-bold text-success mb-0">{{ $settings['penduduk'] ?? '0' }}</h3>
                    <p class="text-muted small mb-0">Penduduk (Jiwa)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm rounded-4 text-center py-4 h-100">
                <div class="card-body">
                    <i class="bi bi-house-door text-success fs-1 mb-2"></i>
                    <h3 class="fw-bold text-success mb-0">{{ $settings['kk'] ?? '0' }}</h3>
                    <p class="text-muted small mb-0">Keluarga (KK)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm rounded-4 text-center py-4 h-100">
                <div class="card-body">
                    <i class="bi bi-map text-success fs-1 mb-2"></i>
                    <h3 class="fw-bold text-success mb-0">{{ $settings['luas'] ?? '0' }}</h3>
                    <p class="text-muted small mb-0">Luas Wilayah (Ha)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm rounded-4 text-center py-4 h-100">
                <div class="card-body">
                    <i class="bi bi-geo-alt text-success fs-1 mb-2"></i>
                    <h3 class="fw-bold text-success mb-0">{{ $settings['dusun'] ?? '0' }}</h3>
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
        <!-- Kotak 1: Profil Desa -->
        <div class="col-md-3 col-6">
            <a href="{{ url('halaman/sejarah-desa') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3"><i class="bi bi-file-earmark-text text-success fs-4"></i></div>
                        <h6 class="fw-bold text-dark">Profil Desa</h6>
                        <p class="text-muted small mb-0">Sejarah, visi misi & struktur</p>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Kotak 2: Pengaduan -->
        <div class="col-md-3 col-6">
            <a href="#pengaduan-masyarakat" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3"><i class="bi bi-megaphone text-danger fs-4"></i></div>
                        <h6 class="fw-bold text-dark">Pengaduan</h6>
                        <p class="text-muted small mb-0">Sampaikan keluhan dan saran</p>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Kotak 3: Potensi Desa -->
        <div class="col-md-3 col-6">
            <a href="{{ url('halaman/pertanian') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3"><i class="bi bi-bag text-warning fs-4"></i></div>
                        <h6 class="fw-bold text-dark">Potensi Desa</h6>
                        <p class="text-muted small mb-0">Pertanian, perkebunan & UMKM</p>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Kotak 4: Peta Desa -->
        <div class="col-md-3 col-6">
            <a href="{{ url('halaman/peta-wilayah') }}" class="text-decoration-none">
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

<!-- CONTAINER UNTUK BERITA & POTENSI -->
<div class="container" style="margin-top: 5rem;">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Berita Terbaru</h3>
            <p class="text-muted small mb-0">Informasi dan berita terkini</p>
        </div>
        <a href="{{ url('berita') }}" class="text-success text-decoration-none fw-semibold small">Lihat Semua <i class="bi bi-arrow-right"></i></a>
    </div>

    <!-- Grid Berita -->
    <div class="row g-4 mb-5">
        @forelse($beritaTerbaru as $berita)
        <div class="col-md-6">
            <a href="{{ url('berita/' . $berita->slug) }}" class="text-decoration-none text-dark">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden transition-hover h-100 bg-light">
                    <img src="{{ $berita->image }}" onerror="this.style.display='none'" class="card-img-top object-fit-cover" alt="{{ $berita->title }}" style="height: 200px; width: 100%;">
                    <div class="card-body p-4 bg-white">
                        <span class="badge bg-success bg-opacity-10 text-success mb-3">{{ $berita->category }}</span>
                        <h5 class="fw-bold mb-2">{{ $berita->title }}</h5>
                        <p class="text-muted small mb-3">{{ Str::limit(strip_tags($berita->content), 100) }}</p>
                        <p class="text-muted small mb-0"><i class="bi bi-calendar3 me-1"></i> {{ $berita->created_at->translatedFormat('d F Y') }}</p>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-4">
            <p>Belum ada berita terbaru.</p>
        </div>
        @endforelse
    </div>

    <!-- Potensi Desa Header -->
    <div class="mb-4 mt-5">
        <h3 class="fw-bold text-dark mb-1">Potensi Desa</h3>
        <p class="text-muted small mb-0">Potensi dan keunggulan Desa Arjosari</p>
    </div>

    <!-- Grid Potensi -->
    <div class="row g-3 mb-5">
        <!-- Card Pertanian -->
        <div class="col-md-3 col-6">
            <a href="{{ url('halaman/pertanian') }}" class="text-decoration-none text-white">
                <div class="card border-0 rounded-4 overflow-hidden position-relative transition-hover bg-secondary" style="height: 180px;">
                    <img src="{{ asset('images/potensi-pertanian.jpg') }}" onerror="this.style.display='none'" class="w-100 h-100 object-fit-cover" alt="Pertanian">
                    <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
                        <h6 class="fw-bold mb-0">Pertanian</h6>
                        <small class="text-light">Lahan subur 574 Ha</small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Perkebunan -->
        <div class="col-md-3 col-6">
            <a href="{{ url('halaman/perkebunan') }}" class="text-decoration-none text-white">
                <div class="card border-0 rounded-4 overflow-hidden position-relative transition-hover bg-secondary" style="height: 180px;">
                    <img src="{{ asset('images/potensi-perkebunan.jpg') }}" onerror="this.style.display='none'" class="w-100 h-100 object-fit-cover" alt="Perkebunan">
                    <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
                        <h6 class="fw-bold mb-0">Perkebunan</h6>
                        <small class="text-light">Tebu, Kopi, Kelapa</small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Peternakan -->
        <div class="col-md-3 col-6">
            <a href="{{ url('halaman/peternakan') }}" class="text-decoration-none text-white">
                <div class="card border-0 rounded-4 overflow-hidden position-relative transition-hover bg-secondary" style="height: 180px;">
                    <img src="{{ asset('images/potensi-peternakan.jpg') }}" onerror="this.style.display='none'" class="w-100 h-100 object-fit-cover" alt="Peternakan">
                    <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
                        <h6 class="fw-bold mb-0">Peternakan</h6>
                        <small class="text-light">Sapi & Kambing</small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Budaya -->
        <div class="col-md-3 col-6">
            <a href="{{ url('halaman/seni-tradisi') }}" class="text-decoration-none text-white">
                <div class="card border-0 rounded-4 overflow-hidden position-relative transition-hover bg-secondary" style="height: 180px;">
                    <img src="{{ asset('images/potensi-budaya.jpg') }}" onerror="this.style.display='none'" class="w-100 h-100 object-fit-cover" alt="Seni Budaya">
                    <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
                        <h6 class="fw-bold mb-0">Seni Budaya</h6>
                        <small class="text-light">Seni Tradisi Jawa</small>
                    </div>
                </div>
            </a>
        </div>
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

<!-- Banner Pengaduan dengan ID -->
<div class="container mb-5" id="pengaduan-masyarakat">
    <div class="bg-success text-white rounded-4 p-4 p-md-5 position-relative overflow-hidden shadow">
        <div class="position-relative z-index-1">
            <div class="d-flex align-items-center mb-2"><i class="bi bi-megaphone me-2"></i> <small class="text-uppercase tracking-wide">Layanan Masyarakat</small></div>
            <h2 class="fw-bold mb-3">Sampaikan Pengaduan Anda</h2>
            <p class="mb-4">Kami siap mendengar dan menyelesaikan setiap masalah dengan cepat</p>
            <a href="mailto:arjosari@malangkab.go.id" class="btn btn-outline-light rounded-pill px-4">Kirim Email Pengaduan <i class="bi bi-envelope ms-2"></i></a>
        </div>
        <div class="position-absolute top-0 end-0 bg-white opacity-10 rounded-circle" style="width: 300px; height: 300px; transform: translate(30%, -30%);"></div>
    </div>
</div>
@endsection