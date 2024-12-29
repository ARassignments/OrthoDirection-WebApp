<x-guest-layout>
    {{-- <div class="text-center mt-6 mb-4">
        <a href="/" class="logo-link">
            <div class="logo-wrap">
                <img class="logo-img logo-dark" src="{{ asset('assets/images/logo.png') }}" alt>
            </div>
        </a>
    </div> --}}
    <div class="my-auto">
        <div class="container">
            <div class="row g-gs justify-content-center">
                <div class="col-md-7 col-lg-6 col-xl-5">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h4 class="mb-3">Welcome
                                Back!</h4>
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="emailorusername">Email
                                                or
                                                Username</label>
                                            <div class="form-control-wrap">
                                                <input type="email" name="email" id="emailorusername"
                                                    class="form-control form-control-lg"
                                                    placeholder="Enter Email or Username" :value="old('email')"
                                                    autofocus autocomplete="username" required>
                                            </div>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="toggle-password">Password</label>
                                            <div class="form-control-wrap">
                                                <a class="form-control-icon end password-toggle" style="cursor: pointer"
                                                    onclick="togglePassword()" title="Toggle show/hide password">
                                                    <em class="on icon ni ni-eye text-base"></em>
                                                    <em class="off icon ni ni-eye-off text-base"></em>
                                                </a>
                                                <input type="password" name="password" id="toggle-password"
                                                    class="form-control form-control-lg" placeholder="Enter Password"
                                                    autocomplete="current-password" required>
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <script>
                                        function togglePassword() {
                                            if (document.getElementById("toggle-password").type == "password") {
                                                document.getElementById("toggle-password").type = "text";
                                                document.querySelector(".password-toggle .ni-eye").classList.add("off");
                                                document.querySelector(".password-toggle .ni-eye").classList.remove("on");
                                                document.querySelector(".password-toggle .ni-eye-off").classList.add("on");
                                                document.querySelector(".password-toggle .ni-eye-off").classList.remove("off");
                                            } else {
                                                document.getElementById("toggle-password").type = "password";
                                                document.querySelector(".password-toggle .ni-eye").classList.add("on");
                                                document.querySelector(".password-toggle .ni-eye").classList.remove("off");
                                                document.querySelector(".password-toggle .ni-eye-off").classList.add("off");
                                                document.querySelector(".password-toggle .ni-eye-off").classList.remove("on");
                                            }
                                        }
                                    </script>
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap justify-content-between has-gap g-3">
                                            <div class="form-group">
                                                <div class="form-check form-check-sm">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        value id="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">
                                                        Remember
                                                        Me
                                                    </label>
                                                </div>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="small">Forgot
                                                    Password?</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit"
                                                id="submit-btn">Login</button>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        {{-- <div class="small mb-3">or
                                            login with</div>
                                        <ul class="btn-list btn-list-inline gx-2">
                                            <li>
                                                <a class="btn btn-light btn-icon" href="#">
                                                    <em class="icon fs-5 ni ni-facebook-f"></em>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn btn-light btn-icon" href="#">
                                                    <em class="icon fs-5 ni ni-google"></em>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn btn-light btn-icon" href="#">
                                                    <em class="icon fs-5 ni ni-apple"></em>
                                                </a>
                                            </li>
                                        </ul> --}}
                                        <p class="mt-0">Don't
                                            have an account? <a href="{{ route('register') }}">Register</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5"></div>
    <p class="text-center text-heading mt-4 mb-6 d-none">&copy; 2025 All Rights Reserved</a>
    </p>
</x-guest-layout>
