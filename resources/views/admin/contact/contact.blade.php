@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Contact List</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Contact List</li>
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

    <div class="col-12 position-relative" style="z-index: 20;">
        <div class="position-absolute top-0 left-0 w-100 bg-white" id="loader">
            <div class="d-flex align-items-center justify-content-center" style="height: 60vh;">
                <div class="spinner-border text-primary" style="width: 4rem; height: 4rem" role="status">
                    <span class="visually-hidden">Loading...</span>
                    <img src="{{ asset('assets/images/favicon.png') }}" class="w-100 h-100 p-2" style="object-fit: cover"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="card overflow-hidden chat-application">
        <div class="d-flex align-items-center justify-content-between gap-3 m-3 d-lg-none">
            <form class="position-relative w-100">
                <input type="text" class="form-control search-chat py-2 ps-5" placeholder="Search Contact"
                    id="searchInput" maxlength="50">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <div class="d-flex w-100">
            <div class="d-flex w-100">
                <div class="min-width-340">
                    <div class="border-end user-chat-box h-100">
                        <div class="px-4 pt-9 pb-6 d-none d-lg-block">
                            <form class="position-relative">
                                <input type="text" class="form-control search-chat py-2 ps-5"
                                    placeholder="Search Contact" id="searchInput2" maxlength="50" />
                                <i
                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                            </form>
                        </div>
                        <div class="app-chat">
                            <ul class="chat-users" style="height: calc(100vh - 400px)" id="contactContainer" data-simplebar>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-100" id="contactDetailContainer">
                    <div class="chat-container h-100 w-100">
                        <div class="chat-box-inner-part h-100">
                            <div class="chatting-box app-email-chatting-box">
                                <div
                                    class="p-9 py-3 border-bottom chat-meta-user d-flex align-items-center justify-content-between">
                                    <h5 class="text-dark mb-0 fw-semibold">Contact Details</h5>
                                    <ul class="list-unstyled mb-0 d-flex align-items-center">
                                        <li class="d-lg-none d-block">
                                            <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                href="javascript:void(0)" id="backBtn">
                                                <i class="ti ti-arrow-left"></i>
                                            </a>
                                        </li>
                                        <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Call">
                                            <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                href="javascript:void(0)" id="callBtn">
                                                <i class="ti ti-phone"></i>
                                            </a>
                                        </li>
                                        <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Mail">
                                            <a class="d-block text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                href="javascript:void(0)" id="mailBtn">
                                                <i class="ti ti-mail"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="position-relative overflow-hidden">
                                    <div class="position-relative">
                                        <div class="chat-box p-9" style="height: calc(100vh - 428px)">
                                            <div class="simplebar-wrapper" style="margin: -20px;">
                                                <div class="simplebar-height-auto-observer-wrapper">
                                                    <div class="simplebar-height-auto-observer"></div>
                                                </div>
                                                <div class="simplebar-mask">
                                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                            aria-label="scrollable content"
                                                            style="height: 100%; overflow: hidden scroll;">
                                                            <div class="simplebar-content" style="padding: 20px;">
                                                                <div class="chat-list chat active-chat" data-user-id="1">
                                                                    <div
                                                                        class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                                        <div class="d-flex align-items-center gap-3">
                                                                            <img src="assets/images/profile/user-1.jpg"
                                                                                alt="user4" width="72" height="72"
                                                                                class="rounded-circle">
                                                                            <div>
                                                                                <h6 class="fw-semibold fs-4 mb-0 text-capitalize"
                                                                                    id="contactName">N/A</h6>
                                                                                <p class="mb-0" id="contactDate"></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4 mb-7">
                                                                            <p class="mb-1 fs-2">Phone number</p>
                                                                            <h6 class="fw-semibold mb-0"
                                                                                id="contactPhone">N/A</h6>
                                                                        </div>
                                                                        <div class="col-8 mb-7">
                                                                            <p class="mb-1 fs-2">Email address</p>
                                                                            <h6 class="fw-semibold mb-0"
                                                                                id="contactEmail">N/A</h6>
                                                                        </div>
                                                                        <div class="col-12 mb-9">
                                                                            <p class="mb-1 fs-2">Subject</p>
                                                                            <h6 class="fw-semibold mb-0"
                                                                                id="contactSubject">N/A</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <p class="mb-2 fs-2">Message</p>
                                                                        <p class="text-dark" id="contactComment">N/A</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="simplebar-placeholder" style="width: auto; height: 578px;">
                                                </div>
                                            </div>
                                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                            </div>
                                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                                <div class="simplebar-scrollbar"
                                                    style="height: 128px; transform: translate3d(0px, 0px, 0px); display: block;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center w-100 mb-5 errorContainer">
        <div class="row justify-content-center w-100">
            <div class="col-lg-8">
                <div class="text-center">
                    <img src="{{ asset('assets/dash/assets/images/backgrounds/contacts_bg.svg') }}" alt=""
                        class="img-fluid w-100">
                    <h3 class="fw-semibold mb-3">Contact List Not Found!!!</h3>
                    <p class="fw-normal mb-7 fs-4">No contact list available at the moment. Your contact list could not be
                        found.</p>
                    <a class="btn btn-primary" href="javascript:void()" onclick="window.location.reload()"
                        role="button">Try Again...</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            function fetchContact(search = '') {
                $.ajax({
                    url: '{{ route('contact.fetch') }}',
                    type: 'GET',
                    data: {
                        search
                    },
                    beforeSend: function() {
                        $('#loader').fadeIn(500).show();
                    },
                    complete: function() {
                        $('#loader').fadeOut(500);
                    },
                    success: function(contacts) {
                        document.querySelector("#contactContainer").innerHTML = "";
                        if (contacts.length === 0) {
                            document.querySelector("#contactContainer").innerHTML = `
                                <li>
                                    <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                                        <div class="row justify-content-center w-100">
                                            <div class="col-lg-8">
                                                <div class="text-center">
                                                    <img src="{{ asset('assets/dash/assets/images/backgrounds/contacts_bg.svg') }}" alt=""
                                                        class="img-fluid w-100">
                                                    <h3 class="fw-semibold mb-3">Contact List Not Found!!!</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            `;
                            if ($("#searchInput").val() == "" && $("#searchInput2").val() == "") {
                                $(".chat-application").addClass("d-none");
                                $(".errorContainer").removeClass("d-none");
                            }
                            return;
                        } else {
                            $(".chat-application").removeClass("d-none");
                            $(".errorContainer").addClass("d-none");
                        }
                        contacts.forEach(contact => {
                            document.querySelector("#contactContainer").innerHTML += `
                            <li>
                                <a href="javascript:void(0)"
                                    class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user" data-name="${contact.fname} ${contact.lname}" data-email="${contact.email}" data-phone="${contact.phone}" data-subject="${contact.subject}" data-comment="${contact.comment}" data-date="${contact.created_at}">
                                    <span class="position-relative">
                                        <img src="assets/images/profile/user-1.jpg" alt="user-4" width="40"
                                            height="40" class="rounded-circle">
                                    </span>
                                    <div class="ms-6 d-inline-block w-75">
                                        <h6 class="mb-1 fw-semibold chat-title text-capitalize">
                                            ${contact.fname} ${contact.lname}
                                        </h6>
                                        <span class="fs-2 text-body-color d-block">${contact.email}</span>
                                    </div>
                                </a>
                            </li>
                            `;
                        });
                        // if (document.getElementById('contactContainer').SimpleBar) {
                        //     document.getElementById('contactContainer').SimpleBar.unMount();
                        // }
                        // new SimpleBar(document.getElementById('contactContainer'));
                        $(".chat-user").first().trigger('click');
                    },
                    error: function() {
                        alert('Failed to fetch contacts.');
                    }
                });
            }
            fetchContact();

            document.querySelector("#searchInput").onkeyup = () => {
                fetchContact(document.querySelector("#searchInput").value);
            }

            document.querySelector("#searchInput2").onkeyup = () => {
                fetchContact(document.querySelector("#searchInput2").value);
            }

            $("#backBtn").click(function() {
                $("#contactDetailContainer").addClass("d-none d-lg-block");
            });
            $(document).on('click', '.chat-user', function() {
                $("#contactDetailContainer").removeClass("d-none d-lg-block");
                $(this).addClass("bg-light");
                let name = $(this).data("name");
                let phone = $(this).data("phone");
                let email = $(this).data("email");
                let subject = $(this).data("subject");
                let comment = $(this).data("comment");
                let dateformat = $(this).data("date");
                let date = new Date(dateformat);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true,
                    timeZone: 'UTC'
                };
                document.querySelector("#contactDetailContainer #contactName").innerHTML = name;
                document.querySelector("#contactDetailContainer #contactPhone").innerHTML = phone;
                document.querySelector("#contactDetailContainer #contactEmail").innerHTML = email;
                document.querySelector("#contactDetailContainer #contactSubject").innerHTML = subject;
                document.querySelector("#contactDetailContainer #contactComment").innerHTML = comment;
                document.querySelector("#contactDetailContainer #contactDate").innerHTML = date.toLocaleString('en-US', options);
                document.querySelector("#contactDetailContainer #callBtn").href = `tel:${phone}`;
                document.querySelector("#contactDetailContainer #mailBtn").href = `mailto:${email}`;
            });
        });
    </script>
@endsection
