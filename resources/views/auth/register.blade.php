<x-guest-layout>
 
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-7 col-xxl-8">
                    <a href="/" class="text-nowrap logo-img d-block px-4 py-9 w-100"  style="position: relative; z-index:12;">
                        <img src="{{ asset('assets/images/logo.png')}}" class="dark-logo" alt="Logo-Dark" />
                        <img src="{{ asset('assets/images/logo.png')}}" class="light-logo" alt="Logo-light" />
                    </a>
                    <div class="d-none d-xl-flex align-items-center justify-content-center"
                        style="height: calc(100vh - 110px);">
                        <img src="{{ asset('assets/dash/assets/images/backgrounds/register_bg.svg')}}" alt="" class="img-fluid"
                            width="100%">
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-4">
                    <div
                        class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h2 class="mb-4 fs-7 fw-bolder">Create an account</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name"
                                    :value="old('name')" autofocus autocomplete="name" required>
                                    <small>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </small>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" :value="old('email')"
                                    autofocus autocomplete="username" required>
                                    <small>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </small>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"
                                    autocomplete="new-password" required>
                                    <small>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </small>
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password"
                                    autocomplete="new-password" required>
                                    <small>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </small>
                                </div>
                                <button class="btn btn-primary w-100 py-8 mb-4 rounded-2">Create Account</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">Already have an account?</p>
                                    <a class="text-primary fw-medium ms-2" href="{{ route('login') }}">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
