<x-guest-layout>
    <div class="text-center mt-6 mb-4">
        <a href="/" class="logo-link">
            <div class="logo-wrap">
                <img class="logo-img logo-dark" src="{{ asset('assets/images/logo.png') }}" alt>
            </div>
        </a>
    </div>
    <div class="my-auto">
        <div class="container">
            <div class="row g-gs justify-content-center">
                <div class="col-md-7 col-lg-6 col-xl-5">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h4 class="mb-3">Create an account</h4>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Full Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="name" id="name"
                                                    class="form-control form-control-lg" placeholder="Enter Your Name"
                                                    :value="old('name')" autofocus autocomplete="name" required>
                                            </div>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="emailorusername">Email Address</label>
                                            <div class="form-control-wrap">
                                                <input type="email" name="email" id="emailorusername"
                                                    class="form-control form-control-lg" placeholder="Enter Email"
                                                    :value="old('email')" autocomplete="username" required>
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
                                                    autocomplete="new-password" required>
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
                                        <div class="form-group">
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                            <div class="form-control-wrap">
                                                <a class="form-control-icon end password-toggle cpwd" style="cursor: pointer"
                                                    onclick="togglePasswordC()" title="Toggle show/hide password">
                                                    <em class="on icon ni ni-eye text-base"></em>
                                                    <em class="off icon ni ni-eye-off text-base"></em>
                                                </a>
                                                <input type="password" name="password_confirmation" id="password_confirmation"
                                                    class="form-control form-control-lg" placeholder="Enter Confirm Password"
                                                    autocomplete="new-password" required>
                                            </div>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>
                                    <script>
                                        function togglePasswordC() {
                                            if (document.getElementById("password_confirmation").type == "password") {
                                                document.getElementById("password_confirmation").type = "text";
                                                document.querySelector(".cpwd .ni-eye").classList.add("off");
                                                document.querySelector(".cpwd .ni-eye").classList.remove("on");
                                                document.querySelector(".cpwd .ni-eye-off").classList.add("on");
                                                document.querySelector(".cpwd .ni-eye-off").classList.remove("off");
                                            } else {
                                                document.getElementById("password_confirmation").type = "password";
                                                document.querySelector(".cpwd .ni-eye").classList.add("on");
                                                document.querySelector(".cpwd .ni-eye").classList.remove("off");
                                                document.querySelector(".cpwd .ni-eye-off").classList.add("off");
                                                document.querySelector(".cpwd .ni-eye-off").classList.remove("on");
                                            }
                                        }
                                    </script>
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap justify-content-between has-gap g-3">
                                            <div class="form-group">
                                                <div class="form-check form-check-sm">
                                                    <input class="form-check-input" type="checkbox" value id="iAgree" required>
                                                    <label class="form-check-label small" for="iAgree">
                                                        I agree to
                                                        <a href="#">privacy
                                                            policy</a>
                                                        &amp; <a href="#">terms</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit"
                                                id="submit-btn">Create Account</button>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="small mb-3">or
                                            signup with</div>
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
                                        </ul>
                                        <p class="mt-4">Already have an account? <a
                                                href="{{ route('login') }}">Login</a>
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
