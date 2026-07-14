<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Setting;
use App\Models\Post;

// ==========================================
// 1. RUTE PUBLIK (BERANDA & BERITA)
// ==========================================
Route::get('/', function () {
    $settings = Setting::pluck('value', 'key')->toArray();
    $beritaTerbaru = Post::latest()->take(2)->get();
    
    return view('welcome', compact('settings', 'beritaTerbaru'));
})->name('beranda');

Route::get('/halaman/pengumuman', function () {
    $semuaPengumuman = Post::latest()->get();
    return view('pengumuman', compact('semuaPengumuman'));
});

Route::get('/berita/{slug}', function ($slug) {
    $berita = Post::where('slug', $slug)->firstOrFail();
    return view('baca-berita', compact('berita'));
});


// ==========================================
// 2. RUTE DASHBOARD ADMIN & STATISTIK
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
// 4. RUTE KELOLA POTENSI DESA (ADMIN)
// ==========================================
Route::get('/admin/potensi', function () {
    $potensi = \App\Models\Potensi::latest()->get();
    return view('admin-potensi', compact('potensi'));
})->middleware(['auth'])->name('admin.potensi');

Route::post('/admin/potensi', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'kategori' => 'required',
        'nama_komoditas' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Validasi foto
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('potensi-images', 'public');
    }

    \App\Models\Potensi::create([
        'kategori' => $request->kategori,
        'nama_komoditas' => $request->nama_komoditas,
        'deskripsi' => $request->deskripsi,
        'info_1' => $request->info_1,
        'info_2' => $request->info_2,
        'image' => $imagePath, // Menyimpan nama file foto ke database
    ]);
    return back()->with('success', 'Data potensi berhasil ditambahkan!');
})->middleware(['auth'])->name('admin.potensi.store');

Route::delete('/admin/potensi/{id}', function ($id) {
    $potensi = \App\Models\Potensi::findOrFail($id);
    // Hapus foto fisik dari folder jika ada
    if ($potensi->image) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($potensi->image);
    }
    $potensi->delete();
    return back()->with('success', 'Potensi Desa berhasil dihapus!');
})->middleware(['auth'])->name('admin.potensi.destroy');


// ==========================================
// 5. HALAMAN PROFIL DINAMIS (WIKIPEDIA EDIT)
// ==========================================

// Menampilkan Mode Edit (Hanya bisa diakses admin)
Route::get('/halaman/{slug}/edit', function ($slug) {
    $page = \App\Models\Page::where('slug', $slug)->firstOrFail();
    return view('pages.edit', compact('page'));
})->middleware(['auth']);

// Menyimpan Perubahan Teks
Route::put('/halaman/{slug}', function (\Illuminate\Http\Request $request, $slug) {
    $page = \App\Models\Page::where('slug', $slug)->firstOrFail();
    $page->update(['content' => $request->content]);
    
    return redirect('/halaman/'.$slug)->with('success', 'Halaman berhasil diperbarui!');
})->middleware(['auth']);

// Menampilkan Halaman Publik (Harus diletakkan di Paling Bawah)
Route::get('/halaman/{slug}', function ($slug) {
    $page = \App\Models\Page::where('slug', $slug)->firstOrFail();
    
    // Menarik Data Potensi (Jika halaman yang dibuka adalah halaman potensi)
    $potensiData = collect();
    if (in_array($slug, ['pertanian', 'perkebunan', 'peternakan'])) {
        $kategori = ucfirst($slug); // Mengubah "pertanian" menjadi "Pertanian"
        $potensiData = \App\Models\Potensi::where('kategori', $kategori)->latest()->get();
    }
    
    return view('pages.show', compact('page', 'potensiData'));
});


// ==========================================
// 6. RUTE PROFIL ADMIN (BAWAAN BREEZE)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';