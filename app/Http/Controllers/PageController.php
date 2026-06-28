<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page; // Panggil Model Page

class PageController extends Controller
{
    // Method untuk halaman statis spesifik
    public function sejarah()
    {
        return view('pages.sejarah'); // Nanti kita buat file resources/views/pages/sejarah.blade.php
    }

    public function visiMisi()
    {
        return view('pages.visi-misi');
    }

    public function pemerintahan()
    {
        return view('pages.pemerintahan');
    }

    public function kependudukan()
    {
        return view('pages.kependudukan');
    }

    public function petaWilayah()
    {
        return view('pages.peta-wilayah');
    }

    public function pembagian()
    {
        return view('pages.pembagian');
    }

    // Method dinamis (Catch-All) yang sangat menghemat waktu
    public function showDynamic($slug)
    {
        // 1. Cari data halaman berdasarkan slug
        $page = \App\Models\Page::where('slug', $slug)->firstOrFail();

        // 2. Buat Peta Menu (Mapping Menu) untuk Sidebar
        $menuGroups = [
            'profil' => [
                'title' => 'Profil Desa',
                'links' => [
                    'sejarah-desa' => 'Sejarah Desa',
                    'visi-misi' => 'Visi dan Misi',
                    'pemerintahan' => 'Pemerintahan',
                    'data-kependudukan' => 'Data Kependudukan',
                ]
            ],
            'peta' => [
                'title' => 'Peta Desa',
                'links' => [
                    'peta-wilayah' => 'Peta Wilayah',
                    'pembagian-desa' => 'Pembagian Desa',
                ]
            ],
            'potensi' => [
                'title' => 'Potensi Desa',
                'links' => [
                    'pertanian' => 'Pertanian',
                    'perkebunan' => 'Perkebunan',
                    'peternakan' => 'Peternakan',
                ]
            ],
            'budaya' => [
                'title' => 'Budaya',
                'links' => [
                    'seni-tradisi' => 'Seni Tradisi',
                    'peninggalan' => 'Peninggalan',
                    'adat-istiadat' => 'Adat Istiadat',
                ]
            ],
            'pembangunan' => [
                'title' => 'Pembangunan',
                'links' => [
                    'info-pembangunan' => 'Info Pembangunan',
                    'apbdes' => 'APBDes',
                    'dana-desa' => 'Dana Desa',
                ]
            ],
            'idm' => [
                'title' => 'IDM',
                'links' => [
                    'status-idm' => 'Status IDM',
                    'indikator-idm' => 'Indikator IDM',
                    'perkembangan-idm' => 'Perkembangan IDM',
                ]
            ]
        ];

        // 3. Deteksi otomatis: Halaman yang dibuka masuk kelompok mana?
        $activeGroup = null;
        foreach ($menuGroups as $group) {
            if (array_key_exists($slug, $group['links'])) {
                $activeGroup = $group;
                break;
            }
        }

        if (!$activeGroup) {
            $activeGroup = $menuGroups['profil'];
        }

        // 4. Kirim data halaman dan menu sidebar ke view
        return view('pages.show', compact('page', 'activeGroup'));
    }
}