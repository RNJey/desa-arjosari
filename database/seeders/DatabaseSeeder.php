<?php

namespace Database\Seeders;
use App\Models\Setting;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\Page;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

    // Membuat Akun Admin Permanen
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@arjosari.desa.id'],
            [
                'name' => 'Admin Desa',
                'password' => bcrypt('password123'), // Password default
                'email_verified_at' => now(),
            ]
        );

    // --- DATA SINKRONISASI HALAMAN UTAMA ---
        
        // 1. Data Statistik (Settings)
        Setting::updateOrCreate(['key' => 'penduduk'], ['value' => '7.019']);
        Setting::updateOrCreate(['key' => 'kk'], ['value' => '1.940']);
        Setting::updateOrCreate(['key' => 'luas'], ['value' => '1.490,7']);
        Setting::updateOrCreate(['key' => 'dusun'], ['value' => '6']);

        // 2. Data Berita Terbaru (Posts)
        Post::updateOrCreate(
            ['slug' => 'musyawarah-desa-apbdes'],
            [
                'title' => 'Musyawarah Desa Arjosari Bahas APBD Tahun Depan',
                'category' => 'Informasi Publik',
                'image' => 'https://source.unsplash.com/800x400/?meeting,village',
                'content' => 'Pemerintah Desa Arjosari menggelar musyawarah perencanaan pembangunan desa yang dihadiri oleh seluruh elemen masyarakat...'
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'panen-raya-jagung'],
            [
                'title' => 'Panen Raya Jagung Hibrida Kelompok Tani',
                'category' => 'Potensi Desa',
                'image' => 'https://source.unsplash.com/800x400/?harvest,corn',
                'content' => 'Kelompok tani di Dusun Krajan berhasil melakukan panen raya jagung hibrida dengan hasil yang meningkat signifikan...'
            ]
        );
        
        // 1. Data Sejarah Desa
        Page::updateOrCreate(
            ['slug' => 'sejarah-desa'],
            [
                'title' => 'Sejarah Desa Arjosari',
                'content' => '
                    <div class="content-text" style="line-height: 1.8;">
                        <p class="lead fw-semibold text-success">Desa Arjosari pada awalnya merupakan kawasan hutan belukar yang dikenal dengan nama Hutan "Bata Luluh" Gunung Kendeng.</p>
                        <p>Sejarah pembukaan desa dimulai pada tahun 1899 yang dipimpin oleh Mbah Tirtokromo dari Surakarta dan Mbah Tambuh dari Ponorogo. Mereka mulai membuka lahan di area yang tinggi (puthuk\'an), yang kini dikenal sebagai Dusun Tumpakmiri.</p>
                        <h5 class="fw-bold mt-4 mb-3">Pemekaran dan Kepala Desa Pertama</h5>
                        <p>Pada awalnya, wilayah ini masih berstatus pedukuhan di bawah Pemerintahan Desa Pangganglele (sekarang Desa Arjowilangun). Barulah pada tahun 1905, terjadi pemekaran wilayah yang melahirkan Desa Arjosari secara mandiri.</p>
                        <p>Pemilihan Kepala Desa pertama dilaksanakan pada tanggal 29 Mei 1905 menggunakan sistem "Bitingan", dan Bapak Singowarso terpilih sebagai Kepala Desa Arjosari yang pertama (1905-1918). Saat ini, kepemimpinan desa diteruskan oleh Bapak Imam Mahmudi, S.Pd.</p>
                    </div>
                '
            ]
        );

        // 2. Data Pemerintahan
        Page::updateOrCreate(
            ['slug' => 'pemerintahan'],
            [
                'title' => 'Pemerintahan Desa',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Pemerintah Desa Arjosari dipimpin oleh seorang Kepala Desa dan dibantu oleh perangkat desa serta Kepala Dusun untuk melayani masyarakat di 6 wilayah dusun.</p>
                        
                        <h5 class="fw-bold mb-3">Daftar Perangkat Desa</h5>
                        <div class="table-responsive mb-5">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-success">
                                    <tr><th>Jabatan</th><th>Nama Pejabat</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td class="fw-semibold">Kepala Desa</td><td>Imam Mahmudi, S.Pd</td></tr>
                                    <tr><td class="fw-semibold">Sekretaris Desa</td><td>Reni Saputra</td></tr>
                                    <tr><td class="fw-semibold">Kaur Umum</td><td>Nurul Hudi</td></tr>
                                    <tr><td class="fw-semibold">Kaur Keuangan</td><td>Nidia Putri</td></tr>
                                    <tr><td class="fw-semibold">Kaur Perencanaan</td><td>Harmadi</td></tr>
                                    <tr><td class="fw-semibold">Kasi Pemerintahan</td><td>Yohanes Ade S.</td></tr>
                                    <tr><td class="fw-semibold">Kasi Kesejahteraan</td><td>Sujiyo</td></tr>
                                    <tr><td class="fw-semibold">Kasi Pelayanan</td><td>Imam Syahroni</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="fw-bold mb-3">Daftar Kepala Dusun (Kasun) per Wilayah</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-success">
                                    <tr><th>Wilayah Dusun</th><th>Nama Kepala Dusun</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td class="fw-semibold">Dusun Sumbertimo</td><td>Joko Subekti</td></tr>
                                    <tr><td class="fw-semibold">Dusun Tumpakmiri</td><td>Suli Nurcholis</td></tr>
                                    <tr><td class="fw-semibold">Dusun Kedungwaru I</td><td>Sundarianto</td></tr>
                                    <tr><td class="fw-semibold">Dusun Kedungwaru II</td><td>Piyudianto</td></tr>
                                    <tr><td class="fw-semibold">Dusun Sidodadi</td><td>Yoyok Eko Ermawan</td></tr>
                                    <tr><td class="fw-semibold">Dusun Mentaraman</td><td>Ahmad Syahri</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                '
            ]
        );

        // 3. Data Kependudukan
        Page::updateOrCreate(
            ['slug' => 'data-kependudukan'],
            [
                'title' => 'Data Kependudukan',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Berdasarkan data kependudukan terbaru, Desa Arjosari memiliki kepadatan penduduk yang tersebar di wilayah seluas 1.490,70 Ha.</p>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4"><div class="card bg-primary text-white border-0 rounded-3 p-3 text-center h-100"><i class="bi bi-people fs-1 mb-2 opacity-50"></i><h2 class="fw-bold mb-0">7.019</h2><span class="small">Total Penduduk (Jiwa)</span></div></div>
                            <div class="col-md-4"><div class="card bg-info text-white border-0 rounded-3 p-3 text-center h-100"><i class="bi bi-gender-male fs-1 mb-2 opacity-50"></i><h2 class="fw-bold mb-0">3.461</h2><span class="small">Laki-laki (Jiwa)</span></div></div>
                            <div class="col-md-4"><div class="card bg-danger bg-opacity-75 text-white border-0 rounded-3 p-3 text-center h-100"><i class="bi bi-gender-female fs-1 mb-2 opacity-50"></i><h2 class="fw-bold mb-0">3.558</h2><span class="small">Perempuan (Jiwa)</span></div></div>
                        </div>
                    </div>
                '
            ]
        );
        
        // 4. Data Visi dan Misi
        Page::updateOrCreate(
            ['slug' => 'visi-misi'],
            [
                'title' => 'Visi dan Misi',
                'content' => '
                    <div class="content-text">
                        <!-- Bagian VISI -->
                        <div class="text-center mb-5 bg-success bg-opacity-10 p-4 p-md-5 rounded-4 shadow-sm">
                            <h4 class="fw-bold text-success mb-3">VISI</h4>
                            <p class="lead fw-semibold fst-italic text-dark mb-0">"Terwujudnya Desa Arjosari yang Mandiri, Sejahtera, dan Berbudaya melalui Tata Kelola Pemerintahan yang Baik dan Pembangunan yang Berkelanjutan."</p>
                        </div>
                        
                        <!-- Bagian MISI -->
                        <div class="mt-5">
                            <h4 class="fw-bold text-success mb-4 text-center">MISI</h4>
                            <ol class="list-group list-group-numbered list-group-flush border-0">
                                <li class="list-group-item px-4 py-3 mb-2 bg-light rounded-3 border-0 shadow-sm">Meningkatkan kualitas tata kelola pemerintahan desa yang transparan, bersih, dan akuntabel.</li>
                                <li class="list-group-item px-4 py-3 mb-2 bg-light rounded-3 border-0 shadow-sm">Meningkatkan ketersediaan dan kualitas infrastruktur desa yang mendukung perekonomian dan aktivitas warga.</li>
                                <li class="list-group-item px-4 py-3 mb-2 bg-light rounded-3 border-0 shadow-sm">Mengoptimalkan pemberdayaan ekonomi masyarakat melalui sektor pertanian dan pendampingan UMKM.</li>
                                <li class="list-group-item px-4 py-3 mb-2 bg-light rounded-3 border-0 shadow-sm">Meningkatkan pelayanan dasar di bidang pendidikan dan kesehatan untuk menciptakan SDM yang unggul.</li>
                                <li class="list-group-item px-4 py-3 bg-light rounded-3 border-0 shadow-sm">Melestarikan nilai-nilai sosial budaya, agama, dan semangat gotong royong di tengah masyarakat.</li>
                            </ol>
                        </div>
                    </div>
                '
            ]
        );

        // 5. Data Peta Wilayah (Revisi Batas Utara & Timur)
        Page::updateOrCreate(
            ['slug' => 'peta-wilayah'],
            [
                'title' => 'Peta Wilayah',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Desa Arjosari terletak di Kecamatan Kalipare, Kabupaten Malang, Provinsi Jawa Timur, dengan total luas wilayah mencapai 1.490,70 Hektar.</p>
                        
                        <!-- Embed Google Maps -->
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
                            <div class="card-body p-0">
                                <div class="ratio ratio-21x9">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15802.772591605335!2d112.50293625!3d-8.23150535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78a2f1ab1f1e31%3A0x6b49ebbc9a9b9220!2sArjosari%2C%20Kec.%20Kalipare%2C%20Kabupaten%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>

                        <h5 class="fw-bold mb-3">Batas Wilayah Administratif</h5>
                        <div class="row g-3 mb-5">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border-start border-4 border-success">
                                    <span class="d-block small text-muted fw-bold text-uppercase">Sebelah Utara</span>
                                    <span class="fw-semibold">Desa Kalirejo & Desa Arjowilangun</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border-start border-4 border-success">
                                    <span class="d-block small text-muted fw-bold text-uppercase">Sebelah Selatan</span>
                                    <span class="fw-semibold">Desa Sumberoto & Kec. Donomulyo</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border-start border-4 border-success">
                                    <span class="d-block small text-muted fw-bold text-uppercase">Sebelah Timur</span>
                                    <span class="fw-semibold">Desa Tumpakrejo & Desa Arjowilangun</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border-start border-4 border-success">
                                    <span class="d-block small text-muted fw-bold text-uppercase">Sebelah Barat</span>
                                    <span class="fw-semibold">Desa Sukorame & Kec. Binangun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                '
            ]
        );

        // 6. Data Pembagian Desa
        Page::updateOrCreate(
            ['slug' => 'pembagian-desa'],
            [
                'title' => 'Pembagian Desa',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Secara administratif, Desa Arjosari terbagi menjadi 6 (enam) wilayah Dusun yang masing-masing dipimpin oleh seorang Kepala Dusun (Kasun). Wilayah-wilayah ini memiliki karakteristik topografi yang beragam, mulai dari dataran rendah hingga kawasan perbukitan.</p>

                        <h5 class="fw-bold mb-3">Daftar Pembagian Dusun</h5>
                        <div class="row g-3 mb-5">
                            <div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Sumbertimo</h5></div></div></div>
                            <div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Tumpakmiri</h5></div></div></div>
                            <div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Kedungwaru I</h5></div></div></div>
                            <div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Kedungwaru II</h5></div></div></div>
                            <div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Sidodadi</h5></div></div></div>
                            <div class="col-md-4"><div class="card bg-success text-white border-0 shadow-sm text-center py-3"><div class="card-body"><h5 class="fw-bold mb-0">Dusun Mentaraman</h5></div></div></div>
                        </div>

                        <h5 class="fw-bold mb-3">Topografi Wilayah</h5>
                        <p>Kondisi alam Desa Arjosari sangat bervariasi dengan pembagian pemanfaatan ruang sebagai berikut:</p>
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Kawasan Dataran Rendah
                                <span class="badge bg-primary rounded-pill fs-6">1.081,00 Ha</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Kawasan Lereng Gunung
                                <span class="badge bg-warning text-dark rounded-pill fs-6">175,00 Ha</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Kawasan Berbukit-bukit
                                <span class="badge bg-secondary rounded-pill fs-6">105,00 Ha</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Kawasan Dataran Tinggi / Pegunungan
                                <span class="badge bg-success rounded-pill fs-6">104,00 Ha</span>
                            </li>
                        </ul>
                    </div>
                '
            ]
        );

        // 7. Data Pertanian
        Page::updateOrCreate(
            ['slug' => 'pertanian'],
            [
                'title' => 'Potensi Pertanian',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Sektor pertanian merupakan tulang punggung perekonomian di Desa Arjosari. Masyarakat mengelola lahan tegal/ladang yang luasnya mencapai 574 Ha. Berikut adalah komoditas utama tanaman pangan yang dihasilkan:</p>
                        
                        <div class="row g-4 mb-4">
                            <!-- Jagung -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 border-start border-4 border-warning">
                                    <h5 class="fw-bold text-dark mb-1">Jagung</h5>
                                    <p class="text-muted small mb-3">Komoditas pangan utama dengan nilai produksi tertinggi.</p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Luas: 131 Ha</span>
                                        <span class="fw-bold text-success">4 Ton/Ha</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Cabe -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 border-start border-4 border-danger">
                                    <h5 class="fw-bold text-dark mb-1">Cabe</h5>
                                    <p class="text-muted small mb-3">Ditanam luas oleh masyarakat untuk memenuhi kebutuhan pasar lokal.</p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <span class="badge bg-danger px-3 py-2 rounded-pill">Luas: 103 Ha</span>
                                        <span class="fw-bold text-success">0,12 Ton/Ha</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Kedelai -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 border-start border-4 border-success">
                                    <h5 class="fw-bold text-dark mb-1">Kacang Kedelai</h5>
                                    <p class="text-muted small mb-3">Menjadi komoditas unggulan ketiga di sektor palawija.</p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <span class="badge bg-success px-3 py-2 rounded-pill">Luas: 92 Ha</span>
                                        <span class="fw-bold text-success">0,72 Ton/Ha</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Kacang Tanah -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 border-start border-4 border-primary">
                                    <h5 class="fw-bold text-dark mb-1">Kacang Tanah</h5>
                                    <p class="text-muted small mb-3">Banyak dibudidayakan di lahan kering desa.</p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <span class="badge bg-primary px-3 py-2 rounded-pill">Luas: 22 Ha</span>
                                        <span class="fw-bold text-success">0,60 Ton/Ha</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="small text-muted">Selain komoditas di atas, masyarakat juga membudidayakan padi ladang, ubi kayu, alpokat (10,5 Ha), dan pisang (7 Ha).</p>
                    </div>
                '
            ]
        );

        // 8. Data Perkebunan
        Page::updateOrCreate(
            ['slug' => 'perkebunan'],
            [
                'title' => 'Potensi Perkebunan',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Sektor perkebunan mencakup lahan seluas 267 Ha yang didominasi oleh tanah perkebunan rakyat (103 Ha) dan perorangan (164 Ha). Tebu merupakan primadona perekonomian perkebunan di Arjosari.</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle text-center">
                                <thead class="table-success">
                                    <tr>
                                        <th>Jenis Komoditas</th>
                                        <th>Luas Lahan (Ha)</th>
                                        <th>Hasil Panen (Ton/Ha)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-start"><i class="bi bi-tree text-success me-2"></i>Tebu</td>
                                        <td>365,00</td>
                                        <td class="fw-semibold text-success">100,00</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-start"><i class="bi bi-tree text-success me-2"></i>Kopi</td>
                                        <td>10,50</td>
                                        <td class="fw-semibold text-success">0,80</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-start"><i class="bi bi-tree text-success me-2"></i>Kelapa</td>
                                        <td>5,00</td>
                                        <td class="fw-semibold text-success">8,00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                '
            ]
        );

        // 9. Data Peternakan
        Page::updateOrCreate(
            ['slug' => 'peternakan'],
            [
                'title' => 'Potensi Peternakan',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Peternakan berkembang sangat baik di Desa Arjosari, didukung oleh ketersediaan pakan dari hasil pertanian warga. Sapi dan kambing menjadi ternak peliharaan mayoritas penduduk.</p>
                        
                        <div class="row g-3 text-center mb-4">
                            <div class="col-6 col-md-4">
                                <div class="p-4 bg-light rounded-4 border-0 shadow-sm h-100">
                                    <h3 class="fw-bold text-success mb-1">2.938</h3>
                                    <p class="text-muted small fw-semibold mb-0">Ekor Sapi</p>
                                    <span class="badge bg-secondary mt-2">Dimiliki oleh 1.525 warga</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="p-4 bg-light rounded-4 border-0 shadow-sm h-100">
                                    <h3 class="fw-bold text-success mb-1">2.158</h3>
                                    <p class="text-muted small fw-semibold mb-0">Ekor Kambing</p>
                                    <span class="badge bg-secondary mt-2">Dimiliki oleh 520 warga</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="p-4 bg-light rounded-4 border-0 shadow-sm h-100">
                                    <h3 class="fw-bold text-success mb-1">11.000</h3>
                                    <p class="text-muted small fw-semibold mb-0">Ayam Broiler</p>
                                    <span class="badge bg-secondary mt-2">Peternakan skala besar</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="p-4 bg-light rounded-4 border-0 shadow-sm h-100">
                                    <h3 class="fw-bold text-success mb-1">4.500</h3>
                                    <p class="text-muted small fw-semibold mb-0">Angsa</p>
                                    <span class="badge bg-secondary mt-2">Dimiliki oleh 9 warga</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="p-4 bg-light rounded-4 border-0 shadow-sm h-100">
                                    <h3 class="fw-bold text-success mb-1">3.000</h3>
                                    <p class="text-muted small fw-semibold mb-0">Burung Puyuh</p>
                                    <span class="badge bg-secondary mt-2">Dimiliki oleh 3 warga</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="p-4 bg-light rounded-4 border-0 shadow-sm h-100">
                                    <h3 class="fw-bold text-success mb-1">800</h3>
                                    <p class="text-muted small fw-semibold mb-0">Ayam Kampung</p>
                                    <span class="badge bg-secondary mt-2">Ternak rumahan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                '
            ]
        );

        // 10. Data Seni Tradisi (Revisi Wayang Kulit)
        Page::updateOrCreate(
            ['slug' => 'seni-tradisi'],
            [
                'title' => 'Seni Tradisi',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Desa Arjosari terus berupaya melestarikan seni dan budaya lokal sebagai bagian dari identitas masyarakat. Terdapat beberapa kelompok kesenian yang masih aktif dan menjadi hiburan bagi warga.</p>
                        
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 border-bottom border-4 border-success text-center">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mx-auto mb-3" style="width: 70px; height: 70px; align-items: center; justify-content: center;">
                                        <i class="bi bi-music-note-beamed text-success fs-2"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">Grup Musik & Band</h5>
                                    <p class="text-muted small mb-3">Terdapat 3 unit grup musik/band yang aktif berkesenian di Desa Arjosari.</p>
                                    <span class="badge bg-light text-dark border">Menyerap 7 Tenaga Kesenian</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 border-bottom border-4 border-warning text-center">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mx-auto mb-3" style="width: 70px; height: 70px; align-items: center; justify-content: center;">
                                        <i class="bi bi-people text-warning fs-2"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">Wayang Kulit</h5>
                                    <p class="text-muted small mb-3">Seni pertunjukan tradisional yang masih dipertahankan dengan 3 unit perkumpulan.</p>
                                    <span class="badge bg-light text-dark border">Menyerap 2 Tenaga Kesenian</span>
                                </div>
                            </div>
                        </div>
                    </div>
                '
            ]
        );

        // 11. Data Peninggalan (Revisi Hapus Tugu Peringatan)
        Page::updateOrCreate(
            ['slug' => 'peninggalan'],
            [
                'title' => 'Peninggalan & Situs Sejarah',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Sejarah panjang Desa Arjosari meninggalkan beberapa jejak peradaban yang berharga. Tercatat desa ini memiliki potensi situs sejarah serta peninggalan 10 naskah kuno dan 1 barang pusaka.</p>
                        
                        <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                            <div class="row g-0">
                                <div class="col-md-4 bg-success bg-opacity-10 d-flex align-items-center justify-content-center p-4">
                                    <i class="bi bi-bank text-success" style="font-size: 4rem;"></i>
                                </div>
                                <div class="col-md-8 p-4">
                                    <h5 class="fw-bold mb-2">Situs Lingga Yoni (Recha Gathel)</h5>
                                    <p class="text-muted small mb-0">Di Dusun Tumpakmiri terdapat peninggalan kuno dari Zaman Hindu Syiwa berupa Lingga Yoni yang ditemukan di tepi sumber mata air terbelit akar pepohonan. Lingga (lambang Dewa Siwa) dan Yoni (lambang Dewi Parwati) ini merupakan bukti bahwa wilayah ini pernah dihuni peradaban kuno sebelum desa resmi berdiri.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                '
            ]
        );

        // 12. Data Adat Istiadat
        Page::updateOrCreate(
            ['slug' => 'adat-istiadat'],
            [
                'title' => 'Adat Istiadat',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Masyarakat Desa Arjosari sangat memegang teguh nilai-nilai kebudayaan dan kearifan lokal. Terdapat 1 Pemangku Adat yang menjaga tradisi di desa ini.</p>
                        
                        <h5 class="fw-bold mb-3">Tradisi yang Masih Aktif</h5>
                        <p class="text-muted small mb-4">Beberapa adat istiadat yang masih aktif dijalankan oleh masyarakat antara lain:</p>
                        
                        <div class="row g-3 mb-5">
                            <div class="col-md-6"><div class="p-3 bg-light rounded-3 border-start border-4 border-success"><i class="bi bi-check-circle-fill text-success me-2"></i> Upacara Adat Perkawinan & Kelahiran</div></div>
                            <div class="col-md-6"><div class="p-3 bg-light rounded-3 border-start border-4 border-success"><i class="bi bi-check-circle-fill text-success me-2"></i> Upacara Adat Kematian</div></div>
                            <div class="col-md-6"><div class="p-3 bg-light rounded-3 border-start border-4 border-success"><i class="bi bi-check-circle-fill text-success me-2"></i> Adat dalam Tanah Pertanian</div></div>
                            <div class="col-md-6"><div class="p-3 bg-light rounded-3 border-start border-4 border-success"><i class="bi bi-check-circle-fill text-success me-2"></i> Membangun Rumah & Tata Kelola SDA</div></div>
                            <div class="col-md-12"><div class="p-3 bg-light rounded-3 border-start border-4 border-success"><i class="bi bi-check-circle-fill text-success me-2"></i> Tradisi Tolak Bala (Menjauhkan Penyakit & Memulihkan Hubungan Manusia dengan Alam)</div></div>
                        </div>

                        <div class="alert alert-warning border-warning bg-opacity-10">
                            <h6 class="fw-bold mb-2"><i class="bi bi-star-fill text-warning me-2"></i> Ciri Khas Perayaan</h6>
                            <p class="small mb-0">Dalam berbagai perayaan pesta adat maupun upacara tertentu, masyarakat Arjosari memiliki kebiasaan merayakan dengan menghadirkan banyak undangan serta melakukan pemotongan hewan dalam jumlah besar sebagai bentuk rasa syukur dan kebersamaan.</p>
                        </div>
                    </div>
                '
            ]
        );

        // 13. Data Pengumuman (Berita)
        Page::updateOrCreate(
            ['slug' => 'pengumuman'],
            [
                'title' => 'Pengumuman Desa',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Informasi dan pengumuman resmi terbaru dari Pemerintah Desa Arjosari untuk masyarakat.</p>
                        
                        <div class="list-group list-group-flush mb-4">
                            <a href="#" class="list-group-item list-group-item-action p-4 bg-light rounded-4 mb-3 border-0 shadow-sm border-start border-4 border-danger">
                                <div class="d-flex w-100 justify-content-between mb-2">
                                    <h5 class="fw-bold mb-1">Pendaftaran Bantuan Langsung Tunai (BLT)</h5>
                                    <small class="text-muted"><i class="bi bi-clock me-1"></i> 2 Hari yang lalu</small>
                                </div>
                                <p class="mb-1 small">Diberitahukan kepada seluruh warga Desa Arjosari yang memenuhi kriteria prasejahtera agar mendaftarkan diri melalui RT/RW masing-masing paling lambat akhir bulan ini.</p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action p-4 bg-light rounded-4 mb-3 border-0 shadow-sm border-start border-4 border-success">
                                <div class="d-flex w-100 justify-content-between mb-2">
                                    <h5 class="fw-bold mb-1">Kerja Bakti Pembersihan Saluran Irigasi</h5>
                                    <small class="text-muted"><i class="bi bi-clock me-1"></i> 5 Hari yang lalu</small>
                                </div>
                                <p class="mb-1 small">Menjelang musim penghujan, seluruh warga Dusun Kedungwaru diharapkan partisipasinya dalam kerja bakti massal pada hari Minggu pagi.</p>
                            </a>
                        </div>
                    </div>
                '
            ]
        );

        // 14. Data Agenda Desa (Berita)
        Page::updateOrCreate(
            ['slug' => 'agenda-desa'],
            [
                'title' => 'Agenda Desa',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Jadwal kegiatan, musyawarah, dan acara penting yang akan dilaksanakan di lingkungan Desa Arjosari.</p>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 text-center p-2 me-3" style="min-width: 60px;">
                                            <h4 class="fw-bold mb-0">15</h4><small>Juli</small>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">Musrenbangdes 2026</h6>
                                            <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> Balai Desa Arjosari</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 text-center p-2 me-3" style="min-width: 60px;">
                                            <h4 class="fw-bold mb-0">20</h4><small>Juli</small>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">Posyandu Balita & Lansia</h6>
                                            <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> Polindes Sumbertimo</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                '
            ]
        );

        // 15. Data Info Pembangunan
        Page::updateOrCreate(
            ['slug' => 'info-pembangunan'],
            [
                'title' => 'Info Pembangunan',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Transparansi progres pembangunan infrastruktur fisik dan non-fisik di wilayah Desa Arjosari.</p>
                        
                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                            <h6 class="fw-bold mb-4"><i class="bi bi-cone-striped text-warning me-2"></i> Progres Infrastruktur Tahun Ini</h6>
                            
                            <div class="mb-4">
                                <div class="d-flex justify-content-between small mb-1"><span>Pembangunan Jalan Makadam (7 Km)</span><span class="fw-bold text-success">100%</span></div>
                                <div class="progress" style="height: 8px;"><div class="progress-bar bg-success" style="width: 100%;"></div></div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between small mb-1"><span>Rehabilitasi Jembatan Penghubung</span><span class="fw-bold text-primary">75%</span></div>
                                <div class="progress" style="height: 8px;"><div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" style="width: 75%;"></div></div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between small mb-1"><span>Saluran Irigasi Tersier</span><span class="fw-bold text-warning">40%</span></div>
                                <div class="progress" style="height: 8px;"><div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width: 40%;"></div></div>
                            </div>
                        </div>
                    </div>
                '
            ]
        );

        // 16. Data APBDes (Data Asli dari Sumber Dokumen)
        Page::updateOrCreate(
            ['slug' => 'apbdes'],
            [
                'title' => 'Transparansi APBDes',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Laporan Anggaran Pendapatan dan Belanja Desa (APBDes) Arjosari sebagai wujud tata kelola keuangan yang transparan dan akuntabel.</p>
                        
                        <div class="alert alert-success bg-opacity-10 border-success text-center mb-4 p-4 rounded-4">
                            <h6 class="text-success fw-bold mb-2">Total Anggaran Belanja & Penerimaan</h6>
                            <h2 class="fw-bold text-dark mb-0">Rp 1.708.145.626,00</h2>
                        </div>

                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
                                    <h6 class="fw-bold text-primary mb-4"><i class="bi bi-arrow-down-circle text-primary me-2"></i> Sumber Pendapatan</h6>
                                    <ul class="list-group list-group-flush small">
                                        <li class="list-group-item d-flex justify-content-between px-0"><span>Bantuan Pusat</span> <strong>Rp 1.150.490.000</strong></li>
                                        <li class="list-group-item d-flex justify-content-between px-0"><span>Alokasi Dana Desa (ADD)</span> <strong>Rp 536.655.626</strong></li>
                                        <li class="list-group-item d-flex justify-content-between px-0"><span>Pendapatan Asli Desa</span> <strong>Rp 21.000.000</strong></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
                                    <h6 class="fw-bold text-danger mb-4"><i class="bi bi-arrow-up-circle text-danger me-2"></i> Alokasi Belanja</h6>
                                    <ul class="list-group list-group-flush small">
                                        <li class="list-group-item d-flex justify-content-between px-0"><span>Belanja Publik / Pembangunan</span> <strong>Rp 1.119.907.900</strong></li>
                                        <li class="list-group-item d-flex justify-content-between px-0"><span>Belanja Aparatur / Pegawai</span> <strong>Rp 595.289.626</strong></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                '
            ]
        );

        // 17. Data Dana Desa
        Page::updateOrCreate(
            ['slug' => 'dana-desa'],
            [
                'title' => 'Realisasi Dana Desa',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Informasi khusus mengenai pemanfaatan Dana Desa (DD) yang dialokasikan oleh Pemerintah Pusat untuk pemberdayaan dan infrastruktur.</p>
                        <div class="card border-0 shadow-sm rounded-4 bg-light p-5 text-center">
                            <i class="bi bi-pie-chart text-success mb-3" style="font-size: 3rem;"></i>
                            <h5 class="fw-bold">Grafik Realisasi Dana Desa</h5>
                            <p class="text-muted small">Fitur grafik sedang dalam tahap pengembangan (Mockup UI).</p>
                        </div>
                    </div>
                '
            ]
        );

        // 18. Data Status IDM
        Page::updateOrCreate(
            ['slug' => 'status-idm'],
            [
                'title' => 'Status IDM (Indeks Desa Membangun)',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Indeks Desa Membangun (IDM) mengarahkan ketepatan intervensi kebijakan pembangunan desa. Berikut adalah status IDM Desa Arjosari.</p>
                        <div class="text-center bg-success bg-opacity-10 rounded-4 py-5 mb-4 border border-success border-opacity-25 shadow-sm">
                            <h1 class="display-3 fw-bold text-success mb-2">0.7245</h1>
                            <span class="badge bg-success rounded-pill px-4 py-2 fs-6 mb-2">STATUS: DESA MAJU</span>
                            <div class="small text-muted mt-2">Tahun Pemutakhiran: 2024</div>
                        </div>
                    </div>
                '
            ]
        );

        // 19. Data Indikator IDM
        Page::updateOrCreate(
            ['slug' => 'indikator-idm'],
            [
                'title' => 'Indikator IDM',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Rincian skor komposit pembentuk Indeks Desa Membangun (IDM) Desa Arjosari.</p>
                        
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100">
                                    <i class="bi bi-heart-pulse text-danger fs-1 mb-2"></i>
                                    <h2 class="fw-bold mb-1">0.6890</h2>
                                    <span class="small fw-semibold text-muted">Indeks Ketahanan Sosial</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100">
                                    <i class="bi bi-shop text-primary fs-1 mb-2"></i>
                                    <h2 class="fw-bold mb-1">0.7120</h2>
                                    <span class="small fw-semibold text-muted">Indeks Ketahanan Ekonomi</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100">
                                    <i class="bi bi-tree text-success fs-1 mb-2"></i>
                                    <h2 class="fw-bold mb-1">0.7724</h2>
                                    <span class="small fw-semibold text-muted">Indeks Ketahanan Ekologi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                '
            ]
        );

        // 20. Data Perkembangan IDM
        Page::updateOrCreate(
            ['slug' => 'perkembangan-idm'],
            [
                'title' => 'Perkembangan IDM',
                'content' => '
                    <div class="content-text">
                        <p class="mb-4">Riwayat perkembangan status Indeks Desa Membangun dari tahun ke tahun.</p>
                        <div class="card border-0 shadow-sm rounded-4 bg-light p-5 text-center">
                            <i class="bi bi-bar-chart-line text-primary mb-3" style="font-size: 3rem;"></i>
                            <h5 class="fw-bold">Grafik Tren IDM Tahunan</h5>
                            <p class="text-muted small">Fitur visualisasi tren sedang dalam tahap integrasi data (Mockup UI).</p>
                        </div>
                    </div>
                '
            ]
        );
    }
}