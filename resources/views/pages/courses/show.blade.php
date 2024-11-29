@extends('layouts.layout')

@section('content')
<!-- Start Main Content -->
<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('messages.courses.courses')}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('messages.general.home')}}</a></li>
                    <li class="breadcrumb-item">{{ __('courses.view_course')}}</li>
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
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="{{route('courses.edit', $course->id)}}" class="btn btn-primary ">
                            <span><i class="fa-solid fa-pen-to-square me-2"></i>  {{ __('courses.edit')}}</span>
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
        <!-- End Page Header -->
        <!-- Main Content -->
        
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <h2>{{ __('messages.courses.information')}}</h2>
                            <form>
                                <div class="my-2">
                                    <label for="course_name" class="form-label">{{ __('messages.courses.name')}}</label>
                                    <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" disabled>
                                </div>
                                <div class="my-2">
                                    <label for="duration" class="form-label">{{ __('courses.duration')}}  (  {{ __('messages.general.month')}}  ) </label>
                                    <input type="number" class="form-control" id="duration" name="duration" value="{{ $course->duration }}" disabled>
                                </div>
                                <div class="my-2">
                                    <label for="cost" class="form-label">{{ __('courses.price')}} ( {{ __('messages.general.sum')}}  )</label>
                                    <input type="text" class="form-control" id="cost" name="cost" value="{{ number_format($course->cost, 2, '.', ',') }} so'm" disabled>
                                </div>
                                <div class="my-2 col-sm-12 col-lg-2">
                                    <a href="{{ route('courses.index')}}" type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-left me-2"></i> {{ __('messages.general.back')}}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
    <!-- Footer -->

    <!-- End Footer -->
    <x-footer></x-footer>
</main>
<!-- End Main Content -->
@endsection
