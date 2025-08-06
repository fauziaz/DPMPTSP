<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['id', 'judul', 'kategori', 'penulis', 'deskripsi', 'gambar', 'created_at'];
}
