@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Blogs</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('admin.dashboard') }}">Home</a>
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
            <input type="text" class="form-control search-chat py-2 ps-5" id="search" placeholder="Search Blog"
                onkeyup="fetchBlogs(this.value)" maxlength="50">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            <button class="btn bg-primary-subtle text-primary font-medium" id="searchBtn" type="button"
                onclick="fetchBlogs(document.querySelector('#search').value)">Search</button>
        </form>
        <li class="nav-item ms-auto">
            <a href="{{ route('admin.add-blog') }}" class="btn btn-primary d-flex align-items-center px-3">
                <i class="ti ti-list-details me-0 me-md-1 fs-4"></i>
                <span class="d-none d-md-block font-weight-medium fs-3">Add Blog</span>
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


    <div class="row" id="blogContainer">
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
        function fetchBlogs(search = '') {
            $.ajax({
                url: '{{ route('blogs.fetch') }}',
                type: 'GET',
                data: {
                    search
                },
                beforeSend: function() {
                    $('#searchBtn').prop('disabled', true).text('Loading...');
                    $('#blogContainer').hide();
                    $('#loader').fadeIn(500).show();
                },
                complete: function() {
                    $('#searchBtn').prop('disabled', false).text('Search');
                    $('#loader').fadeOut(500);
                    setTimeout(() => {
                        $('#blogContainer').fadeIn(500).show()
                    }, 550);
                },
                success: function(blogs) {
                    document.querySelector("#blogContainer").innerHTML = "";
                    if (blogs.length === 0) {
                        document.querySelector("#blogContainer").innerHTML = `
                        <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                            <div class="row justify-content-center w-100">
                                <div class="col-lg-8">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/dash/assets/images/backgrounds/blogs_bg.svg') }}" alt=""
                                            class="img-fluid w-100">
                                        <h3 class="fw-semibold mb-3">Blogs Not Found!!!</h3>
                                        <p class="fw-normal mb-7 fs-4">It looks like there are no blogs here. Explore other sections or try again later.</p>
                                        <a class="btn btn-primary" href="javascript:void()" onclick="window.location.reload()" role="button">Try Again...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                        return;
                    }
                    blogs.forEach(blog => {
                        const blogDateTime =  new Date(`${blog.date}T${blog.time}`);
                        const differenceInMs = new Date() - blogDateTime;
                        const days = Math.floor(differenceInMs / (1000 * 60 * 60 * 24));
                        const hours = Math.floor(differenceInMs / (1000 * 60 * 60));
                        const minutes = Math.floor(differenceInMs / (1000 * 60));
                        const seconds = Math.floor(differenceInMs / 1000);
                        let timeAgo;
                        if (days > 5) {
                            timeAgo = blogDateTime.toLocaleDateString();
                        } else if (seconds < 60) {
                            timeAgo = `${seconds} seconds ago`;
                        } else if (minutes < 60) {
                            timeAgo = `${minutes} minutes ago`;
                        } else if (hours < 24) {
                            timeAgo = `${hours} hours ago`;
                        } else {
                            timeAgo = `${days} days ago`;
                        }
                        const formattedDate = new Intl.DateTimeFormat('en-US', {
                            weekday: 'short',
                            month: 'short',
                            day: '2-digit'
                        }).format(new Date(blog.date));

                        let tags = "";
                        JSON.parse(blog.tags).forEach(tag => {
                            tags +=
                                `<span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm mt-3 me-1">${tag}</span>`
                        })
                        document.querySelector("#blogContainer").innerHTML += `
                        <div class="col-md-6 col-lg-4">
                            <div class="card rounded-2 overflow-hidden hover-img">
                                <div class="position-relative">
                                    <a href="{{ url('admin/blogs/blogDetail') }}/${blog.id}"><img src="{{ asset('admins_blogs_thumbnails/${blog.thumbnail}') }}"
                                            class="card-img-top img-fluid rounded-0" style="height:230px; object-fit:cover; object-position:top;" alt="..." loading="lazy"></a>
                                    <span
                                        class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">${timeAgo}</span>
                                    <div class="mt-9 me-9 position-absolute top-0 end-0">
                                        <a class="btn mb-1 waves-effect waves-light bg-primary-subtle text-primary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            data-bs-title="Show/Hide" onclick="toggleStatus(${blog.id})">
                                            ${blog.status ? '<i class="ti ti-eye"></i>' : '<i class="ti ti-eye-closed"></i>'}
                                        </a>
                                        <a class="btn mb-1 waves-effect waves-light bg-secondary-subtle text-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                            href="{{ url('admin/blogs/blogEdit') }}/${blog.id}" data-bs-toggle="tooltip" data-bs-placement="left"
                                            data-bs-title="Edit">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <a class="btn mb-1 waves-effect waves-light bg-danger-subtle text-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                            href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left"
                                            data-bs-title="Delete" onclick="deleteBlog(${blog.id})">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                    <img src="assets/images/profile/user-1.jpg" alt=""
                                        class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                                        height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="${blog.author}">
                                </div>
                                <div class="card-body p-4">
                                    ${tags}
                                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="{{ url('admin/blogs/blogDetail') }}/${blog.id}">${blog.title}</a>
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>9,125
                                        </div>
                                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>3
                                        </div>
                                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>
                                            ${formattedDate}
                                        </div>
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
        fetchBlogs();

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
                url: `{{ url('admin/blogs/blogToggleStatus') }}/${id}`,
                type: 'GET',
                success: function(response) {
                    Toast.fire({
                        icon: "success",
                        title: response.success,
                    });
                    fetchBlogs();
                },
                error: function() {
                    Toast.fire({
                        icon: "error",
                        title: response.error,
                    });
                }
            });
        }

        function deleteBlog(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to delete this blog?",
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
                        url: `{{ url('admin/blogs/blogDestroy') }}/${id}`,
                        type: 'GET',
                        success: function(response) {
                            Toast.fire({
                                icon: "success",
                                title: response.success,
                            });
                            fetchBlogs();
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
