    @extends('layouts.layout')
    @section('content')
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{ __('messages.courses.courses')}}</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}}</a></li>
                        <li class="breadcrumb-item">{{ __('messages.courses.add_course')}}</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>{{ __('messages.general.back')}}</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->

            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <h2>{{ __('messages.courses.add_course')}}</h2>
                                <form action="{{ route('courses.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="course_name" class="form-label">{{ __('messages.courses.courses')}}</label>
                                        <input type="text" class="form-control" id="course_name" name="course_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="duration" class="form-label">{{ __('courses.duration')}}</label>
                                        <input type="number" class="form-control" id="duration" name="duration" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cost" class="form-label">{{ __('courses.price')}}</label>
                                        <input type="text" class="form-control" id="cost" name="cost" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square me-2"></i>{{ __('messages.general.save')}} </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->

        </div>
        <!-- [ Footer ] start -->

        <!-- [ Footer ] end -->
        <x-footer></x-footer>
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.max-select').select2({
                theme: 'bootstrap-5',  // Select2-ni Bootstrap bilan birga ishlatish
                placeholder: 'Yo\'nalishlarni tanlang',
                allowClear: true
            });
        });
    </script>

 <script>
    document.addEventListener('DOMContentLoaded', function() {
        const costInput = document.getElementById('cost');
        
        costInput.addEventListener('input', function() {
            let value = costInput.value.replace(/\D/g, '');
            value = parseFloat(value);
            
            if (isNaN(value)) {
                costInput.value = '';
            } else {
                costInput.value = new Intl.NumberFormat('uz-UZ', { 
                    style: 'currency', 
                    currency: 'UZS',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(value);
            }
        });

        costInput.addEventListener('focus', function() {
            let value = costInput.value.replace(/\D/g, '');
            costInput.value = value;
        });

        costInput.addEventListener('blur', function() {
            let value = costInput.value.replace(/\D/g, '');
            value = parseFloat(value);
            
            if (!isNaN(value)) {
                costInput.value = new Intl.NumberFormat('uz-UZ', { 
                    style: 'currency', 
                    currency: 'UZS',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(value);
            }
        });
    });
    </script>

    @endsection
