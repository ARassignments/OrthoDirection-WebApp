@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">My Account</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @if (Auth::user())
                                @if (Auth::user()->role == 'admin')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                @elseif (Auth::user()->role == 'family')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('family.dashboard') }}">Home</a>
                                    </li>
                                @elseif (Auth::user()->role == 'patient')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('patient.dashboard') }}">Home</a>
                                    </li>
                                @elseif (Auth::user()->role == 'doctor')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('doctor.dashboard') }}">Home</a>
                                    </li>
                                @endif
                            @endif

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

    <div class="card">
        <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4 active"
                    id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button"
                    role="tab" aria-controls="pills-account" aria-selected="true" tabindex="-1">
                    <i class="ti ti-user-circle me-2 fs-6"></i>
                    <span class="d-none d-md-block">Account</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                    id="pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications" type="button"
                    role="tab" aria-controls="pills-notifications" aria-selected="false" tabindex="-1">
                    <i class="ti ti-bell me-2 fs-6"></i>
                    <span class="d-none d-md-block">Notifications</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                    id="pills-bills-tab" data-bs-toggle="pill" data-bs-target="#pills-bills" type="button" role="tab"
                    aria-controls="pills-bills" aria-selected="false" tabindex="-1">
                    <i class="ti ti-article me-2 fs-6"></i>
                    <span class="d-none d-md-block">Bills</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                    id="pills-security-tab" data-bs-toggle="pill" data-bs-target="#pills-security" type="button"
                    role="tab" aria-controls="pills-security" aria-selected="false">
                    <i class="ti ti-lock me-2 fs-6"></i>
                    <span class="d-none d-md-block">Security</span>
                </button>
            </li>
        </ul>
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="pills-account" role="tabpanel"
                    aria-labelledby="pills-account-tab" tabindex="0">
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
                                                    <input type="text" id="name" name="name"
                                                        class="form-control" placeholder="Full Name"
                                                        value="{{ Auth::user()->name }}" required autofocus
                                                        autocomplete="name">
                                                    <small>
                                                        <x-input-error
                                                            class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"
                                                            :messages="$errors->get('name')" />
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label for="email" class="form-label fw-semibold">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        id="email" placeholder="info@orthodirection.com"
                                                        value="{{ Auth::user()->email }}" required
                                                        autocomplete="username">
                                                    <small>
                                                        <x-input-error
                                                            class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"
                                                            :messages="$errors->get('email')" />
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                    <button class="btn btn-primary">Save Changes</button>
                                                    <button class="btn bg-danger-subtle text-danger"
                                                        type="button">Cancel</button>
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
                                            <label for="update_password_current_password"
                                                class="form-label fw-semibold">Current
                                                Password</label>
                                            <div class="input-wrap">
                                                <input type="password" name="current_password" class="form-control"
                                                    id="update_password_current_password" placeholder="●●●●●●●●●"
                                                    autocomplete="current-password">
                                            </div>
                                            <small>
                                                <x-input-error :messages="$errors->updatePassword->get('current_password')"
                                                    class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger" />
                                            </small>
                                        </div>
                                        <div class="mb-4">
                                            <label for="update_password_password" class="form-label fw-semibold">New
                                                Password</label>
                                            <div class="input-wrap">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="●●●●●●●●●" id="update_password_password"
                                                    autocomplete="new-password">
                                            </div>
                                            <small>
                                                <x-input-error :messages="$errors->updatePassword->get('password')"
                                                    class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger" />
                                            </small>
                                        </div>
                                        <div class="mb-4">
                                            <label for="update_password_password_confirmation"
                                                class="form-label fw-semibold">Confirm
                                                Password</label>
                                            <div class="input-wrap">
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    placeholder="●●●●●●●●●" id="update_password_password_confirmation"
                                                    autocomplete="new-password">
                                            </div>
                                            <small>
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                                                    class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger" />
                                            </small>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                <button class="btn btn-primary">Save Changes</button>
                                                <button class="btn bg-danger-subtle text-danger"
                                                    type="button">Cancel</button>
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
                </div>
                <div class="tab-pane fade" id="pills-notifications" role="tabpanel"
                    aria-labelledby="pills-notifications-tab" tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Notification Preferences</h4>
                                    <p>
                                        Select the notifications you would like to receive via email. Please note that you
                                        cannot opt out of receiving service messages, such as payment, security, or legal
                                        notifications.
                                    </p>
                                    <form id="notification-form" class="mb-7">
                                        <label for="email" class="form-label fw-semibold">Email Address*</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ auth()->user()->email ?? '' }}" required>
                                        <p class="mb-0">Required for notifications.</p>
                                    </form>
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-article text-dark d-block fs-7" width="22"
                                                        height="22"></i>
                                                </div>
                                                <div>
                                                    <h5 class="fs-4 fw-semibold">Our newsletter</h5>
                                                    <p class="mb-0">We'll always let you know about important changes</p>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch mb-0">
                                                <input class="form-check-input notification-switch" type="checkbox"
                                                    id="newsletterSwitch" data-type="newsletter"
                                                    {{ auth()->user()->newsletter ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-mail text-dark d-block fs-7" width="22"
                                                        height="22"></i>
                                                </div>
                                                <div>
                                                    <h5 class="fs-4 fw-semibold">Email Notification</h5>
                                                    <p class="mb-0">Turn on email notification to get updates through
                                                        email</p>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch mb-0">
                                                <input class="form-check-input notification-switch" type="checkbox"
                                                    id="emailSwitch" data-type="email_notification"
                                                    {{ auth()->user()->email_notification ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Date &amp; Time</h4>
                                    <p>Time zones and calendar display settings.</p>
                                    <div class="d-flex align-items-center justify-content-between mt-7">
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-clock-hour-4 text-dark d-block fs-7" width="22"
                                                    height="22"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0">Time zone</p>
                                                <h5 class="fs-4 fw-semibold" id="user-timezone">(UTC + 02:00) Athens,
                                                    Bucharet</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Ignore Tracking</h4>
                                    <div class="d-flex align-items-center justify-content-between mt-7">
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-player-pause text-dark d-block fs-7" width="22"
                                                    height="22"></i>
                                            </div>
                                            <div>
                                                <h5 class="fs-4 fw-semibold">Ignore Browser Tracking</h5>
                                                <p class="mb-0">Browser Cookie</p>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input ignore-tracking-switch" type="checkbox"
                                                role="switch" id="ignoreTrackingSwitch"
                                                {{ session('ignore_tracking') ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-bills" role="tabpanel" aria-labelledby="pills-bills-tab"
                    tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Billing Information</h4>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="exampleInputtext6" class="form-label fw-semibold">Business
                                                        Name*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext6"
                                                        placeholder="Visitor Analytics">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="exampleInputtext7" class="form-label fw-semibold">Business
                                                        Address*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext7"
                                                        placeholder="">
                                                </div>
                                                <div class="">
                                                    <label for="exampleInputtext8" class="form-label fw-semibold">First
                                                        Name*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext8"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="exampleInputtext9" class="form-label fw-semibold">Business
                                                        Sector*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext9"
                                                        placeholder="Arts, Media &amp; Entertainment">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="exampleInputtext10"
                                                        class="form-label fw-semibold">Country*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext10"
                                                        placeholder="Romania">
                                                </div>
                                                <div class="">
                                                    <label for="exampleInputtext11" class="form-label fw-semibold">Last
                                                        Name*</label>
                                                    <input type="text" class="form-control" id="exampleInputtext11"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Current Plan : <span
                                            class="text-success">Executive</span></h4>
                                    <p>Thanks for being a premium member and supporting our development.</p>
                                    <div class="d-flex align-items-center justify-content-between mt-7 mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-package text-dark d-block fs-7" width="22"
                                                    height="22"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0">Current Plan</p>
                                                <h5 class="fs-4 fw-semibold">750.000 Monthly Visits</h5>
                                            </div>
                                        </div>
                                        <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add">
                                            <i class="ti ti-circle-plus"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <button class="btn btn-primary">Change Plan</button>
                                        <button class="btn btn-outline-danger">Reset Plan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Payment Method</h4>
                                    <p>On 26 December, 2023</p>
                                    <div class="d-flex align-items-center justify-content-between mt-7">
                                        <div class="d-flex align-items-center gap-3">
                                            <div
                                                class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-credit-card text-dark d-block fs-7" width="22"
                                                    height="22"></i>
                                            </div>
                                            <div>
                                                <h5 class="fs-4 fw-semibold">Visa</h5>
                                                <p class="mb-0 text-dark">*****2102</p>
                                            </div>
                                        </div>
                                        <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Edit">
                                            <i class="ti ti-pencil-minus"></i>
                                        </a>
                                    </div>
                                    <p class="my-2">If you updated your payment method, it will only be dislpayed here
                                        after your
                                        next billing cycle.</p>
                                    <div class="d-flex align-items-center gap-3">
                                        <button class="btn btn-outline-danger">Cancel Subscription</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <button class="btn btn-primary">Save</button>
                                <button class="btn bg-danger-subtle text-danger">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab"
                    tabindex="0">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h4 class="fw-semibold mb-3">Two-factor Authentication</h4>
                                    <div class="d-flex align-items-center justify-content-between pb-7">
                                        <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                            Corporis sapiente
                                            sunt earum officiis laboriosam ut.</p>
                                        <button class="btn btn-primary">Enable</button>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between py-3 border-top">
                                        <div>
                                            <h5 class="fs-4 fw-semibold mb-0">Authentication App</h5>
                                            <p class="mb-0">Google auth app</p>
                                        </div>
                                        <button class="btn bg-primary-subtle text-primary">Setup</button>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between py-3 border-top">
                                        <div>
                                            <h5 class="fs-4 fw-semibold mb-0">Another e-mail</h5>
                                            <p class="mb-0">E-mail to send verification link</p>
                                        </div>
                                        <button class="btn bg-primary-subtle text-primary">Setup</button>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between py-3 border-top">
                                        <div>
                                            <h5 class="fs-4 fw-semibold mb-0">SMS Recovery</h5>
                                            <p class="mb-0">Your phone number or something</p>
                                        </div>
                                        <button class="btn bg-primary-subtle text-primary">Setup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div
                                        class="text-bg-light rounded-1 p-6 d-inline-flex align-items-center justify-content-center mb-3">
                                        <i class="ti ti-device-laptop text-primary d-block fs-7" width="22"
                                            height="22"></i>
                                    </div>
                                    <h5 class="fs-5 fw-semibold mb-0">Devices</h5>
                                    <p class="mb-3">Manage your logged-in devices below.</p>
                                    <button class="btn btn-primary mb-4" id="signOutAllBtn">Sign out from all
                                        devices</button>
                                    <div id="device-list">
                                        <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                                            <div class="d-flex align-items-center gap-3">
                                                <i class="ti ti-device-mobile text-dark d-block fs-7" width="26"
                                                    height="26"></i>
                                                <div>
                                                    <h5 class="fs-4 fw-semibold mb-0">iPhone 14</h5>
                                                    <p class="mb-0">London UK, Oct 23 at 1:15 AM</p>
                                                </div>
                                            </div>
                                            <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                                                href="javascript:void(0)">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between py-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <i class="ti ti-device-laptop text-dark d-block fs-7" width="26"
                                                    height="26"></i>
                                                <div>
                                                    <h5 class="fs-4 fw-semibold mb-0">Macbook Air</h5>
                                                    <p class="mb-0">Gujarat India, Oct 24 at 3:15 AM</p>
                                                </div>
                                            </div>
                                            <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                                                href="javascript:void(0)">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <button class="btn bg-primary-subtle text-primary w-100 py-1">Need Help ?</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
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

        $(document).ready(function() {
            function fetchDeviceLogs() {
                $.ajax({
                    url: "{{ route('devices.getDevices') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $("#device-list").empty();
                        if (response.length > 0) {
                            $.each(response, function(index, device) {
                                let deviceIcon = device.platform.toLowerCase().includes(
                                        "iphone") ?
                                    '<i class="ti ti-device-mobile text-dark d-block fs-7" width="26" height="26"></i>' :
                                    '<i class="ti ti-device-laptop text-dark d-block fs-7" width="26" height="26"></i>';

                                let deviceHTML = `
                                    <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                                        <div class="d-flex align-items-center gap-3">
                                            ${deviceIcon}
                                            <div>
                                                <h5 class="fs-4 fw-semibold mb-0">${device.device_name}</h5>
                                                <p class="mb-0">${device.location}, ${formatDateTime(device.logged_in_at)}</p>
                                            </div>
                                        </div>
                                        <div class="dropdown dropstart">
                                            <a href="javascript:void(0)" class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical fs-6"></i>
                                            </a>
                                            <ul class="dropdown-menu p-0 overflow-hidden" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item btn bg-danger-subtle text-danger d-flex align-items-center gap-3 deviceLogoutBtn" href="javascript:void(0)" data-id="${device.id}">
                                                        <i class="fs-4 ti ti-power"></i>Logout
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                `;
                                $("#device-list").append(deviceHTML);
                            });
                        } else {
                            $("#device-list").html('<p class="text-muted">No devices found.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        Toast.fire({
                            icon: "error",
                            title: "Failed to load devices."
                        });
                    }
                });
            }

            function formatDateTime(dateTime) {
                let date = new Date(dateTime);
                return date.toLocaleString('en-US', {
                    dateStyle: 'medium',
                    timeStyle: 'short'
                });
            }

            fetchDeviceLogs();

            $('#signOutAllBtn').click(function() {
                Swal.fire({
                    title: "Are you sure?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#1376F8",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Logout!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('devices.logout.all') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                window.location.href = "{{ route('logout') }}";
                                const Toaster = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal
                                            .resumeTimer;
                                    },
                                    didClose: () => {
                                        fetchDeviceLogs();
                                    }
                                });
                                Toast.fire({
                                    icon: "success",
                                    title: response.message
                                });
                            },
                            error: function(xhr) {
                                Toast.fire({
                                    icon: "error",
                                    title: "Error logging out from devices."
                                });
                            }
                        });
                    }
                });
            });

            $(document).on('click', '.deviceLogoutBtn', function() {
                Swal.fire({
                    title: "Are you sure?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#1376F8",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Logout!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let id = $(this).data('id');
                        $.ajax({
                            url: `{{ url('devices/logout') }}/${id}`,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                fetchDeviceLogs();
                                const Toaster = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal
                                            .resumeTimer;
                                    }
                                });
                                Toast.fire({
                                    icon: "success",
                                    title: response.message
                                });
                            },
                            error: function(xhr) {
                                Toast.fire({
                                    icon: "error",
                                    title: "Error logging out from device."
                                });
                            }
                        });
                    }
                });
            });

            let timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            document.getElementById('user-timezone').innerText =
                `(UTC ${new Date().toLocaleTimeString('en-us',{timeZoneName:'short'}).split(' ')[2]}) ${timezone}`;

            document.getElementById('ignoreTrackingSwitch').addEventListener('change', function() {
                let ignoreTracking = this.checked ? 1 : 0;
                fetch("{{ route('tracking.ignore') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            ignore_tracking: ignoreTracking
                        })
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Toast.fire({
                                icon: "success",
                                title: data.message
                            });
                        } else {
                            Toast.fire({
                                icon: "error",
                                title: "Error updating setting"
                            });
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                    });
            });

            document.querySelectorAll('.notification-switch').forEach(item => {
                item.addEventListener('change', function() {
                    let notificationType = this.getAttribute('data-type');
                    let isChecked = this.checked ? 1 : 0;

                    fetch("{{ route('notifications.update') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                type: notificationType,
                                status: isChecked
                            })
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: data.message
                                });
                            } else {
                                Toast.fire({
                                    icon: "error",
                                    title: "Error updating notification preference"
                                });
                            }
                        }).catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>
@endsection
