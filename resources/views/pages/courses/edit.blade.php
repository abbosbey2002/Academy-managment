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
                        <li class="breadcrumb-item">{{ __('messages.courses.edit')}}</li>
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
                                <h2>{{ __('courses.edit_section')}} </h2>
                                <form action="{{ route('courses.update', $course->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="course_name" class="form-label">{{ __('messages.courses.name')}} </label>
                                        <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="duration" class="form-label">{{ __('courses.duration')}} {{ __('messages.general.month')}} </label>
                                        <input type="number" class="form-control" id="duration" name="duration" value="{{ $course->duration }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cost" class="form-label">{{ __('courses.price')}} {{ __('messages.general.sum')}} </label>
                                        <input type="text" class="form-control" id="cost" name="cost" value="{{ $course->cost }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square me-2"></i>{{ __('messages.general.edit')}} </button>
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
