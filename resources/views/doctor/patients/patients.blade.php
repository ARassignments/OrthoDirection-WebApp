@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Patients</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('doctor.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Patients</li>
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
        <div class="d-flex align-items-center justify-content-between gap-3 mt-3 mb-4" id="topContainer">
            <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Patients <span
                    class="badge text-bg-primary fs-2 rounded-4 py-1 px-2 ms-2" id="count">0</span></h3>
            <form class="position-relative">
                <input type="text" class="form-control search-chat py-2 ps-5" id="search"
                    placeholder="Search Patients">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
            </form>
        </div>
        <div class="row" id="patientContainer">
            <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <img src="{{ asset('assets/dash/assets/images/backgrounds/patient_bg.svg') }}" alt=""
                                class="img-fluid w-100">
                            <h3 class="fw-semibold mb-3">Patients Not Found!!!</h3>
                            <p class="fw-normal mb-7 fs-4">It seems the patients you’re looking for is unavailable. Please
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
            function fetchPatients(search = '') {
                $.ajax({
                    url: "{{ route('doctor.patients.fetch') }}",
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
                            document.querySelector("#patientContainer").innerHTML = `
                            <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                                <div class="row justify-content-center w-100">
                                    <div class="col-lg-8">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/dash/assets/images/backgrounds/patient_bg.svg') }}" alt=""
                                                class="img-fluid w-100">
                                            <h3 class="fw-semibold mb-3">Patients Not Found!!!</h3>
                                            <p class="fw-normal mb-7 fs-4">It seems the patients you’re looking for is unavailable. Please check
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
                            let familyMembers = "";
                            let familyMembersExtra = ``;
                            let profileImage = doctor.admin_profile.profile_img ?
                                `{{ asset('profile_images/${doctor.admin_profile.profile_img}') }}` :
                                `assets/images/profile/user-1.jpg`;
                            let familyMembersCount = "";
                            if (doctor.family_members.length == 0) {
                                familyMembersCount = `<p class="mb-0 flex-grow-1">No Family Member</p>`;
                            } else {
                                let countMember = 0;
                                doctor.family_members.forEach(member => {
                                    console.log(member);
                                    countMember++; 
                                    let familyProfileImage = member.admin_profile
                                        .profile_img ?
                                        `{{ asset('profile_images/${member.admin_profile.profile_img}') }}` :
                                        `assets/images/profile/user-1.jpg`;
                                    familyMembers += `<a href="{{ url(Auth::user()->role . '/family/familyDetail') }}/${member.id}">
                                                    <img src="${familyProfileImage}" class="rounded-circle me-n2 card-hover border border-white" width="32" height="32" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="${member.name}" data-bs-original-title="${member.name}">
                                                </a>`;
                                });
                                familyMembersExtra = doctor.family_members.length>5?`<a href="#">
                                                    <div class="btn p-0 d-inline-flex align-items-center justify-content-center bg-primary-subtle rounded-circle me-n2 card-hover border border-primary text-primary" style="width:32px;height:32px;">${doctor.family_members.length-countMember}+</div>
                                                </a>`:'';
                                familyMembersCount =
                                    `<p class="mb-0 ms-4">${doctor.family_members.length} ${doctor.family_members.length>1?'Family Members':'Family Member'}</p>`;
                            }
                            doctorHTML += `
                            <div class="col-sm-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body p-4 text-center">
                                        <div class="profile-pic">
                                            <img src="${profileImage}" alt="" class="rounded-circle mb-3" width="80" height="80">
                                            <h5 class="fw-semibold mb-0">${doctor.name}</h5>
                                            <span class="text-dark fs-2">${doctor.admin_profile.bio ?? 'No bio available'}</span>
                                        </div>
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="d-flex align-items-center">
                                                ${familyMembers}
                                                ${familyMembersExtra}
                                            </div>
                                            ${familyMembersCount}
                                        </div>
                                    </div>
                                    <div class="p-4 border-top">
                                        <div class="row text-center">
                                            <div class="col-6 border-end">
                                                <a href="#" class="link text-dark d-flex align-items-center justify-content-center font-weight-medium"><i class="ti ti-message me-1 fs-6"></i>Message</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('doctor/patients/patientDetail') }}/${doctor.id}" class="link text-dark d-flex align-items-center justify-content-center font-weight-medium"><i class="ti ti-artboard me-1 fs-6"></i>User Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        });
                        document.querySelector("#patientContainer").innerHTML = doctorHTML;
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

            fetchPatients();
            $('#search').on('keyup', function() {
                let searchValue = $(this).val();
                fetchPatients(searchValue);
            });

        });
    </script>
@endsection
