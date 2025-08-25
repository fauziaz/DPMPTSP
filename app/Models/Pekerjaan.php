<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProfilKadis;

class Pekerjaan extends Model
{
    protected $fillable = ['profil_kadis_id', 'jabatan', 'instansi', 'tahun'];

    public function profilKadis()
    {
        return $this->belongsTo(ProfilKadis::class);
    }
}
