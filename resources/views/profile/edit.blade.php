@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">My Account</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">My Account</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card w-100 position-relative overflow-hidden mb-0">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Personal Details</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from
                        here</p>

                    <div class="text-center">
                        <img src="{{ $globalProfileImage }}" alt="" class="img-fluid rounded-circle"
                            width="120" height="120">
                    </div>
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold">Your
                                        Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Full Name" value="{{ Auth::user()->name }}" required autofocus
                                        autocomplete="name">
                                    <small>
                                        <x-input-error class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"
                                            :messages="$errors->get('name')" />
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="info@orthodirection.com" value="{{ Auth::user()->email }}" required
                                        autocomplete="username">
                                    <small>
                                        <x-input-error class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"
                                            :messages="$errors->get('email')" />
                                    </small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                    <button class="btn btn-primary">Save Changes</button>
                                    <button class="btn bg-danger-subtle text-danger" type="button">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100 position-relative overflow-hidden h-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Change Password</h5>
                    <p class="card-subtitle mb-4">To change your password please confirm here</p>
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        <div class="mb-4">
                            <label for="update_password_current_password" class="form-label fw-semibold">Current
                                Password</label>
                            <input type="password" name="current_password" class="form-control"
                                id="update_password_current_password" placeholder="●●●●●●●●●"
                                autocomplete="current-password">
                            <small>
                                <x-input-error :messages="$errors->updatePassword->get('current_password')"
                                    class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger" />
                            </small>
                        </div>
                        <div class="mb-4">
                            <label for="update_password_password" class="form-label fw-semibold">New
                                Password</label>
                            <input type="password" name="password" class="form-control" placeholder="●●●●●●●●●"
                                id="update_password_password" autocomplete="new-password">
                            <small>
                                <x-input-error :messages="$errors->updatePassword->get('password')"
                                    class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger" />
                            </small>
                        </div>
                        <div class="mb-4">
                            <label for="update_password_password_confirmation" class="form-label fw-semibold">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="●●●●●●●●●"
                                id="update_password_password_confirmation" autocomplete="new-password">
                            <small>
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                                    class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger" />
                            </small>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                <button class="btn btn-primary">Save Changes</button>
                                <button class="btn bg-danger-subtle text-danger" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <form method="post" action="{{ route('profile.destroy') }}" class="card">
                @csrf
                @method('delete')
                <div class="card-body p-4">
                    <h4 class="fw-semibold mb-3">Delete Account</h4>
                    <p>Once your account is deleted, all of its resources and data will be permanently
                        deleted. Before deleting your account, please download any data or information
                        that you wish to retain.</p>
                    <div class="d-flex align-items-center gap-3">
                        <button class="btn btn-outline-danger">Delete Account</button>
                    </div>
                </div>
            </form>
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
        @if (session('status') === 'password-updated')
            Toast.fire({
                icon: "success",
                title: "Password Updated"
            });
        @endif
        @if (session('status') === 'profile-updated')
            Toast.fire({
                icon: "success",
                title: "Profile Updated"
            });
        @endif
    </script>
@endsection
