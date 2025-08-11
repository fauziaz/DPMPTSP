<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulasiModel extends Model
{
    protected $table = 'regulasis';

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
