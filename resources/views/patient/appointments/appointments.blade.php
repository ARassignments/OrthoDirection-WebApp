@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <div class="datatables">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Appointments</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('patient.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Appointments</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive rounded-2 mb-4">
                            <table id="myTable" class="table border text-nowrap customize-table mb-0 align-middle w-100">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Doctor</h6>
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
                                            <h6 class="fs-4 fw-semibold mb-0">Doctor</h6>
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
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/dash/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        new DataTable('#myTable', {
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('patient.appointments.fetch') }}",
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
                    data: 'doctor.name',
                    name: 'doctor.name',
                    render: function(data, type, row) {
                        let profileImg = row.doctor.admin_profile.profile_img ?
                            `{{ asset('profile_images/${row.doctor.admin_profile.profile_img}') }}` :
                            'assets/images/profile/user-1.jpg';
                        return `<div class="d-flex align-items-center">
                                    <img src="${profileImg}" class="rounded-circle"
                                        width="40" height="40">
                                    <div class="ms-3">
                                        <a href="{{ url('patient/doctors/doctorDetail') }}/${row.doctor.id}"> <h6 class="fs-4 fw-semibold text-capitalize mb-0">${data}</h6></a>
                                    </div>
                                </div>`;
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
                        return `<a class="badge fw-semibold fs-1 ${getStatusColor(row.status)}" ${data=='cancelled'?'data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-original-title="Cancelled Reason" data-bs-content="'+row.user_cancellation_reason+'"':''}>${capitalize(row.status)}</a>
                        <div class="dropdown dropstart d-inline-block ms-3">
                          <a href="#" class="text-body" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-3"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="{{ url('patient/doctors/doctorDetail') }}/${row.doctor.id}"><i class="fs-4 ti ti-eye"></i>View More</a>
                            </li>
                            ${data == 'pending'?
                                '<li><a class="dropdown-item d-flex align-items-center gap-3 text-danger cancel-appointment" data-id="${row.id}" href="javascript:void()"><i class="fs-4 ti ti-circle-x"></i>Cancel Appointment</a></li>':''
                            }
                          </ul>
                        </div>
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
                $('[data-bs-toggle="popover"]').popover({
                    trigger: 'hover',
                    container: 'body'
                });
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

        $('#myTable').on('click', '.dropdown', function(event) {
            event.stopPropagation();
            let dropdown = new bootstrap.Dropdown(this);
            dropdown.toggle();
        });

        $(document).on('click', '.cancel-appointment', function(e) {
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
                        url: `{{ url('patient/appointments/appointmentCancel') }}/${appointmentId}`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            user_cancellation_reason: reason
                        },
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                                $('#myTable').DataTable().ajax.reload();
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
