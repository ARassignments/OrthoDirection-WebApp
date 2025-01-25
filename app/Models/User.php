<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\AdminProfile;
use App\Models\DoctorWorkingTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'otp_code',
        'newsletter',
        'email_notification',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sendEmailVerificationNotification()
    {
        $otp = random_int(1000, 9999); // Generate OTP
        $this->otp_code = $otp;       // Save OTP in the database if needed
        $this->save();

        $this->notify(new CustomVerifyEmail($otp)); // Send the notification
    }

    public function adminProfile()
    {
        return $this->hasOne(AdminProfile::class, 'user_id');
    }

    public function doctorWorkingTimes()
    {
        return $this->hasMany(DoctorWorkingTime::class, 'doctor_id');
    }
}
