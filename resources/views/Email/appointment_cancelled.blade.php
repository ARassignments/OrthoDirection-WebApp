<!DOCTYPE html>
<html>
<head>
    <title>Appointment Cancelled</title>
</head>
<body>
    <p>Dear {{ $appointment->patient->name }},</p>

    <p>We regret to inform you that your appointment with Dr. {{ $appointment->doctor->name }} on 
    {{ $appointment->date }} at {{ $appointment->time }} has been cancelled.</p>

    <p><strong>Reason:</strong> {{ $appointment->doctor_cancellation_reason }}</p>

    <p>We apologize for the inconvenience. Please contact us to reschedule.</p>

    <p>Thank you.</p>
</body>
</html>
