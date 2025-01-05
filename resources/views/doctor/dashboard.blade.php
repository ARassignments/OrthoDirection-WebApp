@extends('doctor.index')
@section('content')
<!--  Owl carousel -->
<div class="owl-carousel counter-carousel owl-theme">
    <div class="item">
        <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
            <div class="card-body">
                <div class="text-center">
                    <img src="assets/images/svgs/icon-user-male.svg" width="50"
                        height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-primary mb-1">
                        Users
                    </p>
                    <h5 class="fw-semibold text-primary mb-0">96</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
            <div class="card-body">
                <div class="text-center">
                    <img src="assets/images/svgs/icon-briefcase.svg" width="50"
                        height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-warning mb-1">Appointments</p>
                    <h5 class="fw-semibold text-warning mb-0">3,650</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card border-0 zoom-in bg-info-subtle shadow-none">
            <div class="card-body">
                <div class="text-center">
                    <img src="assets/images/svgs/icon-mailbox.svg" width="50"
                        height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-info mb-1">Mails</p>
                    <h5 class="fw-semibold text-info mb-0">356</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
            <div class="card-body">
                <div class="text-center">
                    <img src="assets/images/svgs/icon-favorites.svg" width="50"
                        height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-danger mb-1">Blogs</p>
                    <h5 class="fw-semibold text-danger mb-0">696</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card border-0 zoom-in bg-success-subtle shadow-none">
            <div class="card-body">
                <div class="text-center">
                    <img src="assets/images/svgs/icon-speech-bubble.svg" width="50"
                        height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-success mb-1">Messages</p>
                    <h5 class="fw-semibold text-success mb-0">96k</h5>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="item d-none">
        <div class="card border-0 zoom-in bg-info-subtle shadow-none">
            <div class="card-body">
                <div class="text-center">
                    <img src="assets/images/svgs/icon-connect.svg" width="50"
                        height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-info mb-1">Reports</p>
                    <h5 class="fw-semibold text-info mb-0">59</h5>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection