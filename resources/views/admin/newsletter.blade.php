@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Newsletter</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Newsletter</li>
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
    <div class="datatables">
        <div class="table-responsive rounded-2 mb-4">
            <table id="myTable" class="table border text-nowrap customize-table mb-0 align-middle w-100">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">#</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Email Address</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Created On</h6>
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
                            <h6 class="fs-4 fw-semibold mb-0">Email Address</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Created On</h6>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        new DataTable('#myTable', {
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.getNewsletter') }}",
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
                    data: 'email',
                    name: 'email',
                    render: function(data, type, row) {
                        return `<a href="mailto:${row.email}" class="fw-normal">${row.email}</a>`;
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

                        return `<p class="mb-0">${formattedDate}</p>`;
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
                                <img src="{{ asset('assets/dash/assets/images/backgrounds/newsletter_bg.svg') }}" alt=""
                                    class="img-fluid col-lg-8">
                                <h3 class="fw-semibold mb-3 text-dark">Newsletter Not Found!!!</h3>
                                <p class="fw-normal mb-7 fs-4 text-body">It seems the newsletter you’re looking for is unavailable. Please check back later or explore other content.</p>
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

    </script>
@endsection
