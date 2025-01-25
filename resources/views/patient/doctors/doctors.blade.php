@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Doctors</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('patient.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Doctors</li>
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

    <div class="col-12 position-relative" style="z-index: 20;">
        <div class="position-absolute top-0 left-0 w-100 bg-white" id="loader">
            <div class="d-flex align-items-center justify-content-center" style="height: 60vh;">
                <div class="spinner-border text-primary" style="width: 4rem; height: 4rem" role="status">
                    <span class="visually-hidden">Loading...</span>
                    <img src="{{ asset('assets/images/favicon.png') }}" class="w-100 h-100 p-2" style="object-fit: cover"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex align-items-center justify-content-between mt-3 mb-4" id="topContainer">
            <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Doctors <span
                    class="badge text-bg-primary fs-2 rounded-4 py-1 px-2 ms-2" id="count">0</span></h3>
            <form class="position-relative">
                <input type="text" class="form-control search-chat py-2 ps-5" id="search"
                    placeholder="Search Doctors">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
            </form>
        </div>
        <div class="row" id="doctorContainer">
            <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <img src="{{ asset('assets/dash/assets/images/backgrounds/doctors_bg.svg') }}" alt=""
                                class="img-fluid w-100">
                            <h3 class="fw-semibold mb-3">Doctors Not Found!!!</h3>
                            <p class="fw-normal mb-7 fs-4">It seems the doctors you’re looking for is unavailable. Please
                                check
                                back later or explore other content.</p>
                            <a class="btn btn-primary" href="javascript:void()" onclick="window.location.reload()"
                                role="button">Try Again...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        $(document).ready(function() {
            function fetchDoctors(search = '') {
                $.ajax({
                    url: "{{ route('patient.doctors.fetch') }}", // Your Laravel route
                    type: 'GET',
                    data: {
                        search: search
                    },
                    beforeSend: function() {
                        $('#loader').fadeIn(500).show();
                    },
                    complete: function() {
                        $('#loader').fadeOut(500);;
                    },
                    success: function(response) {
                        let doctorHTML = '';
                        if (response.length === 0) {
                            document.querySelector("#count").innerText = 0;
                            if (search.trim() !== '') {
                                $("#topContainer").removeClass("d-none");
                            } else {
                                $("#topContainer").addClass("d-none");
                            }
                            document.querySelector("#doctorContainer").innerHTML = `
                            <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                                <div class="row justify-content-center w-100">
                                    <div class="col-lg-8">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/dash/assets/images/backgrounds/doctors_bg.svg') }}" alt=""
                                                class="img-fluid w-100">
                                            <h3 class="fw-semibold mb-3">Doctors Not Found!!!</h3>
                                            <p class="fw-normal mb-7 fs-4">It seems the doctors you’re looking for is unavailable. Please check
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
                            let profileImage = doctor.admin_profile.profile_img?`{{asset('profile_images/${doctor.admin_profile.profile_img}')}}`:`assets/images/profile/user-1.jpg`;
                            doctorHTML += `
                            <div class="col-sm-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body p-4 text-center">
                                        <div class="profile-pic">
                                            <img src="${profileImage}" alt="" class="rounded-circle mb-3" width="80" height="80">
                                            <h5 class="fw-semibold mb-0">${doctor.name}</h5>
                                            <span class="text-dark fs-2 mb-0">${doctor.admin_profile.bio ?? 'No bio available'}</span>
                                        </div>
                                    </div>
                                    <div class="px-3 py-3 border-top">
                                        <div class="d-flex text-center gap-3">
                                            <a href="#" class="col btn btn-light bg-light-subtle text-dark border-0 px-0">
                                                <span class="align-items-center justify-content-center font-weight-medium d-flex align-items-center">
                                                    <i class="ti ti-message me-1 fs-6"></i>Message
                                                </span>
                                            </a>
                                            <span class="border-end"></span>
                                            <a href="{{url('patient/doctors/doctorDetail')}}/${doctor.id}" class="col btn btn-primary bg-primary-subtle text-primary border-0 px-0">
                                                <span class="align-items-center justify-content-center font-weight-medium d-flex align-items-center">
                                                    <i class="ti ti-click me-1 fs-6"></i>Appointment
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        });
                        document.querySelector("#doctorContainer").innerHTML = doctorHTML;
                        document.querySelector("#count").innerText = response.length.toString().padStart(2, '0');
                    }
                });
            }

            fetchDoctors();
            $('#search').on('keyup', function() {
                let searchValue = $(this).val();
                fetchDoctors(searchValue);
            });

        });
    </script>
@endsection
