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
                    <h5 class="m-b-10">{{ __('messages.students.students')}} </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}} </a></li>
                    <li class="breadcrumb-item"><a href="/admin/user/students">{{ __('messages.students.list')}} </a></li>
                    <li class="breadcrumb-item">{{ $student->first_name }}</li>
                    
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
                        <a href="javascript:void(0);" class="btn btn-light-brand successAlertMessage">
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
                        <form action="{{ route('students.update', $student->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">{{ __('students.enter_student_inf')}} :</span>
                                            </h5>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="regionSelect" class="fw-semibold">{{ __('messages.branch.branch')}} :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                
                                                    <select class="form-control max-select text-dark" id="branch_id" name="branch_id">
                                                        @foreach($branches as $branch)
                                                                <option value="{{ $branch->id }}" class="text-dark" style="color: black !important;" {{ $student->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">{{ __('messages.general.name')}} : </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="first_name" class="form-control" id="fullnameInput" value="{{ $student->first_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">{{ __('messages.general.last_name')}}: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="last_name" class="form-control" id="fullnameInput" value="{{ $student->last_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">{{ __('students.fathers_name')}} : </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="middle_name" class="form-control" id="fullnameInput" value="{{ $student->middle_name }}" placeholder="Otasining ismi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="brith_date" class="fw-semibold">{{ __('students.birth')}} : </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                                    <input type="date" name="brith_date" class="form-control" id="brith_date" value="{{ $student->brith_date }}">
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
                                                    <input type="text" name="pinfl" class="form-control" id="" value="{{ $student->pinfl }}">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="phoneInput" class="fw-semibold">{{ __('messages.general.phone')}}: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-phone"></i></div>
                                                        <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $student->phone }}">
                                                    </div>
                                                </div>
                                            </div>







                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="gender" class="fw-semibold">{{ __('students.type')}} : </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="gender" class="form-control" data-select2-selector="status">
                                                    <option value="Erkak" data-bg="bg-success" selected>{{ __('students.male')}}</option>
                                                    <option value="Ayol" data-bg="bg-danger">{{ __('students.female')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="gender" class="fw-semibold">{{ __('students.privilege')}}:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="privilege" class="form-control" data-select2-selector="status">
                                                    <option value="imtiyozli" data-bg="bg-success" {{ old('privilege', $student->privilege) == 'imtiyozli' ? 'selected' : '' }}>{{ __('students.preferential')}}</option>
                                                    <option value="imtiyozsiz" data-bg="bg-danger" {{ old('privilege', $student->privilege) == 'imtiyozsiz' ? 'selected' : '' }}>{{ __('students.without_privilege')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
            <div class="col-lg-4">
                <label for="addressInput_2" class="fw-semibold">{{ __('messages.general.address')}} :</label>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <select class="form-control max-select" id="regionSelect" name="region_id" required>
                            <option value="" disabled {{ is_null(old('region_id', $student->region_id)) ? 'selected' : '' }}>{{ __('students.select_region')}}</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}" {{ old('region_id', $student->region_id) == $region->id ? 'selected' : '' }}>
                                    {{ $region->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <select class="form-control max-select" id="districtSelect" name="district_id" required>
                            <option value="" disabled {{ is_null(old('district_id', $student->district_id)) ? 'selected' : '' }}>{{ __('students.select_district')}}</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}" {{ old('district_id', $student->district_id) == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>                                     
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4">
                                    <label for="status" class="fw-semibold">{{ __('groups.status')}} </label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-info"></i></div>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="active" style="color:black !important;" {{ $student->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="graduated" style="color:black !important;" {{ $student->status == 'graduated' ? 'selected' : '' }}>Graduated</option>
                                            <option value="inactive" style="color:black !important;" {{ $student->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            <option value="suspended" style="color:black !important;" {{ $student->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                            <option value="dropped" style="color:black !important;" {{ $student->status == 'dropped' ? 'selected' : '' }}>Dropped</option>
                                            <option value="pending" style="color:black !important;" {{ $student->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        </select>
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
        <!-- [ Main Content ] end -->
    </div>
 <x-footer></x-footer>
</main> 

    <div class="theme-customizer">
        <!-- Theme Customizer content -->
    </div>
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>


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
@endsection
