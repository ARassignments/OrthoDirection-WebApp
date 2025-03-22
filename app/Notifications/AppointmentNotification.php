<?php

namespace App\Notifications;

use App\Models\AdminProfile;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
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
    private $for;

    /**
     * Create a new notification instance.
     */
    public function __construct($appointment, $type, $for)
    {
        $this->appointment = $appointment;
        $this->type = $type;
        $this->for = $for;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        // return ['database', 'mail', 'broadcast'];
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $patient = User::find($this->appointment->patient_id);
        $doctor = User::find($this->appointment->doctor_id);

        if (!$patient || !$doctor) {
            return (new MailMessage)
                ->subject('Appointment Notification')
                ->line('There was an issue retrieving appointment details.');
        }
        $formattedDate = Carbon::parse($this->appointment->date)->format('F d, Y');
        $formattedTime = Carbon::parse($this->appointment->slot)->format('h:i A');
        $subject = $this->type == 'created' ? 'Appointment Confirmed' : 'Appointment Status Updated';
        $message = "";

        if ($this->type == 'created') {
            if ($this->for == 'patient') {
                $message = "Dear {$patient->name}, your appointment with Dr. {$doctor->name} is confirmed for {$formattedDate} at {$formattedTime}.";
            } elseif ($this->for == 'doctor') {
                $message = "Dear Dr. {$doctor->name}, you have a new appointment scheduled with patient {$patient->name} on {$formattedDate} at {$formattedTime}.";
            } elseif ($this->for == 'family_member') {
                $message = "Dear Family Member, your family member ({$patient->name}) has booked an appointment with Dr. {$doctor->name} on {$formattedDate} at {$formattedTime}.";
            } elseif ($this->for == 'admin') {
                $message = "Dear Admin, a new appointment has been booked. Patient: {$patient->name}, Doctor: Dr. {$doctor->name}, Date: {$formattedDate}, Time: {$formattedTime}.";
            }
        } elseif ($this->type == 'updated') {
            if ($this->for == 'patient') {
                $message = "Dear {$patient->name}, your appointment with Dr. {$doctor->name} on {$formattedDate} at {$formattedTime} has been {$this->appointment->status}.";
            } elseif ($this->for == 'doctor') {
                $message = "Dear Dr. {$doctor->name}, your appointment with patient {$patient->name} on {$formattedDate} at {$formattedTime} has been {$this->appointment->status}.";
            } elseif ($this->for == 'family_member') {
                $message = "Dear Family Member, the appointment of {$patient->name} with Dr. {$doctor->name} on {$formattedDate} has been {$this->appointment->status}.";
            } elseif ($this->for == 'admin') {
                $message = "Dear Admin, an appointment status has been updated. Patient: {$patient->name}, Doctor: Dr. {$doctor->name}, Date: {$formattedDate}, Time: {$formattedTime}, Status: {$this->appointment->status}.";
            }
        } else {
            $message = "Your appointment status has been updated to: " . ucfirst($this->appointment->status);
        }

        return (new MailMessage)
            ->subject($subject)
            ->line($message)
            ->action('View Appointment', url($this->for . '/appointments'))
            ->line('Thank you for using our service!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        $patient = User::find($this->appointment->patient_id);
        $doctor = User::find($this->appointment->doctor_id);
        $profileImg = AdminProfile::where('user_id', $this->appointment->patient_id)
            ->select('profile_img')
            ->first();
        $formattedDate = Carbon::parse($this->appointment->date)->format('F d, Y');
        $formattedTime = Carbon::parse($this->appointment->slot)->format('h:i A');
        $message = "";
        if ($this->type == 'created') {
            if ($this->for == 'patient') {
                $message = "Your appointment with Dr. {$doctor->name} is scheduled on {$formattedDate} at {$formattedTime}.";
            } elseif ($this->for == 'doctor') {
                $message = "New appointment! Patient: {$patient->name}, Date: {$formattedDate}, Time: {$formattedTime}.";
            } elseif ($this->for == 'family_member') {
                $message = "Your family member ({$patient->name}) has booked an appointment with Dr. {$doctor->name} on {$formattedDate} at {$formattedTime}.";
            } elseif ($this->for == 'admin') {
                $message = "New appointment booked! Patient: {$patient->name}, Doctor: Dr. {$doctor->name}, Date: {$formattedDate}, Slot: {$formattedTime}.";
            }
        } elseif ($this->type == 'updated') {
            if ($this->for == 'patient') {
                $message = "Your appointment with Dr. {$doctor->name} on {$formattedDate} at {$formattedTime} has been {$this->appointment->status}.";
            } elseif ($this->for == 'doctor') {
                $message = "Appointment {$this->appointment->status}! Patient: {$patient->name}, Date: {$formattedDate}, Time: {$formattedTime}.";
            } elseif ($this->for == 'family_member') {
                $message = "Your family member ({$patient->name})'s appointment with Dr. {$doctor->name} on {$formattedDate} has been {$this->appointment->status}.";
            } elseif ($this->for == 'admin') {
                $message = "Appointment {$this->appointment->status}! Patient: {$patient->name}, Doctor: Dr. {$doctor->name}, Date: {$formattedDate}, Slot: {$formattedTime}.";
            }
        }
        return [
            'notification_type' => 'appointment',
            'appointment_id' => $this->appointment->id,
            'patient_id' => $this->appointment->patient_id,
            'profile_img' => $profileImg->profile_img,
            'status' => $this->type == 'created' ? 'pending' : $this->appointment->status,
            'user_name' => $patient ? $patient->name : 'Unknown User',
            'message' => $this->type == 'created'
                ? "Appointment has been created"
                : "Appointment has been " . $this->appointment->status,
            'long_message' => $message
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
