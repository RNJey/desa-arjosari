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
    $beritaTerbaru = Post::where('category', 'Pengumuman')->latest()->take(2)->get();
    $agendaTerbaru = Post::where('category', 'Agenda')->latest('event_date')->take(2)->get();
    $pembangunanTerbaru = \App\Models\Pembangunan::latest()->take(3)->get(); // Tambahan Pembangunan
    
    return view('welcome', compact('settings', 'beritaTerbaru', 'agendaTerbaru', 'pembangunanTerbaru'));
})->name('beranda');

// RUTE PENGUMUMAN
Route::get('/halaman/pengumuman', function () {
    $semuaPengumuman = \App\Models\Post::where('category', 'Pengumuman')->latest()->get();
    $pageTitle = 'Pengumuman Desa';
    return view('pengumuman', compact('semuaPengumuman', 'pageTitle'));
});

// RUTE AGENDA
Route::get('/halaman/agenda-desa', function () {
    $semuaPengumuman = \App\Models\Post::where('category', 'Agenda')->latest()->get();
    $pageTitle = 'Agenda Desa';
    return view('pengumuman', compact('semuaPengumuman', 'pageTitle'));
});

Route::get('/berita/{slug}', function ($slug) {
    $berita = \App\Models\Post::where('slug', $slug)->firstOrFail();
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
    // Tambahkan kunci (key) baru untuk APBDes dan IDM
    $data = $request->only([
        'penduduk', 'kk', 'luas', 'dusun',
        'apbdes_total', 'apbdes_pendapatan', 'apbdes_belanja',
        'idm_skor', 'idm_status', 'idm_sosial', 'idm_ekonomi'
    ]);
    
    foreach ($data as $key => $value) {
        \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }
    return back()->with('success', 'Data statistik & transparansi berhasil diperbarui!');
})->middleware(['auth'])->name('settings.update');


// ==========================================
// 3. RUTE KELOLA BERITA (ADMIN)
// ==========================================
Route::get('/admin/berita', function () {
    $berita = \App\Models\Post::latest()->get();
    return view('admin-berita', compact('berita'));
})->middleware(['auth'])->name('admin.berita');

Route::post('/admin/berita', function (\Illuminate\Http\Request $request) {
    // 1. Ubah validasi content menjadi 'nullable' (boleh kosong)
    $request->validate([
        'title' => 'required', 
        'category' => 'required',
        'content' => 'nullable' 
    ]);
    
    // 2. Simpan ke database dengan kalimat default jika kosong
    \App\Models\Post::create([
        'title' => $request->title,
        'slug' => \Illuminate\Support\Str::slug($request->title) . '-' . time(),
        'content' => $request->content ?? '<p>Tidak ada deskripsi tambahan untuk informasi ini.</p>',
        'category' => $request->category,
        'event_date' => $request->event_date,
        'event_time' => $request->event_time,
        'event_location' => $request->event_location,
    ]);
    return back()->with('success', 'Informasi baru berhasil diterbitkan!');
})->middleware(['auth'])->name('admin.berita.store');

Route::delete('/admin/berita/{id}', function ($id) {
    \App\Models\Post::destroy($id);
    return back()->with('success', 'Informasi berhasil dihapus.');
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
// 5. RUTE KELOLA BUDAYA (ADMIN)
// ==========================================
Route::get('/admin/budaya', function () {
    $budaya = \App\Models\Budaya::latest()->get();
    return view('admin-budaya', compact('budaya'));
})->middleware(['auth'])->name('admin.budaya');

Route::post('/admin/budaya', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'kategori' => 'required',
        'nama_budaya' => 'required',
    ]);

    \App\Models\Budaya::create($request->except('_token'));
    return back()->with('success', 'Data Budaya berhasil ditambahkan!');
})->middleware(['auth'])->name('admin.budaya.store');

Route::delete('/admin/budaya/{id}', function ($id) {
    \App\Models\Budaya::findOrFail($id)->delete();
    return back()->with('success', 'Data Budaya berhasil dihapus!');
})->middleware(['auth'])->name('admin.budaya.destroy');

// ==========================================
// 6. RUTE KELOLA PEMBANGUNAN (ADMIN)
// ==========================================
Route::get('/admin/pembangunan', function () {
    $pembangunan = \App\Models\Pembangunan::latest()->get();
    return view('admin-pembangunan', compact('pembangunan'));
})->middleware(['auth'])->name('admin.pembangunan');

Route::post('/admin/pembangunan', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'nama_proyek' => 'required',
        'persentase' => 'required|numeric|min:0|max:100',
    ]);

    \App\Models\Pembangunan::create($request->except('_token'));
    return back()->with('success', 'Data Proyek Pembangunan berhasil ditambahkan!');
})->middleware(['auth'])->name('admin.pembangunan.store');

