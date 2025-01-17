@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <div class="datatables">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Blogs</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Blogs</li>
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

        <ul class="nav nav-pills p-3 mb-4 rounded align-items-center card flex-row gap-3">
            <form class="position-relative input-group flex-grow-1 w-auto">
                <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Blog">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                <button class="btn bg-primary-subtle text-primary font-medium" type="button">Search</button>
            </form>
            <li class="nav-item ms-auto">
                <a href="{{ route('admin.add-blog') }}" class="btn btn-primary d-flex align-items-center px-3">
                    <i class="ti ti-list-details me-0 me-md-1 fs-4"></i>
                    <span class="d-none d-md-block font-weight-medium fs-3">Add Blog</span>
                </a>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-2 overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="javascript:void(0)"><img src="assets/images/blog/blog-img6.jpg"
                                class="card-img-top rounded-0" alt="..." loading="lazy"></a>
                        <span
                            class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                            min Read</span>
                        <div class="mt-9 me-9 position-absolute top-0 end-0">
                            <a class="btn mb-1 waves-effect waves-light bg-primary-subtle text-light d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                data-bs-title="Show/Hide">
                                <i class="ti ti-eye"></i>
                            </a>
                            <a class="btn mb-1 waves-effect waves-light bg-secondary-subtle text-light d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                data-bs-title="Edit">
                                <i class="ti ti-pencil"></i>
                            </a>
                            <a class="btn mb-1 waves-effect waves-light bg-danger-subtle text-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                data-bs-title="Delete">
                                <i class="ti ti-trash"></i>
                            </a>
                        </div>
                        <img src="assets/images/profile/user-1.jpg" alt=""
                            class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                            height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Admin">
                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Gadget</span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">As yen tumbles, gadget-loving
                            Japan goes
                            for secondhand iPhones</a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>9,125
                            </div>
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>3
                            </div>
                            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Mon,
                                Jan 16
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav aria-label="...">
            <ul class="pagination justify-content-center mb-5 mt-4">
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center"
                        href="#"><i class="ti ti-chevron-left"></i></a>
                </li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center"
                        href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                        href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                        href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                        href="#">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                        href="#">5</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                        href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                        href="#">10</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center"
                        href="#"><i class="ti ti-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        
    </script>
@endsection
