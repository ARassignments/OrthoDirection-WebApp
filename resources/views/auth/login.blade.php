<x-guest-layout>

    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-7 col-xxl-8">
                    <a href="/" class="text-nowrap logo-img d-block px-4 py-9 w-100"  style="position: relative; z-index:12;">
                        <img src="{{ asset('assets/images/logo.png') }}" class="dark-logo" alt="Logo-Dark" />
                        <img src="{{ asset('assets/images/logo.png') }}" class="light-logo" alt="Logo-light" />
                    </a>
                    <div class="d-none d-xl-flex align-items-center justify-content-center"
                        style="height: calc(100vh - 110px);">
                        <img src="{{ asset('assets/dash/assets/images/backgrounds/login_bg.svg') }}"
                            alt="" class="img-fluid" width="100%">
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-4">
                    <div
                        class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h2 class="mb-4 fs-7 fw-bolder">Welcome to OrthoDirection</h2>
                            {{-- <p class=" mb-9">Your Admin Dashboard</p>
                            <div class="row">
                                <div class="col-6 mb-2 mb-sm-0">
                                    <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8"
                                        href="javascript:void(0)" role="button">
                                        <img src="../assets/images/svgs/google-icon.svg" alt=""
                                            class="img-fluid me-2" width="18" height="18">
                                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>Google
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8"
                                        href="javascript:void(0)" role="button">
                                        <img src="../assets/images/svgs/facebook-icon.svg" alt=""
                                            class="img-fluid me-2" width="18" height="18">
                                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>FB
                                    </a>
                                </div>
                            </div>
                            <div class="position-relative text-center my-4">
                                <p
                                    class="mb-0 fs-4 px-3 d-inline-block text-bg-white text-dark z-index-5 position-relative">
                                    or sign
                                    in
                                    with</p>
                                <span
                                    class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                            </div> --}}
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email or Username</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email or Username" :value="old('email')" autofocus
                                        autocomplete="username" required>
                                    <small>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </small>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Password" autocomplete="current-password" required>
                                    <small>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </small>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" name="remember" type="checkbox"
                                            value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            Remeber this Device
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-primary fw-medium">Forgot
                                            Password ?</a>
                                    @endif
                                </div>
                                <button class="btn btn-primary w-100 py-8 mb-4 rounded-2">Login</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">Don't have an account?</p>
                                    <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
