@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <div class="datatables">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Doctors</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('admin.dashboard') }}">Home</a>
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
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <h5 class="mb-0">Doctors</h5>
                        </div>
                        <div class="table-responsive rounded-2 mb-4">
                            <table id="myTable" class="table border text-nowrap customize-table mb-0 align-middle w-100">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">User</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Project Name</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Created On</h6>
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
                                            <h6 class="fs-4 fw-semibold mb-0">User</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Project Name</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Created On</h6>
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

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        // $("#myTable").DataTable();
        new DataTable('#myTable', {
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.getPatients') }}",
                type: "GET"
            },
            columns: [{
                    data: 'id',
                    name: '#',
                    render: function(data, type, row) {
                        return `<p class="mb-0">${data}</p>`;
                    }
                },
                {
                    data: 'name',
                    name: 'User',
                    render: function(data, type, row) {
                        return `<div class="d-flex align-items-center">
                                    <img src="assets/images/profile/user-1.jpg" class="rounded-circle"
                                        width="40" height="40">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold text-capitalize mb-0">${data}</h6>
                                        <a href="mailto:${row.email}" class="fw-normal">${row.email}</a>
                                    </div>
                                </div>`;
                    }
                },
                {
                    data: 'email',
                    name: 'Email'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row) {
                        const date = new Date(data);
                        const formattedDate = new Intl.DateTimeFormat('en-US', {
                            weekday: 'long', // Day of the week (e.g., Monday)
                            year: 'numeric',
                            month: 'long', // Full month (e.g., January)
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true // 12-hour clock (AM/PM)
                        }).format(date);

                        return `<p class="mb-0">${formattedDate}</p>`;
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        return `<div class="form-check form-switch d-inline-block">
                                <input class="form-check-input toggle-status" type="checkbox" data-id="${row.id}" ${data ? 'checked' : ''}>
                            </div>`;
                    }
                }
            ],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            pageLength: 10,
            order: [
                [0, 'asc']
            ],
            language: {
                emptyTable: '<span class="badge w-100 py-3 fs-5 bg-danger-subtle text-danger text-capitalize">No data found</span>',
                zeroRecords: '<span class="badge w-100 py-3 fs-5 bg-danger-subtle text-danger text-capitalize">No matching records found</span>',
            },
            drawCallback: function(settings) {
                // Add custom classes dynamically to pagination elements
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
            }
        });

        $('#myTable').on('change', '.toggle-status', function() {
            var status = $(this).is(':checked') ? 1 : 0;
            var userId = $(this).data('id');
            const updateStatusUrl = @json(route('admin.updateStatus', ['id' => ':id']));
            const url = updateStatusUrl.replace(':id', userId);
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    const Toaster = Swal.mixin({
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
                    if (response.success) {
                        Toaster.fire({
                            icon: "success",
                            title: response.message
                        });
                    } else {
                        Toaster.fire({
                            icon: "error",
                            title: "Failed to Update Status"
                        });
                        alert('');
                    }
                },
                error: function() {
                    alert('An error occurred.');
                }
            });
        });
    </script>
@endsection
