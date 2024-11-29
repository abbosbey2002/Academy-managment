@extends('layouts.layout')

@section('content')
<style>
    /* Custom styles for date input */
    input[type="date"] {
        color: white;
        background-color: #495057;
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 0.375rem 0.75rem;
    }

    .input-group-text {
        background-color: #495057;
        border: 1px solid #ced4da;
        color: white;
        border-radius: 0 4px 4px 0;
    }

    .input-group-text:focus-within {
        box-shadow: none;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>

<!-- Start Main Content -->
<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('groups.add_students_group')}} </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">Guruhlar ro'yxati</a></li>
                    <li class="breadcrumb-item active">Talabalar qo'shish</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Orqaga</span>
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

        <!-- Main Content -->
        <div class="main-content">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Talabalarni tanlang</h5>
                                <hr>
                                <form action="{{ route('studentStore') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="studentsSelect" class="form-label">Tanlangan talabalar</label>
                                        <select class="form-select" id="studentsSelect" name="students[]" multiple required style="width: 100%;">
                                            @foreach($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Ro'yhatdan o'tish sanasi</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </span>
                                            <input type="date" id="date" name="date" class="form-control" required>
                                        </div>
                                    </div>
                                  
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Holati:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }} style="color:black !important;">Faol</option>
                                                <option value="paused" {{ old('status') == 'paused' ? 'selected' : '' }} style="color:black !important;">Test xolatda</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="group_id" value="{{ $group->id }}">

                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary"><i class="feather-plus me-2"></i>Talabalar qo'shish</button>
                                        <a href="{{ route('groups.show', $group->id) }}" class="btn btn-secondary"><i class="feather-arrow-left me-2"></i>Bekor qilish</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</main>

<!-- Initialize Select2 and AJAX Search -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<!-- toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'Error', {timeOut: 5000});
        @endforeach
    @endif
</script>

<script>
    $(document).ready(function() {
        $('#studentsSelect').select2({
            placeholder: "Talabalar tanlang",
            allowClear: true,
            width: '100%'
        });

        $('#studentInput').on('input', function() {
            var query = $(this).val();
            $.ajax({
                url: '{{ route("students.search") }}',
                method: 'GET',
                data: {
                    query: query
                },
                success: function(data) {
                    $('#studentsSelect').empty();
                    $.each(data, function(key, student) {
                        $('#studentsSelect').append('<option value="' + student.id + '">' + student.first_name + ' ' + student.last_name + '</option>');
                    });
                    $('#studentsSelect').trigger('change');
                }
            });
        });

        $('.select2-container--default .select2-results__option').css('color', 'black');
    });
</script>
<style>
    .toast {
        position:absalute;
        top:70px;
       height: 95px ; /* Toastr notifikatsiyalarining minimal balandligini belgilang */
       width:200px;
        font-size: 12px; /* Matn hajmini oshiring */
        padding: 5px; /* Ichki bo'shliqni oshiring */
        border-radius: 8px; /* Toastr notifikatsiyalariga yumaloq burchaklar qo'shing */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Toastr notifikatsiyalariga soyalar qo'shing */
    }
    .toast-title {
        font-weight: bold; /* Sarlavhani qalin qilib belgilang */
    }
</style>
@endsection
