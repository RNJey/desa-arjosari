@extends('layouts.front')

@section('content')
<div class="py-5" style="background-color: #eef5f1;">
    <div class="container text-center py-4">
        <h1 class="fw-bold text-dark mb-3">Edit: {{ $page->title }}</h1>
    </div>
</div>

<div class="container py-5" style="min-height: 50vh;">
    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="bg-white p-4 p-md-5 rounded-4 shadow border border-warning border-2">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                    <h4 class="fw-bold text-dark m-0">
                        <i class="bi bi-pencil-square text-warning me-2"></i> Mode Edit Cepat
                    </h4>
                    <a href="{{ url('/halaman/'.$page->slug) }}" class="btn btn-light rounded-pill px-4 border transition-hover">
                        Batal
                    </a>
                </div>
                
                <form action="{{ url('/halaman/'.$page->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            tinymce.init({
                                selector: '.rich-editor',
                                plugins: 'lists link image table code help wordcount',
                                toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | table',
                                menubar: false,
                                height: 500,
                            });
                        });
                    </script>
                    
                    <div class="mb-4">
                        <textarea name="content" class="rich-editor w-100">{!! $page->content !!}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success rounded-pill w-100 py-3 fs-5 fw-bold shadow-sm transition-hover">
                        <i class="bi bi-save me-2"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 bg-light text-center p-4">
                <div class="card-body">
                    <i class="bi bi-info-circle fs-1 text-warning mb-3"></i>
                    <h6 class="fw-bold mb-2">Petunjuk Edit</h6>
                    <p class="small text-muted mb-0">
                        Anda bebas menambahkan teks, menebalkan tulisan, memasukkan tabel, atau menyisipkan *link* gambar melalui editor di samping layaknya mengetik di MS Word.
                        <br><br>
                        Pastikan Anda mengeklik tombol <b>Simpan Perubahan</b> di bagian bawah setelah selesai mengedit!
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection