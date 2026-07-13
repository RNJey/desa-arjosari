<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Setting;
use App\Models\Post;
use App\Http\Controllers\PageController;

// ==========================================
// 1. RUTE PUBLIK (BERANDA & HALAMAN DESA)
// ==========================================

// Rute Beranda (Mengirim data Setting & Berita ke welcome.blade.php)
Route::get('/', function () {
    $settings = Setting::pluck('value', 'key')->toArray();
    $beritaTerbaru = Post::latest()->take(2)->get();
    
    return view('welcome', compact('settings', 'beritaTerbaru'));
})->name('beranda');

// Rute Halaman Dinamis (Sejarah, Peta, Potensi, dll)
Route::get('/halaman/{slug}', [PageController::class, 'showDynamic']);


// ==========================================
// 2. RUTE DASHBOARD ADMIN (BUTUH LOGIN)
// ==========================================

// Menampilkan halaman form dashboard
Route::get('/dashboard', function () {
    $settings = Setting::pluck('value', 'key')->toArray();
    
    return view('dashboard', compact('settings'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk memproses/menyimpan perubahan form statistik
Route::post('/dashboard/settings', function (\Illuminate\Http\Request $request) {
    $data = $request->only(['penduduk', 'kk', 'luas', 'dusun']);
    
    foreach ($data as $key => $value) {
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }
    
    return back()->with('success', 'Data statistik desa berhasil diperbarui!');
})->middleware(['auth'])->name('settings.update');


// ==========================================
// 3. RUTE PROFIL ADMIN (BAWAAN BREEZE)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';