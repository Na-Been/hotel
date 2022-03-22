<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model
{
    use HasFactory;
    protected $table = 'banner_images';
    protected $fillable = [
        'image_title',
        'image_description',
        'route_name',
        'images',
        'image',
        'section'
    ];
}
