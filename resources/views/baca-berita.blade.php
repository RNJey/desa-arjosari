@extends('layouts.front')

@section('content')
<!-- Header Halaman (Background Hijau Lembut) -->
<div class="py-5" style="background-color: #eef5f1;">
    <div class="container text-center py-4">
        <h1 class="fw-bold text-dark mb-3">Detail Pengumuman</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 small">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-success text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/halaman/pengumuman') }}" class="text-success text-decoration-none">Pengumuman</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Konten Utama -->
<div class="container py-5" style="min-height: 50vh;">
    <div class="row g-4">
        
        <!-- Kolom Kiri: Isi Artikel -->
        <div class="col-lg-8">
            <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                <!-- Label & Tanggal -->
                <div class="d-flex align-items-center mb-3 small">
                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill me-3">{{ $berita->category ?? 'Pengumuman' }}</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i> {{ $berita->created_at->format('d M Y') }}</span>
                </div>
                
                <!-- Judul -->
                <h2 class="fw-bold text-dark mb-4 pb-3 border-bottom">{{ $berita->title }}</h2>
                
                <!-- Konten dari TinyMCE -->
                <div class="konten-berita" style="line-height: 1.8; font-size: 1.05rem; color: #4a5568;">
                    {!! $berita->content !!}
                </div>
                
                <!-- Tombol Kembali -->
                <div class="mt-5 pt-4 border-top">
                    <a href="{{ url('/halaman/pengumuman') }}" class="btn btn-outline-success rounded-pill px-4 transition-hover">
                        <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Pengumuman
                    </a>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Sidebar -->
        <div class="col-lg-4">
            
            <!-- Menu Berita -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3"><i class="bi bi-list me-2"></i> Menu Berita</h6>
                    <div class="list-group list-group-flush">
                        <a href="{{ url('halaman/pengumuman') }}" class="list-group-item list-group-item-action px-0 border-0 text-success fw-semibold">
                            <i class="bi bi-chevron-right me-2 small"></i> Pengumuman
                        </a>
                        <a href="{{ url('halaman/agenda-desa') }}" class="list-group-item list-group-item-action px-0 border-0 text-dark">
                            <i class="bi bi-chevron-right me-2 small"></i> Agenda Desa
                        </a>
                    </div>
                </div>
            </div>

            <!-- Banner Bantuan -->
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