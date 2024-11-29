@extends('layouts.layout')

@section('content')
    <!-- Main Content -->
    <main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <!-- Breadcrumb -->
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{ __('branch.branches') }}</h5>
                    </div>
                    <ul class="breadcrumb"> 
                        <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('branch.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="/admin/branch">{{ __('messages.branch.list') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('branch.add_new_branch') }}</a></li>
                    </ul>
                </div>
                <!-- Page Header Right -->
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>{{ __('branch.back') }}</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-plus me-2"></i>
                                <span>{{ __('branch.add_new_branch') }}</span>
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
                                        <a href="#" class="nav-link text-start">{{ __('branch.data_new_branch') }} :</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <!-- Profile Tab -->
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                    
                                        <form action="{{ route('branch.store') }}" method="POST">
                                            @csrf
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="fullnameInput" class="fw-semibold">{{ __('branch.enter_branch_name') }} :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-user"></i></div>
                                                        <input type="text" class="form-control" id="fullnameInput" placeholder="{{ __('branch.enter_branch_name') }}" name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="phoneInput" class="fw-semibold">{{ __('branch.enter_phonenumber') }} :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-phone"></i></div>
                                                        <input type="text" class="form-control" id="phoneInput" placeholder="{{ __('branch.enter_phonenumber') }}" name="phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="dateInput" class="fw-semibold">{{ __('branch.enter_opening_date')}} :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                        <input type="date" class="form-control" id="dateInput" placeholder="{{ __('branch.enter_opening_date')}}" name="date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="regionSelect" class="fw-semibold">{{ __('branch.enter_address')}} :</label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <select class="form-control max-select" id="regionSelect" name="region_id" placeholder="Viloyatni tanlang">
                                                        <option class="selected" disabled selected>{{ __('branch.enter_region')}}</option>
                                                        @foreach ($regions as $region)
                                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-4" id="districtSelectBox" style="display: none;">
                                                    <select class="form-control max-select" id="districtSelect" name="district_id">
                                                        <option value="" disabled selected> {{ __('branch.enter_district')}} </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label class="fw-semibold">{{ __('branch.status')}} :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select name="status" class="form-control" data-select2-selector="status">
                                                        <option value="Active" >{{ __('messages.general.active')}}</option>
                                                        <option value="Inactive">Inactive</option>
                                                        <option value="Declined" >Declined</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="coordinate" class="fw-semibold">{{ __('branch.enter_coordinate')}} :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="fa-solid fa-location-dot"></i></div>
                                                        <input type="text" class="form-control" id="coordinate" placeholder="76VM+8V Ташкент, Узбекистан" name="coordinate">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary"> {{ __('branch.save')}} </button>
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Custom Script -->
    <script>
      const today = new Date();
        // Sanani formatlash (YYYY-MM-DD formatida)
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;

        // Input elementiga sanani yozish
        document.getElementById('dateInput').value = formattedDate;

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
                            $('#districtSelect').empty().append('<option value="" disabled selected>Tumanni tanlang</option>');
                            $.each(data, function(key, district) {
                                $('#districtSelect').append('<option value="'+ district.id +'">'+ district.name +'</option>');
                            });
                        }
                    });
                    document.getElementById('districtSelectBox').style.display = 'block';
                } else {
                    $('#districtSelect').empty().append('<option value="" disabled selected>Select a district</option>');
                    document.getElementById('districtSelectBox').style.display = 'none';
                }
            });
        });
    </script>
@endsection
