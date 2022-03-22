<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $table = 'transports';
    protected $fillable =[
        'model_name',
        'model_number',
        'purchase_date',
        'expire_date',
        'vehicle_type',
        'fuel_type',
        'vehicle_number',
        'driver_name',
        'vehicle_image',
        'seat_capacity',
        'details'
    ];
}
