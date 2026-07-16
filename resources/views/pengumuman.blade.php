@extends('layouts.front')
@section('content')

<!-- Header Halaman -->
<div class="py-5" style="background-color: #eef5f1;">
    <div class="container text-center py-4">
        <h1 class="fw-bold text-dark mb-3">{{ $pageTitle }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 small">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-success text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Konten Utama -->
<div class="container py-5" style="min-height: 50vh;">
    <div class="row g-4">
        
        <!-- Kolom Kiri: Daftar Konten -->
        <div class="col-lg-8">
            <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                
                <p class="text-muted mb-4">
                    @if($pageTitle == 'Agenda Desa')
                        Jadwal kegiatan, musyawarah, dan acara penting yang akan dilaksanakan di lingkungan Desa Arjosari.
                    @else
                        Informasi dan pengumuman resmi terbaru dari Pemerintah Desa Arjosari untuk masyarakat.
                    @endif
                </p>

                <!-- ============================================== -->
                <!-- TAMPILAN KHUSUS AGENDA DESA (CARD KALENDER)    -->
                <!-- ============================================== -->
                @if($pageTitle == 'Agenda Desa')
                    <div class="row g-4">
                        @forelse($semuaPengumuman as $item)
                        @php
                            // Parsing tanggal, jika admin lupa mengisi event_date, pakai tanggal dibuatnya berita
                            $tgl = $item->event_date ? \Carbon\Carbon::parse($item->event_date) : $item->created_at;
                            $jam = $item->event_time ? \Carbon\Carbon::parse($item->event_time)->format('H:i') : '-';
                            $lokasi = $item->event_location ?? 'Desa Arjosari';
                        @endphp
                        <div class="col-md-6">
                            <a href="{{ url('berita/' . $item->slug) }}" class="text-decoration-none">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 border-start border-4 border-warning transition-hover bg-light bg-opacity-50">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 text-center p-2 me-3 shadow-sm" style="min-width: 65px;">
                                            <h4 class="fw-bold mb-0">{{ $tgl->format('d') }}</h4>
                                            <small class="fw-semibold text-uppercase">{{ $tgl->format('M') }}</small>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1 text-dark">{{ $item->title }}</h6>
                                            <small class="text-muted d-block"><i class="bi bi-clock me-1"></i> {{ $jam }} WIB</small>
                                            <small class="text-muted d-block mt-1"><i class="bi bi-geo-alt me-1"></i> {{ $lokasi }}</small>
                                        </div>
                                    </div>
                                    <div class="text-muted small mt-2">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 70) }}
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-calendar-x text-muted fs-1 block mb-3"></i>
                            <h5 class="text-muted">Belum ada agenda desa terbaru</h5>
                        </div>
                        @endforelse
                    </div>

                <!-- ============================================== -->
                <!-- TAMPILAN KHUSUS PENGUMUMAN (LIST BIASA)        -->
                <!-- ============================================== -->
                @else
                    @forelse($semuaPengumuman as $index => $item)
                        @php
                            $borderColors = ['border-danger', 'border-success', 'border-primary', 'border-warning'];
                            $color = $borderColors[$index % count($borderColors)];
                        @endphp
                        <a href="{{ url('berita/' . $item->slug) }}" class="text-decoration-none transition-hover block">
                            <div class="card border-0 shadow-sm rounded-4 mb-4 border-start {{ $color }} border-4 bg-light bg-opacity-50">
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
                @endif
            </div>
        </div>

        <!-- Kolom Kanan: Sidebar Menu -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3"><i class="bi bi-megaphone me-2"></i> Menu Informasi</h6>
                    <div class="list-group list-group-flush">
                        <a href="{{ url('halaman/pengumuman') }}" class="list-group-item list-group-item-action px-0 border-0 {{ Request::is('halaman/pengumuman') ? 'text-success fw-bold' : 'text-dark' }}">
                            <i class="bi bi-chevron-right me-2 small"></i> Pengumuman
                        </a>
                        <a href="{{ url('halaman/agenda-desa') }}" class="list-group-item list-group-item-action px-0 border-0 {{ Request::is('halaman/agenda-desa') ? 'text-success fw-bold' : 'text-dark' }}">
                            <i class="bi bi-chevron-right me-2 small"></i> Agenda Desa
                        </a>
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