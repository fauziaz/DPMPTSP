<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    protected $table = 'carousel_images';
    
    protected $fillable = [
        'image_path', 'image_url', 'caption_title', 'caption_subtitle', 'order'
    ];
}
