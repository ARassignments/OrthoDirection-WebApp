<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center gap-4 mb-4">
                <div class="position-relative">
                    <div class="border border-2 border-primary rounded-circle">
                        <img src="assets/images/profile/user-1.jpg" class="rounded-circle m-1" alt="user1"
                            width="60">
                    </div>
                </div>
                <div>
                    <h3 class="fw-semibold">Hi, <span class="text-dark text-capitalize">{{ Auth::user()->name }}</span>
                    </h3>
                    <span>Cheers, and happy activities - July 6 2023</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
