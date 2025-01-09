@auth
    @if (Auth::user()->role == 'admin')
        <a href="/admin" class="theme-btn btn-two"><span>Go Dashboard</span></a>
    @elseif (Auth::user()->role == 'doctor')
        <a href="/doctor" class="theme-btn btn-two"><span>Go Dashboard</span></a>
    @elseif (Auth::user()->role == 'patient')
        <a href="/patient" class="theme-btn btn-two"><span>Go Dashboard</span></a>
    @elseif (Auth::user()->role == 'family')
        <a href="/family" class="theme-btn btn-two"><span>Go Dashboard</span></a>
    @endif
@endauth
