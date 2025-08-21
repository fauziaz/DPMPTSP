<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilKadis extends Model
{
    protected $table = 'profil_kadis';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'foto_url',
        'biodata',
        'pendidikan',
        'pekerjaan',
    ];

    protected $casts = [
        'pendidikan' => 'array',
        'pekerjaan' => 'array',
    ];
}
