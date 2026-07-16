<?php

namespace Database\Seeders;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================================================
        // 1. DATA AKUN ADMIN & PENGATURAN AWAL
        // =========================================================
        User::updateOrCreate(
            ['email' => 'admin@arjosari.desa.id'],
            [
                'name' => 'Admin Desa',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );

        Setting::updateOrCreate(['key' => 'penduduk'], ['value' => '7.019']);
        Setting::updateOrCreate(['key' => 'kk'], ['value' => '1.940']);
        Setting::updateOrCreate(['key' => 'luas'], ['value' => '1.490,7']);
        Setting::updateOrCreate(['key' => 'dusun'], ['value' => '6']);

        // =========================================================
        // 2. HALAMAN STATIS (HTML UTUH UNTUK TINYMCE)
        // =========================================================
        
        Page::updateOrCreate(
            ['slug' => 'sejarah-desa'],
            ['title' => 'Sejarah Desa Arjosari', 'content' => '<div class="content-text" style="line-height: 1.8;"><p class="lead fw-semibold text-success">Desa Arjosari pada awalnya merupakan kawasan hutan belukar yang dikenal dengan nama Hutan "Bata Luluh" Gunung Kendeng.</p><p>Sejarah pembukaan desa dimulai pada tahun 1899 yang dipimpin oleh Mbah Tirtokromo dari Surakarta dan Mbah Tambuh dari Ponorogo. Mereka mulai membuka lahan di area yang tinggi (puthuk\'an), yang kini dikenal sebagai Dusun Tumpakmiri.</p><h5 class="fw-bold mt-4 mb-3">Pemekaran dan Kepala Desa Pertama</h5><p>Pada awalnya, wilayah ini masih berstatus pedukuhan di bawah Pemerintahan Desa Pangganglele (sekarang Desa Arjowilangun). Barulah pada tahun 1905, terjadi pemekaran wilayah yang melahirkan Desa Arjosari secara mandiri.</p><p>Pemilihan Kepala Desa pertama dilaksanakan pada tanggal 29 Mei 1905 menggunakan sistem "Bitingan", dan Bapak Singowarso terpilih sebagai Kepala Desa Arjosari yang pertama (1905-1918). Saat ini, kepemimpinan desa diteruskan oleh Bapak Imam Mahmudi, S.Pd.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'data-kependudukan'],
            ['title' => 'Data Kependudukan', 'content' => '<div class="content-text"><p class="mb-4">Berdasarkan data kependudukan terbaru, Desa Arjosari memiliki kepadatan penduduk yang tersebar di wilayah seluas 1.490,70 Ha.</p><div class="row g-3 mb-4"><div class="col-md-4"><div class="card bg-primary text-white border-0 rounded-3 p-3 text-center h-100"><i class="bi bi-people fs-1 mb-2 opacity-50"></i><h2 class="fw-bold mb-0">7.019</h2><span class="small">Total Penduduk (Jiwa)</span></div></div><div class="col-md-4"><div class="card bg-info text-white border-0 rounded-3 p-3 text-center h-100"><i class="bi bi-gender-male fs-1 mb-2 opacity-50"></i><h2 class="fw-bold mb-0">3.461</h2><span class="small">Laki-laki (Jiwa)</span></div></div><div class="col-md-4"><div class="card bg-danger bg-opacity-75 text-white border-0 rounded-3 p-3 text-center h-100"><i class="bi bi-gender-female fs-1 mb-2 opacity-50"></i><h2 class="fw-bold mb-0">3.558</h2><span class="small">Perempuan (Jiwa)</span></div></div></div></div>']
        );
        
        Page::updateOrCreate(
            ['slug' => 'visi-misi'],
            ['title' => 'Visi dan Misi', 'content' => '<div class="content-text"><div class="text-center mb-5 bg-success bg-opacity-10 p-4 p-md-5 rounded-4 shadow-sm"><h4 class="fw-bold text-success mb-3">VISI</h4><p class="lead fw-semibold fst-italic text-dark mb-0">"Terwujudnya Desa Arjosari yang Mandiri, Sejahtera, dan Berbudaya melalui Tata Kelola Pemerintahan yang Baik dan Pembangunan yang Berkelanjutan."</p></div><div class="mt-5"><h4 class="fw-bold text-success mb-4 text-center">MISI</h4><ol class="list-group list-group-numbered list-group-flush border-0"><li class="list-group-item px-4 py-3 mb-2 bg-light rounded-3 border-0 shadow-sm">Meningkatkan kualitas tata kelola pemerintahan desa yang transparan, bersih, dan akuntabel.</li><li class="list-group-item px-4 py-3 mb-2 bg-light rounded-3 border-0 shadow-sm">Meningkatkan ketersediaan dan kualitas infrastruktur desa yang mendukung perekonomian dan aktivitas warga.</li><li class="list-group-item px-4 py-3 mb-2 bg-light rounded-3 border-0 shadow-sm">Mengoptimalkan pemberdayaan ekonomi masyarakat melalui sektor pertanian dan pendampingan UMKM.</li><li class="list-group-item px-4 py-3 mb-2 bg-light rounded-3 border-0 shadow-sm">Meningkatkan pelayanan dasar di bidang pendidikan dan kesehatan untuk menciptakan SDM yang unggul.</li><li class="list-group-item px-4 py-3 bg-light rounded-3 border-0 shadow-sm">Melestarikan nilai-nilai sosial budaya, agama, dan semangat gotong royong di tengah masyarakat.</li></ol></div></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'peta-wilayah'],
            ['title' => 'Peta Wilayah', 'content' => '<div class="content-text"><p class="mb-4">Desa Arjosari terletak di Kecamatan Kalipare, Kabupaten Malang, Provinsi Jawa Timur, dengan total luas wilayah mencapai 1.490,70 Hektar.</p><div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5"><div class="card-body p-0"><div class="ratio ratio-21x9"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15802.772591605335!2d112.50293625!3d-8.23150535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78a2f1ab1f1e31%3A0x6b49ebbc9a9b9220!2sArjosari%2C%20Kec.%20Kalipare%2C%20Kabupaten%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div></div></div><h5 class="fw-bold mb-3">Batas Wilayah Administratif</h5><div class="row g-3 mb-5"><div class="col-md-6"><div class="p-3 bg-light rounded-3 border-start border-4 border-success"><span class="d-block small text-muted fw-bold text-uppercase">Sebelah Utara</span><span class="fw-semibold">Desa Kalirejo & Desa Arjowilangun</span></div></div><div class="col-md-6"><div class="p-3 bg-light rounded-3 border-start border-4 border-success"><span class="d-block small text-muted fw-bold text-uppercase">Sebelah Selatan</span><span class="fw-semibold">Desa Sumberoto & Kec. Donomulyo</span></div></div><div class="col-md-6"><div class="p-3 bg-light rounded-3 border-start border-4 border-success"><span class="d-block small text-muted fw-bold text-uppercase">Sebelah Timur</span><span class="fw-semibold">Desa Tumpakrejo & Desa Arjowilangun</span></div></div><div class="col-md-6"><div class="p-3 bg-light rounded-3 border-start border-4 border-success"><span class="d-block small text-muted fw-bold text-uppercase">Sebelah Barat</span><span class="fw-semibold">Desa Sukorame & Kec. Binangun</span></div></div></div></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'pembagian-desa'],
            ['title' => 'Pembagian Desa', 'content' => '<div class="content-text"><p class="mb-4">Secara administratif, Desa Arjosari terbagi menjadi 6 (enam) wilayah Dusun yang masing-masing dipimpin oleh seorang Kepala Dusun (Kasun).</p><h5 class="fw-bold mb-3">Daftar Pembagian Dusun</h5><div class="row g-3 mb-5"><div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Sumbertimo</h5></div></div></div><div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Tumpakmiri</h5></div></div></div><div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Kedungwaru I</h5></div></div></div><div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Kedungwaru II</h5></div></div></div><div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Sidodadi</h5></div></div></div><div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Mentaraman</h5></div></div></div></div><h5 class="fw-bold mb-3">Topografi Wilayah</h5><p>Kondisi alam Desa Arjosari sangat bervariasi dengan pembagian pemanfaatan ruang sebagai berikut:</p><ul class="list-group list-group-flush mb-4"><li class="list-group-item d-flex justify-content-between align-items-center px-0">Kawasan Dataran Rendah <span class="badge bg-primary rounded-pill fs-6">1.081,00 Ha</span></li><li class="list-group-item d-flex justify-content-between align-items-center px-0">Kawasan Lereng Gunung <span class="badge bg-warning text-dark rounded-pill fs-6">175,00 Ha</span></li><li class="list-group-item d-flex justify-content-between align-items-center px-0">Kawasan Berbukit-bukit <span class="badge bg-secondary rounded-pill fs-6">105,00 Ha</span></li><li class="list-group-item d-flex justify-content-between align-items-center px-0">Kawasan Dataran Tinggi / Pegunungan <span class="badge bg-success rounded-pill fs-6">104,00 Ha</span></li></ul></div>']
        );

        // =========================================================
        // 3. HALAMAN DINAMIS (HANYA PENGANTAR SAJA)
        // =========================================================

        Page::updateOrCreate(
            ['slug' => 'pemerintahan'],
            ['title' => 'Pemerintahan Desa', 'content' => '<div class="content-text"><p class="mb-4">Pemerintah Desa Arjosari dipimpin oleh seorang Kepala Desa dan dibantu oleh perangkat desa serta Kepala Dusun untuk melayani masyarakat di 6 wilayah dusun.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'pertanian'],
            ['title' => 'Potensi Pertanian', 'content' => '<div class="content-text"><p>Sektor pertanian merupakan tulang punggung perekonomian di Desa Arjosari. Masyarakat mengelola lahan tegal/ladang yang luasnya mencapai 574 Ha. Berikut adalah komoditas utama tanaman pangan yang dihasilkan:</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'perkebunan'],
            ['title' => 'Potensi Perkebunan', 'content' => '<div class="content-text"><p>Sektor perkebunan mencakup lahan seluas 267 Ha yang didominasi oleh tanah perkebunan rakyat (103 Ha) dan perorangan (164 Ha). Berikut adalah primadona perekonomian perkebunan di Arjosari:</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'peternakan'],
            ['title' => 'Potensi Peternakan', 'content' => '<div class="content-text"><p>Peternakan berkembang sangat baik di Desa Arjosari, didukung oleh ketersediaan pakan dari hasil pertanian warga. Sapi dan kambing menjadi ternak peliharaan mayoritas penduduk.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'seni-tradisi'],
            ['title' => 'Seni Tradisi', 'content' => '<div class="content-text"><p class="mb-4">Desa Arjosari terus berupaya melestarikan seni dan budaya lokal sebagai bagian dari identitas masyarakat.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'peninggalan'],
            ['title' => 'Peninggalan & Situs Sejarah', 'content' => '<div class="content-text"><p class="mb-4">Tercatat desa ini memiliki potensi situs sejarah serta peninggalan kuno.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'adat-istiadat'],
            ['title' => 'Adat Istiadat', 'content' => '<div class="content-text"><p class="mb-4">Masyarakat Desa Arjosari sangat memegang teguh nilai-nilai kebudayaan lokal.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'agenda-desa'],
            ['title' => 'Agenda Desa', 'content' => '<div class="content-text"><p class="mb-4">Jadwal kegiatan, musyawarah, dan acara penting yang akan dilaksanakan di lingkungan Desa Arjosari.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'info-pembangunan'],
            ['title' => 'Info Pembangunan', 'content' => '<div class="content-text"><p class="mb-4">Transparansi progres pembangunan infrastruktur fisik dan non-fisik di wilayah Desa Arjosari.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'apbdes'],
            ['title' => 'Transparansi APBDes', 'content' => '<div class="content-text"><p class="mb-4">Berikut adalah Laporan Transparansi Anggaran Pendapatan dan Belanja Desa (APBDes) Arjosari tahun berjalan.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'status-idm'],
            ['title' => 'Status IDM (Indeks Desa Membangun)', 'content' => '<div class="content-text"><p class="mb-4">Status Indeks Desa Membangun (IDM) Desa Arjosari berdasarkan sinkronisasi data dari Kemendes PDTT.</p></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'indikator-idm'],
            ['title' => 'Indikator IDM', 'content' => '<div class="content-text"><p>Rincian skor komposit pembentuk Indeks Desa Membangun (IDM) Desa Arjosari.</p></div>']
        );

        // =========================================================
        // 4. HALAMAN UPLOAD GAMBAR BEBAS VIA TINYMCE
        // =========================================================

        Page::updateOrCreate(
            ['slug' => 'dana-desa'], 
            ['title' => 'Realisasi Dana Desa', 'content' => '<div class="content-text"><p class="mb-4">Berikut adalah informasi pemanfaatan Dana Desa (DD) yang dialokasikan oleh Pemerintah Pusat.</p> <i>(Silakan klik Edit Halaman untuk menyisipkan infografis/gambar laporan di sini)</i></div>']
        );

        Page::updateOrCreate(
            ['slug' => 'perkembangan-idm'],
            ['title' => 'Perkembangan IDM', 'content' => '<div class="content-text"><p class="mb-4">Riwayat perkembangan status Indeks Desa Membangun dari tahun ke tahun.</p> <i>(Silakan klik Edit Halaman untuk menyisipkan gambar grafik tren IDM dari web Kemendes di sini)</i></div>']
        );
    }
}