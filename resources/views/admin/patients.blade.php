@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <div class="datatables">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Patients</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('admin.dashboard') }}">Home</a>
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
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <h5 class="mb-0">Patients</h5>
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
                                            <h6 class="fs-4 fw-semibold mb-0">Email Address</h6>
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
                                            <h6 class="fs-4 fw-semibold mb-0">Email Address</h6>
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
                    data: null,
                    name: '#',
                    render: function(data, type, row, meta) {
                        return `<p class="mb-0 text-body">${meta.row + 1}</p>`;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
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
                    name: 'email',
                    render: function(data, type, row) {
                        return `<p class="mb-0 text-body">${data}</p>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row) {
                        const date = new Date(data);
                        const formattedDate = new Intl.DateTimeFormat('en-US', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true
                        }).format(date);

                        return `<p class="mb-0 text-body">${formattedDate}</p>`;
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
                emptyTable: `
                <div class="d-flex align-items-center justify-content-center w-100" id="noDataErr">
                    <div class="row justify-content-center w-100">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <img src="{{ asset('assets/dash/assets/images/backgrounds/nodata_bg.svg') }}" alt=""
                                    class="img-fluid col-lg-8">
                                <h3 class="fw-semibold mb-3 text-dark">No Data Found!!!</h3>
                                <p class="fw-normal mb-7 fs-4 text-body">It looks like there are no patients here. Explore other sections or try again later.</p>
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
                    $('#myTable thead, #myTable tfoot, #myTable_paginate, #myTable_info, #myTable_length').hide();
                    $('.table-responsive:has(#noDataErr) #myTable_filter').hide();
                    $('#myTable').removeClass('border');
                    $('.dataTables_empty').addClass('border-0 p-0');
                    $('.table-responsive').removeClass('mb-4');
                    $('#myTable_filter').addClass('flex-grow-1');
                } else {
                    $('#myTable thead, #myTable tfoot, #myTable_paginate, #myTable_info, #myTable_length').show();
                    $('.table-responsive:has(#noDataErr) #myTable_filter').show();
                    $('#myTable').addClass('border');
                    $('.dataTables_empty').removeClass('border-0 p-0');
                    $('.table-responsive').addClass('mb-4');
                    $('#myTable_filter').removeClass('flex-grow-1');
                }
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
