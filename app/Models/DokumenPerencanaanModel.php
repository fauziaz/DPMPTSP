<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PerencanaanModel
 *
 * @property int $id
 * @property string $judul
 * @property string $deskripsi
 * @property int $tahun
 * @property string $tanggal
 * @property int $downloads
 * @property string $file_path
 * @mixin \Eloquent
 */

class DokumenPerencanaanModel extends Model
{
    protected $table = 'perencanaans';

    protected $fillable = [
        'judul','deskripsi','tahun','tanggal','downloads','file_path'
    ];
}
