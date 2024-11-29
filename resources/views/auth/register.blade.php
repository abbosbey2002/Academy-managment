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
                            <img src="assets/images/logo-abbr.png" alt="" class="img-fluid">
                        </div>
                        <div class="creative-card-body card-body p-sm-5">
                            <h2 class="fs-20 fw-bolder mb-4">Ro'yxatdan o'tish</h2>
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
                            <form action="/student/register" method="post" class="w-100 mt-4 pt-2">
                                @csrf
                                <div class="mb-4">
                                    <input type="text" class="form-control" placeholder="Ism" name="first_name" required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control" placeholder="Familiya" name="last_name" required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control" placeholder="Telefon" name="phone" required>
                                </div>
                                <div class="mb-4">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Parol" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Parolni tasdiqlang" name="password_confirmation" required>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-lg btn-primary w-100">Ro'yxatdan o'tish</button>
                                </div>
                            </form>
                            <div class="w-100 mt-5 text-center mx-auto">
                                <div class="mb-4 border-bottom position-relative"><span class="small py-1 px-3 text-uppercase text-muted bg-white position-absolute translate-middle">yoki</span></div>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <a href="javascript:void(0);" class="btn btn-light-brand flex-fill" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Facebook bilan ro'yxatdan o'tish">
                                        <i class="feather-facebook"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-light-brand flex-fill" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Twitter bilan ro'yxatdan o'tish">
                                        <i class="feather-twitter"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-light-brand flex-fill" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Github bilan ro'yxatdan o'tish">
                                        <i class="feather-github text"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-5 text-muted">
                                <span> Akkauntingiz bormi?</span>
                                <a href="{{ route('login') }}" class="fw-bold">Kirish</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 bg-primary order-0 order-lg-1">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="assets/images/auth/auth-user.png" alt="" class="img-fluid">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var phoneInput = document.getElementById('phone');

    phoneInput.addEventListener('input', function(e) {
        var value = phoneInput.value;
        
        // Faqat raqamlarni saqlaymiz
        value = value.replace(/\D/g, '');

        // Maksimal uzunlik 9 ta raqam
        if (value.length > 9) {
            value = value.slice(0, 9);
        }

        // Formatlash
        var formattedValue = '';
        if (value.length > 2) {
            formattedValue += value.slice(0, 2) + ' ';
            value = value.slice(2);
        }
        if (value.length > 3) {
            formattedValue += value.slice(0, 3) + ' ';
            value = value.slice(3);
        }
        formattedValue += value;

        phoneInput.value = formattedValue;
    });
});
</script>

@endsection
