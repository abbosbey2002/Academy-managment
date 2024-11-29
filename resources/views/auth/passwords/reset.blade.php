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
                    <div class="col-lg-6 h-100 my-auto">
                        <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-50 start-50">
                            <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="creative-card-body card-body p-sm-5">
                            <h2 class="fs-20 fw-bolder mb-4">Reset</h2>
                            <h4 class="fs-13 fw-bold mb-2">Reset your password</h4>
                            <p class="fs-12 fw-medium text-muted">Enter your email and a reset link will be sent to you. Let's access our best recommendations for you.</p>

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

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="w-100 mt-4 pt-2" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="mb-4">
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-lg btn-primary w-100">Reset Now</button>
                                </div>
                            </form>
                            <div class="mt-5 text-muted">
                                <span>Don't have an account?</span>
                                <a href="{{ route('register') }}" class="fw-bold">Create an Account</a>
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
<!--! ================================================================ !-->
<!--! [End] Main Content !-->
<!--! ================================================================ !-->
@endsection
