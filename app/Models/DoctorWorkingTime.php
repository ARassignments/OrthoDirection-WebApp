<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorWorkingTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'available_time'
    ];
}
