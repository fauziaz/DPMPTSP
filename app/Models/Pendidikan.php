<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProfilKadis;

class Pendidikan extends Model
{
    protected $table = 'pendidikans';

    protected $fillable = ['profil_kadis_id', 'jurusan', 'institusi'];

    public function profilKadis()
    {
        return $this->belongsTo(ProfilKadis::class, 'profil_kadis_id');
    }
}
