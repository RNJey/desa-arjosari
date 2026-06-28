<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

// Halaman Beranda Utama
Route::get('/', function () {
    return view('welcome');
})->name('beranda');

// Group Route untuk Profil Desa
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/sejarah', [PageController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [PageController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/pemerintahan', [PageController::class, 'pemerintahan'])->name('pemerintahan');
    Route::get('/kependudukan', [PageController::class, 'kependudukan'])->name('kependudukan');
});

// Group Route untuk Peta Desa
Route::prefix('peta')->name('peta.')->group(function () {
    Route::get('/wilayah', [PageController::class, 'petaWilayah'])->name('wilayah');
    Route::get('/pembagian', [PageController::class, 'pembagian'])->name('pembagian');
});

// Route Berita / Informasi Publik (Memakai PostController)
Route::get('/berita', [PostController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [PostController::class, 'show'])->name('berita.show');

// Alternatif Super Cepat (Catch-All Halaman Statis)
// Jika kamu menyimpan "sejarah", "visi-misi" di tabel `pages`, cukup 1 route ini:
Route::get('/halaman/{slug}', [PageController::class, 'showDynamic'])->name('halaman.show');

// Route bawaan sistem Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');