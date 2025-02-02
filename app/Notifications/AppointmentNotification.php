<?php

namespace App\Notifications;

use App\Models\AdminProfile;
use App\Models\Appointment;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentNotification extends Notification implements ShouldBroadcastNow
{
    use Queueable;
    private $appointment;
    private $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($appointment, $type)
    {
        $this->appointment = $appointment;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database', 'mail', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $subject = $this->type == 'created' ? 'Appointment Confirmed' : 'Appointment Status Updated';
        $message = $this->type == 'created'
            ? "Your appointment has been successfully created."
            : "Your appointment status has been updated to: " . ucfirst($this->appointment->status);

        return (new MailMessage)
            ->subject($subject)
            ->line($message)
            // ->action('View Appointment', url('/appointments/' . $this->appointment->id))
            ->line('Thank you for using our service!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        $profileImg = AdminProfile::where('user_id', $this->appointment->patient_id)
        ->select('profile_img')
        ->first();
        return [
            'notification_type' => 'appointment',
            'appointment_id' => $this->appointment->id,
            'profile_img' => $profileImg->profile_img,
            'status' => $this->appointment->status,
            'message' => $this->type == 'created'
                ? "Appointment has been created"
                : "Appointment has been ".$this->appointment->status,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'notification' => $this->toArray($notifiable)
        ]);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('notifications.' . $this->appointment->patient_id);
    }
}
