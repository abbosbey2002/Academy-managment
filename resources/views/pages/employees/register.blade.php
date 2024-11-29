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
                    <h5 class="m-b-10">Xodim</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/employee/index">Home</a></li>
                    <li class="breadcrumb-item">Xodim yaratish</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                            <i class="feather-layers me-2"></i>
                            <span>Xodim yaratish</span>
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
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Xodim ma'lumotlarini kiriting:</span>
                                            </h5>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">Ism: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="first_name" class="form-control" id="fullnameInput" placeholder="Ism" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">Familiya: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="last_name" class="form-control" id="fullnameInput" placeholder="Familiya" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="birth_date" class="fw-semibold">Tug'ulgan kuni: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                                    <input type="date" name="birth_date" class="form-control" id="birth_date" placeholder="" required>
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
                                                    <input type="text" name="pinfl" class="form-control" id="pinfl" placeholder="JSHSHIR" required>
                                                    @error('pinfl')
                                                        <label for="pinfl" class="text-danger">JSHSHIR 14 tadan kam bo'lmasin</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="phone_number" class="fw-semibold">Telefon: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="97 778 99 64" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="branch_id" class="fw-semibold">{{ __('students.select_branch') }}:</label>
                                            </div>
                                            <div class="col-lg-8 d-flex align-items-center">
                                                <select name="branch_id" class="form-control" id="branch-select" data-select2-selector="status" 
                                                    onchange="createInformation()">
                                                    @foreach($branches as $branch)
                                                        <option class="text-black" value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                    @endforeach
                                                    <option  class="text-black" value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="role" class="fw-semibold">Lavozimi:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select name="role" class="form-control" id="role" data-select2-selector="status" onchange="statusRole()" required>
                                                    <option value="{{ \App\Helpers\MainHelper::ROLE_TEACHER }}" selected>O'qituvchi</option>
                                                    <option value="{{ \App\Helpers\MainHelper::ROLE_ADMIN }}">Admin</option>
                                                </select>
                                                @error('role')
                                                <label for="role" class="text-danger">Lavozimini to'ldiring</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center" id="specializationBox">
                                            <div class="col-lg-4">
                                                <label for="specialization" class="fw-semibold">Mutaxasisligi: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa-solid fa-bars"></i></div>
                                                    <input type="text" name="specialization" class="form-control" id="specialization" placeholder="SMM">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="address" class="fw-semibold">Manzil: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-6">
                                                        <select class="form-control max-select" id="regionSelect" name="region_id" required>
                                                            <option value="" disabled selected>Viloyat tanlang</option>
                                                            @foreach ($regions as $region)
                                                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-6">
                                                        <select class="form-control max-select" id="districtSelect" name="district_id" required>
                                                            <option value="" disabled selected>Tuman tanlang</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="email" class="fw-semibold">Email: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="info@mail.com" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="password" class="fw-semibold">Parol: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-6">
                                                        <input type="password" name="password" class="form-control" placeholder="Parolni kiriting" required>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-6">
                                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Parolni tasdiqlang" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-switch form-switch-sm mb-3 d-flex justify-content-end px-3">
                                <button class="btn btn-primary " type="submit"><i class="feather-layers me-2"></i> Saqlash </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->

    </div>
    <!-- Modal for Creating New Branch -->
        <div class="modal fade" id="createBranchModal" tabindex="-1" aria-labelledby="createBranchModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action={{route('student.branch.store')}} method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="createBranchModalLabel">{{ __('students.create_branch') }}</h5>
                            <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!-- Branch Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="branch_name" class="form-label">{{ __('students.branch_name') }}</label>
                                    <input type="text" class="form-control" id="branch_name" name="name" required>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6 mb-3">
                                    <label for="branch_phone" class="form-label">{{ __('students.phone') }}</label>
                                    <input type="text" class="form-control" id="branch_phone" name="phone" required>
                                </div>

                                <!-- Date -->
                                <div class="col-md-6 mb-3">
                                    <label for="branch_date" class="form-label">{{ __('students.date') }}</label>
                                    <input type="date" class="form-control" id="branch_date" name="date" required>
                                </div>

                                <!-- Region and District -->
                                
                                <div class="row mb-4 align-items-center">
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <select class="form-control max-select region-select" data-target="#districtSelect_2" name="region_id">
                                                    <option value="" disabled selected> {{ __('students.select_region')}} </option>
                                                    @foreach ($regions as $region)
                                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <select class="form-control max-select district-select" id="districtSelect_2" name="district_id">
                                                    <option value="" disabled selected>{{ __('students.select_district')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6 mb-3">
                                    <label for="statusSelect" class="form-label">{{ __('branch.status') }}</label>
                                    <select class="form-select" id="statusSelect" name="status" required>
                                        <option value="Active">{{ __('messages.general.active') }}</option>
                                        <option value="Inactive">{{ __('branch.inactive') }}</option>
                                        <option value="Declined">{{ __('branch.declined') }}</option>
                                    </select>
                                </div>

                                <!-- Coordinates -->
                                <div class="col-md-6 mb-3">
                                    <label for="coordinate" class="form-label">{{ __('branch.enter_coordinate') }}</label>
                                    <input type="text" class="form-control" id="coordinate" name="coordinate">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="modal-close-btn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('students.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('students.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</main>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<!-- Include jQuery -->
<script>
   function closeModal() {
        document.getElementById('createBranchModal').style.display = 'none';
    }



    document.addEventListener('DOMContentLoaded', function() {
        // Show the modal when 'other' is selected
        function handleBranchSelectChange() {
            const selectElement = document.getElementById('branch-select');
            const selectedValue = selectElement.value;
             function closeSelect() {
                    branchSelect.blur(); // Close the select dropdown
            }
            if (selectedValue === 'other') {
                 closeSelect();
                const createBranchModal = new bootstrap.Modal(document.getElementById('createBranchModal'));
                createBranchModal.show();

                // Optionally clear the selection
                selectElement.value = ''; // Clear the selection or set to a default value
            }
        }
        document.getElementById('btn-close').addEventListener('click', closeModal);
        document.getElementById('modal-close-btn').addEventListener('click', closeModal);
        // Attach the function to the onchange event
        document.getElementById('branch-select').addEventListener('change', handleBranchSelectChange);
    });
</script>
<!-- Your Custom Script -->
<script>
    const branchSelec = document.getElementById('branch-select');
    // Modal
    const createBranchModalElement = document.getElementById('createBranchModal');
    
    function createInformation() {
        
        if(branchSelec.value == 'other'){
            createBranchModalElement.classList.add('show');
            createBranchModalElement.style.display = "block";
            document.querySelector('.nxl-menu-overlay').style.display = "block";
        }
    }
    function CloseCreateBranchModalElement () {
        createBranchModalElement.classList.remove('show');
        createBranchModalElement.style.display = "none";
        
    }

    $(document).ready(function() {
        // Initialize Select2 for the branch select
        $('#branch-select').select2({
            theme: 'bootstrap-5',
            placeholder: 'Select a branch...',
            allowClear: true
        });

        /* // Handle select change event
        $('#branch-select').on('change', function () {
            if ($(this).val() === 'other') {
                document.getElementById('createBranchModal').style.display = "block";
                
                
                const createBranchModal = new bootstrap.Modal(createBranchModalElement);
                createBranchModal.show();
            }
        }); */

        // Handle branch form submission
        $('#create-branch-form').on('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('{{ route('branch.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Add new branch to the select dropdown
                    const newOption = $('<option>').val(data.branch.id).text(data.branch.name);
                    $('#branch-select').append(newOption).val(data.branch.id).trigger('change');
                    const createBranchModal = bootstrap.Modal.getInstance(document.getElementById('createBranchModal'));
                    createBranchModal.hide();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>

<script>
$(document).ready(function() {
    // Initialize Select2 for all selects
    $('.max-select').select2({
        theme: 'bootstrap-5',
        placeholder: 'Tanlang...',
        allowClear: true
    });

    // Handle region change event for all region selects
    $('.region-select').on('change', function() {
        var regionId = $(this).val();
        var targetSelector = $(this).data('target');
        
        if (regionId) {
            $.ajax({
                url: '{{ url("/get-districts/") }}/' + regionId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $(targetSelector).empty().append('<option value="" disabled selected>{{ __('students.select_district')}}</option>');
                    $.each(data, function(key, district) {
                        $(targetSelector).append('<option value="'+ district.id +'">'+ district.name +'</option>');
                    });
                }
            });
        } else {
            $(targetSelector).empty().append('<option value="" disabled selected>{{ __('students.select_district')}}</option>');
        }
    });
});
</script>

<!-- Custom Script -->
<script>
    function statusRole() {
        if (document.getElementById('role').value == {{ \App\Helpers\MainHelper::ROLE_ADMIN }}) {
            document.getElementById('specializationBox').style.display = "none";
        } else {
            document.getElementById('specializationBox').style.display = "flex";
        }
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var phoneInput = document.getElementById('phone_number');

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
                        $('#districtSelect').empty().append('<option value="" disabled selected>Tuman tanlang</option>');
                        $.each(data, function(key, district) {
                            $('#districtSelect').append('<option value="'+ district.id +'">'+ district.name +'</option>');
                        });
                    }
                });
            } else {
                $('#districtSelect').empty().append('<option value="" disabled selected>Tuman tanlang</option>');
            }
        });
    });

    // PINFL validation
    $('#pinfl').on('input', function() {
        var pinfl = $(this).val();

        // PINFL should not be more than 14 characters
        if (pinfl.length > 14) {
            pinfl = pinfl.substring(0, 14);
            $(this).val(pinfl);
        }

        // Change input color based on PINFL length
        if (pinfl.length < 14) {
            $(this).css('border-color', 'red');
        } else {
            $(this).css('border-color', 'green');
        }
    });

    // Form submission validation
    // $('form').on('submit', function(e) {
    //     var pinfl = $('#pinfl').val();

    //     // Prevent form submission if PINFL is less than 14 characters
    //     if (pinfl.length < 14) {
    //         e.preventDefault();
    //         alert('PINFL 14 tadan kam bo`lishi mumkin emas');
    //         $('#pinfl').focus();
    //         return false;
    //     }
    // });
</script>

<script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/js/common-init.min.js') }}"></script>
<script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
@endsection
