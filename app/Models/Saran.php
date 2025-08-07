<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $table = 'sarans';
    protected $fillable = ['nama', 'email', 'no_hp', 'komentar'];

}
