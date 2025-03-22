@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Add Pricing Plan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('admin.plans') }}">Blogs</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Add Pricing Plan</li>
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

    <div class="card">
        <div class="card-body">
            <h5>Add Pricing Plan</h5>
            <p class="card-subtitle mb-3">
                All fields are required *
            </p>
            <form id="planForm">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                autocomplete="off" required
                                onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)"
                                maxlength="50">
                            <label for="name">Name*</label>
                        </div>
                        <span id="nameError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <select class="form-control text-capitalize" id="plan_type" name="plan_type" required>
                                <option selected disabled>Select Type</option>
                                @php
                                    $types = ['free', 'paid'];
                                @endphp
                                @foreach ($types as $type)
                                    <option value="{{ $type }}" class="text-capitalize">
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="plan_type">Plan Type*</label>
                        </div>
                        <span id="plan_typeError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="monthly_price" name="monthly_price"
                                placeholder="" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode === 46 && this.value.indexOf('.') === -1)"
                                maxlength="8" autocomplete="off" disabled>
                            <label for="monthly_price">Monthly Price*</label>
                        </div>
                        <span id="monthly_priceError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="yearly_price" name="yearly_price" placeholder=""
                                required onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode === 46 && this.value.indexOf('.') === -1)" maxlength="8"
                                autocomplete="off" disabled>
                            <label for="yearly_price">Yearly Price*</label>
                        </div>
                        <span id="yearly_priceError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                    </div>
                    <div class="features-repeater col-md-12 mb-3">
                        <div id="repeater-group">
                            <div class="row mb-3 repeater-item">
                                <div class="col-md-6 col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="features[0][name]"
                                            placeholder="Plan Feature" autocomplete="off" required>
                                        <label>Plan Feature*</label>
                                    </div>
                                    <span class="featuresError mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                                </div>
                                <div class="col-md-5 col-3 pe-0">
                                    <div class="form-floating">
                                        <select class="form-control text-capitalize" name="features[0][status]" required>
                                            <option selected disabled>Select Status</option>
                                            <option value="1" class="text-capitalize bg-success-subtle text-success"
                                                selected>Active</option>
                                            <option value="0" class="text-capitalize bg-danger-subtle text-danger">
                                                Deactive</option>
                                        </select>
                                        <label>Plan Feature Status*</label>
                                    </div>
                                </div>
                                <div class="col-md-1 col-3">
                                    <button
                                        class="btn w-100 bg-danger-subtle text-danger waves-effect waves-light d-flex justify-content-center align-items-center h-100 delete-btn"
                                        type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                                        data-bs-title="Delete" disabled>
                                        <i class="ti ti-circle-x fs-5"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button id="add-feature-btn" type="button" class="btn btn-primary waves-effect waves-light">
                            <div class="d-flex align-items-center">
                                Add Feature
                                <i class="ti ti-circle-plus ms-1 fs-5"></i>
                            </div>
                        </button>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <select class="form-control text-capitalize" id="plan_popular" name="plan_popular" required>
                                <option selected disabled>Select</option>
                                <option value="1" class="text-capitalize bg-success-subtle text-success" selected>
                                    Enable</option>
                                <option value="0" class="text-capitalize bg-danger-subtle text-danger">Disable
                                </option>
                            </select>
                            <label for="plan_popular">Plan Popular*</label>
                        </div>
                        <span id="plan_popularError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                    </div>
                    <div class="col-12">
                        <div class="d-md-flex align-items-center mt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" id="status"
                                    value="1" checked>
                                <label class="form-check-label" for="status">Default Pricing Plan Visible</label>
                            </div>
                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary font-medium rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-send me-2 fs-4"></i>
                                        Submit
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        $(document).ready(function() {
            const repeaterGroup = document.getElementById("repeater-group");
            const addFeatureBtn = document.getElementById("add-feature-btn");
            const MAX_ROWS = 15;

            function addFeatureRow() {
                const rows = repeaterGroup.querySelectorAll(".repeater-item");
                if (rows.length >= MAX_ROWS) {
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
                    Toast.fire({
                        icon: "error",
                        title: `You can add a maximum of ${MAX_ROWS} features.`,
                    });
                    return;
                }

                const newRow = document.createElement("div");
                newRow.className = "row mb-3 repeater-item";
                newRow.innerHTML = `
                    <div class="col-md-6 col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="features[${rows.length}][name]" autocomplete="off" placeholder="Plan Feature"
                                required>
                            <label>Plan Feature*</label>
                        </div>
                        <span class="featuresError mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                    </div>
                    <div class="col-md-5 col-3 pe-0">
                        <div class="form-floating">
                            <select class="form-control text-capitalize" name="features[${rows.length}][status]" required>
                                <option selected disabled>Select Status</option>
                                <option value="1" class="text-capitalize bg-success-subtle text-success" selected>Active</option>
                                <option value="0" class="text-capitalize bg-danger-subtle text-danger">Deactive</option>
                            </select>
                            <label>Plan Feature Status*</label>
                        </div>
                    </div>
                    <div class="col-md-1 col-3">
                        <button class="btn w-100 bg-danger-subtle text-danger waves-effect waves-light d-flex justify-content-center align-items-center h-100 delete-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Delete">
                            <i class="ti ti-circle-x fs-5"></i>
                        </button>
                    </div>
                `;
                repeaterGroup.appendChild(newRow);
                initializeTooltips();
                updateDeleteButtonsState();
            }

            function handleDeleteRow(row) {
                const rows = repeaterGroup.querySelectorAll(".repeater-item");
                if (rows.length > 1) {
                    row.remove();
                    updateDeleteButtonsState();
                }
            }

            function updateDeleteButtonsState() {
                const rows = repeaterGroup.querySelectorAll(".repeater-item");
                const deleteButtons = repeaterGroup.querySelectorAll(".delete-btn");
                deleteButtons.forEach((button) => {
                    button.disabled = rows.length === 1;
                });
                addFeatureBtn.disabled = rows.length >= MAX_ROWS;
            }

            function initializeTooltips() {
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }

            addFeatureBtn.addEventListener("click", addFeatureRow);
            repeaterGroup.addEventListener("click", function(e) {
                if (e.target.closest(".delete-btn")) {
                    const row = e.target.closest(".repeater-item");
                    handleDeleteRow(row);
                }
            });

            if (repeaterGroup.children.length === 0) {
                addFeatureRow();
            }
            initializeTooltips();

            // Forms Validation
            $('#status').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).val(1);
                } else {
                    $(this).val(0);
                }
            });

            $('#plan_type').on('change', function() {
                if ($(this).val() == 'free') {
                    $('#monthly_price, #yearly_price').prop('disabled', true);
                } else if ($(this).val() == 'paid') {
                    $('#monthly_price, #yearly_price').prop('disabled', false);
                }
            });

            $('#planForm').on('submit', function(e) {
                e.preventDefault();
                $('.badge.text-danger').text('');
                let formData = new FormData(this);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: "{{ route('plan.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('button[type="submit"]').prop('disabled', true).html(`
                            <div class="d-flex align-items-center">
                                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                Submitting...
                            </div>
                        `);
                        $('#add-feature-btn').prop('disabled', true);
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#planForm')[0].reset();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                },
                                didClose: () => {
                                    window.location.href =
                                        "{{ route('admin.plans') }}";
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: response.success,
                            });
                        } else {
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
                            Toast.fire({
                                icon: "error",
                                title: "Something went wrong. Please try again.",
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                $(`#${field}Error`).text(errors[field][
                                    0
                                ]);
                            }
                        } else {
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
                            Toast.fire({
                                icon: "error",
                                title: "An unexpected error occurred. Please try again.",
                            });
                        }
                    },
                    complete: function() {
                        $('button[type="submit"]').prop('disabled', false).html(`
                            <div class="d-flex align-items-center">
                                <i class="ti ti-send me-2 fs-4"></i>
                                Submit
                            </div>
                        `);
                        $('#add-feature-btn').prop('disabled', false);
                    },
                });
            });

        });
    </script>
@endsection
