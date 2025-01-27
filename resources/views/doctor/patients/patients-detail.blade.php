@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ $doctor->name }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('patient.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('patient.doctors') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">{{ $doctor->name }}</li>
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


    <div>
        <div class="row" id="doctorContainer">
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <div class="profile-pic">
                            <img src="{{ asset('profile_images/' . $doctor->adminProfile->profile_img) }}" alt=""
                                class="rounded-circle mb-3" width="80" height="80">
                            <h5 class="fw-semibold mb-0">{{ $doctor->name }}</h5>
                            <span class="text-dark fs-2 mb-0">{{ $doctor->adminProfile->bio ?? 'No bio available' }}</span>
                        </div>
                    </div>
                    <div class="px-3 py-3 border-top">
                        <div class="d-flex text-center gap-3">
                            <a href="#" class="col btn btn-light bg-light-subtle text-dark border-0 px-0">
                                <span
                                    class="align-items-center justify-content-center font-weight-medium d-flex align-items-center">
                                    <i class="ti ti-message me-1 fs-6"></i>Message
                                </span>
                            </a>
                            <span class="border-end"></span>
                            <a href="#" class="col btn btn-primary bg-primary-subtle text-primary border-0 px-0">
                                <span
                                    class="align-items-center justify-content-center font-weight-medium d-flex align-items-center">
                                    <i class="ti ti-click me-1 fs-6"></i>Appointment
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5>Book Appointment</h5>
            <p class="card-subtitle mb-3">
                All fields are required *
            </p>
            <form id="appointmentForm">
                @csrf
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                <input type="hidden" id="selected-date" name="date">
                <input type="hidden" class="form-control" id="slotInput" name="slot">
                <div class="row">
                    <div class="col-md-12 mb-3 px-lg-2 px-md-2 px-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-4">Select Date*</h5>
                                <div class="calender-sidebar app-calendar">
                                    <div id="calendar"></div>
                                </div>
                                <div class="text-center mt-2">
                                    <span id="dateError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="selectedDateView" value="Select Date"
                                placeholder="" readonly>
                            <label for="selectedDateView">Date*</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="selectedDayView" value="Select Day"
                                name="day" placeholder="" readonly>
                            <label for="selectedDayView">Day*</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <select class="form-control" id="treatment_type" name="treatment_type" required>
                                <option selected disabled>Select Treatment</option>
                                @php
                                    $icons = ['root canal', 'cleaning'];
                                @endphp
                                @foreach ($icons as $icon)
                                    <option value="{{ $icon }}" class="text-capitalize">
                                        {{ $icon }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="treatment_type">Treatment Type*</label>
                        </div>
                        <span id="treatment_typeError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h3 class="text-dark fw-semibold mb-2 fs-4">Select Slot</h3>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($doctor->doctorWorkingTimes as $slot)
                                <div class="d-inline-block">
                                    <input type="radio" class="btn-check slot-radio" name="slots"
                                        id="slot{{ $loop->index }}" autocomplete="off"
                                        {{ $loop->index == 0 ? 'checked' : '' }} value="{{ $slot->available_time }}">
                                    <label class="btn btn-sm bg-primary-subtle text-primary rounded-pill font-medium"
                                        for="slot{{ $loop->index }}">
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $slot->available_time)->format('h:i A') }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <span id="slotError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <div class="d-md-flex align-items-center mt-3">
                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary font-medium rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-click me-2 fs-4"></i>
                                        Book an Appointment
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/fullcalendar/index.global.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var dateInput = document.getElementById("selected-date");
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
                        title: formatTime(appointment.slot) + ' - ' + capitalize(appointment
                            .status),
                        start: appointment.date,
                        color: getStatusColor(appointment.status),
                        extendedProps: {
                            slot: appointment.slot,
                            status: capitalize(appointment.status)
                        }
                    };
                }),
                select: function(info) {
                    var selectedDate = info.startStr;
                    if (new Date(selectedDate) < new Date(today)) {
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
                        Toast.fire({
                            icon: "error",
                            title: "Please choose a date from today onward",
                        });
                        return;
                    }
                    dateInput.value = selectedDate;
                    document.querySelector("#selectedDateView").value = formatDate(selectedDate);
                    document.querySelector("#selectedDayView").value = formatDay(selectedDate);
                    calendar.getEvents().forEach((event) => {
                        if (event.extendedProps.customSelected) {
                            event.remove();
                        }
                    });
                    calendar.addEvent({
                        start: selectedDate,
                        end: selectedDate,
                        display: "background",
                        color: "#1376F8",
                        extendedProps: {
                            customSelected: true,
                        },
                    });
                },
                dayCellClassNames: function(arg) {
                    if (arg.date === today) {
                        return ['fc-day-today'];
                    }
                }
            });
            calendar.render();

            function formatDate(dateStr) {
                var date = new Date(dateStr);
                return date.toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric'
                });
            }

            function formatDay(dateStr) {
                var date = new Date(dateStr);
                return date.toLocaleDateString('en-US', {
                    weekday: 'long'
                });
            }

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
                        return '#FFC107'; // Yellow
                    case 'approved':
                        return '#28A745'; // Green
                    case 'completed':
                        return '#17A2B8'; // Blue
                    case 'rejected':
                        return '#DC3545'; // Red
                    case 'cancelled':
                        return '#DC3545'; // Red
                    default:
                        return '#6C757D'; // Grey
                }
            }

            const slotRadios = document.querySelectorAll('.slot-radio');
            const slotInput = document.getElementById('slotInput');

            function updateSlotInput() {
                const selectedSlot = document.querySelector('.slot-radio:checked');
                if (selectedSlot) {
                    slotInput.value = selectedSlot.value;
                }
            }
            updateSlotInput();
            slotRadios.forEach(function(radio) {
                radio.addEventListener('change', updateSlotInput);
            });
        });
        $(document).ready(function() {
            $('#appointmentForm').on('submit', function(e) {
                e.preventDefault();
                $('.badge.text-danger').text('');
                let formData = new FormData(this);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: "{{ route('patient.appointments.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('button[type="submit"]').prop('disabled', true).html(`
                            <div class="d-flex align-items-center">
                                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                Submitting...
                            </div>
                        `);
                        $('#add-tag-btn').prop('disabled', true);
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#appointmentForm')[0].reset();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                },
                                didClose: () => {
                                    window.location.href =
                                        "{{ route('patient.appointments') }}";
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: response.success,
                            });
                        } else {
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
                            Toast.fire({
                                icon: "error",
                                title: response.error,
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                $(`#${field}Error`).text(errors[field][
                                    0
                                ]);
                            }
                        } else {
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
                            Toast.fire({
                                icon: "error",
                                title: "An unexpected error occurred. Please try again.",
                            });
                        }
                    },
                    complete: function() {
                        $('button[type="submit"]').prop('disabled', false).html(`
                            <div class="d-flex align-items-center">
                                <i class="ti ti-click me-2 fs-4"></i>
                                Book an Appointment
                            </div>
                        `);
                        $('#add-tag-btn').prop('disabled', false);
                    },
                });
            });

        });
    </script>
@endsection
