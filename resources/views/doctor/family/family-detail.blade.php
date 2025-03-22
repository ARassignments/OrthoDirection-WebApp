@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ $family->name }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @if (Auth::user())
                                @if (Auth::user()->role == 'admin')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="{{ route('admin.family') }}">Family
                                            Members</a>
                                    </li>
                                @elseif (Auth::user()->role == 'doctor')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('doctor.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="javascript:void(0)">Family
                                            Members</a>
                                    </li>
                                @elseif (Auth::user()->role == 'patient')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('patient.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="javascript:void(0)">Family
                                            Members</a>
                                    </li>
                                @endif
                            @endif
                            <li class="breadcrumb-item" aria-current="page">{{ $family->name }}</li>
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

    <style>
        .app-calendar .fc .fc-daygrid-day.fc-day-today .fc-daygrid-day-frame {
            background-color: #1376F8 !important;
            color: white !important;
        }
    </style>

    <div class="card overflow-hidden">
        <div class="card-body p-0">
            <img src="assets/images/backgrounds/profilebg.jpg" alt="" class="img-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="d-flex align-items-center justify-content-around m-4">
                        <div class="text-center">
                            <i class="ti ti-file-description fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1">938</h4>
                            <p class="mb-0 fs-4">Posts</p>
                        </div>
                        <div class="text-center">
                            <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1">3,586</h4>
                            <p class="mb-0 fs-4">Followers</p>
                        </div>
                        <div class="text-center">
                            <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1">2,659</h4>
                            <p class="mb-0 fs-4">Following</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                    <div class="mt-n5">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 110px; height: 110px;" ;="">
                                <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                    style="width: 100px; height: 100px;" ;="">
                                    <img src="{{ $family->adminProfile->profile_img ? asset('profile_images/' . $family->adminProfile->profile_img) : 'assets/images/profile/user-1.jpg' }}"
                                        alt="" class="w-100 h-100">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="fs-5 mb-0 fw-semibold text-capitalize">{{ $family->name }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-last">
                    <ul
                        class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-end my-3 gap-3 px-4">
                        <li class="position-relative">
                            @if ($family->adminProfile->facebook)
                                <a class="d-flex align-items-center justify-content-center text-bg-primary p-2 fs-4 rounded-circle"
                                    href="{{ $family->adminProfile->facebook }}" width="30" height="30"
                                    target="_blank">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            @else
                                <button
                                    class="btn d-flex align-items-center justify-content-center text-bg-primary p-2 fs-4 rounded-circle disabled"
                                    type="button" width="30" height="30" disabled>
                                    <i class="ti ti-brand-facebook"></i>
                                </button>
                            @endif
                        </li>
                        <li class="position-relative">
                            @if ($family->adminProfile->twitter)
                                <a class="d-flex align-items-center justify-content-center text-bg-secondary p-2 fs-4 rounded-circle"
                                    href="{{ $family->adminProfile->twitter }}" width="30" height="30"
                                    target="_blank">
                                    <i class="ti ti-brand-twitter"></i>
                                </a>
                            @else
                                <button
                                    class="btn d-flex align-items-center justify-content-center text-bg-secondary p-2 fs-4 rounded-circle disabled"
                                    type="button" width="30" height="30" disabled>
                                    <i class="ti ti-brand-twitter"></i>
                                </button>
                            @endif
                        </li>
                        <li class="position-relative">
                            @if ($family->adminProfile->instagram)
                                <a class="d-flex align-items-center justify-content-center text-bg-danger p-2 fs-4 rounded-circle"
                                    href="{{ $family->adminProfile->instagram }}" width="30" height="30"
                                    target="_blank">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            @else
                                <button
                                    class="btn d-flex align-items-center justify-content-center text-bg-danger p-2 fs-4 rounded-circle disabled"
                                    type="button" width="30" height="30" disabled>
                                    <i class="ti ti-brand-instagram"></i>
                                </button>
                            @endif
                        </li>
                        <li class="position-relative">
                            @if ($family->adminProfile->contact)
                                <a class="d-flex align-items-center justify-content-center text-bg-warning p-2 fs-4 rounded-circle"
                                    href="tel:{{ $family->adminProfile->contact }}" width="30" height="30">
                                    <i class="ti ti-phone"></i>
                                </a>
                            @else
                                <button
                                    class="btn d-flex align-items-center justify-content-center text-bg-warning p-2 fs-4 rounded-circle disabled"
                                    type="button" width="30" height="30" disabled>
                                    <i class="ti ti-phone"></i>
                                </button>
                            @endif
                        </li>
                        <li class="position-relative">
                            @if ($family->email)
                                <a class="d-flex align-items-center justify-content-center text-bg-secondary p-2 fs-4 rounded-circle"
                                    href="mailto:{{ $family->email }}" width="30" height="30">
                                    <i class="ti ti-mail"></i>
                                </a>
                            @else
                                <button
                                    class="btn d-flex align-items-center justify-content-center text-bg-secondary p-2 fs-4 rounded-circle disabled"
                                    type="button" width="30" height="30" disabled>
                                    <i class="ti ti-mail"></i>
                                </button>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-info-subtle rounded-2" id="pills-tab"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 active"
                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                        role="tab" aria-controls="pills-profile" aria-selected="false">
                        <i class="ti ti-user-circle me-2 fs-6"></i>
                        <span class="d-none d-md-block">Profile</span>
                    </button>
                </li>
                @if (Auth::user())
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'doctor')
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="pills-familymember-tab" data-bs-toggle="pill" data-bs-target="#pills-familymember"
                                type="button" role="tab" aria-controls="pills-familymember" aria-selected="true"
                                tabindex="-1">
                                <i class="ti ti-users-group me-2 fs-6"></i>
                                <span class="d-none d-md-block">Family Members</span>
                            </button>
                        </li>
                    @endif
                @endif

            </ul>
        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-none border">
                        <div class="card-body">
                            <h4 class="fw-semibold mb-3">Introduction</h4>
                            <p>{{ $family->adminProfile->bio ?? 'No bio available' }}</p>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center gap-3 mb-4">
                                    <i class="ti ti-mail text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">{{ $family->email }}</h6>
                                </li>
                                <li class="d-flex align-items-center gap-3 mb-4">
                                    <i class="ti ti-map-pin text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">{{ $family->adminProfile->city }},
                                        {{ $family->adminProfile->country }}</h6>
                                </li>
                                <li class="d-flex align-items-center gap-3 mb-2">
                                    <i class="ti ti-device-desktop text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">{{ $family->created_at }}
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card shadow-none border">
                        <div class="card-body">
                            <h4 class="fw-semibold mb-3">Person Info</h4>
                            <hr class="mt-0 mb-4">
                            <div class="card-body py-0 pb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <h6 class="fs-4 fw-semibold mb-0 text-end col-md-3">Gender:</h6>
                                            <div class="col-md-9">
                                                <p class="form-control-static text-capitalize">
                                                    {{ $family->adminProfile->gender }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <h6 class="fs-4 fw-semibold mb-0 text-end col-md-4">Date of Birth:</h6>
                                            <div class="col-md-8">
                                                <p class="form-control-static text-capitalize">
                                                    {{ \Carbon\Carbon::parse($family->adminProfile->date_of_birth)->format('F d, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="fw-semibold mb-3">Address</h4>
                            <hr class="mt-0 mb-4">
                            <div class="card-body py-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <h6 class="fs-4 fw-semibold mb-0 text-end col-md-3">Address:</h6>
                                            <div class="col-md-9">
                                                <p class="form-control-static">
                                                    {{ $family->adminProfile->address }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <h6 class="fs-4 fw-semibold mb-0 text-end col-md-3">Country:</h6>
                                            <div class="col-md-9">
                                                <p class="form-control-static text-capitalize">
                                                    {{ $family->adminProfile->country }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <h6 class="fs-4 fw-semibold mb-0 text-end col-md-4">City:</h6>
                                            <div class="col-md-8">
                                                <p class="form-control-static text-capitalize">
                                                    {{ $family->adminProfile->city }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user())
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'doctor')
                <div class="tab-pane fade" id="pills-familymember" role="tabpanel"
                    aria-labelledby="pills-familymember-tab" tabindex="0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3 mb-4">
                        <div class="d-flex flex-wrap align-items-center justify-content-between flex-grow-1">
                            <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Family Members <span
                                    class="badge text-bg-primary fs-2 rounded-4 py-1 px-2 ms-2" id="count">0</span>
                            </h3>
                        </div>

                        <form class="position-relative flex-lg-grow-0 flex-grow-1" id="topContainer">
                            <input type="text" class="form-control search-chat py-2 ps-5" id="search"
                                placeholder="Search Family Member">
                            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                        </form>
                    </div>
                    <div class="col-12 position-relative" style="z-index: 20;">
                        <div class="position-absolute top-0 left-0 w-100 bg-white" id="loader">
                            <div class="d-flex align-items-center justify-content-center" style="height: 60vh;">
                                <div class="spinner-border text-primary" style="width: 4rem; height: 4rem"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                    <img src="{{ asset('assets/images/favicon.png') }}" class="w-100 h-100 p-2"
                                        style="object-fit: cover" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="familyContainer">
                        <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                            <div class="row justify-content-center w-100">
                                <div class="col-lg-8">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/dash/assets/images/backgrounds/family_bg.svg') }}"
                                            alt="" class="img-fluid w-100">
                                        <h3 class="fw-semibold mb-3">Family Member Not Found!!!</h3>
                                        <p class="fw-normal mb-7 fs-4">It seems the family members you’re looking for is
                                            unavailable. Please
                                            check
                                            back later or explore other content.</p>
                                        <a class="btn btn-primary" href="javascript:void()"
                                            onclick="window.location.reload()" role="button">Try Again...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>


    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/fullcalendar/index.global.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if (Auth::user())
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'doctor')
                    function fetchFamilyMembers(search = '') {
                        $.ajax({
                            url: `{{ url(Auth::user()->role . '/patients/patientFetch/' . $family->id) }}`,
                            type: 'GET',
                            data: {
                                search: search
                            },
                            beforeSend: function() {
                                $('#loader').fadeIn(500).show();
                            },
                            complete: function() {
                                $('#loader').fadeOut(500);
                            },
                            success: function(response) {
                                let doctorHTML = '';
                                if (response.length === 0) {
                                    document.querySelector("#count").innerText = 0;
                                    if (search.trim() !== '') {
                                        $("#topContainer, #count").removeClass("d-none");
                                    } else {
                                        $("#topContainer, #count").addClass("d-none");
                                    }
                                    document.querySelector("#familyContainer").innerHTML = `
                                    <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                                        <div class="row justify-content-center w-100">
                                            <div class="col-lg-8">
                                                <div class="text-center">
                                                    <img src="{{ asset('assets/dash/assets/images/backgrounds/family_bg.svg') }}" alt=""
                                                        class="img-fluid w-100">
                                                    <h3 class="fw-semibold mb-3">Family Members Not Found!!!</h3>
                                                    <p class="fw-normal mb-7 fs-4">It seems the family members you’re looking for is unavailable. Please check
                                                        back later or explore other content.</p>
                                                    <a class="btn btn-primary" href="javascript:void()" onclick="window.location.reload()"
                                                        role="button">Try Again...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    `;
                                    return;
                                }
                                response.forEach(doctor => {
                                    let profileImage = doctor.admin_profile.profile_img ?
                                        `{{ asset('profile_images/${doctor.admin_profile.profile_img}') }}` :
                                        `assets/images/profile/user-1.jpg`;
                                    doctorHTML += `
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body p-4 text-center">
                                                <div class="profile-pic d-flex flex-column align-items-center">
                                                    <img src="${profileImage}" alt="" class="rounded-circle" width="80" height="80">
                                                    <span class="badge text-bg-primary rounded-pill text-uppercase fs-1 mt-n2 mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Relation As" data-bs-original-title="Relation As">${doctor.pivot.relation}</span>
                                                    <h5 class="fw-semibold mb-0">${doctor.name}</h5>
                                                    <span class="text-dark fs-2">${doctor.admin_profile.bio ?? 'No bio available'}</span>
                                                </div>
                                            </div>
                                            <div class="p-4 border-top">
                                                <div class="row text-center">
                                                    <div class="col-6 border-end">
                                                        <a href="#" class="link text-dark d-flex align-items-center justify-content-center font-weight-medium"><i class="ti ti-message me-1 fs-6"></i>Message</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="{{ url(Auth::user()->role . '/patients/patientDetail') }}/${doctor.id}" class="link text-dark d-flex align-items-center justify-content-center font-weight-medium"><i class="ti ti-artboard me-1 fs-6"></i>User Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                });
                                document.querySelector("#familyContainer").innerHTML = doctorHTML;
                                document.querySelector("#count").innerText = response.length.toString()
                                    .padStart(2, '0');
                                var tooltipTriggerList = [].slice.call(document.querySelectorAll(
                                    '[data-bs-toggle="tooltip"]'));
                                tooltipTriggerList.map(function(tooltipTriggerEl) {
                                    return new bootstrap.Tooltip(tooltipTriggerEl);
                                });
                            }
                        });
                    }

                    fetchFamilyMembers();
                    $('#search').on('keyup', function() {
                        let searchValue = $(this).val();
                        fetchFamilyMembers(searchValue);
                    });
                @endif
            @endif
        });
    </script>
@endsection
