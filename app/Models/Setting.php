<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected  $table = 'settings';
    protected $fillable = [
        'dashboard_title',
        'logo',
        'phone',
        'email',
        'address',
        'check_in',
        'check_out',
        'facebook_link',
        'instagram_link',
        'twitter_link'
    ];
}
