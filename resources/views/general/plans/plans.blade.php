@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Pricing Plans</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @if (Auth::user())
                                @if (Auth::user()->role == 'admin')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                @elseif (Auth::user()->role == 'family')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('family.dashboard') }}">Home</a>
                                    </li>
                                @elseif (Auth::user()->role == 'patient')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('patient.dashboard') }}">Home</a>
                                    </li>
                                @elseif (Auth::user()->role == 'doctor')
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('doctor.dashboard') }}">Home</a>
                                    </li>
                                @endif
                            @endif
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

    <div class="modal fade" id="choosePlan" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="bs-example-modal-lg" aria-hidden="false">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div
                    class="modal-header align-items-start align-items-lg-center align-items-md-center align-items-sm-start gap-2">
                    <div class="d-flex flex-wrap flex-column justify-content-between flex-grow-1">
                        <h3 class="modal-title fw-semibold">
                            Get <span class="text-capitalize" id="planName"></span>
                        </h3>
                        <p class="card-subtitle">
                            All fields are required *
                        </p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="subscriptionForm">
                                @csrf
                                <input type="hidden" id="plan_id" name="plan_id">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <select class="form-control text-capitalize" id="billing_cycle"
                                                name="billing_cycle" required>
                                                <option selected disabled>Select Billing Cycle</option>
                                                <option value="monthly" selected>Monthly</option>
                                                <option value="yearly">Yearly</option>
                                            </select>
                                            <label for="billing_cycle">Billing Cycle*</label>
                                        </div>
                                        <span id="billing_cycleError"
                                            class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <div id="card-element" class="form-control"></div>
                                            <label for="card-element">Card Details*</label>
                                        </div>
                                        <input type="hidden" id="payment_method" name="payment_method">
                                        <span id="payment_methodError"
                                            class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" id="submitBtn"
                                            class="btn btn-primary font-medium py-3 w-100 mb-3">
                                            Continue Payment
                                        </button>
                                        <p class="text-body">By clicking the “Continue Payment” button you agree to
                                            OrthoDirection <a href="{{ route('privacy-policy') }}"
                                                class="font-bold text-primary" target="_blank">Terms of Use</a> and <a
                                                href="{{ route('terms-conditions') }}" class="font-bold text-primary"
                                                target="_blank">Privacy Policy.</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-4 bg-light">
                                <h5 class="font-semibold fs-3 text-dark">With <span id="planName2"></span> you get</h5>
                                <ul class="list-unstyled mb-7" id="planFeatures">

                                </ul>
                                <h5 class="fs-3 text-dark" id="planLabel">Month-to-month billing</h5>
                                <h3 class="font-bold fs-5 text-dark">
                                    <span id="planMonthlyPrice"></span>
                                    <span id="planYearlyPrice" class="d-none"></span>
                                </h3>
                                <hr>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div>
                                        <h5 class="fs-4 text-dark mb-0">Charged today</h5>
                                        <p class="mb-0 text-body fs-3 d-flex align-items-center gap-1">
                                            Taxes included (0.00 USD)
                                            <a class="mb-0 text-muted font-bold fs-6" tabindex="0" role="button"
                                                data-bs-toggle="popover" data-bs-trigger="focus"
                                                data-bs-content="The final price you see already includes taxes (such as VAT, GST, or sales taxes), which vary depending on where you live."
                                                data-bs-placement="bottom"><i class="ti ti-help"></i></a>
                                        </p>
                                    </div>
                                    <h2 class="fs-8 fw-bold text-dark flex-grow-1 text-end">
                                        <span id="planMonthlyPrice2"></span>
                                        <span id="planYearlyPrice2" class="d-none"></span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger font-medium" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        // Stripe 
        let stripe = Stripe("{{ env('STRIPE_KEY') }}");
        let elements = stripe.elements();
        let card = elements.create("card", {
            hidePostalCode: true,
            style: {
                base: {
                    fontSize: "16px",
                    color: "#495057",
                    fontFamily: "'Poppins', sans-serif",
                    "::placeholder": {
                        color: "#5a6a85a6"
                    },
                    backgroundColor: "#fff",
                    border: "1px solid #ced4da",
                    padding: "10px 12px"
                },
                invalid: {
                    color: "#dc3545",
                    iconColor: "#dc3545"
                }
            }
        });
        card.mount("#card-element");
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        function fetchPlans() {
            $.ajax({
                url: '{{ route('plans.fetch') }}',
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
                success: function(response) {
                    document.querySelector("#planContainer").innerHTML = "";
                    if (response.plans.length === 0) {
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
                    let userSubscription = response.subscription;
                    let subscribedPlanId = userSubscription ? userSubscription.plan_id : null;
                    response.plans.forEach(plan => {
                        let features = "";
                        JSON.parse(plan.features).forEach(feature => {
                            features += feature.status ? `
                                <li class="d-flex align-items-center gap-2 py-2">
                                    <i class="ti ti-check text-primary fs-4"></i>
                                    <span class="text-dark">${feature.name}</span>
                                </li>
                            ` : `
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
                        let freePlanButton = "";
                        if (plan.name == 'standard') {
                            planImage = "bronze";
                        } else if (plan.name == 'premium') {
                            planImage = "gold";
                        } else if (plan.name == 'enterprise') {
                            planImage = "elite";
                        } else if (plan.name == 'Free') {
                            freePlanButton = `<button class="btn btn-light px-2 fw-bolder rounded-2 py-6 w-100 text-capitalize" disabled>
                                        <i class="ti ti-circle-check-filled fs-4"></i> Already Registered
                                    </button>`;
                        }
                        let planButton = freePlanButton == "" ? `
                        <button class="btn btn-primary fw-bolder rounded-2 py-6 w-100 text-capitalize" id="choosePlanBtn" data-bs-toggle="modal"
                                    data-bs-target="#choosePlan" data-plan-id="${plan.id}" data-plan-name="${plan.name}" data-plan-monthly-price="${plan.monthly_price}" data-plan-yearly-price="${plan.yearly_price}" data-plan-features='${plan.features}'>
                            Choose Plan
                        </button>` : "";

                        if (subscribedPlanId === plan.id) {
                            planButton = freePlanButton == "" ? `
                            <button class="btn btn-light fw-bolder rounded-2 py-6 w-100 text-capitalize" disabled>
                                <i class="ti ti-circle-check-filled fs-4"></i> Already Registered
                            </button>` : "";
                        } else if (userSubscription) {
                            planButton = freePlanButton == "" ? `
                            <button class="btn btn-primary fw-bolder rounded-2 py-6 w-100 text-capitalize" id="change-plan" data-plan-id="${plan.id}">
                                Change Plan
                            </button>` : "";
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
                                    ${freePlanButton}
                                    ${planButton}
                                </div>
                            </div>
                        </div>
                        `;
                    });
                },
                error: function() {
                    alert('Failed to fetch plans.');
                }
            });
        }
        fetchPlans();

        $("#subscriptionForm").submit(function(event) {
            event.preventDefault();
            document.querySelector("#submitBtn").disabled = true;
            document.querySelector("#submitBtn").innerHTML = `
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Loading...
            `;
            stripe.createPaymentMethod({
                type: "card",
                card: card,
            }).then(function(result) {
                if (result.error) {
                    Toast.fire({
                        icon: "error",
                        title: result.error.message
                    });
                    document.querySelector("#submitBtn").disabled = false;
                    document.querySelector("#submitBtn").innerHTML = `Continue Payment`;
                } else {
                    $("#payment_method").val(result.paymentMethod.id);
                    $.ajax({
                        url: "{{ url('subscription/subscribe') }}",
                        type: "POST",
                        data: $("#subscriptionForm").serialize(),
                        success: function(response) {
                            Toast.fire({
                                icon: "success",
                                title: response.message
                            });
                            document.querySelector("#submitBtn").disabled = false;
                            document.querySelector("#submitBtn").innerHTML = `Continue Payment`;
                            $("#choosePlan").modal('hide');
                            fetchPlans();
                        },
                        error: function(response) {
                            Toast.fire({
                                icon: "error",
                                title: "Subscription failed!"
                            });
                            document.querySelector("#submitBtn").disabled = false;
                            document.querySelector("#submitBtn").innerHTML = `Continue Payment`;
                        }
                    });
                }
            });
        });

        $(document).on("click", "#change-plan", function() {
            let newPlanId = $(this).data("plan-id");
            let newBillingCycle = $("#plansSwitch").prop("checked") ? "yearly" : "monthly";
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to change your plan?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#1376F8",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Change it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    if (newPlanId && newBillingCycle) {
                        $(this).prop('disabled',true).html(`<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                            Changing...`);
                        $.ajax({
                            url: "{{ url('subscription/change-plan') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                new_plan_id: newPlanId,
                                billing_cycle: newBillingCycle
                            },
                            success: function(response) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.message
                                });
                                fetchPlans();
                            },
                            error: function(xhr) {
                                Toast.fire({
                                    icon: "error",
                                    title: response.error
                                });
                                $(this).prop('disabled',false).html(`Change Plan`);
                            }
                        });
                    }
                }
            });
        });

        $(document).on("change", "#billing_cycle", function() {
            let billingCycleValue = $(this).val();
            if (billingCycleValue == "monthly") {
                $(".modal #planMonthlyPrice").removeClass('d-none');
                $(".modal #planMonthlyPrice2").removeClass('d-none');
                $(".modal #planYearlyPrice").addClass('d-none');
                $(".modal #planYearlyPrice2").addClass('d-none');
                $(".modal #planLabel").text('Month-to-month billing');
            } else if (billingCycleValue == "yearly") {
                $(".modal #planMonthlyPrice").addClass('d-none');
                $(".modal #planMonthlyPrice2").addClass('d-none');
                $(".modal #planYearlyPrice").removeClass('d-none');
                $(".modal #planYearlyPrice2").removeClass('d-none');
                $(".modal #planLabel").text('Annual billing');
            }
        });

        $(document).on("click", "#choosePlanBtn", function() {
            let planId = $(this).data("plan-id");
            let planName = $(this).data("plan-name");
            let planMonthlyPrice = $(this).data("plan-monthly-price");
            let planYearlyPrice = $(this).data("plan-yearly-price");
            let planFeatures = $(this).data("plan-features");
            let billingCycle = $("#plansSwitch").prop("checked") ? "yearly" : "monthly";
            document.querySelector('#subscriptionForm #plan_id').value = planId;
            document.querySelector('.modal #planName').innerHTML = ` ${planName}`;
            document.querySelector('.modal #planName2').innerHTML = ` ${planName}`;
            document.querySelector('.modal #planMonthlyPrice').innerHTML = `${planMonthlyPrice} USD/Month`;
            document.querySelector('.modal #planMonthlyPrice2').innerHTML = `${planMonthlyPrice} USD`;
            document.querySelector('.modal #planYearlyPrice').innerHTML = `${planYearlyPrice} USD/Year`;
            document.querySelector('.modal #planYearlyPrice2').innerHTML = `${planYearlyPrice} USD`;
            document.querySelector("#planFeatures").innerHTML = "";
            planFeatures.forEach(feature => {
                document.querySelector("#planFeatures").innerHTML += feature.status ? `
                    <li class="d-flex align-items-center gap-2 py-2">
                        <i class="ti ti-check text-primary fs-4"></i>
                        <span class="text-dark">${feature.name}</span>
                    </li>
                ` : ``;
            });
        });
    </script>
@endsection
