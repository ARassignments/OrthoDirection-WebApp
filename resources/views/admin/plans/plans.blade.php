@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Pricing Plans</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Pricing Plans</li>
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

    <ul class="nav nav-pills px-1 mb-4 rounded align-items-center flex-row gap-3">
        <li class="nav-item ms-auto">
            <a href="{{ route('admin.add-plan') }}" class="btn btn-primary d-flex align-items-center px-3">
                <i class="ti ti-list-details me-0 me-md-1 fs-4"></i>
                <span class="d-none d-md-block font-weight-medium fs-3">Add Pricing Plans</span>
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

    <div class="plans">
        <div class="row justify-content-center" id="planTitle">
            <div class="col-lg-6 text-center">
                <h2 class="fw-bolder mb-0 fs-8 lh-base">Flexible Plans Tailored to Fit Your Community's Unique Needs!</h2>
            </div>
        </div>

        <div id="planChanger">
            <div class="d-flex align-items-center justify-content-center my-7">
                <span class="text-dark fw-bolder text-capitalize me-3">Monthly</span>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="plansSwitch" checked>
                </div>
                <span class="text-dark fw-bolder text-capitalize ms-2">Yearly</span>
            </div>
        </div>
    
        <div class="row justify-content-center" id="planContainer">
        </div>
    </div>


    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        function fetchPlans() {
            $.ajax({
                url: '{{ route('admin.plans.fetch') }}',
                type: 'GET',
                beforeSend: function() {
                    $('#planTitle').hide();
                    $('#planChanger').hide();
                    $('#planContainer').hide();
                    $('#loader').fadeIn(500).show();
                },
                complete: function() {
                    $('#loader').fadeOut(500);
                    setTimeout(() => {
                        $('#planTitle').fadeIn(500).show();
                        $('#planChanger').fadeIn(500).show();
                        $('#planContainer').fadeIn(500).show();
                    }, 550);
                },
                success: function(plans) {
                    document.querySelector("#planContainer").innerHTML = "";
                    if (plans.length === 0) {
                        document.querySelector("#planContainer").innerHTML = `
                        <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                            <div class="row justify-content-center w-100">
                                <div class="col-lg-8">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/dash/assets/images/backgrounds/plans_bg.svg') }}" alt=""
                                            class="img-fluid w-100">
                                        <h3 class="fw-semibold mb-3">Pricing Plans Not Found!!!</h3>
                                        <p class="fw-normal mb-7 fs-4">It looks like there are no pricing plans here. Explore other sections or try again later.</p>
                                        <a class="btn btn-primary" href="javascript:void()" onclick="window.location.reload()" role="button">Try Again...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                        return;
                    }
                    plans.forEach(plan => {
                        let features = "";
                        JSON.parse(plan.features).forEach(feature => {
                            features += feature.status?`
                                <li class="d-flex align-items-center gap-2 py-2">
                                    <i class="ti ti-check text-primary fs-4"></i>
                                    <span class="text-dark">${feature.name}</span>
                                </li>
                            `:`
                                <li class="d-flex align-items-center gap-2 py-2">
                                    <i class="ti ti-x text-muted fs-4"></i>
                                    <span class="text-muted">${feature.name}</span>
                                </li>
                            `;
                        });
                        let planPopular = plan.plan_popular == 1 ? `
                        <div class="text-end">
                            <span
                                class="badge fw-bolder py-1 bg-warning-subtle text-warning text-uppercase fs-2 rounded-3">POPULAR</span>
                        </div>
                        ` : '';
                        let planType = plan.plan_type == "free" ?
                            `<h2 class="fw-bolder fs-10 mb-3">Free</h2>` : `
                        <div class="d-flex mb-3 monthly">
                            <h5 class="fw-bolder fs-6 mb-0">$</h5>
                            <h2 class="fw-bolder fs-10 ms-2 mb-0">${plan.monthly_price}</h2>
                            <span class="ms-2 fs-4 d-flex align-items-center">/mo</span>
                        </div>
                        <div class="d-flex mb-3 yearly">
                            <h5 class="fw-bolder fs-6 mb-0">$</h5>
                            <h2 class="fw-bolder fs-10 ms-2 mb-0">${plan.yearly_price}</h2>
                            <span class="ms-2 fs-4 d-flex align-items-center">/yr</span>
                        </div>
                        `;
                        let planImage = "silver";
                        if(plan.name == 'standard'){
                            planImage = "bronze";
                        } else if(plan.name == 'premium'){
                            planImage = "gold";
                        } else if(plan.name == 'enterprise'){
                            planImage = "elite";
                        }
                        document.querySelector("#planContainer").innerHTML += `
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body ${plan.plan_popular == 1?'pt-6':''}">
                                    ${planPopular}
                                    <span class="fw-bolder text-uppercase fs-2 d-block mb-7">${plan.name} plan</span>
                                    <div class="my-4">
                                        <img src="assets/images/backgrounds/${planImage}.png" alt="" class="img-fluid" width="80"
                                            height="80">
                                    </div>
                                    ${planType}
                                    <ul class="list-unstyled mb-7">
                                    ${features}
                                    </ul>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm waves-effect waves-light bg-primary-subtle text-primary fw-bolder rounded-2 w-100 text-capitalize fs-4 p-2" onclick="toggleStatus(${plan.id})">${plan.status ? '<i class="ti ti-eye"></i>' : '<i class="ti ti-eye-off"></i>'}</button>
                                        <a href="{{ url('admin/plans/planEdit') }}/${plan.id}" class="btn btn-sm waves-effect waves-light bg-secondary-subtle text-secondary fw-bolder rounded-2 w-100 text-capitalize fs-4 p-2"><i class="ti ti-pencil"></i></a>
                                        <button class="btn btn-sm waves-effect waves-light bg-danger-subtle text-danger fw-bolder rounded-2 w-100 text-capitalize fs-4 p-2" onclick="deletePlan(${plan.id})"><i class="ti ti-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                    });
                },
                error: function() {
                    alert('Failed to fetch blogs.');
                }
            });
        }
        fetchPlans();

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
                url: `{{ url('admin/plans/planToggleStatus') }}/${id}`,
                type: 'GET',
                success: function(response) {
                    Toast.fire({
                        icon: "success",
                        title: response.success,
                    });
                    fetchPlans();
                },
                error: function() {
                    Toast.fire({
                        icon: "error",
                        title: response.error,
                    });
                }
            });
        }

        function deletePlan(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to delete this plan?",
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
                        url: `{{ url('admin/plans/planDestroy') }}/${id}`,
                        type: 'GET',
                        success: function(response) {
                            Toast.fire({
                                icon: "success",
                                title: response.success,
                            });
                            fetchPlans();
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
