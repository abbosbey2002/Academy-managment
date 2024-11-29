@extends('layouts.layout')
@section('content')
<style>

 .pagination .page-link {
        background-color: #0f172a;
        /* Black background */
        color: #fff;
        /* White text */
        border-color: #000;
        /* Black border */
    }

    .pagination .page-link:hover {
        background-color: #555;
        /* Darker shade on hover */
        color: #fff;
        /* White text on hover */
        border-color: #000;
        /* Black border on hover */
    }

    .pagination .page-item.active .page-link {
        background-color: #000;
        /* Darker shade for active page */
        border-color: #000;
        /* Black border for active page */
    }
</style>
<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Transaction</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}} </a></li>
                    <li class="breadcrumb-item">Transaction</li>
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
                        <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            <i class="feather-bar-chart"></i>
                        </a>
                        <div class="dropdown">
                            <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                <i class="feather-filter"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-eye me-3"></i>
                                    <span>{{ __('messages.general.all')}}</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-send me-3"></i>
                                    <span>Sent</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-book-open me-3"></i>
                                    <span>Open</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-archive me-3"></i>
                                    <span>Draft</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-bell me-3"></i>
                                    <span>Revised</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-shield-off me-3"></i>
                                    <span>Declined</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-check me-3"></i>
                                    <span>Accepted</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-briefcase me-3"></i>
                                    <span>Leads</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-wifi-off me-3"></i>
                                    <span>Expired</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-users me-3"></i>
                                    <span>Customers</span>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                <i class="feather-paperclip"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-pdf me-3"></i>
                                    <span>PDF</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-csv me-3"></i>
                                    <span>CSV</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-xml me-3"></i>
                                    <span>XML</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-txt me-3"></i>
                                    <span>Text</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-exe me-3"></i>
                                    <span>Excel</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-printer me-3"></i>
                                    <span>Print</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
            <div class="accordion-body pb-2">
                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fw-bold d-block">
                                        <span class="d-block">{{__('students.paid')}} </span>
                                        <span class="fs-20 fw-bold d-block">78/100</span>
                                    </a>
                                    <div class="badge bg-soft-success text-success">
                                        <i class="feather-arrow-up fs-10 me-1"></i>
                                        <span>36.85%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fw-bold d-block">
                                        <span class="d-block">Unpaid</span>
                                        <span class="fs-20 fw-bold d-block">38/50</span>
                                    </a>
                                    <div class="badge bg-soft-danger text-danger">
                                        <i class="feather-arrow-down fs-10 me-1"></i>
                                        <span>23.45%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fw-bold d-block">
                                        <span class="d-block">Overdue</span>
                                        <span class="fs-20 fw-bold d-block">15/30</span>
                                    </a>
                                    <div class="badge bg-soft-success text-success">
                                        <i class="feather-arrow-up fs-10 me-1"></i>
                                        <span>25.44%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fw-bold d-block">
                                        <span class="d-block">Draft</span>
                                        <span class="fs-20 fw-bold d-block">3/10</span>
                                    </a>
                                    <div class="badge bg-soft-danger text-danger">
                                        <i class="feather-arrow-down fs-10 me-1"></i>
                                        <span>12.68%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full">
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="paymentList">
                                    <thead>
                                        <tr>

                                            <th>{{__('branch.invoice')}}</th>
                                            <th>{{__('groups.first_last_name')}}</th>
                                            <th>{{__('messages.group.group_name')}}</th>
                                            <th>{{__('students.payment')}} </th>
                                            <th>{{__('branch.payment_time')}}</th>
                                            <th>Status</th>
                                            <th class="text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($transactions->isEmpty())
                                        <tr class="single-item font-bold w-100">
                                            <td>
                                                {{ __('messages.general.not_available')}}
                                            </td>
                                        </tr>                            
                                    @else
                                        @foreach($transactions as $transaction)
                                        <tr class="single-item">
                                            <td><a href="#" class="fw-bold">#{{$transaction->id}}</a></td>
                                            <td>
                                                <a href="javascript:void(0)" class="hstack gap-3">
                                                    <div>
                                                        <span class="text-truncate-1-line">{{$transaction->student->first_name}} {{$transaction->student->last_name}}</span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                {{$transaction->group->group_name ?? null}} 
                                            </td>
                                            <td>
                                                <span>
                                                    {{ $transaction->amount ? number_format($transaction->amount, 2, '.', ',') : 'N/A' }} UZS
                                                </span>
                                            </td>
                                           <td>{{ optional($transaction->created_at)->format('d F Y, H:i') }}</td>
                                            <td>{{ $transaction->status }}</td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="{{ route('transaction.show',  $transaction->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather feather-eye"></i>
                                                    </a>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="feather feather-edit-3 me-3"></i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                    <i class="feather feather-printer me-3"></i>
                                                                    <span>Print</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="feather feather-clock me-3"></i>
                                                                    <span>Remind</span>
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $transaction->id }}').submit();">
                                                                <i class="feather feather-trash-2 me-3"></i>
                                                                <span>Delete</span>
                                                            </a>

                                                            <form id="delete-form-{{ $transaction->id }}" action="{{ route('transaction.destroy', ['transaction' => $transaction->id]) }}" onsubmit="return confirm('Ochirishga ruxsat berasizmi')" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
    <!-- [ Footer ] start -->
    <!--! ================================================================ !-->

    <!--! ================================================================ !-->
    <!-- [ Footer ] end -->
    <x-footer></x-footer>
</main>

<!-- vendors.min.js {always must need to be top} -->

<script src="{{ asset('assets/vendors/js/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/dataTables.bs5.min.js') }}"></script>
@endsection