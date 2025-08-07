<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriModel extends Model
{
    protected $table = 'galeris'; // pastikan ini sesuai dengan nama tabel yang ada di database kamu
    protected $fillable = ['judul', 'deskripsi', 'gambar', 'gambarUrl'];

}
