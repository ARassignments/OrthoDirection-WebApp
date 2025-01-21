<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'profile_img',
        'gender',
        'date_of_birth',
        'bio',
        'address',
        'country',
        'city',
        'contact',
        'facebook',
        'instagram',
        'twitter',
        'status',
    ];
}
