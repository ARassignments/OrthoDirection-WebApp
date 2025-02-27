@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">My Profile</h4>
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
                            <li class="breadcrumb-item" aria-current="page">My Profile</li>
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
                                    <img src="{{ $globalProfileImage }}" alt="" class="w-100 h-100">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="fs-5 mb-0 fw-semibold text-capitalize">{{ Auth::user() ? Auth::user()->name : '' }}
                            </h5>
                            <p class="mb-0 fs-4 text-capitalize">{{ Auth::user() ? Auth::user()->role : '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-last">
                    <ul
                        class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-end my-3 gap-3 px-4">
                        <li class="position-relative">
                            @if ($profile && $profile->facebook)
                                <a class="d-flex align-items-center justify-content-center text-bg-primary p-2 fs-4 rounded-circle"
                                    href="{{ $profile ? $profile->facebook : '' }}" width="30" height="30"
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
                            @if ($profile && $profile->twitter)
                                <a class="d-flex align-items-center justify-content-center text-bg-secondary p-2 fs-4 rounded-circle"
                                    href="{{ $profile ? $profile->twitter : '' }}" width="30" height="30"
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
                            @if ($profile && $profile->instagram)
                                <a class="d-flex align-items-center justify-content-center text-bg-danger p-2 fs-4 rounded-circle"
                                    href="{{ $profile ? $profile->instagram : '' }}" width="30" height="30"
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
                        @if (Auth::user())
                            @if (Auth::user()->role == 'admin')
                                <li><a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                                </li>
                            @elseif (Auth::user()->role == 'family')
                                <li><a href="{{ route('family.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                                </li>
                            @elseif (Auth::user()->role == 'patient')
                                <li><a href="{{ route('patient.profile.edit') }}" class="btn btn-primary">Edit
                                        Profile</a>
                                </li>
                            @elseif (Auth::user()->role == 'doctor')
                                <li><a href="{{ route('doctor.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
            <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-info-subtle rounded-2" id="pills-tab"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 active"
                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                        role="tab" aria-controls="pills-profile" aria-selected="true">
                        <i class="ti ti-user-circle me-2 fs-6"></i>
                        <span class="d-none d-md-block">Profile</span>
                    </button>
                </li>
                @if (Auth::user())
                    @if (Auth::user()->role == 'doctor')
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="pills-slots-tab" data-bs-toggle="pill" data-bs-target="#pills-slots" type="button"
                                role="tab" aria-controls="pills-slots" aria-selected="false" tabindex="-1">
                                <i class="ti ti-clock me-2 fs-6"></i>
                                <span class="d-none d-md-block">My Slots</span>
                            </button>
                        </li>
                    @elseif (Auth::user()->role == 'patient'||Auth::user()->role == 'family')
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="pills-familymember-tab" data-bs-toggle="pill" data-bs-target="#pills-familymember"
                                type="button" role="tab" aria-controls="pills-familymember" aria-selected="true"
                                tabindex="-1">
                                <i class="ti ti-users-group me-2 fs-6"></i>
                                <span class="d-none d-md-block">My Family Members</span>
                            </button>
                        </li>
                    @endif
                @endif
                <li class="nav-item" role="presentation">
                    <a class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                        href="{{ route('profile.edit') }}">
                        <i class="ti ti-settings me-2 fs-6"></i>
                        <span class="d-none d-md-block">My Account</span>
                    </a>
                </li>
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
                            <p>{{ $profile ? $profile->bio : '' }}</p>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center gap-3 mb-4">
                                    <i class="ti ti-mail text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">{{ Auth::user() ? Auth::user()->email : '' }}</h6>
                                </li>
                                @if ($profile)
                                    <li class="d-flex align-items-center gap-3 mb-4">
                                        <i class="ti ti-map-pin text-dark fs-6"></i>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $profile ? $profile->city : '' }},
                                            {{ $profile ? $profile->country : '' }}</h6>
                                    </li>
                                @endif
                                <li class="d-flex align-items-center gap-3 mb-2">
                                    <i class="ti ti-device-desktop text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">{{ Auth::user() ? Auth::user()->created_at : '' }}
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if ($profile)
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
                                                        {{ $profile ? $profile->gender : '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <h6 class="fs-4 fw-semibold mb-0 text-end col-md-4">Date of Birth:</h6>
                                                <div class="col-md-8">
                                                    <p class="form-control-static text-capitalize">
                                                        {{ $profile ? \Carbon\Carbon::parse($profile->date_of_birth)->format('F d, Y') : '' }}
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
                                                        {{ $profile ? $profile->address : '' }}
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
                                                        {{ $profile ? $profile->country : '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <h6 class="fs-4 fw-semibold mb-0 text-end col-md-4">City:</h6>
                                                <div class="col-md-8">
                                                    <p class="form-control-static text-capitalize">
                                                        {{ $profile ? $profile->city : '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if (Auth::user())
            @if (Auth::user()->role == 'doctor')
                <div class="tab-pane fade mb-5" id="pills-slots" role="tabpanel" aria-labelledby="pills-slots-tab"
                    tabindex="0">
                    <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                        <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">My Slots <span
                                class="badge text-bg-primary fs-2 rounded-4 py-1 px-2 ms-2" id="slotCount">01</span></h3>
                    </div>
                    <div class="row" id="slotContainer">
                    </div>
                </div>
            @elseif (Auth::user()->role == 'patient'||Auth::user()->role == 'family')
                <div class="tab-pane fade" id="pills-familymember" role="tabpanel"
                    aria-labelledby="pills-familymember-tab" tabindex="0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3 mb-4">
                        <div class="d-flex flex-wrap align-items-center justify-content-between flex-grow-1">
                            <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">My Family Members <span
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
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if (Auth::user())
                @if (Auth::user()->role == 'doctor')
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });

                    fetchSlots();

                    function fetchSlots() {
                        $.ajax({
                            url: "{{ route('doctor.slots') }}",
                            type: 'GET',
                            success: function(response) {
                                let slotCount = 0;
                                document.querySelector("#slotContainer").innerHTML = `
                                <div class="col-sm-6 col-lg-4">
                                    <div class="btn btn-outline-primary bg-primary-subtle text-primary d-block w-100 btn-add-slot">
                                        <div class="card-body p-4 text-center">
                                            <span class="fw-semibold d-block mb-2">
                                                <i class="ti ti-circle-plus fs-13"></i>
                                            </span>
                                            <span class="fw-semibold fs-5 d-block mb-0">Add Slot</span>
                                        </div>
                                    </div>
                                </div>
                                `;
                                response.forEach(slot => {
                                    document.querySelector("#slotContainer").innerHTML += `
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="card hover-img">
                                            <div class="card-body p-4 text-center border-bottom">
                                                <h5 class="fw-semibold fs-12 text-primary opacity-50 mb-0 ${slot.status == 1 ? 'opacity-100' : ''}">${formatTime(slot.available_time)}</h5>
                                            </div>
                                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                                <li>
                                                    <a href="javascript:void(0)" class="text-primary p-2 fs-5 rounded-circle editSlot" data-id="${slot.id}" data-time="${slot.available_time}">
                                                        <i class="ti ti-pencil"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="text-danger p-2 fs-5 rounded-circle deleteSlot" data-id="${slot.id}">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="form-check form-switch mb-0 mt-1 ms-2">
                                                        <input class="form-check-input updateStatus" data-id="${slot.id}" type="checkbox" name="status" id="status-${slot.id}"
                                                            value="0" ${slot.status == 1 ? 'checked' : ''}>
                                                        <label class="form-check-label mb-0" for="status-${slot.id}">Slot Visible</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>`;
                                    slotCount++;
                                });
                                document.querySelector("#slotCount").innerText = slotCount.toString()
                                    .padStart(
                                        2, '0');
                            }
                        });
                    }

                    $(document).on('click', '.btn-add-slot', function() {
                        Swal.fire({
                            title: 'Add Time Slot',
                            html: `<input type="time" id="slotTime" class="swal2-input w-75" placeholder="Enter time">`,
                            confirmButtonText: 'Add Slot',
                            confirmButtonColor: "#1376F8",
                            cancelButtonColor: "#d33",
                            showCloseButton: true,
                            preConfirm: () => {
                                let slotTime = $('#slotTime').val();
                                $.ajax({
                                    url: "{{ route('doctor.slots.store') }}",
                                    type: 'POST',
                                    data: {
                                        available_time: slotTime,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        Toast.fire({
                                            icon: "success",
                                            title: response.success,
                                        });
                                        fetchSlots();
                                    }
                                });
                            }
                        });
                    });

                    $(document).on('click', '.editSlot', function() {
                        let id = $(this).data('id');
                        let time = $(this).data('time');

                        Swal.fire({
                            title: 'Edit Time Slot',
                            html: `<input type="time" id="editTime" class="swal2-input w-75" value="${time}">`,
                            confirmButtonText: 'Update Slot',
                            confirmButtonColor: "#1376F8",
                            cancelButtonColor: "#d33",
                            showCloseButton: true,
                            preConfirm: () => {
                                let newTime = $('#editTime').val();
                                $.ajax({
                                    url: `{{ url('doctor/slots/slotUpdate') }}/${id}`,
                                    type: 'POST',
                                    data: {
                                        available_time: newTime,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        Toast.fire({
                                            icon: "success",
                                            title: response.success,
                                        });
                                        fetchSlots();
                                    }
                                });
                            }
                        });
                    });

                    $(document).on('click', '.deleteSlot', function() {
                        let id = $(this).data('id');

                        Swal.fire({
                            title: 'Are you sure?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            confirmButtonColor: "#1376F8",
                            cancelButtonColor: "#d33",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: `{{ url('doctor/slots/slotDestroy') }}/${id}`,
                                    type: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        Toast.fire({
                                            icon: "success",
                                            title: response.success,
                                        });
                                        fetchSlots();
                                    }
                                });
                            }
                        });
                    });

                    $(document).on('change', '.updateStatus', function() {
                        let slotId = $(this).data('id');
                        let status = $(this).is(':checked') ? 1 : 0;
                        let checkbox = $(this);
                        checkbox.prop('disabled', true);

                        $.ajax({
                            url: `{{ url('doctor/slots/slotStatusUpdate') }}/${slotId}`,
                            type: 'POST',
                            data: {
                                status: status,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                                fetchSlots();
                                checkbox.prop('disabled', false);
                            }
                        });
                    });

                    function formatTime(time) {
                        let [hours, minutes] = time.split(':');
                        let period = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12 || 12;
                        hours = hours.toString().padStart(2, '0');
                        return `${hours}:${minutes} ${period}`;
                    }
                @elseif (Auth::user()->role == 'patient')
                    function fetchFamilyMembers(search = '') {
                        $.ajax({
                            url: `{{ url(Auth::user()->role . '/family/familyFetch/' . Auth::user()->id) }}`,
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
                                                    <span class="badge text-bg-primary rounded-pill text-uppercase fs-1 mt-n2 mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Family Relation" data-bs-original-title="Family Relation">${doctor.pivot.relation}</span>
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
                                                        <a href="{{ url(Auth::user()->role . '/family/familyDetail') }}/${doctor.id}" class="link text-dark d-flex align-items-center justify-content-center font-weight-medium"><i class="ti ti-artboard me-1 fs-6"></i>Family Profile</a>
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
                @elseif (Auth::user()->role == 'family')
                    function fetchFamilyMembers(search = '') {
                        $.ajax({
                            url: `{{ url(Auth::user()->role . '/patients/patientFetch/' . Auth::user()->id) }}`,
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
                                                    <span class="badge text-bg-primary rounded-pill text-uppercase fs-1 mt-n2 mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Family Relation" data-bs-original-title="Family Relation">${doctor.pivot.relation}</span>
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
                                                        <a href="{{ url(Auth::user()->role . '/patients/patientDetail') }}/${doctor.id}" class="link text-dark d-flex align-items-center justify-content-center font-weight-medium"><i class="ti ti-artboard me-1 fs-6"></i>Family Profile</a>
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
