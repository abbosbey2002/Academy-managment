@extends('layouts.layout')

@section('content')
    <!--! ================================================================ !-->
    <!--! [Bosh] Asosiy Kontent !-->
    <!--! ================================================================ !-->
<main class="nxl-container">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('messages.group.edit_group')}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.group.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="/admin/groups">{{ __('messages.group.list')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('messages.group.edit_group')}}</a></li>
                </ul>
            </div>
            <!-- Page Header Right -->
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>{{ __('messages.group.back')}}</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                            <i class="feather-plus me-2"></i>
                            <span>{{ __('messages.group.edit_group')}}</span>
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
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-top-0">
                        <div class="card-header p-0">
                            <!-- Nav Tabs -->
                            <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="#" class="nav-link text-start">{{ __('groups.edit_group_inf')}} </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <!-- Profile Tab -->
                            <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                <div class="card-body personal-info">
                                    <form action="{{ route('groups.update', $group->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="branch_id" class="fw-semibold">{{ __('messages.filial.name')}} </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-home"></i></div>
                                                    <select class="form-control" id="branch_id" name="branch_id" required>
                                                        @foreach($branches as $branch)
                                                            <option class="text-black" value="{{ $branch->id }}" {{ $branch->id == $group->branch_id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 d-none align-items-center">
                                            <div class="col-lg-4">
                                                <label for="enrollment_id" class="fw-semibold">{{ __('messages.general.register')}}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-list"></i></div>
                                                    <select class="form-control" id="enrollment_id" name="enrollment_id">
                                                        @foreach($enrollments as $enrollment)
                                                            <option class="text-black" value="{{ $enrollment->id }}" {{ $enrollment->id == $group->enrollment_id ? 'selected' : '' }}>{{ $enrollment->user->first_name }} {{ $enrollment->user->last_name }} {{ $enrollment->date }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="course_id" class="fw-semibold">{{ __('messages.group.course_name')}}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-book"></i></div>
                                                    <select class="form-control" id="course_id" name="course_id" required>
                                                        @foreach($courses as $course)
                                                            <option class="text-black" value="{{ $course->id }}" {{ $course->id == $group->course_id ? 'selected' : '' }}>{{ $course->course_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="teacher_id" class="fw-semibold">{{ __('groups.teachers_first_lastname')}}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <select class="form-control text-black" id="teacher_id" name="teacher_id" required>
                                                        @foreach($teachers as $tm)
                                                            <option class="text-black" value="{{ $tm->id }}" {{ $tm->id == $group->teacher_id ? 'selected' : '' }}>{{ $tm->first_name }} {{ $tm->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="room" class="fw-semibold">{{ __('groups.room')}}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                    <input type="text" class="form-control" id="room" name="room" value="{{ $group->room }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center" data-select2-id="select2-data-36-fm0s">
                                            <div class="col-lg-4">
                                                <label for="days_of_week" class="fw-semibold">{{ __('messages.general.days_of_week')}}</label>
                                            </div>
                                             <div class="col-lg-8">
                                                    @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="day_{{ $day }}" name="days_of_week[]" value="{{ $day }}" {{ in_array($day, old('days_of_week', $group->days_of_week)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="day_{{ $day }}">
                                                                {{ ucfirst($day) }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="start_time" class="fw-semibold">{{ __('groups.lesson_start_time')}}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-clock"></i></div>
                                                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $group->start_time }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="end_time" class="fw-semibold">{{ __('groups.lesson_end_time')}}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-clock"></i></div>
                                                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $group->end_time }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="limit" class="fw-semibold">{{ __('groups.group_student_limit')}}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-users"></i></div>
                                                    <input type="number" class="form-control" id="limit" name="limit" value="{{ $group->limit }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="status" class="fw-semibold">{{ __('groups.status')}}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-info"></i></div>
                                                    <select class="form-control" id="status" name="status" required>
                                                        <option value="active" {{ $group->status == 'active' ? 'selected' : '' }} style="color: black;">{{ __('groups.active')}}</option>
                                                        <option value="paused" {{ $group->status == 'paused' ? 'selected' : '' }} style="color: black;">{{ __('groups.suspended')}}</option>
                                                        <option value="completed" {{ $group->status == 'completed' ? 'selected' : '' }} style="color: black;">{{ __('groups.completed')}}</option>
                                                        <option value="recruiting" {{ $group->status == 'recruiting' ? 'selected' : '' }} style="color: black;">{{ __('groups.progress_admission')}}</option>
                                                        <option value="cancelled" {{ $group->status == 'cancelled' ? 'selected' : '' }} style="color: black;">{{ __('groups.canceled')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ __('messages.group.update_group')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
    <!-- Footer -->
    <!-- End Footer -->
    <x-footer></x-footer>
</main>
@endsection
