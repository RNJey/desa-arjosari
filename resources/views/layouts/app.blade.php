<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Arjosari</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        .transition-hover { transition: transform 0.2s ease-in-out; }
        .transition-hover:hover { transform: translateY(-5px); }
        /* CSS Khusus agar teks Footer terang dan terbaca */
        .footer-text { color: #cbd5e1 !important; } 
    </style>
</head>
<body class="bg-light">

    <!-- 1. BAGIAN NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-success" href="{{ url('/') }}">
                <div class="bg-success text-white rounded-circle d-inline-flex justify-content-center align-items-center me-2" style="width: 35px; height: 35px; font-size: 14px;">DA</div>
                Desa Arjosari
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link text-success fw-bold" href="{{ url('/') }}">Beranda</a></li>
                    
                    <!-- Dropdown Profil -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil Desa</a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item" href="#">Sejarah Desa</a></li>
                            <li><a class="dropdown-item" href="#">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="#">Pemerintahan</a></li>
                            <li><a class="dropdown-item" href="#">Data Kependudukan</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown Peta -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Peta Desa</a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item" href="#">Peta Wilayah</a></li>
                            <li><a class="dropdown-item" href="#">Pembagian Desa</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown Produk -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Produk Desa</a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item" href="#">Potensi Desa</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown Berita -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Berita</a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item" href="#">Pengumuman</a></li>
                            <li><a class="dropdown-item" href="#">Agenda Desa</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown Budaya -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Budaya</a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item" href="#">Seni Tradisi</a></li>
                            <li><a class="dropdown-item" href="#">Peninggalan</a></li>
                            <li><a class="dropdown-item" href="#">Adat Istiadat</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown Pembangunan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pembangunan</a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item" href="#">Info Pembangunan</a></li>
                            <li><a class="dropdown-item" href="#">APBDes</a></li>
                            <li><a class="dropdown-item" href="#">Dana Desa</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown IDM -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">IDM</a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item" href="#">Status IDM</a></li>
                            <li><a class="dropdown-item" href="#">Indikator IDM</a></li>
                            <li><a class="dropdown-item" href="#">Perkembangan IDM</a></li>
                        </ul>
                    </li>
                </ul>
                <a href="#" class="btn btn-success rounded-pill px-4">Pengaduan</a>
            </div>
        </div>
    </nav>

    <!-- 2. BAGIAN KONTEN DINAMIS -->
    <main>
        @yield('content')
    </main>

    <!-- 3. BAGIAN FOOTER -->
    <footer class="pt-5 pb-4 mt-auto" style="background-color: #1a202c;">
        <div class="container">
            <div class="row g-4">
                <!-- Brand & Address -->
                <div class="col-md-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-circle d-inline-flex justify-content-center align-items-center me-2" style="width: 40px; height: 40px; font-size: 16px; font-weight: bold;">DA</div>
                        <h5 class="fw-bold mb-0 text-white">Desa Arjosari</h5>
                    </div>
                    <!-- Menggunakan class footer-text custom agar terang -->
                    <p class="small footer-text mb-4">Jl. Raya Arjosari, Kec. Kalipare, Kab. Malang,<br>Jawa Timur 65165</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle" style="width: 35px; height: 35px;"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle" style="width: 35px; height: 35px;"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle" style="width: 35px; height: 35px;"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Navigasi -->
                <div class="col-md-2">
                    <h6 class="fw-bold mb-3 text-uppercase text-white">Navigasi</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="footer-text text-decoration-none"><i class="bi bi-arrow-right text-success me-1"></i> Beranda</a></li>
                        <li class="mb-2"><a href="#" class="footer-text text-decoration-none"><i class="bi bi-arrow-right text-success me-1"></i> Profil Desa</a></li>
                        <li class="mb-2"><a href="#" class="footer-text text-decoration-none"><i class="bi bi-arrow-right text-success me-1"></i> Peta Desa</a></li>
                        <li class="mb-2"><a href="#" class="footer-text text-decoration-none"><i class="bi bi-arrow-right text-success me-1"></i> Produk Desa</a></li>
                        <li class="mb-2"><a href="#" class="footer-text text-decoration-none"><i class="bi bi-arrow-right text-success me-1"></i> Berita</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3 text-uppercase text-white">Kontak</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2 footer-text"><i class="bi bi-telephone text-success me-2"></i> (0341) 123456</li>
                        <li class="mb-2 footer-text"><i class="bi bi-envelope text-success me-2"></i> arjosari@malangkab.go.id</li>
                        <li class="mb-2 footer-text"><i class="bi bi-globe text-success me-2"></i> desaarjosari.desa.id</li>
                    </ul>
                </div>

                <!-- Lokasi -->
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3 text-uppercase text-white">Lokasi</h6>
                    <div class="bg-dark border border-secondary rounded-3 d-flex flex-column align-items-center justify-content-center p-4 mb-2" style="cursor: pointer;">
                        <i class="bi bi-geo-alt text-success fs-3 mb-2"></i>
                        <span class="small footer-text">Buka Maps</span>
                    </div>
                    <a href="#" class="text-success text-decoration-none small"><i class="bi bi-box-arrow-up-right me-1"></i> Google Maps</a>
                </div>
            </div>
            
            <hr class="border-secondary mt-4 mb-3">
            <div class="text-center small footer-text">
                &copy; 2026 Desa Arjosari. All rights reserved. Powered by Sistem Informasi Desa
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>