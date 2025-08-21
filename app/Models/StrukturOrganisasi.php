<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    protected $table = 'struktur_organisasis';
    protected $fillable = [
        'gambar',
        'button_text',
        'button_link'
    ];
}
