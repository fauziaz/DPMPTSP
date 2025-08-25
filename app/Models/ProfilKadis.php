<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pendidikan;
use App\Models\Pekerjaan;

class ProfilKadis extends Model
{
    protected $table = 'profil_kadis';

    protected $fillable = ['nama', 'jabatan','foto','foto_url','biodata'];
    
    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class)->orderBy('id', 'desc');
    }

    public function pekerjaans()
    {
        return $this->hasMany(Pekerjaan::class)->orderBy('id', 'desc');
    }
}
