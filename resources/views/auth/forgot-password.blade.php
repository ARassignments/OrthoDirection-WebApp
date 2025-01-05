<x-guest-layout>

    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-7 col-xxl-8">
                    <a href="/" class="text-nowrap logo-img d-block px-4 py-9 w-100" style="position: relative; z-index:12;">
                        <img src="{{ asset('assets/images/logo.png') }}" class="dark-logo" alt="Logo-Dark" />
                        <img src="{{ asset('assets/images/logo.png') }}" class="light-logo" alt="Logo-light" />
                    </a>
                    <div class="d-none d-xl-flex align-items-center justify-content-center"
                        style="height: calc(100vh - 110px);">
                        <img src="{{ asset('assets/dash/assets/images/backgrounds/forgot_bg.svg') }}"
                            alt="" class="img-fluid" width="100%">
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-4">
                    <div
                        class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <div class="mb-5">
                                <h2 class="fw-bolder fs-7 mb-3">Forgot your password?</h2>
                                <p class="mb-0 ">
                                    Please enter the email address associated with your account and We will email you a
                                    link to reset your password.
                                </p>
                            </div>
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email Address" :value="old('email')" autofocus required>
                                    <small>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger" />
                                    </small>
                                </div>
                                <button class="btn btn-primary w-100 py-8 mb-3 rounded-2">Send Reset Link</button>
                                <a href="{{ route('login') }}" class="btn bg-primary-subtle text-primary w-100 py-8">Back to Login</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
