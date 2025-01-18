@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <div class="datatables">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Edit Blog</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('admin.blogs') }}">Blogs</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Edit Blog</li>
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
                <h5>Edit Blog</h5>
                <p class="card-subtitle mb-3">
                    All fields are required *
                </p>
                <form id="blogForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3 px-lg-2 px-md-2 px-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold">Blog Thumbnail</h5>
                                    <p class="card-subtitle mb-4">Change your thumbnail picture from here</p>
                                    <div class="text-center">
                                        <img id="thumbnailPreview"
                                            src="{{ asset('admins_blogs_thumbnails/' . $blog['thumbnail']) }}" alt=""
                                            class="img-fluid rounded-5" width="500" height="220">
                                        <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                            <input type="file" name="thumbnail" id="thumbnail" class="d-none"
                                                accept=".png,.jpg,.jpeg">
                                            <label for="thumbnail" class="btn btn-primary">Upload</label>
                                            <button class="btn btn-outline-danger" type="button"
                                                id="resetThumbnailBtn">Reset</button>
                                        </div>
                                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 2000K</p>
                                        <span id="thumbnailError"
                                            class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="title" name="title" placeholder=""
                                    value="{{ $blog['title'] }}" required>
                                <label for="title">Title</label>
                            </div>
                            <span id="titleError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="author" name="author" placeholder=""
                                    value="{{ $blog['author'] }}" required>
                                <label for="author">Author Name</label>
                            </div>
                            <span id="authorError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                        </div>
                        <div class="tags-repeater col-md-12 mb-3">
                            <div id="repeater-group">
                            </div>
                            <button id="add-tag-btn" type="button" class="btn btn-primary waves-effect waves-light">
                                <div class="d-flex align-items-center">
                                    Add Tag
                                    <i class="ti ti-circle-plus ms-1 fs-5"></i>
                                </div>
                            </button>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control h-auto" id="short_description" name="short_description" rows="5" placeholder=""
                                    required>{{ $blog['short_description'] }}</textarea>
                                <label for="short_description">Short Description</label>
                            </div>
                            <span id="short_descriptionError"
                                class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <textarea class="form-control h-auto" id="description" name="description" rows="5" placeholder="" required>{{ $blog['description'] }}</textarea>
                                <label for="description">Description</label>
                            </div>
                            <span id="descriptionError" class="mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
                        </div>
                        <div class="col-12">
                            <div class="d-md-flex align-items-center mt-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status"
                                        value="{{ $blog['status'] }}" {{ $blog['status'] ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Default Blog Visible</label>
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

    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        $(document).ready(function() {
            const repeaterGroup = document.getElementById("repeater-group");
            const addTagBtn = document.getElementById("add-tag-btn");
            const MAX_ROWS = 4;

            function addTagRow(tagValue = "") {
                const rows = repeaterGroup.querySelectorAll(".repeater-item");
                if (rows.length >= MAX_ROWS) {
                    alert("You can add a maximum of 4 tags.");
                    return;
                }

                const newRow = document.createElement("div");
                newRow.className = "row mb-3 repeater-item";
                newRow.innerHTML = `
                    <div class="col-md-11 col-9 pe-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="tags[]" placeholder="Tag Name" value="${tagValue}" required>
                            <label>Tag Name</label>
                        </div>
                        <span class="tagError mt-2 mb-0 badge fs-2 bg-danger-subtle text-danger"></span>
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
                addTagBtn.disabled = rows.length >= MAX_ROWS;
            }

            function initializeTooltips() {
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }

            addTagBtn.addEventListener("click", function(e) {
                e.preventDefault();
                addTagRow();
            });

            repeaterGroup.addEventListener("click", function(e) {
                if (e.target.closest(".delete-btn")) {
                    const row = e.target.closest(".repeater-item");
                    handleDeleteRow(row);
                }
            });

            let jsonString = @json($blog['tags']);
            let decodedString = jsonString.replace(/\\u0022/g, '"');
            const existingTags = JSON.parse(decodedString);
            existingTags.forEach(tag => {
                addTagRow(tag);
            });

            initializeTooltips();
            updateDeleteButtonsState();

            $('#thumbnail').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnailPreview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#resetThumbnailBtn').click(function() {
                $('#thumbnail').val('');
                $('#thumbnailPreview').attr('src',
                    "{{ asset('admins_blogs_thumbnails/' . $blog['thumbnail']) }}");
            });

            $('#status').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).val(1);
                } else {
                    $(this).val(0);
                }
            });

            $('#blogForm').on('submit', function(e) {
                e.preventDefault();
                $('.badge.text-danger').text('');
                let formData = new FormData(this);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: `{{ url('admin/blogs/blogUpdate') }}/{{ $blog['id'] }}`,
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
                        $('#add-tag-btn').prop('disabled', true);
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#blogForm')[0].reset();
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
                                        "{{ route('admin.blogs') }}";
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
                        $('#add-tag-btn').prop('disabled', false);
                    },
                });
            });

        });
    </script>
@endsection
