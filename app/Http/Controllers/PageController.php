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
        // Mencari halaman di database berdasarkan slug
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('page'));
    }
}