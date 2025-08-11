<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengumumanModel extends Model
{
    protected $table = 'pengumumans';
    
    protected $fillable = [
        'image_path', 'image_url', 'caption_title', 'caption_subtitle', 'order'
    ];

}
