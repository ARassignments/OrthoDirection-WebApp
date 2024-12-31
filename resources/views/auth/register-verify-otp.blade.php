@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register.otp.check') }}">
    @csrf
    <input type="hidden" name="email" value="{{ session('email') }}">
    <div>
        <label>OTP</label>
        <input type="number" name="otp" required>
    </div>
    <button type="submit">Verify OTP</button>
</form>
