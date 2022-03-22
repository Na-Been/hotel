<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected  $table ='bookings';
    protected $fillable=[
        'name',
        'email',
        'number',
        'nationality',
        'room_type',
        'arrival_date',
        'check_out',
        'ac_or_non',
        'number_of_booked_room',
        'adult_number',
        'child_number',
        'message'
    ];
}