Route::delete('/admin/pembangunan/{id}', function ($id) {
    \App\Models\Pembangunan::findOrFail($id)->delete();
    return back()->with('success', 'Proyek berhasil dihapus!');
})->middleware(['auth'])->name('admin.pembangunan.destroy');

// ==========================================
// 7. RUTE KELOLA PERANGKAT DESA (ADMIN)
// ==========================================
Route::get('/admin/perangkat', function () {
    $perangkat = \App\Models\PerangkatDesa::all(); 
    return view('admin-perangkat', compact('perangkat'));
})->middleware(['auth'])->name('admin.perangkat');

Route::post('/admin/perangkat', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'nama' => 'required',
        'jabatan' => 'required',
        'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
    ]);

    $imagePath = null;
    if ($request->hasFile('foto_profil')) {
        $imagePath = $request->file('foto_profil')->store('perangkat-images', 'public');
    }

    \App\Models\PerangkatDesa::create([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'foto_profil' => $imagePath,
    ]);
    return back()->with('success', 'Data Perangkat Desa berhasil ditambahkan!');
})->middleware(['auth'])->name('admin.perangkat.store');

Route::delete('/admin/perangkat/{id}', function ($id) {
    $perangkat = \App\Models\PerangkatDesa::findOrFail($id);
    // Hapus foto fisik dari penyimpanan jika ada
    if ($perangkat->foto_profil) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($perangkat->foto_profil);
    }
    $perangkat->delete();
    return back()->with('success', 'Data berhasil dihapus!');
})->middleware(['auth'])->name('admin.perangkat.destroy');

// ==========================================
// HALAMAN PROFIL DINAMIS (WIKIPEDIA EDIT)
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
    
    // Tarik data Pengaturan (Untuk APBDes & IDM) ---> INI TAMBAHAN BARU
    $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
    
    // 1. Tarik Data Potensi
    $potensiData = collect();
    if (in_array($slug, ['pertanian', 'perkebunan', 'peternakan'])) {
        $kategori = ucfirst($slug);
        $potensiData = \App\Models\Potensi::where('kategori', $kategori)->latest()->get();
    }

    // 2. Tarik Data Budaya
    $budayaData = collect();
    if (in_array($slug, ['seni-tradisi', 'peninggalan', 'adat-istiadat'])) {
        $kategori = '';
        if($slug == 'seni-tradisi') $kategori = 'Seni Tradisi';
        if($slug == 'peninggalan') $kategori = 'Peninggalan';
        if($slug == 'adat-istiadat') $kategori = 'Adat Istiadat';
        
        $budayaData = \App\Models\Budaya::where('kategori', $kategori)->latest()->get();
    }

    // Tarik data Budaya
    $budayaData = collect();
    if (in_array($slug, ['seni-tradisi', 'peninggalan', 'adat-istiadat'])) {
        $kategori = '';
        if($slug == 'seni-tradisi') $kategori = 'Seni Tradisi';
        if($slug == 'peninggalan') $kategori = 'Peninggalan';
        if($slug == 'adat-istiadat') $kategori = 'Adat Istiadat';
        $budayaData = \App\Models\Budaya::where('kategori', $kategori)->latest()->get();
    }

    // Tarik data Pembangunan
    $pembangunanData = collect();
    if ($slug == 'info-pembangunan') {
        $pembangunanData = \App\Models\Pembangunan::latest()->get();
    }

    // Tarik data Perangkat Desa (TAMBAHAN BARU)
    $perangkatData = collect();
    if ($slug == 'pemerintahan') {
        $perangkatData = \App\Models\PerangkatDesa::all(); 
    }
    
    // Pastikan $perangkatData ikut dikirim ke view
    return view('pages.show', compact('page', 'potensiData', 'budayaData', 'settings', 'pembangunanData', 'perangkatData'));
});

// ==========================================
// RUTE KHUSUS UPLOAD GAMBAR TINYMCE
// ==========================================
Route::post('/upload-image', function (\Illuminate\Http\Request $request) {
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        // Buat nama file unik agar tidak bentrok
        $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
        // Simpan ke folder storage/app/public/uploads
        $path = $file->storeAs('uploads', $filename, 'public');
        // Kembalikan URL gambarnya ke TinyMCE
        return response()->json(['location' => asset('storage/' . $path)]);
    }
    return response()->json(['error' => 'Gagal mengunggah.'], 400);
})->name('upload.image');


// ==========================================
// RUTE PROFIL ADMIN (BAWAAN BREEZE)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';