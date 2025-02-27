@if ($subscription)
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body p-4">
                <h4 class="fw-semibold mb-3">Current Plan : <span
                        class="text-success text-capitalize">{{ $subscription->plan->name }}</span></h4>
                <p>Thanks for being a {{ $subscription->plan->name }} member.</p>
                <div class="d-flex align-items-center justify-content-between mt-7 mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-package text-dark d-block fs-7" width="22" height="22"></i>
                        </div>
                        <div>
                            <p class="mb-0">Current Plan</p>
                            <h5 class="fs-4 fw-semibold">Renew on
                                {{ \Carbon\Carbon::parse($subscription->end_date)->locale(app()->getLocale())->translatedFormat('d F, Y') }}
                                <span class="text-capitalize">({{ ucfirst($subscription->billing_cycle) }})</span></h5>
                        </div>
                    </div>
                    @if ($subscription->status)
                        <a class="badge fw-semibold fs-2 bg-success-subtle text-success" href="javascript:void(0)"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="Subscription Status">{{ ucfirst($subscription->status) }}</a>
                    @endif
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-primary" id="change-plan">Change Plan</button>
                    <button class="btn btn-outline-danger" id="reset-plan">Reset Plan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body p-4">
                <h4 class="fw-semibold mb-3">Payment Method</h4>
                <p>Renew on
                    {{ \Carbon\Carbon::parse($subscription->end_date)->locale(app()->getLocale())->translatedFormat('d F, Y') }}
                </p>
                <div class="d-flex align-items-center justify-content-between mt-7">
                    <div class="d-flex align-items-center gap-3">
                        <div class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-credit-card text-dark d-block fs-7" width="22" height="22"></i>
                        </div>
                        <div>
                            <h5 class="fs-4 fw-semibold">Visa</h5>
                            <p class="mb-0 text-dark">*****2102</p>
                        </div>
                    </div>
                    <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                        href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                        <i class="ti ti-pencil-minus"></i>
                    </a>
                </div>
                <p class="my-2">If you updated your payment method, it will only be dislpayed here
                    after your
                    next billing cycle.</p>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-outline-danger" id="cancel-subscription">Cancel
                        Subscription</button>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body p-4">
                <h4 class="fw-semibold mb-3">Current Plan : <span class="text-success text-capitalize">Free</span></h4>
                <p>Thanks for being a free member.</p>
                <div class="d-flex align-items-center justify-content-between mt-7">
                    <div class="d-flex align-items-center gap-3">
                        <div class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-package text-dark d-block fs-7" width="22" height="22"></i>
                        </div>
                        <div>
                            <p class="mb-0">Free Plan</p>
                            <h5 class="fs-4 fw-semibold">For Lifetime</h5>
                        </div>
                    </div>
                    <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                        href="{{ route('user.plans') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Add Plan">
                        <i class="ti ti-circle-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
