@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Notifications</h4>
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
                            <li class="breadcrumb-item" aria-current="page">Notifications</li>
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
        <form class="nav nav-tabs input-group shadow w-auto filterContainer" role="tablist">
            <label class="btn rounded-start-2 fs-3 nav-link font-medium active" data-bs-toggle="tab" for="filter-1"
                role="tab" aria-selected="true">
                All
            </label>
            <input type="radio" class="btn-check" name="filters" id="filter-1" autocomplete="off" value="all" checked>
            <input type="radio" class="btn-check" name="filters" id="filter-2" autocomplete="off" value="unread">
            <label class="btn rounded-end-2 fs-3 nav-link font-medium d-flex gap-2" data-bs-toggle="tab" for="filter-2"
                role="tab" aria-selected="false" tabindex="-1">
                Unread <span
                    class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center rounded-pill fs-1 d-none mb-0 py-1"
                    id="unreadCount">0</span>
            </label>
        </form>
        <form class="position-relative input-group flex-grow-1 w-auto">
            <input type="text" class="form-control search-chat py-2 ps-5" id="search"
                placeholder="Search Notification" autocomplete="off" maxlength="50">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            <button class="btn bg-primary-subtle text-primary font-medium" id="searchBtn" type="button">Search</button>
        </form>
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

    <div class="row" id="notificationContainer">
    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
    <script>
        $(document).ready(function() {
            document.querySelectorAll("input[name='filters']").forEach(input => {
                input.addEventListener("change", function() {
                    fetchNotifications(document.querySelector('#search').value);
                });
            });

            fetchNotifications();

            function fetchNotifications(search = '') {
                let filter = document.querySelector("input[name='filters']:checked").value;
                $.ajax({
                    url: '{{ route('notifications.fetch') }}',
                    type: 'GET',
                    data: {
                        search,
                        filter
                    },
                    beforeSend: function() {
                        $('#searchBtn').prop('disabled', true).text('Loading...');
                        $('#notificationContainer').hide();
                        $('#loader').fadeIn(500).show();
                    },
                    complete: function() {
                        $('#searchBtn').prop('disabled', false).text('Search');
                        $('#loader').fadeOut(500);
                        setTimeout(() => {
                            $('#notificationContainer').fadeIn(500).show()
                        }, 550);
                    },
                    success: function(response) {
                        let notifications = response.notifications;
                        let unreadCount = response.unread_count;
                        let notificationList = $("#notificationContainer");
                        notificationList.empty();
                        if (notifications.length > 0) {
                            notifications.forEach(notification => {
                                let statusBadge = notification.data.status?getStatusBadge(notification.data.status):'';
                                @if (Auth::user()->role == 'doctor'||Auth::user()->role == 'family'||Auth::user()->role == 'admin')
                                    let notificationNavigate =
                                        `{{ url(Auth::user()->role.'/patients/patientDetail') }}/${notification.data.patient_id}`;
                                @elseif (Auth::user()->role == 'patient')
                                    let notificationNavigate =
                                        `{{ route('patient.appointments') }}`;
                                @endif
                                let notificationStatus = notification.read_at ?
                                    `` :
                                    `<div class="notification ms-1 d-inline-block position-static bg-primary rounded-circle"></div>`;
                                let longMessage = notification.data.long_message?`
                                    <div class="card shadow-none mt-2 p-2">
                                        <p class="mb-0 text-muted">${notification.data.long_message}</p>
                                    </div>
                                `:``;
                                notificationList.append(`
                                <div class="col-md-12">
                                    <div class="py-6 px-6 ${notification.read_at?'':'bg-primary-subtle'} rounded-2 d-flex flex-row align-items-center mb-3 list notification-item" data-id="${notification.id}">
                                        <span class="me-3">
                                            <img src="${notification.data.profile_img ? '/profile_images/' + notification.data.profile_img : 'assets/dash/assets/images/profile/user-1.jpg'}" 
                                                alt="user" class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="d-inline-block w-100 v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base"><a href="${notificationNavigate}">${notification.data.user_name}</a>
                                                <span class="text-muted fw-medium ms-1">${notification.data.message}</span> 
                                                ${notificationStatus}
                                            </h6>
                                            <span class="fs-2 me-1 text-body-secondary">${moment(notification.created_at).fromNow()}</span>
                                            ${statusBadge}
                                            ${longMessage}
                                        </div>
                                        <a href="${notificationNavigate}" class="btn btn-sm bg-primary-subtle text-primary ms-2 align-self-start">View</a>
                                    </div>
                                </div>
                                `);
                            });
                            if (unreadCount > 0) {
                                $("#unreadCount").removeClass('d-none');
                                $("#unreadCount").text(`${unreadCount}`);
                            } else {
                                $("#unreadCount").addClass('d-none');
                            }
                        } else {
                            notificationList.html(`
                                <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                                    <div class="row justify-content-center w-100">
                                        <div class="col-lg-8">
                                            <div class="text-center">
                                                <img src="{{ asset('assets/dash/assets/images/backgrounds/notification_bg.svg') }}" alt=""
                                                    class="img-fluid w-100">
                                                <h3 class="fw-semibold mb-3">Notifications Not Found!!!</h3>
                                                <p class="fw-normal mb-7 fs-4">It looks like there are no notifications here. Explore other sections or try again later.</p>
                                                <a class="btn btn-primary" href="javascript:void()" onclick="window.location.reload()" role="button">Try Again...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                            $("#unreadCount").addClass('d-none');
                        }
                    },
                    error: function() {
                        alert('Failed to fetch notifications.');
                    }
                });
            }

            function getStatusBadge(status) {
                let badgeClass = "";
                if (status === "pending") badgeClass = "bg-warning-subtle text-warning";
                else if (status === "approved" || status === "completed") badgeClass =
                    "bg-success-subtle text-success";
                else if (status === "rejected" || status === "cancelled") badgeClass =
                    "bg-danger-subtle text-danger";
                return `<span class="fs-1 badge fw-semibold ${badgeClass} text-capitalize">${status}</span>`;
            }

            $("#search").on("keyup", function() {
                let searchTerm = $(this).val().trim();
                fetchNotifications(searchTerm);
            });
            $("#searchBtn").on("click", function() {
                let searchTerm = $("#search").val().trim();
                fetchNotifications(searchTerm);
            });

            $(document).on("click", ".list.notification-item", function() {
                let notificationId = $(this).data("id");
                $.ajax({
                    url: "{{ route('notifications.read') }}",
                    type: "POST",
                    data: {
                        id: notificationId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            let searchTerm = $("#search").val().trim();
                            fetchNotifications(searchTerm);
                            globalNotificationsTriggered();
                        }
                    },
                    error: function(error) {
                        console.error("Error marking notification as read:", error);
                    }
                });
            });
        });
    </script>
@endsection
