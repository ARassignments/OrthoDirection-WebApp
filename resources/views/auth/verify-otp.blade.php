<x-guest-layout>

    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body pt-5">
                            <a href="/" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                                <img src="{{ asset('assets/images/logo.png') }}" class="dark-logo" alt="Logo-Dark">
                            </a>
                            <div class="mb-5 text-center">
                                <p>We sent a verification code to your email. Enter the OTP from the email in the
                                    field below. If you didn't receive the email, we will gladly send you another.</p>
                                <h6 class="fw-bolder">
                                    {{ substr(session('email'), 0, 4) }}*******{{ substr(session('email'), -4) }}</h6>
                                @if (session('success'))
                                    <div class="alert alert-success mt-2" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger mt-2" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <div>
                                <form method="POST" action="{{ route('otp.check') }}">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ session('email') }}">
                                    <input type="hidden" name="otp" id="otp">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label fw-semibold">Type your 4
                                            digits
                                            security code</label>
                                        <div class="d-flex align-items-center gap-2 gap-sm-3">
                                            <input type="text" class="form-control text-center otp-input"
                                                placeholder="●" maxlength="1" inputmode="numeric" pattern="[0-9]"
                                                required>
                                            <input type="text" class="form-control text-center otp-input"
                                                placeholder="●" maxlength="1" inputmode="numeric" pattern="[0-9]"
                                                required>
                                            <input type="text" class="form-control text-center otp-input"
                                                placeholder="●" maxlength="1" inputmode="numeric" pattern="[0-9]"
                                                required>
                                            <input type="text" class="form-control text-center otp-input"
                                                placeholder="●" maxlength="1" inputmode="numeric" pattern="[0-9]"
                                                required>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 mb-4">Verify My
                                        Account</button>
                                </form>
                                <div class="d-flex align-items-center">
                                    <p class="fs-4 mb-0 text-dark">Didn't get the code?</p>
                                    <form method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button
                                            class="text-primary fw-medium ms-2 border-0 bg-white px-0">Resend</button>
                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        @if (session('success'))
            Toast.fire({
                icon: "success",
                title: "OTP Sended Successfully"
            });
        @endif
        document.querySelector('form[action="{{ route('verification.resend') }}"]').addEventListener('submit', function(e) {
            const resendButton = e.target.querySelector('button');
            resendButton.disabled = true;
            resendButton.textContent = 'Resending...';
        });
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('.otp-input');
            const hiddenInput = document.getElementById('otp');

            const updateHiddenInput = () => {
                let otpValue = '';
                inputs.forEach(input => {
                    otpValue += input.value;
                });
                hiddenInput.value = otpValue;
            };

            inputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    if (input.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                    updateHiddenInput();
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && input.value === '' && index > 0) {
                        inputs[index - 1].focus();
                    }
                    updateHiddenInput();
                });
            });

            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.setAttribute('data-placeholder', input
                        .placeholder);
                    input.placeholder = '';
                });

                input.addEventListener('blur', () => {
                    input.placeholder = input.getAttribute(
                        'data-placeholder');
                });
            });
        });
    </script>
</x-guest-layout>
