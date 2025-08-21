<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    protected $table = 'tentang_kamis';
    protected $fillable = [
        'profil_image',
        'profil_title',
        'profil_description',
        'maklumat_image',
        'motto_image'
    ];
}
