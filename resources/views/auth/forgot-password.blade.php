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
                            <h4>Forgot password</h4>
                            <p>If you forgot your password, well, then we’ll email you instructions to reset your
                                password.</p>
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="form-group"><label class="form-label" for="email">Email
                                                Address</label>
                                            <div class="form-control-wrap">
                                                <input type="email" name="email" id="email"
                                                    class="form-control form-control-lg" placeholder="Enter Email"
                                                    :value="old('email')" autofocus required>
                                            </div>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div
                                            class="d-flex flex-wrap justify-content-between align-items-center has-gap g-3">
                                            <div class="form-group"><button class="btn btn-primary" type="submit"
                                                    id="submit-btn">Send Reset Link</button></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="text-center mt-4"><a class="link has-gap g-2" href="{{ route('login') }}"><em
                                class="icon ni ni-arrow-left"></em><span>Back to Login</span></a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5"></div>
    <p class="text-center text-heading mt-4 mb-6 d-none">&copy; 2025 All Rights Reserved</a>
    </p>
</x-guest-layout>
