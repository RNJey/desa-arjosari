<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Setting;
use App\Models\Post;
use App\Http\Controllers\PageController;

// ==========================================
// 1. RUTE PUBLIK (BERANDA & HALAMAN DESA)
// ==========================================

// Rute Beranda
Route::get('/', function () {
    $settings = Setting::pluck('value', 'key')->toArray();
    $beritaTerbaru = Post::latest()->take(2)->get();
    
    return view('welcome', compact('settings', 'beritaTerbaru'));
})->name('beranda');

// Rute Daftar Pengumuman (Menampilkan semua berita) - HARUS DI SINI
Route::get('/halaman/pengumuman', function () {
    $semuaPengumuman = Post::latest()->get();
    return view('pengumuman', compact('semuaPengumuman'));
});

// Rute Baca Pengumuman Spesifik
Route::get('/berita/{slug}', function ($slug) {
    $berita = Post::where('slug', $slug)->firstOrFail();
    return view('baca-berita', compact('berita'));
});

// Rute Halaman Dinamis (Sejarah, Peta, Potensi, dll) - HARUS DI BAWAH
Route::get('/halaman/{slug}', [PageController::class, 'showDynamic']);


// ==========================================
// 2. RUTE DASHBOARD ADMIN (BUTUH LOGIN)
// ==========================================

Route::get('/dashboard', function () {
    $settings = Setting::pluck('value', 'key')->toArray();
    return view('dashboard', compact('settings'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/dashboard/settings', function (\Illuminate\Http\Request $request) {
    $data = $request->only(['penduduk', 'kk', 'luas', 'dusun']);
    foreach ($data as $key => $value) {
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }
    return back()->with('success', 'Data statistik desa berhasil diperbarui!');
})->middleware(['auth'])->name('settings.update');


// ==========================================
// 3. RUTE KELOLA BERITA (ADMIN)
// ==========================================

Route::get('/admin/berita', function () {
    $berita = Post::latest()->get();
    return view('admin-berita', compact('berita'));
})->middleware(['auth'])->name('admin.berita');

Route::post('/admin/berita', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'title' => 'required', 
        'content' => 'required'
    ], [
        'title.required' => 'Judul pengumuman wajib diisi.',
        'content.required' => 'Isi pengumuman tidak boleh kosong.'
    ]);
    
    Post::create([
        'title' => $request->title,
        'slug' => \Illuminate\Support\Str::slug($request->title) . '-' . time(),
        'content' => $request->content,
        'category' => 'Pengumuman',
    ]);
    
    return back()->with('success', 'Pengumuman baru berhasil diterbitkan!');
})->middleware(['auth'])->name('admin.berita.store');

Route::delete('/admin/berita/{id}', function ($id) {
    Post::destroy($id);
    return back()->with('success', 'Pengumuman berhasil dihapus.');
})->middleware(['auth'])->name('admin.berita.destroy');

// ==========================================
// HALAMAN PROFIL (GAYA WIKIPEDIA EDITING)
// ==========================================

// 1. Menampilkan Halaman Publik (Ada tombol edit rahasia untuk admin)
Route::get('/halaman/{slug}', function ($slug) {
    $page = \App\Models\Page::where('slug', $slug)->firstOrFail();
    return view('pages.show', compact('page'));
});

// 2. Menampilkan Mode Edit (Hanya bisa diakses admin)
Route::get('/halaman/{slug}/edit', function ($slug) {
    $page = \App\Models\Page::where('slug', $slug)->firstOrFail();
    return view('pages.edit', compact('page'));
})->middleware(['auth']);

// 3. Menyimpan Perubahan
Route::put('/halaman/{slug}', function (\Illuminate\Http\Request $request, $slug) {
    $page = \App\Models\Page::where('slug', $slug)->firstOrFail();
    $page->update(['content' => $request->content]);
    
    return redirect('/halaman/'.$slug)->with('success', 'Halaman berhasil diperbarui!');
})->middleware(['auth']);


// ==========================================
// 4. RUTE PROFIL ADMIN (BAWAAN BREEZE)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';