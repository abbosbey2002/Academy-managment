@extends('layouts.layout')

@section('content')
<!-- Start Main Content -->
<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('messages.students.students')}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}}</a></li>
                    <li class="breadcrumb-item">{{ __('messages.students.list')}}</li>
                </ul>
            </div>
            <!-- Page Header Right -->
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>{{ __('messages.general.back')}}</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-end gap-2 page-header-right-items-wrapper">
                        

                         <form action="{{ route('students.index') }}" method="GET" class="d-flex  col-md-6 justify-content-end">
                            <div class="position-relative" style="flex-grow: 1;">
                                <input type="search" id="search" name="search" class="form-control form-control-sm aaa" placeholder="..." aria-controls="proposalList" value="{{ $searchTerm ?? '' }}" required>
                                <button type="submit" class="btn btn-sm btn-primary position-absolute top-0 end-0 justify-content-end aaaa" style="height: 100%; padding: 0 20px; width: auto;">Qidirish</button>
                            </div>
                        </form>

                        <!-- Link to Create New User -->
                        <a href="{{ route('students.create') }}" class="btn btn-primary me-2" style="height: 35px !important;">
                                <i class="fa-solid fa-user-plus me-2"></i>
                                    <span>{{ __('messages.students.add_student')}}</span>
                        </a>
                        <style>
                            form .aaa{
                                height: 35px;
                                padding-right: 75px; /* Buttonning kengligini qoplash uchun kerakli padding qo'shing */
                            }

                            form .aaaa {
                                height: 35px; /* Buttonning balandligini inputga moslang */
                                width: 75px; /* Buttonning kengligini sozlang */
                                border-radius: 0; /* Buttonning burchaklarini tekislang */
                                position: absolute; /* Buttonni inputning ichida joylashtirish */
                                right: 0; /* Buttonni inputning o'ng chetiga joylashtirish */
                                top: 0; /* Buttonni inputning yuqori qismiga joylashtirish */
                                padding: 0; /* Buttonning paddingini yo'qotish */
                                margin: 0; /* Buttonning margini yo'qotish */
                            }

                        </style>
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
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="userList">
                                    <thead>
                                        <tr>
                                            
                                            <th>{{ __('messages.students.student')}}</th>
                                            <th>{{ __('messages.general.phone')}}</th>
                                            <th>{{ __('messages.branch.branch')}}</th>
                                            <th>{{ __('students.balance')}}</th>
                                            <th> status </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td><a href="{{ route('students.show', $student->id ?? '#') }}">
                                                @if($student)
                                                    {{ $student->first_name . ' ' . $student->last_name }}
                                                @else
                                                   {{ __('messages.general.not_found')}}
                                                @endif
                                            </a></td>
                                            @php
                                            $formattedPhone = preg_replace('/(\+998)(\d{2})(\d{3})(\d{2})(\d{2})/', '$1 ($2) $3 $4 $5', $student->phone);
                                            @endphp
                                            <td><a href="tel:{{ $student->phone }}">{{ $formattedPhone }}</a></td>
                                             <td>  
                                                 @if ($student && $student->branch)
                                                    <a href="{{ route('branch.show', $student->branch->id) }}"> 
                                                        <span>
                                                            {{ $student->branch->name }}
                                                        </span>
                                                    </a>
                                                @else
                                                    <a> 
                                                        <span>
                                                            {{ __('messages.general.not_found')}}
                                                        </span>
                                                    </a>
                                                @endif
                                             </td>
                                            <td>
                                                @php
                                                    $totalAmount = 0;
                                                @endphp

                                                @if($student && $student->billing)
                                                    @foreach($student->billing as $billing)
                                                        @php
                                                            $totalAmount += $billing->amount;
                                                        @endphp
                                                    @endforeach
                                                @endif

                                                @php
                                                    $amountColor = $totalAmount < 0 ? 'color: red;' : 'color: green;';
                                                @endphp

                                                <span style="{{ $amountColor }}">
                                                    {{ number_format($totalAmount, 0, ',', ' ') }} UZS
                                                </span>
                                            </td>
                                            <td> {{ $student->status }}</td>

                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="{{ route('students.show', $student->id ?? '#') }}" class="avatar-text avatar-md">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('students.edit', $student->id ?? 'ID') }}">
                                                                    <i class="feather feather-edit-3 me-3"></i>
                                                                    <span>{{ __('messages.general.edit')}}</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item printBTN" href="javascript:void(0)"
                                                                onclick="openModal({{ $student->id ?? 'null' }}, {{ $student->group_id }})">
                                                                    <i class="fa-solid fa-dollar-sign me-3"></i>
                                                                    <span>{{ __('students.top_up_balance')}} </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="feather feather-clock me-3"></i>
                                                                    <span>{{ __('students.remind')}}</span>
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <form class="dropdown-item" action="{{ route('students.delete_status' ?? '#') }}" method="POST" onsubmit="confirmDelete(event)">
                                                                    @csrf
                                                                   <input type="hidden" name="student_id" value="{{ $student->id }}"/>
                                                                    <button type="submit" style="background: none; border: none; padding: 0;">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        {{ __('messages.general.delete')}}
                                                                    </button>
                                                                </form>                                                                
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                @if ($students->hasPages())
                                    <div class="d-flex justify-content-start mt-4">
                                        {{ $students->appends(['search' => $searchTerm])->links() }}
                                    </div>
                                @endif

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div id="billingModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h5 class="text-center">{{ __('students.entry_payment')}} </h5>
        <form id="billingForm" action="{{ route('update.billing') }}" method="POST" onsubmit="formatAmount()">
            @csrf
            <input type="hidden" name="student_id" id="student_id">
            <input type="hidden" class="form-control" id="account" name="account" required value="111">
            <div class="mb-3">
                <label for="paymentType" class="form-label">{{ __('students.payment_type')}} </label>
                <select class="form-control" id="paymentType" name="payment_type" onchange="togglePaymentType()" required>
                    <option value="" class="text-black">{{ __('messages.general.choose')}} </option>
                    <option value="cash" class="text-black">{{ __('students.cash')}} </option>
                    <option value="payme" class="text-black">{{ __('students.payme')}} </option>
                </select>
            </div>
            <div class="mb-3" style="border:none;">
                <label for="" class="form-label">date</label>
                @php
                    use Carbon\Carbon;
                @endphp

                <input type="date" class="form-control" name="create_time" value="{{ Carbon::now()->format('Y-m-d') }}">
            </div>
            <div class="mb-3" id="cashAmountDiv" style="display: none;">
                <label for="amount" class="form-label">{{ __('students.amount')}} </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="amount" name="amount" oninput="formatAmount()">
                    <div class="input-group-append">
                        <span class="input-group-text h-100">UZS</span>
                    </div>
                </div>
            </div>
            
            <div class="mb-3" id="paymeDiv" style="display: none;">
                <label class="form-label">{{ __('students.payment_by_Payme')}} </label>
                <p>{{ __('students.paid_by_Payme')}} </p>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('messages.general.save')}}</button>
        </form>
    </div>
