<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    protected $table = 'videos'; // pastikan ini sesuai dengan nama tabel yang ada di database kamu
    protected $fillable = ['judul', 'deskripsi', 'video', 'videoUrl'];
}
