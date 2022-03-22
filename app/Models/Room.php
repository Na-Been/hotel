<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'room_no',
        'room_slug',
        'room_type',
        'ac',
        'meal',
        'cancel_charge',
        'rent_per_night',
        'feature_image',
        'room_images',
        'room_details'
    ];
}
