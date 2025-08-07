<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SektoralModel
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

class SektoralModel extends Model
{
    protected $table = 'ikms';

    protected $fillable = [
        'judul','deskripsi','tahun','tanggal','downloads','file_path'
    ];
}
