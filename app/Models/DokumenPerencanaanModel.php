<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// /**
//  * App\Models\PerencanaanModel
//  *
//  * @property int $id
//  * @property string $judul
//  * @property string $deskripsi
//  * @property int $tahun
//  * @property string $tanggal
//  * @property int $downloads
//  * @property string $file_path
//  * @property string $file_url
//  * @property string $format
//  * @property string $tag
//  * @mixin \Eloquent
//  */

class DokumenPerencanaanModel extends Model
{
    protected $table = 'perencanaans';

    protected $fillable = [
        'judul','deskripsi','tahun','tanggal','downloads','file_path', 'file_url', 'format', 'tag'
    ];

    public function getIconClass(): string
    {
        $ext = strtolower($this->format ?? '');

        switch ($ext) {
            case 'pdf':
                return 'bi bi-filetype-pdf text-danger';
            case 'docx':
                return 'bi bi-filetype-docx text-primary';
            case 'xlsx':
                return 'bi bi-filetype-xls text-success';
            default:
                return 'bi bi-file-earmark text-secondary';
        }
    }
}
