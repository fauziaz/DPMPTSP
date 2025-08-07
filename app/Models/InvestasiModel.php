<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestasiModel extends Model
{
    protected $table = 'investasis';

    protected $fillable = [
        'judul', 'deskripsi', 'tahun', 'tanggal',
        'file_path', 'format', 'tag', 'kategori',
    ];
}