</div>
        <!-- End Main Content -->
    </div>
    <x-footer></x-footer>
</main>

<style>
    /* Modal background */
    .modal {
        display: none;
        position: fixed;
        z-index: 1050; /* Bootstrap's z-index for modals */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Modal content */
    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
        width: 50%; /* Adjust the width as needed */
        max-width: 600px; /* Max width for large screens */
        position: relative; /* Position relative for close button */
    }

    /* Close button */
    .close {
        position: absolute;
        top: 10px;
        right: 15px;
        color: #aaa;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
    }

    /* Form styling */
    .form-control {
        border-radius: 4px; /* Rounded corners for inputs */
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1); /* Subtle inner shadow */
    }

    .input-group-text {
        background-color: #f1f1f1;
        border: 1px solid #ddd;
    }

    /* Pagination styling */
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a,
    .pagination span {
        color: #fff; /* Black text color */
        text-decoration: none;
        background-color: #3454d1; /* Light background for contrast */
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination a:hover {
        background-color: #3454d1; /* Bootstrap primary color */
        color: #fff; /* White text color on hover */
    }

    .pagination .active span {
        background-color: #3454d1; /* Bootstrap primary color for active page */
        color: #fff; /* White text color for active page */
    }

    .page-item.disabled .page-link {
        color: #fff;
        pointer-events: none;
        background-color: #3454d1;
        border-color: #ddd;
    }


</style>

<script>
    function openModal(userId, groupId) {
        document.getElementById("billingModal").style.display = "block";
        document.getElementById("student_id").value = userId;
    }

    function closeModal() {
        document.getElementById("billingModal").style.display = "none";
    }

    window.onclick = function(event) {
        var modal = document.getElementById("billingModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function togglePaymentType() {
        var paymentType = document.getElementById('paymentType').value;
        var cashAmountDiv = document.getElementById('cashAmountDiv');
        var paymeDiv = document.getElementById('paymeDiv');

        if (paymentType === 'cash') {
            cashAmountDiv.style.display = 'block';
            paymeDiv.style.display = 'none';
            document.getElementById('amount').required = true;
        } else if (paymentType === 'payme') {
            cashAmountDiv.style.display = 'none';
            paymeDiv.style.display = 'block';
            document.getElementById('amount').required = false;
        } else {
            cashAmountDiv.style.display = 'none';
            paymeDiv.style.display = 'none';
            document.getElementById('amount').required = false;
        }
    }

   function formatAmount() {
    var amountInput = document.getElementById("amount");
    var amountValue = amountInput.value;

    // Faqat raqamlarni saqlash
    amountValue = amountValue.replace(/[^0-9]/g, '');

    if (amountValue) {
        // Raqamlarni 3 xonada ajratish uchun
        amountValue = new Intl.NumberFormat('uz-UZ').format(amountValue);
    }

    amountInput.value = amountValue;
    }

        document.getElementById("billingForm").addEventListener("submit", function(event) {
            var amountInput = document.getElementById("amount");
            var amountValue = amountInput.value;

            // Formatni olib tashlash va faqat raqamlarni saqlash
            amountValue = amountValue.replace(/[^0-9]/g, '');
            amountInput.value = amountValue;
        });
</script>




@endsection
