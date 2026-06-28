<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    // Kolom tabel yang boleh diisi
    protected $fillable = ['title', 'slug', 'content'];
}