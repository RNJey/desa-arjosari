@extends('layouts.app')

@section('content')
<!-- Header Halaman Dinamis -->
<div class="bg-success bg-opacity-10 py-5">
    <div class="container text-center py-4">
        <!-- Memanggil Judul dari Database -->
        <h1 class="fw-bold text-dark mb-3">{{ $page->title }}</h1>
        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-success text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row gy-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                <!-- Memanggil Konten HTML dari Database -->
                {!! $page->content !!}
            </div>
        </div>

        <!-- Kolom Kanan: Sidebar -->
        <div class="col-lg-4">
            <!-- Widget Menu Dinamis -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                    <!-- Judul Sidebar Otomatis -->
                    <h6 class="fw-bold"><i class="bi bi-list text-success me-2"></i> Menu {{ $activeGroup['title'] }}</h6>
                </div>
                <div class="card-body p-4">
                    <div class="list-group list-group-flush">
                        <!-- Looping Link Sidebar Otomatis -->
                        @foreach($activeGroup['links'] as $linkSlug => $linkTitle)
                            <a href="{{ url('halaman/'.$linkSlug) }}" 
                               class="list-group-item list-group-item-action {{ $page->slug == $linkSlug ? 'text-success fw-bold' : '' }}">
                                <i class="bi bi-chevron-right small me-2"></i> {{ $linkTitle }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Widget Banner Bantuan -->
            <div class="card border-0 shadow-sm rounded-4 bg-success text-white text-center p-4">
                <i class="bi bi-question-circle fs-1 mb-3"></i>
                <h6 class="fw-bold">Butuh Bantuan?</h6>
                <p class="small mb-3">Hubungi pemerintah desa untuk informasi lebih lanjut.</p>
                <a href="#" class="btn btn-outline-light btn-sm rounded-pill">Kontak Kami</a>
            </div>
        </div>
    </div>
</div>
@endsection