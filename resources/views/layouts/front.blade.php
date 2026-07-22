<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ $pageTitle ?? ($page->title ?? 'Beranda') }} | Desa Arjosari - Sistem Informasi Desa</title>
    
    <meta name="description" content="Website Resmi Pemerintah Desa Arjosari, Kecamatan Kalipare, Kabupaten Malang. Transparansi informasi, potensi desa, dan pelayanan masyarakat.">
    <meta name="keywords" content="Desa Arjosari, Kalipare, Malang, Sistem Informasi Desa, APBDes Arjosari">
    
    <link rel="icon" href="{{ asset('images/logo-desa.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-desa.png') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        .transition-hover { transition: all 0.3s ease; }
        .transition-hover:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="bg-light">

    <!-- 1. BAGIAN NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-success" href="{{ url('/') }}">
                <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Arjosari" style="height: 40px; width: auto;" class="me-2">
                Desa Arjosari
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
    <!-- Beranda -->
    <li class="nav-item">
        <a class="nav-link {{ request()->is('/') ? 'text-success fw-bold' : '' }}" href="{{ url('/') }}">Beranda</a>
    </li>
    
    <!-- Dropdown Profil -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->is('halaman/sejarah-desa', 'halaman/visi-misi', 'halaman/pemerintahan', 'halaman/data-kependudukan') ? 'text-success fw-bold' : '' }}" href="#" data-bs-toggle="dropdown">Profil Desa</a>
        <ul class="dropdown-menu border-0 shadow-sm">
            <li><a class="dropdown-item" href="{{ url('halaman/sejarah-desa') }}">Sejarah Desa</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/visi-misi') }}">Visi dan Misi</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/pemerintahan') }}">Pemerintahan</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/data-kependudukan') }}">Data Kependudukan</a></li>
        </ul>
    </li>

    <!-- Dropdown Peta -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->is('halaman/peta-wilayah', 'halaman/pembagian-desa') ? 'text-success fw-bold' : '' }}" href="#" data-bs-toggle="dropdown">Peta Desa</a>
        <ul class="dropdown-menu border-0 shadow-sm">
            <li><a class="dropdown-item" href="{{ url('halaman/peta-wilayah') }}">Peta Wilayah</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/pembagian-desa') }}">Pembagian Dusun</a></li>
        </ul>
    </li>

    <!-- Dropdown Potensi Desa -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->is('halaman/pertanian', 'halaman/perkebunan', 'halaman/peternakan') ? 'text-success fw-bold' : '' }}" href="#" data-bs-toggle="dropdown">Potensi Desa</a>
        <ul class="dropdown-menu border-0 shadow-sm">
            <li><a class="dropdown-item" href="{{ url('halaman/pertanian') }}">Pertanian</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/perkebunan') }}">Perkebunan</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/peternakan') }}">Peternakan</a></li>
        </ul>
    </li>

    <!-- Dropdown Berita -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->is('halaman/pengumuman', 'halaman/agenda-desa') ? 'text-success fw-bold' : '' }}" href="#" data-bs-toggle="dropdown">Berita</a>
        <ul class="dropdown-menu border-0 shadow-sm">
            <li><a class="dropdown-item" href="{{ url('halaman/pengumuman') }}">Pengumuman</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/agenda-desa') }}">Agenda Desa</a></li>
        </ul>
    </li>

    <!-- Dropdown Budaya -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->is('halaman/seni-tradisi', 'halaman/peninggalan', 'halaman/adat-istiadat') ? 'text-success fw-bold' : '' }}" href="#" data-bs-toggle="dropdown">Budaya</a>
        <ul class="dropdown-menu border-0 shadow-sm">
            <li><a class="dropdown-item" href="{{ url('halaman/seni-tradisi') }}">Seni Tradisi</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/peninggalan') }}">Peninggalan</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/adat-istiadat') }}">Adat Istiadat</a></li>
        </ul>
    </li>

    <!-- Dropdown Pembangunan -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->is('halaman/info-pembangunan', 'halaman/apbdes', 'halaman/dana-desa') ? 'text-success fw-bold' : '' }}" href="#" data-bs-toggle="dropdown">Pembangunan</a>
        <ul class="dropdown-menu border-0 shadow-sm">
            <li><a class="dropdown-item" href="{{ url('halaman/info-pembangunan') }}">Info Pembangunan</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/apbdes') }}">APBDes</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/dana-desa') }}">Dana Desa</a></li>
        </ul>
    </li>

    <!-- Dropdown IDM -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->is('halaman/status-idm', 'halaman/indikator-idm', 'halaman/perkembangan-idm') ? 'text-success fw-bold' : '' }}" href="#" data-bs-toggle="dropdown">IDM</a>
        <ul class="dropdown-menu border-0 shadow-sm">
            <li><a class="dropdown-item" href="{{ url('halaman/status-idm') }}">Status IDM</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/indikator-idm') }}">Indikator IDM</a></li>
            <li><a class="dropdown-item" href="{{ url('halaman/perkembangan-idm') }}">Perkembangan IDM</a></li>
        </ul>
    </li>
        </ul>
                
                <div class="d-flex align-items-center gap-3 ms-lg-3 mt-3 mt-lg-0">
                    <a href="{{ url('/#pengaduan-masyarakat') }}" class="btn btn-success rounded-pill px-4">Pengaduan</a>
                    
                    @auth
                        <div class="dropdown">
                            <a href="#" class="text-danger transition-hover d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false" title="Menu Admin">
                                <i class="bi bi-person-check-fill" style="font-size: 1.5rem; line-height: 0;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-3 rounded-3">
                                <li><a class="dropdown-item py-2 fw-semibold text-dark" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2 text-success"></i> Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 text-danger fw-semibold">
                                            <i class="bi bi-box-arrow-right me-2"></i> Keluar Admin
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ url('/login') }}" class="text-success transition-hover" title="Login Admin" style="font-size: 1.5rem; line-height: 0;">
                            <i class="bi bi-box-arrow-in-right"></i>
                        </a>
                    @endauth
                </div>
                
            </div>
        </div>
    </nav>

    <!-- 2. BAGIAN KONTEN -->
    <main>
        @yield('content')
    </main>

    <!-- 3. BAGIAN FOOTER -->
    <footer class="text-white pt-5 pb-4 mt-auto" style="background-color: #1a2332;">
        <div class="container">
            <div class="row g-4">
                
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Arjosari" style="width: 45px !important; height: auto;" class="me-3" onerror="this.style.display='none'">
                        <h5 class="fw-bold mb-0">Desa Arjosari</h5>
                    </div>
                    <p class="small text-white-50 mb-4" style="line-height: 1.8;">
                        Jl. Raya Arjosari, Kec. Kalipare, Kab. Malang,<br>
                        Jawa Timur 65165
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle px-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle px-2"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle px-2"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold mb-3 text-uppercase" style="letter-spacing: 1px;">Navigasi</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ url('/') }}" class="text-white-50 text-decoration-none transition-hover">→ Beranda</a></li>
                        <li class="mb-2"><a href="{{ url('halaman/sejarah-desa') }}" class="text-white-50 text-decoration-none transition-hover">→ Profil Desa</a></li>
                        <li class="mb-2"><a href="{{ url('halaman/peta-wilayah') }}" class="text-white-50 text-decoration-none transition-hover">→ Peta Desa</a></li>
                        <li class="mb-2"><a href="{{ url('halaman/pertanian') }}" class="text-white-50 text-decoration-none transition-hover">→ Potensi Desa</a></li>
                        <li class="mb-2"><a href="{{ url('halaman/pengumuman') }}" class="text-white-50 text-decoration-none transition-hover">→ Berita</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold mb-3 text-uppercase" style="letter-spacing: 1px;">Kontak</h6>
                    <ul class="list-unstyled small text-white-50">
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-telephone text-success me-3 fs-5"></i> 
                            <a href="tel:0341123456" class="text-white-50 text-decoration-none">(0341) 123456</a>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-envelope text-success me-3 fs-5"></i> 
                            <a href="mailto:arjosari@malangkab.go.id" class="text-white-50 text-decoration-none">arjosari@malangkab.go.id</a>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-globe text-success me-3 fs-5"></i> 
                            <a href="{{ url('/') }}" class="text-white-50 text-decoration-none">desaarjosari.desa.id</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold mb-3 text-uppercase" style="letter-spacing: 1px;">Lokasi</h6>
                    
                    <a href="https://www.google.com/maps/place/Arjosari,+Kec.+Kalipare,+Kabupaten+Malang,+Jawa+Timur" target="_blank" class="text-decoration-none">
                        <div class="card border-0 bg-dark bg-opacity-25 text-center py-4 rounded-3 transition-hover" style="border: 1px solid rgba(255,255,255,0.1) !important;">
                            <i class="bi bi-geo-alt text-success mb-2" style="font-size: 2rem;"></i>
                            <span class="text-white small">Buka Maps</span>
                        </div>
                    </a>
                    
                    <div class="mt-2 text-start">
                        <a href="https://www.google.com/maps/place/Arjosari,+Kec.+Kalipare,+Kabupaten+Malang,+Jawa+Timur" target="_blank" class="text-success small text-decoration-none transition-hover">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Google Maps
                        </a>
                    </div>
                </div>

            </div>
            
            <hr class="border-secondary my-4" style="opacity: 0.3;">
            
            <div class="text-center small text-white-50">
                © {{ date('Y') }} Desa Arjosari. All rights reserved. Powered by Sistem Informasi Desa
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>