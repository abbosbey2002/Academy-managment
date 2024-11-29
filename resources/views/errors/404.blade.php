@extends('layouts.student')
@section('content')
<main class="auth-creative-wrapper">
    <div class="auth-creative-inner">
        <div class="creative-card-wrapper">
            <div class="card my-4 overflow-hidden" style="z-index: 1">
                <div class="row flex-1 g-0">
                    <div class="col-lg-6 h-100 my-auto">
                        <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-50 start-50">
                            <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="creative-card-body card-body p-sm-5">
                            <h2 class="fw-bolder mb-4" style="font-size: 120px">4<span class="text-danger">0</span>4</h2>
                            <h4 class="fw-bold mb-2">Page not found</h4>
                            <p class="fs-12 fw-medium text-muted">Sorry, the page you are looking for can't be found. Please check the URL or try to a different page on our site.</p>
                            <div class="mt-5">
                                <a href="/admin/dashboard" class="btn btn-light-brand w-100">{{__('messages.error.back_home')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 bg-primary">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/images/auth/auth-user.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection