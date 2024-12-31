<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;

class CustomVerifyEmail extends Notification
{
    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject(Lang::get('Verify Your Email Address'))
            ->line(Lang::get('Your OTP code is: ') . $this->otp);
            // ->line(Lang::get('Click the button below to verify your email address.'))
            // ->action(Lang::get('Verify Email Address'), $verificationUrl)
            // ->line(Lang::get('If you did not create an account, no further action is required.'));
    }
}