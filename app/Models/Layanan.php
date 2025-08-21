<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanans';
    protected $fillable = ['icon', 'title', 'description', 'url'];
}
