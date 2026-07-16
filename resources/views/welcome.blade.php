@extends('layouts.front')

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
    <!-- Bagian Judul yang Sudah Diselaraskan -->
    <div class="mb-4">
        <h3 class="fw-bold text-dark mb-1">Informasi & Transparansi</h3>
        <p class="text-muted small mb-0">Pengumuman resmi publik dan pengelolaan anggaran keuangan Desa Arjosari</p>
    </div>

    <!-- Widget Pengumuman & APBDes -->
    <div class="row g-4 mb-5">
        <!-- Widget Pengumuman -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0"><i class="bi bi-megaphone text-danger me-2"></i> Pengumuman Desa</h5>
                    <a href="{{ url('halaman/pengumuman') }}" class="small text-decoration-none text-success fw-semibold">Lihat Semua</a>
                </div>
                <div class="list-group list-group-flush">
                    @forelse($beritaTerbaru as $berita)
                        <a href="{{ url('halaman/pengumuman') }}" class="list-group-item list-group-item-action px-0 border-0 mb-3 transition-hover">
                            <span class="badge bg-danger bg-opacity-10 text-danger mb-2">{{ $berita->category ?? 'Pengumuman' }}</span>
                            <h6 class="fw-bold mb-1">{{ $berita->title }}</h6>
                            <small class="text-muted">
                                <i class="bi bi-clock me-1"></i> {{ $berita->created_at->format('d M Y') }}
                            </small>
                        </a>
                    @empty
                        <div class="text-center py-4">
                            <i class="bi bi-inbox text-muted fs-1 block mb-2"></i>
                            <p class="text-muted small mb-0">Belum ada pengumuman terbaru.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Widget APBDes -->
        <div class="col-md-6">
            <a href="{{ url('halaman/apbdes') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 bg-success text-white position-relative overflow-hidden transition-hover">
                    <div class="position-relative z-index-1">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0"><i class="bi bi-pie-chart text-white me-2"></i> Transparansi APBDes</h5>
                            <span class="small text-white text-opacity-75">Detail <i class="bi bi-arrow-right"></i></span>
                        </div>
                        <p class="small text-white text-opacity-75 mb-1">Total Anggaran Belanja & Penerimaan</p>
                        <h2 class="fw-bold mb-4">{{ $settings['apbdes_total'] ?? 'Rp 0' }}</h2>
                        
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center">
                                    <small class="d-block text-white text-opacity-75 mb-1">Pendapatan Desa</small>
                                    <span class="fw-bold">{{ $settings['apbdes_pendapatan'] ?? 'Rp 0' }}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center">
                                    <small class="d-block text-white text-opacity-75 mb-1">Alokasi Belanja</small>
                                    <span class="fw-bold">{{ $settings['apbdes_belanja'] ?? 'Rp 0' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
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
                        <h6 class="fw-bold mb-0 text-white">Pertanian</h6>
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
                        <h6 class="fw-bold mb-0 text-white">Perkebunan</h6>
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
                        <h6 class="fw-bold mb-0 text-white">Peternakan</h6>
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
                    <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);">
                        <h6 class="fw-bold mb-0 text-white">Seni Budaya</h6>
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
        <!-- Widget Info Pembangunan -->
        <div class="col-md-4">
            <a href="{{ url('halaman/info-pembangunan') }}" class="text-decoration-none text-dark">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <h6 class="fw-bold mb-4"><i class="bi bi-graph-up-arrow text-success me-2"></i> Info Pembangunan</h6>
                        
                        @forelse($pembangunanTerbaru as $item)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between small mb-1">
                                    <span>{{ $item->nama_proyek }}</span>
                                    <span class="fw-bold text-success">{{ $item->persentase }}%</span>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-success" style="width: {{ $item->persentase }}%;"></div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted small text-center py-2">Belum ada data pembangunan.</p>
                        @endforelse

                    </div>
                </div>
            </a>
        </div>

        <!-- Widget Status IDM -->
        <div class="col-md-4">
            <a href="{{ url('halaman/status-idm') }}" class="text-decoration-none text-dark">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3"><i class="bi bi-star text-warning me-2"></i> Status IDM</h6>
                        <div class="text-center bg-success bg-opacity-10 rounded-3 py-3 mb-4">
                            <h2 class="fw-bold text-success mb-1">{{ $settings['idm_skor'] ?? '0.0000' }}</h2>
                            <span class="badge bg-success rounded-pill px-3">{{ $settings['idm_status'] ?? 'Menunggu Data' }}</span>
                        </div>
                        <div class="d-flex justify-content-between small border-bottom pb-2 mb-2"><span>Indeks Sosial</span><span class="fw-bold">{{ $settings['idm_sosial'] ?? '0' }}</span></div>
                        <div class="d-flex justify-content-between small"><span>Indeks Ekonomi</span><span class="fw-bold">{{ $settings['idm_ekonomi'] ?? '0' }}</span></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Widget Agenda Desa -->
        <div class="col-md-4">
            <a href="{{ url('halaman/agenda-desa') }}" class="text-decoration-none text-dark">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 transition-hover">
                    <div class="card-body">
                        <h6 class="fw-bold mb-4"><i class="bi bi-calendar-event text-primary me-2"></i> Agenda Desa</h6>
                        
                        @forelse($agendaTerbaru as $agenda)
                            @php
                                $aTgl = $agenda->event_date ? \Carbon\Carbon::parse($agenda->event_date) : $agenda->created_at;
                                $aJam = $agenda->event_time ? \Carbon\Carbon::parse($agenda->event_time)->format('H:i') : '-';
                            @endphp
                            <div class="d-flex mb-3 align-items-center">
                                <div class="text-center me-3" style="min-width: 50px;">
                                    <div class="fw-bold text-success" style="font-size: 1.2rem;">{{ $aTgl->format('d') }}</div>
                                    <div class="small text-success text-uppercase fw-semibold">{{ $aTgl->format('M') }}</div>
                                </div>
                                <div>
                                    <div class="fw-semibold small text-dark mb-1">{{ $agenda->title }}</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">
                                        <i class="bi bi-clock"></i> {{ $aJam }} WIB 
                                        @if($agenda->event_location)
                                        | <i class="bi bi-geo-alt"></i> {{ \Illuminate\Support\Str::limit($agenda->event_location, 15) }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-muted small py-4">Belum ada agenda terdekat.</div>
                        @endforelse
                        
                    </div>
                </div>
            </a>
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