<?php
$branches = \App\Models\Branch::all();
?>

@extends('layouts.layout')
@section('content')


<main class="nxl-container">
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('messages.employee.employees')}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/employee/index">{{ __('messages.general.name')}}</a></li>
                    <li class="breadcrumb-item">{{ __('messages.employee.edit')}}</li>
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
                        <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                            <i class="feather-layers me-2"></i>
                            <span>{{ __('messages.general.save')}}</span>
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
                    <div class="card border-top-0">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">{{ __('messages.employee.enter_emp_inf')}}:</span>
                                            </h5>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">{{ __('messages.general.name')}}:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="first_name" class="form-control" id="fullnameInput" value="{{ $user->first_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">{{ __('messages.general.last_name')}}:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="last_name" class="form-control" id="fullnameInput" placeholder="Familiya" value="{{ $user->last_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="brith_date" class="fw-semibold">{{ __('students.birth')}}: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                                    <input type="date" name="brith_date" value="{{ $user->brith_date}}" class="form-control" id="brith_date" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="pinfl" class="fw-semibold">PINFL: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa-solid fa-passport"></i></div>
                                                    <input type="text" name="pinfl" value="{{ $user->pinfl }}" class="form-control" id="pinfl" placeholder="JSHSHIR">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="phone_number" class="fw-semibold">{{ __('messages.general.phone')}}: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-phone"></i></div>
                                                    <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Telefon" value="{{ $user->phone_number }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="regionSelect" class="fw-semibold">{{ __('messages.branch.branch')}}:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                
                                                    <select class="form-control max-select text-dark" id="branch_id" name="branch_id">
                                                        @foreach($branches as $branch)
                                                                <option value="{{ $branch->id }}" class="text-dark" style="color: black !important;" {{ $user->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="role" class="fw-semibold">{{ __('messages.general.role')}}:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="role" class="form-control" id="role" data-select2-selector="status"onchange="statusRole()">
                                                    <option value="{{ \App\Helpers\MainHelper::ROLE_TEACHER }}" data-bg="bg-success" selected>{{ __('messages.students.teacher')}}</option>
                                                    <option value="{{ \App\Helpers\MainHelper::ROLE_ADMIN }}" data-bg="bg-danger">{{ __('messages.general.admin')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center" id="specializationBox">
                                            <div class="col-lg-4">
                                                <label for="specialization" class="fw-semibold">{{ __('messages.general.role')}}: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa-solid fa-bars"></i></div>
                                                    <input type="text" name="specialization" class="form-control" id="specialization" placeholder="SMM" value="{{ $user->specialization }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="address" class="fw-semibold">{{ __('messages.general.address')}}: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-6">
                                                        <select class="form-control max-select" id="regionSelect" name="region_id">
                                                            <option value="" disabled {{ !$user->region_id ? 'selected' : '' }}>{{ __('students.select_region')}}</option>
                                                            @foreach ($regions as $region)
                                                                <option value="{{ $region->id }}" {{ $region->id == $user->region_id ? 'selected' : '' }}>{{ $region->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-6">
                                                        <select class="form-control max-select" id="districtSelect" name="district_id">
                                                            <option value="" disabled {{ !$user->district_id ? 'selected' : '' }}>{{ __('students.select_district')}}</option>
                                                            @foreach ($districts as $district)
                                                                <option value="{{ $district->id }}" {{ $district->id == $user->district_id ? 'selected' : '' }}>{{ $district->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="address" class="fw-semibold">{{ __('messages.general.password')}}: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-6 position-relative">
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="Parolni kiriting">
                                                        <i class="fa-solid fa-eye" id="togglePassword" onclick="togglePassword('password', 'togglePassword')"></i>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-6 position-relative">
                                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Parolni tasdiqlang">
                                                        <i class="fa-solid fa-eye" id="togglePasswordConfirmation" onclick="togglePassword('password_confirmation', 'togglePasswordConfirmation')"></i>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-switch form-switch-sm mb-3 d-flex justify-content-end px-3">
                                <button class="btn btn-primary " type="submit"><i class="feather-layers me-2"></i> {{ __('messages.general.save')}} </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <style>

        .position-relative {
          position: relative;
        }

        .fa-eye,
        .fa-eye-slash {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        </style>

        <script>

        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }


        </script>
        <!-- [ Main Content ] end -->
    </div>
 <x-footer></x-footer>
</main> 

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Custom Script -->
<script>
    function statusRole() {
        if(document.getElementById('role').value == 0) {
            document.getElementById('specializationBox').style.display = "none";
        }else {
            document.getElementById('specializationBox').style.display = "flex";
        }
    }
</script>
<script>
    const today = new Date();
    
    $(document).ready(function() {
        // Initialize Select2 for region and district selects
        $('.max-select').select2({
            theme: 'bootstrap-5',
            placeholder: 'Tanlang...',
            allowClear: true
        });

        // Handle region change event
        $('#regionSelect').change(function() {
            var regionId = $(this).val();
            if(regionId) {
                $.ajax({
                    url: '{{ url("/get-districts/") }}' + '/' + regionId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#districtSelect').empty().append('<option value="" disabled selected>Select a district</option>');
                        $.each(data, function(key, district) {
                            $('#districtSelect').append('<option value="'+ district.id +'">'+ district.name +'</option>');
                        });
                    }
                });
            } else {
                $('#districtSelect').empty().append('<option value="" disabled selected>Select a district</option>');
            }
        });
    });
</script>

  
    <div class="theme-customizer">
        <!-- Theme Customizer content -->
    </div>
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
@endsection
