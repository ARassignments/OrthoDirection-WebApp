@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Services</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Services</li>
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
            <input type="text" class="form-control search-chat py-2 ps-5" id="search" placeholder="Search Service" onkeyup="fetchServices(this.value)" maxlength="50">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            <button class="btn bg-primary-subtle text-primary font-medium" id="searchBtn" type="button"
            onclick="fetchServices(document.querySelector('#search').value)">Search</button>
        </form>

        <li class="nav-item ms-auto">
            <a href="{{ route('admin.add-service') }}" class="btn btn-primary d-flex align-items-center px-3">
                <i class="ti ti-list-details me-0 me-md-1 fs-4"></i>
                <span class="d-none d-md-block font-weight-medium fs-3">Add Service</span>
            </a>
        </li>
    </ul>

    <div class="col-12 position-relative">
        <div class="position-absolute top-0 left-0 w-100" id="loader">
            <div class="d-flex align-items-center justify-content-center" style="height: 60vh;">
                <div class="spinner-border text-primary" style="width: 4rem; height: 4rem" role="status">
                    <span class="visually-hidden">Loading...</span>
                    <img src="{{ asset('assets/images/favicon.png') }}" class="w-100 h-100 p-2" style="object-fit: cover"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="servicesContainer">
        
    </div>

    <nav aria-label="..." class="d-none">
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

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        function fetchServices(search = '') {
            $.ajax({
                url: '{{ route('service.fetch') }}',
                type: 'GET',
                data: {
                    search
                },
                beforeSend: function() {
                    $('#searchBtn').prop('disabled', true).text('Loading...');
                    $('#servicesContainer').hide();
                    $('#loader').fadeIn(500).show();
                },
                complete: function() {
                    $('#searchBtn').prop('disabled', false).text('Search');
                    $('#loader').fadeOut(500);
                    setTimeout(() => {
                        $('#servicesContainer').fadeIn(500).show()
                    }, 550);
                },
                success: function(services) {
                    document.querySelector("#servicesContainer").innerHTML = "";
                    if (services.length === 0) {
                        document.querySelector("#servicesContainer").innerHTML = `
                        <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                            <div class="row justify-content-center w-100">
                                <div class="col-lg-8">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/dash/assets/images/backgrounds/services_bg.svg') }}" alt=""
                                            class="img-fluid w-100">
                                        <h3 class="fw-semibold mb-3">Services Not Found!!!</h3>
                                        <p class="fw-normal mb-7 fs-4">It looks like there are no services here. Explore other sections or try again later.</p>
                                        <a class="btn btn-primary" href="javascript:void()" onclick="window.location.reload()" role="button">Try Again...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                        return;
                    }
                    services.forEach(service => {
                        document.querySelector("#servicesContainer").innerHTML += `
                        <div class="col-md-6 col-lg-4">
                            <div class="card rounded-2 overflow-hidden hover-img">
                                <div class="position-relative">
                                    <a href="javascript:void(0)"><img src="{{ asset('admins_services_thumbnails/${service.thumbnail}') }}"
                                            class="card-img-top img-fluid rounded-0" style="height:230px; object-fit:cover; object-position:top;" alt="..." loading="lazy"></a>
                                    <div class="mt-9 me-9 position-absolute top-0 end-0">
                                        <a class="btn mb-1 waves-effect waves-light bg-primary-subtle text-primary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            data-bs-title="Show/Hide" onclick="toggleStatus(${service.id})">
                                            ${service.status ? '<i class="ti ti-eye"></i>' : '<i class="ti ti-eye-off"></i>'}
                                        </a>
                                        <a class="btn mb-1 waves-effect waves-light bg-secondary-subtle text-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                            href="{{ url('admin/services/serviceEdit') }}/${service.id}" data-bs-toggle="tooltip" data-bs-placement="left"
                                            data-bs-title="Edit">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <a class="btn mb-1 waves-effect waves-light bg-danger-subtle text-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            data-bs-title="Delete" onclick="deleteService(${service.id})">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                    <img src="assets/images/profile/user-1.jpg" alt=""
                                        class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                                        height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Service Icon">
                                </div>
                                <div class="card-body p-4">
                                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="javascript:void(0)">${service.title}</a>
                                    <p class="text-body mb-0">${service.short_description}</p>
                                </div>
                            </div>
                        </div>
                        `;
                    });
                },
                error: function() {
                    alert('Failed to fetch services.');
                }
            });
        }
        fetchServices();

        function toggleStatus(id) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            $.ajax({
                url: `{{ url('admin/services/serviceToggleStatus') }}/${id}`,
                type: 'GET',
                success: function(response) {
                    Toast.fire({
                        icon: "success",
                        title: response.success,
                    });
                    fetchServices();
                },
                error: function() {
                    Toast.fire({
                        icon: "error",
                        title: response.error,
                    });
                }
            });
        }

        function deleteService(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to delete this service?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1376F8",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    $.ajax({
                        url: `{{ url('admin/services/serviceDestroy') }}/${id}`,
                        type: 'GET',
                        success: function(response) {
                            Toast.fire({
                                icon: "success",
                                title: response.success,
                            });
                            fetchServices();
                        },
                        error: function() {
                            Toast.fire({
                                icon: "error",
                                title: response.error,
                            });
                        }
                    });
                }
            });
        }

    </script>
@endsection
