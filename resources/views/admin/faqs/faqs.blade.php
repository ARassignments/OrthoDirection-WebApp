@extends('layouts.app')
@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">FAQs</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">FAQs</li>
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

    <div class="d-flex align-items-center justify-content-center w-100 mb-5">
        <div class="row justify-content-center w-100">
            <div class="col-lg-8">
                <div class="text-center">
                    <img src="{{ asset('assets/dash/assets/images/backgrounds/faqs_bg.svg') }}" alt=""
                        class="img-fluid w-100">
                    <h3 class="fw-semibold mb-3">FAQs Not Found!!!</h3>
                    <p class="fw-normal mb-7 fs-4">Let's begin creating a comprehensive FAQ section for our website to provide clear and helpful answers to common questions.</p>
                    <a class="btn btn-primary" href="javascript:void()" role="button">Let's Add FAQs</a>
                </div>
            </div>
        </div>
    </div>
@endsection
