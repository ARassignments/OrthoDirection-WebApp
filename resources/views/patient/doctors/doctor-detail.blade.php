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
            <div class="card col-lg-12">
                <div class="row gx-0">
                    <div class="col-lg-12">
                        <div class="p-4 calender-sidebar app-calendar">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <form class="mt-3 pb-4 px-4">
                    <h3 class="text-dark fw-semibold mb-2">Select Slot</h3>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        @foreach ($doctor->doctorWorkingTimes as $slot)
                            <div class="d-inline-block">
                                <input type="radio" class="btn-check slot-radio" name="slots"
                                    id="slot{{ $loop->index }}" autocomplete="off" {{ $loop->index == 0 ? 'checked' : '' }}
                                    value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $slot->available_time)->format('h:i A') }}">
                                <label class="btn bg-primary-subtle text-primary rounded-pill font-medium"
                                    for="slot{{ $loop->index }}">
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $slot->available_time)->format('h:i A') }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="input-group mb-3">
                        <input type="hidden" id="selected-date" name="date">
                        <input class="btn bg-light-subtle text-body font-medium d-flex align-items-center border-0"
                            id="selectedDateView" value="Select Date" readonly required>
                        <input type="text" class="form-control" id="slotInput" placeholder="Select Slot" readonly
                            required>
                        <button class="btn btn-primary font-medium d-flex align-items-center">
                            <i class="ti ti-click me-2"></i> Book an Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/fullcalendar/index.global.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        console.log(@json($doctor));
        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var dateInput = document.getElementById("selected-date");
            var today = new Date().toISOString().split('T')[0];
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                validRange: {
                    start: today
                },
                select: function(info) {
                    var selectedDate = info.startStr;
                    dateInput.value = selectedDate;
                    document.querySelector("#selectedDateView").value = formatDate(selectedDate);
                    calendar.getEvents().forEach(event => {
                        if (event.extendedProps.customSelected) {
                            event.remove();
                        }
                    });
                    calendar.addEvent({
                        start: selectedDate,
                        end: selectedDate,
                        display: 'background',
                        color: '#1376F8',
                        extendedProps: {
                            customSelected: true
                        }
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
                var options = {
                    month: 'long',
                    day: 'numeric'
                };
                return date.toLocaleDateString('en-US', options);
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
    </script>
@endsection
