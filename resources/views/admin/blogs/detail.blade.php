@extends('layouts.app')
@section('content')
    <div class="datatables">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">{{ $blog['title'] }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('admin.blogs') }}">Blogs</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">{{ $blog['title'] }}</li>
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

        <div class="card rounded-2 overflow-hidden">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="{{ asset('admins_blogs_thumbnails/' . $blog['thumbnail']) }}"
                        class="card-img-top rounded-0 object-fit-cover" alt="..." height="440"></a>
                <span
                    class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0"
                    id="timeAgo"></span>
                <img src="assets/images/profile/user-1.jpg" alt=""
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="{{ $blog['author'] }}">
            </div>
            <div class="card-body p-4">
                <div id="tags"></div>
                <h2 class="fs-9 fw-semibold mt-4">{{ $blog['title'] }}</h2>
                <p class="mb-4">{{ $blog['short_description'] }}</p>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>2252</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>3</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i><span
                            id="formattedDate"></span>
                    </div>
                </div>
            </div>
            <div class="card-body border-top p-4">
                <h2 class="fs-8 fw-semibold mb-3">Description</h2>
                <p id="description">
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <h4 class="mb-0 fw-semibold">Comments</h4>
                    <span class="badge bg-primary-subtle text-primary fs-4 fw-semibold px-6 py-8 rounded">1</span>
                </div>
                <div class="position-relative">
                    <div class="p-4 rounded-2 text-bg-light mb-3 d-none">
                        <div class="d-flex align-items-center gap-3">
                            <img src="assets/images/profile/user-2.jpg" alt="" class="rounded-circle" width="33"
                                height="33">
                            <h6 class="fw-semibold mb-0 fs-4">Don Russell</h6>
                            <span class="p-1 text-bg-muted rounded-circle d-inline-block"></span>
                        </div>
                        <p class="my-3">Es do ujurus nejson imju azgudpi toceztep ji cocicoci bosawrop korze ta.
                            Casetlu udumej umocu wanaro webmos ijafa ud muli amja softoj ma pijum.
                        </p>
                        <div class="d-flex align-items-center gap-2">
                            <a class="d-flex align-items-center justify-content-center text-bg-secondary p-2 fs-4 rounded-circle"
                                href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Reply">
                                <i class="ti ti-arrow-back-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center w-100">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <img src="{{ asset('assets/dash/assets/images/backgrounds/nodata_bg.svg') }}"
                                    alt="" class="img-fluid col-lg-5">
                                <h3 class="fw-semibold mb-3">Comments Not Found!!!</h3>
                                <p class="fw-normal fs-4">It looks like there are no comments here. Explore other
                                    sections or try again later.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        const textareaContent = `{{ $blog['description'] }}`;
        document.getElementById("description").innerHTML = textareaContent.replace(/\n/g, "<br>");
        const blogDateTime =  new Date(`{{ $blog['date'] }}T{{ $blog['time'] }}`);
        const differenceInMs = new Date() - new Date(`{{ $blog['date'] }}T{{ $blog['time'] }}`)
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

        document.getElementById("timeAgo").innerHTML = timeAgo;

        const formattedDate = new Intl.DateTimeFormat('en-US', {
            weekday: 'short',
            month: 'short',
            day: '2-digit'
        }).format(new Date(`{{ $blog['date'] }}`));
        document.getElementById("formattedDate").innerHTML = formattedDate;

        let jsonString = @json($blog['tags']);
        let decodedString = jsonString.replace(/\\u0022/g, '"');
        const existingTags = JSON.parse(decodedString);
        existingTags.forEach(tag => {
            document.getElementById("tags").innerHTML +=
                `<span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm mt-3 me-1">${tag}</span>`
        });
    </script>
@endsection
