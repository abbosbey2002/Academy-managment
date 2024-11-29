<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">

    <style>
    /* Style for Select2 dropdown */
    .select2-container--default .select2-selection--multiple {
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 4px;
        color: black !important; /* Text color */
        min-height: 38px; /* Adjust height as needed */
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
        border-color: #007bff;
        color: black !important; /* Text color */
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: black !important; /* Text color */
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        color: black !important; /* Text color */
    }

    /* Ensure text color inside Select2 dropdown */
    .select2-container--default .select2-results__option {
        color: black !important; /* Text color */
    }
</style>

    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>DORA Academy</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/academy_favicon.png') }}">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/dataTables.bs5.min.css') }}">

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2.min.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2-theme.min.css') }}">

    <!-- For employees CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/jquery.steps.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/quill.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/datepicker.min.css') }}">
    <!--! END: Vendors CSS-->

    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css') }}">
    <!-- Add in your <head> section -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.5/lottie.min.js"></script>


<!-- Add before the closing </body> tag -->

    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
        <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!--! ================================================================ !-->
    <!--! [Start] Navigation Manu !-->
    <!--! ================================================================ !-->
    <x-student-sidebar></x-student-sidebar>
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->
    <!--! ================================================================ !-->

    <!--! ================================================================ !-->
    <!--! [Start] Header !-->
    <!--! ================================================================ !-->
    <x-student-header></x-student-header>
    <!--! ================================================================ !-->
    <!--! [End] Header !-->
    <!--! ================================================================ !-->
    
        @yield('content')

    <!--! ================================================================ !-->
    <!--! [Start] Language Select !-->
    <!--! ================================================================ !-->
    <div class="modal fade-scale" id="languageSelectModal" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="languageSelectModalLabel">Select Language</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-md-4 col-lg-3 language_select">
                            <a href="javascript:void(0);" class="d-flex align-items-center gap-2">
                                <div class="avatar-image avatar-sm"><img src="assets/vendors/img/flags/1x1/sa.svg" alt="" class="img-fluid"></div>
                                <span>Arabic </span>
                            </a>
                        </div>

                        <div class="col-6 col-md-4 col-lg-3 language_select active">
                            <a href="javascript:void(0);" class="d-flex align-items-center gap-2">
                                <div class="avatar-image avatar-sm"><img src="assets/vendors/img/flags/1x1/us.svg" alt="" class="img-fluid"></div>
                                <span>English </span>
                            </a>
                        </div>

                        <div class="col-6 col-md-4 col-lg-3 language_select">
                            <a href="javascript:void(0);" class="d-flex align-items-center gap-2">
                                <div class="avatar-image avatar-sm"><img src="assets/vendors/img/flags/1x1/ru.svg" alt="" class="img-fluid"></div>
                                <span>Russian </span>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--! ================================================================ !-->
    <!--! [End] Language Select !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--! BEGIN: Vendors JS !-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{ asset('assets/vendors/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/select2-active.min.js') }}"></script>
    <!-- For employees JS-->
    <script src="{{ asset('assets/vendors/js/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/datepicker.min.js') }}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/reports-leads-init.min.js') }}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('assets/js/payment-init.min.js') }}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!--! END: Theme Customizer !-->
</body>

</html>
