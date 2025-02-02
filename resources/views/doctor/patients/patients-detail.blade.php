@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ $patient->name }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('doctor.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('doctor.patients') }}">Patients</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">{{ $patient->name }}</li>
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
                                    <img src="{{ $patient->adminProfile->profile_img ? asset('profile_images/' . $patient->adminProfile->profile_img) : 'assets/images/profile/user-1.jpg' }}"
                                        alt="" class="w-100 h-100">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="fs-5 mb-0 fw-semibold text-capitalize">{{ $patient->name }}
                            </h5>
                            {{-- <p class="mb-0 fs-4 text-capitalize">{{ $patient->role }}</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-last">
                    <ul
                        class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-end my-3 gap-3 px-4">
                        <li class="position-relative">
                            @if ($patient->adminProfile->facebook)
                                <a class="d-flex align-items-center justify-content-center text-bg-primary p-2 fs-4 rounded-circle"
                                    href="{{ $patient->adminProfile->facebook }}" width="30" height="30"
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
                            @if ($patient->adminProfile->twitter)
                                <a class="d-flex align-items-center justify-content-center text-bg-secondary p-2 fs-4 rounded-circle"
                                    href="{{ $patient->adminProfile->twitter }}" width="30" height="30"
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
                            @if ($patient->adminProfile->instagram)
                                <a class="d-flex align-items-center justify-content-center text-bg-danger p-2 fs-4 rounded-circle"
                                    href="{{ $patient->adminProfile->instagram }}" width="30" height="30"
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
                            @if ($patient->adminProfile->contact)
                                <a class="d-flex align-items-center justify-content-center text-bg-warning p-2 fs-4 rounded-circle"
                                    href="tel:{{ $patient->adminProfile->contact }}" width="30" height="30">
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
                            @if ($patient->email)
                                <a class="d-flex align-items-center justify-content-center text-bg-secondary p-2 fs-4 rounded-circle"
                                    href="mailto:{{ $patient->email }}" width="30" height="30">
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
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                        role="tab" aria-controls="pills-profile" aria-selected="false">
                        <i class="ti ti-user-circle me-2 fs-6"></i>
                        <span class="d-none d-md-block">Profile</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 active"
                        id="pills-appointments-tab" data-bs-toggle="pill" data-bs-target="#pills-appointments"
                        type="button" role="tab" aria-controls="pills-appointments" aria-selected="true"
                        tabindex="-1">
                        <i class="ti ti-calendar me-2 fs-6"></i>
                        <span class="d-none d-md-block">Appointments</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-none border">
                        <div class="card-body">
                            <h4 class="fw-semibold mb-3">Introduction</h4>
                            <p>{{ $patient->adminProfile->bio ?? 'No bio available' }}</p>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center gap-3 mb-4">
                                    <i class="ti ti-mail text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">{{ $patient->email }}</h6>
                                </li>
                                <li class="d-flex align-items-center gap-3 mb-4">
                                    <i class="ti ti-map-pin text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">{{ $patient->adminProfile->city }},
                                        {{ $patient->adminProfile->country }}</h6>
                                </li>
                                <li class="d-flex align-items-center gap-3 mb-2">
                                    <i class="ti ti-device-desktop text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">{{ $patient->created_at }}
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
                                                <p class="form-control-static text-capitalize">{{ $patient->adminProfile->gender }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <h6 class="fs-4 fw-semibold mb-0 text-end col-md-4">Date of Birth:</h6>
                                            <div class="col-md-8">
                                                <p class="form-control-static text-capitalize">{{ $patient->adminProfile->date_of_birth }}</p>
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
                                                    {{ $patient->adminProfile->address }}
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
                                                <p class="form-control-static text-capitalize">{{ $patient->adminProfile->country }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <h6 class="fs-4 fw-semibold mb-0 text-end col-md-4">City:</h6>
                                            <div class="col-md-8">
                                                <p class="form-control-static text-capitalize">{{ $patient->adminProfile->city }}</p>
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
        <div class="tab-pane fade  active show" id="pills-appointments" role="tabpanel"
            aria-labelledby="pills-appointments-tab" tabindex="0">
            <div class="card">
                <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                            id="pills-calander-tab" data-bs-toggle="pill" data-bs-target="#pills-calander"
                            type="button" role="tab" aria-controls="pills-calander" aria-selected="true"
                            tabindex="-1">
                            <i class="ti ti-calendar-event me-2 fs-6"></i>
                            <span class="d-none d-md-block">Calander View</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                            id="pills-tabular-tab" data-bs-toggle="pill" data-bs-target="#pills-tabular" type="button"
                            role="tab" aria-controls="pills-tabular" aria-selected="false">
                            <i class="ti ti-table me-2 fs-6"></i>
                            <span class="d-none d-md-block">Tabular View</span>
                        </button>
                    </li>

                </ul>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-tabular" role="tabpanel"
                            aria-labelledby="pills-tabular-tab" tabindex="0">
                            <link rel="stylesheet"
                                href="{{ asset('assets/dash/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
                            <div class="datatables">
                                <div class="table-responsive rounded-2 mb-4">
                                    <table id="myTable"
                                        class="table border text-nowrap customize-table mb-0 align-middle w-100">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                                </th>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Treatment Type</h6>
                                                </th>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Date</h6>
                                                </th>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Slot</h6>
                                                </th>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="w-100">

                                        </tbody>
                                        <tfoot class="text-dark fs-4">
                                            <tr>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                                </th>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Treatment Type</h6>
                                                </th>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Date</h6>
                                                </th>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Slot</h6>
                                                </th>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="pills-calander" role="tabpanel"
                            aria-labelledby="pills-calander-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="calender-sidebar app-calendar">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/fullcalendar/index.global.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var today = new Date().toISOString().split('T')[0];
            var appointments = @json($appointments);
            var earliestEventDate = appointments.reduce((earliest, appointment) => {
                var eventDate = new Date(appointment.date);
                return eventDate < earliest ? eventDate : earliest;
            }, new Date(today)).toISOString().split('T')[0];
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                validRange: {
                    start: earliestEventDate
                },
                events: appointments.map(function(appointment) {
                    return {
                        title: formatTime(appointment.slot) + ' - ' + capitalize(
                            appointment
                            .status),
                        start: appointment.date,
                        color: getStatusColor(appointment.status),
                        extendedProps: {
                            slot: appointment.slot,
                            status: capitalize(appointment.status)
                        }
                    };
                }),
                selectable: false,
                dayCellClassNames: function(arg) {
                    if (arg.date === today) {
                        return ['fc-day-today'];
                    }
                }
            });
            calendar.render();

            function formatTime(timeStr) {
                var [hours, minutes] = timeStr.split(':');
                hours = parseInt(hours, 10);
                var period = hours >= 12 ? "PM" : "AM";
                hours = hours % 12 || 12;
                return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')} ${period}`;
            }

            function capitalize(str) {
                return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
            }

            function getStatusColor(status) {
                switch (status) {
                    case 'pending':
                        return '#FFC107';
                    case 'approved':
                        return '#28A745';
                    case 'completed':
                        return '#17A2B8';
                    case 'rejected':
                        return '#DC3545';
                    case 'cancelled':
                        return '#DC3545';
                    default:
                        return '#6C757D';
                }
            }
        });

        let myTable = new DataTable('#myTable', {
            processing: false,
            serverSide: true,
            ajax: {
                url: "{{ url('doctor/appointments/patientAppointmentFetch/' . $patient->id) }}",
                type: "GET"
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return `<p class="mb-0 text-body">${meta.row + 1}</p>`;
                    }
                },
                {
                    data: 'treatment_type',
                    name: 'treatment_type',
                    render: function(data, type, row) {
                        return `<p class="mb-0 text-body text-capitalize">${data}</p>`;
                    }
                },
                {
                    data: 'date',
                    name: 'date',
                    render: function(data, type, row) {
                        const date = new Date(data);
                        const formattedDate = new Intl.DateTimeFormat('en-US', {
                            month: 'long',
                            day: 'numeric',
                            year: 'numeric'
                        }).format(date);
                        return `<p class="mb-0 text-body">${formattedDate}</p>`;
                    }
                },
                {
                    data: 'slot',
                    name: 'slot',
                    render: function(data, type, row) {
                        return `<p class="mb-0 text-body">${formatTime(data)}</p>`;
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        let cancelReasonTitle = row.user_cancelled == 'cancelled' ? '(By Patient)' : '';
                        let cancelReason = row.user_cancelled == 'cancelled' ? row
                            .user_cancellation_reason : row.doctor_cancellation_reason;
                        let appointmentStatusItem = "";
                        if (data == "pending") {
                            appointmentStatusItem =
                                `
                                <div class="dropdown dropstart d-inline-block ms-3">
                                    <a href="#" class="text-body" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical fs-3"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                        <li><a href="javascript:void(0)" class="dropdown-item d-flex align-items-center gap-3 text-success approve-appointment" data-id="${row.id}"><i class="fs-4 ti ti-circle-check"></i>Approve Appointment</a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item d-flex align-items-center gap-3 text-danger reject-appointment" data-id="${row.id}"><i class="fs-4 ti ti-circle-x"></i>Reject Appointment</a></li>
                                    </ul>
                                </div>`;
                        } else if (data == "approved") {
                            appointmentStatusItem =
                                `
                                <div class="dropdown dropstart d-inline-block ms-3">
                                    <a href="#" class="text-body" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical fs-3"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                        <li><a href="javascript:void(0)" class="dropdown-item d-flex align-items-center gap-3 text-success complete-appointment" data-id="${row.id}"><i class="fs-4 ti ti-circle-check"></i>Complete Appointment</a></li>
                                        <li><a href="javascript:void(0)" class="dropdown-item d-flex align-items-center gap-3 text-danger cancel-appointment" data-id="${row.id}"><i class="fs-4 ti ti-circle-x"></i>Cancel Appointment</a></li>
                                    </ul>
                                </div>
                                `;
                        } else if (data == "completed" || data == "rejected" || data == "cancelled") {
                            appointmentStatusItem = "";
                        }
                        return `<a class="badge fw-semibold fs-1 ${getStatusColor(row.status)}" ${data=='cancelled'?'data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Cancelled Reason '+cancelReasonTitle+': '+cancelReason+'" data-bs-content="'+cancelReason+'"':''}>${capitalize(row.status)}</a>
                        ${appointmentStatusItem}
                        `;
                    }
                }
            ],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            pageLength: 10,
            order: [
                [0, 'desc']
            ],
            language: {
                emptyTable: `
                <div class="d-flex align-items-center justify-content-center w-100" id="noDataErr">
                    <div class="row justify-content-center w-100">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <img src="{{ asset('assets/dash/assets/images/backgrounds/appointments_bg.svg') }}" alt=""
                                    class="img-fluid col-lg-8">
                                <h3 class="fw-semibold mb-3 text-dark">Appointments Not Found!!!</h3>
                                <p class="fw-normal mb-7 fs-4 text-body">It seems the appointments you’re looking for is unavailable. Please check back later or explore other content.</p>
                                <a class="btn btn-primary mb-7" href="javascript:void()" onclick="window.location.reload()" role="button">Try Again...</a>
                            </div>
                        </div>
                    </div>
                </div>`,
                zeroRecords: `
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="row justify-content-center w-100">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <img src="{{ asset('assets/dash/assets/images/backgrounds/search_bg.svg') }}" alt=""
                                    class="img-fluid col-lg-8">
                                <h3 class="fw-semibold mb-3 text-dark">No Matching Records Found!!!</h3>
                                <p class="fw-normal fs-4 text-body">We couldn't find any results matching your search. Try refining your filters or keywords!</p>
                            </div>
                        </div>
                    </div>
                </div>`,
            },
            drawCallback: function(settings) {
                $('#myTable').addClass('table border text-nowrap customize-table mb-0 align-middle');
                $('#myTable_paginate').addClass('btn-group');
                $('#myTable_paginate span').addClass('btn-group');
                $('#myTable_paginate .paginate_button.previous.disabled').addClass(
                    'btn bg-info-subtle text-info font-medium');
                $('#myTable_paginate .paginate_button.next.disabled').addClass(
                    'btn bg-info-subtle text-info font-medium');
                $('#myTable_paginate .paginate_button.current').addClass('btn btn-info');
                $('#myTable_paginate .paginate_button').not('.current').addClass(
                    'btn bg-info-subtle text-info font-medium');
                $('#myTable_wrapper #myTable_length select').addClass('select2 form-control w-50');

                let noDataMessage = $(".dataTables_empty").length > 0;
                if (noDataMessage) {
                    $('#myTable thead, #myTable tfoot, #myTable_paginate, #myTable_info, #myTable_length')
                        .hide();
                    $('.table-responsive:has(#noDataErr) #myTable_filter').hide();
                    $('#myTable').removeClass('border');
                    $('.dataTables_empty').addClass('border-0 p-0');
                    $('.table-responsive').removeClass('mb-4');
                    $('#myTable_filter').addClass('flex-grow-1');
                } else {
                    $('#myTable thead, #myTable tfoot, #myTable_paginate, #myTable_info, #myTable_length')
                        .show();
                    $('.table-responsive:has(#noDataErr) #myTable_filter').show();
                    $('#myTable').addClass('border');
                    $('.dataTables_empty').removeClass('border-0 p-0');
                    $('.table-responsive').addClass('mb-4');
                    $('#myTable_filter').removeClass('flex-grow-1');
                    $('[data-bs-toggle="tooltip"]').tooltip({
                        trigger: "hover",
                        container: "body"
                    });
                }
            }
        });

        function capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        }

        function getStatusColor(status) {
            switch (status.toLowerCase()) {
                case 'pending':
                    return 'bg-warning-subtle text-warning';
                case 'approved':
                    return 'bg-success-subtle text-success';
                case 'completed':
                    return 'bg-success-subtle text-success';
                case 'rejected':
                    return 'bg-danger-subtle text-danger';
                case 'cancelled':
                    return 'bg-danger-subtle text-danger';
                default:
                    return 'bg-secondary-subtle text-secondary';
            }
        }

        function formatTime(timeStr) {
            const [hour, minute] = timeStr.split(':');
            const formattedHour = (hour % 12 || 12);
            const period = hour >= 12 ? 'PM' : 'AM';
            return `${formattedHour}:${minute} ${period}`;
        }

        $('#myTable').on('click', '.dropdown-toggle', function(event) {
            event.stopPropagation();
            let currentDropdown = bootstrap.Dropdown.getOrCreateInstance(this);
            $('.dropdown.show').each(function() {
                if (this !== event.currentTarget.parentElement) {
                    let otherDropdown = bootstrap.Dropdown.getInstance(this);
                    if (otherDropdown) {
                        otherDropdown.hide();
                    }
                }
            });
            currentDropdown.toggle();
        });

        $('#myTable').on('click', function() {
            $('.dropdown.show').each(function() {
                let dropdownInstance = bootstrap.Dropdown.getInstance(this);
                if (dropdownInstance) {
                    dropdownInstance.hide();
                }
            });
        });

        $('#myTable').on('click', '.cancel-appointment', function(e) {
            e.preventDefault();
            let appointmentId = $(this).data('id');
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
            Swal.fire({
                title: 'Cancel Appointment',
                input: 'textarea',
                inputPlaceholder: 'Enter reason for cancellation...',
                inputAttributes: {
                    'aria-label': 'Enter your reason'
                },
                showCancelButton: true,
                confirmButtonText: 'Cancel Appointment',
                cancelButtonText: 'Close',
                confirmButtonColor: "#1376F8",
                cancelButtonColor: "#d33",
                inputValidator: (value) => {
                    if (!value) {
                        return 'Cancellation reason is required!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let reason = result.value;
                    $.ajax({
                        url: `{{ url('doctor/appointments/appointmentCancel') }}/${appointmentId}`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            doctor_cancellation_reason: reason
                        },
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                                myTable.ajax.reload(null, false);
                            } else {
                                Toast.fire({
                                    icon: "error",
                                    title: response.error,
                                });
                            }
                        },
                        error: function(xhr) {
                            Toast.fire({
                                icon: "error",
                                title: "Something went wrong. Please try again later.",
                            });
                        }
                    });
                }
            });
        });

        $('#myTable').on('click', '.approve-appointment', function(e) {
            e.preventDefault();
            let appointmentId = $(this).data('id');
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
            Swal.fire({
                title: 'Are you sure?',
                icon: "question",
                showCancelButton: true,
                confirmButtonText: 'Yes, Approve it!',
                cancelButtonText: 'Close',
                confirmButtonColor: "#1376F8",
                cancelButtonColor: "#d33",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ url('doctor/appointments/appointmentStatusUpdate') }}/${appointmentId}`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            appointment_status: 'approved'
                        },
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                                myTable.ajax.reload(null, false);
                            } else {
                                Toast.fire({
                                    icon: "error",
                                    title: response.error,
                                });
                            }
                        },
                        error: function(xhr) {
                            Toast.fire({
                                icon: "error",
                                title: "Something went wrong. Please try again later.",
                            });
                        }
                    });
                }
            });
        });

        $('#myTable').on('click', '.reject-appointment', function(e) {
            e.preventDefault();
            let appointmentId = $(this).data('id');
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
            Swal.fire({
                title: 'Are you sure?',
                icon: "question",
                showCancelButton: true,
                confirmButtonText: 'Yes, Reject it!',
                cancelButtonText: 'Close',
                confirmButtonColor: "#1376F8",
                cancelButtonColor: "#d33",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ url('doctor/appointments/appointmentStatusUpdate') }}/${appointmentId}`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            appointment_status: 'rejected'
                        },
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                                myTable.ajax.reload(null, false);
                            } else {
                                Toast.fire({
                                    icon: "error",
                                    title: response.error,
                                });
                            }
                        },
                        error: function(xhr) {
                            Toast.fire({
                                icon: "error",
                                title: "Something went wrong. Please try again later.",
                            });
                        }
                    });
                }
            });
        });

        $('#myTable').on('click', '.complete-appointment', function(e) {
            e.preventDefault();
            let appointmentId = $(this).data('id');
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
            Swal.fire({
                title: 'Are you sure?',
                icon: "question",
                showCancelButton: true,
                confirmButtonText: 'Yes, Complete it!',
                cancelButtonText: 'Close',
                confirmButtonColor: "#1376F8",
                cancelButtonColor: "#d33",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ url('doctor/appointments/appointmentStatusUpdate') }}/${appointmentId}`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            appointment_status: 'completed'
                        },
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                                myTable.ajax.reload(null, false);
                            } else {
                                Toast.fire({
                                    icon: "error",
                                    title: response.error,
                                });
                            }
                        },
                        error: function(xhr) {
                            Toast.fire({
                                icon: "error",
                                title: "Something went wrong. Please try again later.",
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
