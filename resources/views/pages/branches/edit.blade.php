@extends('layouts.layout')

@section('content')

<!-- Main Content -->
<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10"> {{ __('branch.branches')}} </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="/admin/branch">{{ __('messages.branch.list')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ __('branch.edit_branch')}}</a></li>
                    <li class="breadcrumb-item">{{ $branch->name }}</li>
                </ul>
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
                                    <a href="#" class="nav-link text-start"> {{ __('branch.enter_new_branch_details')}} </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Profile Tab -->
                            <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                <div class="card-body personal-info">
                                    
                                    <form action="{{ route('branch.update', $branch->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold"> {{ __('branch.enter_branch_name')}} :</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" class="form-control" value="{{ $branch->name }}" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="phoneInput" class="fw-semibold"> {{ __('branch.enter_phonenumber')}} :</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-phone"></i></div>
                                                    <input type="text" class="form-control" value="{{ old('phone', $branch->phone) }}" name="phone" mask>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="phoneInput" class="fw-semibold"> {{ __('branch.enter_opening_date')}} :</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <input type="date" class="form-control" value="{{ $branch->date }}" name="date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="regionSelect" class="fw-semibold"> {{ __('branch.enter_region')}} :</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="region_id" class="form-control max-select" id="regionSelect">
                                                    <option value="{{ $branch->region_id }}" selected>{{ $branch->region->name }}</option>
                                                    @foreach ($regions as $region)
                                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="districtSelect" class="fw-semibold"> {{ __('branch.enter_district')}} :</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="district_id" class="form-control max-select" id="districtSelect">
                                                    <option value="{{ $branch->district_id }}" selected>{{ $branch->district->name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold"> {{ __('branch.status')}} :</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="status" class="form-control" data-select2-selector="status">
                                                    <option value="Active" {{ $branch->status == 'Active' ? 'selected' : '' }}><p style="background-color: red !important;"> </p>{{ __('messages.general.active')}}</option>
                                                    <option value="Inactive" {{ $branch->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                                    <option value="Declined" {{ $branch->status == 'Declined' ? 'selected' : '' }}>Declined</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="coordinate" class="fw-semibold"> {{ __('branch.enter_coordinate')}} :</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa-solid fa-location-dot"></i></div>
                                                    <input type="text" class="form-control" id="coordinate" placeholder="76VM+8V Ташкент, Узбекистан" name="coordinate">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">{{ __('branch.save')}}</button>
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
<!-- End Main Content -->

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2 for regions
        $('#regionSelect').select2({
            theme: 'bootstrap-5',
            placeholder: 'Viloyatni tanlang',
            allowClear: true
        });

        // On change event for regions select
        $('#regionSelect').on('change', function() {
            var regionId = $(this).val();
            if (regionId) {
                // AJAX request to fetch districts based on selected region ID
                $.ajax({
                    url: '/api/districts/' + regionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#districtSelect').empty();
                        $('#districtSelect').append('<option value="" disabled selected>Tuman tanlang</option>');
                        $.each(data, function(key, value) {
                            $('#districtSelect').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching districts:', error);
                    }
                });
            } else {
                $('#districtSelect').empty();
                $('#districtSelect').append('<option value="" disabled selected>Tuman tanlang</option>');
            }
        });

        // Initialize Select2 for districts
        $('#districtSelect').select2({
            theme: 'bootstrap-5',
            placeholder: 'Tuman tanlang',
            allowClear: true
        });
    });
</script>

@endsection