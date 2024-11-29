@extends('layouts.login')

@section('content')

<!--! ================================================================ !-->
<!--! [Start] Main Content !-->
<!--! ================================================================ !-->
<main class="auth-creative-wrapper">
    <div class="auth-creative-inner">
        <div class="creative-card-wrapper">
            <div class="card my-4 overflow-hidden" style="z-index: 1">
                <div class="row flex-1 g-0">
                    <div class="col-lg-6 h-100 my-auto order-1 order-lg-0">
                        <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-50 start-50 d-none d-lg-block">
                            <img src="{{ asset('assets/images/academy_favicon.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="creative-card-body card-body p-sm-5">
                            <h2 class="fs-20 fw-bolder mb-4">Login</h2>
                            <!-- Xatoliklarni ko'rsatish -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('student.login') }}" method="post" class="w-100 mt-4 pt-2">
                            @csrf
                                <div class="mb-4">
                                    <input type="email" class="form-control" placeholder="{{ __('messages.auth.email_or_username') }}" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="{{ __('messages.auth.password') }}" name="password" required>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                            <label class="custom-control-label c-pointer" for="rememberMe">{{ __('messages.auth.remember_me') }}</label>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('password.request') }}" class="fs-11 text-primary">{{ __('messages.auth.forget_password') }}</a>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-lg btn-primary w-100">Login</button>
                                </div>
                            </form>
                            <div class="w-100 mt-5 text-center mx-auto">
                                <div class="mb-4 border-bottom position-relative"><span class="small py-1 px-3 text-uppercase text-muted bg-white position-absolute translate-middle">{{ __('messages.auth.or') }}</span></div>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <a href="javascript:void(0);" class="btn btn-light-brand flex-fill" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Login with Facebook">
                                        <i class="feather-facebook"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-light-brand flex-fill" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Login with Twitter">
                                        <i class="feather-twitter"></i>
                                    </a>
                                    <a href="{{ route('login') }}" class="btn btn-light-brand flex-fill" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Login with Github">
                                        {{ __('messages.auth.for_employees') }}
                                    </a>
                                </div>
                            </div>
                            <div class="mt-5 text-muted">
                                <span> {{ __('messages.auth.have_an_account') }}</span>
                                <a href="{{ route('student.register') }}" class="fw-bold">{{ __('messages.auth.create_acc') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 bg-primary order-0 order-lg-1">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/images/auth/login-cover.webp') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--! ================================================================ !-->
<!--! [End] Main Content !-->
<!--! ================================================================ !-->

@endsection