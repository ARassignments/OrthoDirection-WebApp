@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <div class="datatables">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Family Members</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Family Members</li>
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
                            <h5 class="mb-0">Family Members</h5>
                        </div>
                        <div class="table-responsive rounded-2 mb-4">
                            <table id="myTable" class="table border text-nowrap customize-table mb-0 align-middle">
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
                                            <h6 class="fs-4 fw-semibold mb-0">Team</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="mb-0 fs-4">1</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/profile/user-1.jpg" class="rounded-circle"
                                                    width="40" height="40">
                                                <div class="ms-3">
                                                    <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                                                    <a href="mailto:admin@gmail.com" class="fw-normal">admin@gmail.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#"
                                                    class="text-bg-secondary text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    S
                                                </a>
                                                <a href="#"
                                                    class="text-bg-danger text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    D
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0 fs-4">2</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/profile/user-2.jpg" class="rounded-circle"
                                                    width="40" height="40">
                                                <div class="ms-3">
                                                    <h6 class="fs-4 fw-semibold mb-0">Andrew McDownland</h6>
                                                    <span class="fw-normal">Project Manager</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">Real Homes WP Theme</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#"
                                                    class="text-bg-primary text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    A
                                                </a>
                                                <a href="#"
                                                    class="text-bg-warning text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    X
                                                </a>
                                                <a href="#"
                                                    class="text-bg-secondary text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    N
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0 fs-4">3</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/profile/user-3.jpg" class="rounded-circle"
                                                    width="40" height="40">
                                                <div class="ms-3">
                                                    <h6 class="fs-4 fw-semibold mb-0">Christopher Jamil</h6>
                                                    <span class="fw-normal">Project Manager</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">MedicalPro WP Theme</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#"
                                                    class="text-bg-danger text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    X
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0 fs-4">4</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/profile/user-4.jpg" class="rounded-circle"
                                                    width="40" height="40">
                                                <div class="ms-3">
                                                    <h6 class="fs-4 fw-semibold mb-0">Nirav Joshi</h6>
                                                    <span class="fw-normal">Frontend Engineer</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#"
                                                    class="text-bg-primary text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    Y
                                                </a>
                                                <a href="#"
                                                    class="text-bg-danger text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    X
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0 fs-4">5</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/profile/user-5.jpg" class="rounded-circle"
                                                    width="40" height="40">
                                                <div class="ms-3">
                                                    <h6 class="fs-4 fw-semibold mb-0">Micheal Doe</h6>
                                                    <span class="fw-normal">Content Writer</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#"
                                                    class="text-bg-secondary text-white fs-6 rounded-circle me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                    style="width: 39px; height: 39px;">
                                                    S
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </td>
                                    </tr>
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
                                            <h6 class="fs-4 fw-semibold mb-0">Team</h6>
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
    <script>
        // $("#myTable").DataTable();
        new DataTable('#myTable', {
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
                $('#myTable_paginate .paginate_button.previous.disabled').addClass('btn bg-info-subtle text-info font-medium');
                $('#myTable_paginate .paginate_button.next.disabled').addClass('btn bg-info-subtle text-info font-medium');
                $('#myTable_paginate .paginate_button.current').addClass('btn btn-info');
                $('#myTable_paginate .paginate_button').not('.current').addClass('btn bg-info-subtle text-info font-medium');
                $('#myTable_wrapper #myTable_length select').addClass('select2 form-control w-50');
            }
        });
    </script>
@endsection
