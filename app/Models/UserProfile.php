<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';
    protected $fillable = [
        'name',
        'email',
        'admin_id',
        'address',
        'gender',
        'number',
        'birth_date',
        'education',
        'image'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
