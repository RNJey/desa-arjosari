@extends('layouts.front')

@section('content')
<!-- Header Halaman (Background Hijau Lembut) -->
<div class="py-5" style="background-color: #eef5f1;">
    <div class="container text-center py-4">
        <h1 class="fw-bold text-dark mb-3">Pengumuman Desa</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 small">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-success text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengumuman Desa</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Konten Utama -->
<div class="container py-5" style="min-height: 50vh;">
    <div class="row g-4">
        
        <!-- Kolom Kiri: Daftar Berita -->
        <div class="col-lg-8">
            <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                <p class="text-muted mb-4">Informasi dan pengumuman resmi terbaru dari Pemerintah Desa Arjosari untuk masyarakat.</p>

                <!-- Looping Data dari Database -->
                @forelse($semuaPengumuman as $index => $item)
                    @php
                        // Membuat warna garis pinggir bervariasi
                        $borderColors = ['border-danger', 'border-success', 'border-primary', 'border-warning'];
                        $color = $borderColors[$index % count($borderColors)];
                    @endphp
                    <a href="{{ url('berita/' . $item->slug) }}" class="text-decoration-none transition-hover block">
                        <div class="card border-0 shadow-sm rounded-4 mb-4 border-start {{ $color }} border-4">
                            <div class="card-body p-4">
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-2">
                                    <h5 class="fw-bold text-dark mb-2 mb-md-0">{{ $item->title }}</h5>
                                    <small class="text-muted text-nowrap">
                                        <i class="bi bi-clock me-1"></i> {{ $item->created_at->format('d M Y') }}
                                    </small>
                                </div>
                                <p class="text-muted small mb-0">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-5">
                        <i class="bi bi-inbox text-muted fs-1 block mb-3"></i>
                        <h5 class="text-muted">Belum ada pengumuman</h5>
                    </div>
                @endforelse

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
                    <p class="small mb-4 text-white">Hubungi pemerintah desa untuk informasi lebih lanjut.</p>
                    <a href="{{ url('/#pengaduan-masyarakat') }}" class="btn btn-outline-light rounded-pill w-100">Kontak Kami</a>
                </div>
            </div>

        </div>
        
    </div>
</div>
@endsection