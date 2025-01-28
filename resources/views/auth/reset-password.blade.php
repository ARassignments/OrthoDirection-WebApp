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
                                <h2 class="fw-bolder fs-7 mb-3">Reset Password</h2>
                            </div>
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                        
                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        
                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block form-control mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                        
                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="block form-control mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                        
                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        
                                    <x-text-input id="password_confirmation" class="block mt-1 w-full form-control"
                                                        type="password"
                                                        name="password_confirmation" required autocomplete="new-password" />
                        
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <button class="btn btn-primary w-100 py-8 mb-3 mt-3 rounded-2" id="confirmBtn">  {{ __('Reset Password') }}</button>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector("#forgotForm").onsubmit = () => {
            document.querySelector("#sendLinkBtn").disabled = true;
            document.querySelector("#sendLinkBtn").innerHTML = `
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Loading...
            `;
        }
    </script>
</x-guest-layout>
