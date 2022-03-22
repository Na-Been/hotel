<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodAndBar extends Model
{
    use HasFactory;
    protected $table = 'food_and_bar';
    protected $fillable = [
      'food_title',
      'food_description',
      'food_image'
    ];
}
