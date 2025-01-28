<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'device_name', 'ip_address', 'location', 'browser', 'platform', 'logged_in_at', 'logged_out_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
