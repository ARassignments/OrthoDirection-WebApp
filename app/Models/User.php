<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\AdminProfile;
use App\Models\DoctorWorkingTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function receivesBroadcastNotificationsOn(): string
    {
        return 'users.'.$this->id;
    }

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
        $otp = random_int(1000, 9999); 
        $this->otp_code = $otp;
        $this->save();

        $this->notify(new CustomVerifyEmail($otp));
    }

    public function adminProfile()
    {
        return $this->hasOne(AdminProfile::class, 'user_id');
    }

    public function doctorWorkingTimes()
    {
        return $this->hasMany(DoctorWorkingTime::class, 'doctor_id');
    }

    public function doctorAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function patientAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function familyMembers()
    {
        return $this->belongsToMany(User::class, 'family_relationships', 'patient_id', 'family_member_id')
                    ->withPivot('relation')
                    ->withTimestamps();
    }

    public function patients()
    {
        return $this->belongsToMany(User::class, 'family_relationships', 'family_member_id', 'patient_id')
                    ->withPivot('relation')
                    ->withTimestamps();
    }
}
