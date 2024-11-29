@extends('layouts.layout')
@section('content')

<!--! ================================================================ !-->
<!--! [Start] Main Content !-->
<!--! ================================================================ !-->
<main class="nxl-container">
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('students.payment')}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{__('messages.general.home')}}</a></li>
                    <li class="breadcrumb-item">{{ __('students.payment')}}</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>{{__('messages.general.back')}}</span>
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
                                    <span>All</span>
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
                        <a href="invoice-create.html" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>Create Invoice</span>
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
        <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
            <div class="accordion-body pb-2">
                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fw-bold d-block">
                                        <span class="d-block">Total Paid Amount</span>
                                        <span class="fs-20 fw-bold d-block">{{ number_format($totalPaidAmount, 2, '.', ',') }}</span>
                                    </a>
                                    <div class="badge bg-soft-success text-success">
                                        @if($percentageChange >= 0)
                                            <i class="feather-arrow-up fs-10 me-1"></i>
                                            <span>{{ number_format($percentageChange, 2) }}%</span>
                                        @else
                                            <div class="badge bg-soft-danger text-danger">
                                                <i class="feather-arrow-down fs-10 me-1"></i>
                                                <span>{{ number_format(abs($percentageChange), 2) }}%</span>
                                            </div>
                                        @endif
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
                                        <span class="fs-20 fw-bold d-block">{{ number_format($totalUnpaidAmount, 2, '.' , ',') }}</span>
                                    </a>
                                    <div class="badge bg-soft-success text-success">
                                        @if ($percentageChangeUnpaid >= 0)
                                            <i class="feather-arrow-up fs-10 me-1"></i>
                                            <span>{{ number_format($percentageChangeUnpaid, 2)}}%</span>
                                        @else
                                            <div class="badge bg-soft-danger text-danger">
                                                <i class="feather-arrow-down fs-10 me-1"></i>
                                                <span>{{ number_format(abs($percentageChangeUnpaid), 2) }}</span>
                                            </div>
                                        @endif
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
                                        <span class="d-block">Cancel</span>
                                        <span class="fs-20 fw-bold d-block">{{ number_format( $totalCancelAmount, 2, '.', ',') }}</span>
                                    </a>
                                    <div class="badge bg-soft-success text-success">
                                        @if ($percentageChangeCancel >= 0)
                                            <i class="feather-arrow-up fs-10 me-1"></i>
                                            <span>{{ number_format($percentageChangeCancel, 2)}}%</span>
                                        @else
                                            <div class="badge bg-soft-danger text-danger">
                                                <i class="feather-arrow-down fs-10 me-1"></i>
                                                <span>{{ number_format(abs($percentageChangeCancel), 2) }}</span>
                                            </div>
                                        @endif
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
                                <div id="paymentList_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="row">
                                        <div class="col-6">
                                            <form method="GET" action="{{ route('payments.index') }}" class="d-flex col-12">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="dataTables_length" id="payment_length">
                                                        <label>Show
                                                            <select name="paymentList_length" aria-controls="paymentList" class="form-select form-select-sm">
                                                                <option value="10" {{ request('paymentList_length', 10) == 10 ? 'selected' : '' }} style="color:black;">10</option>
                                                                <option value="20" {{ request('paymentList_length', 10) == 20 ? 'selected' : '' }} style="color:black;">20</option>
                                                                <option value="50" {{ request('paymentList_length', 10) == 50 ? 'selected' : '' }} style="color:black;">50</option>
                                                                <option value="100" {{ request('paymentList_length', 10) == 100 ? 'selected' : '' }} style="color:black;">100</option>
                                                                <option value="200" {{ request('paymentList_length', 10) == 200 ? 'selected' : '' }} style="color:black;">200</option>
                                                                <option value="500" {{ request('paymentList_length', 10) == 500 ? 'selected' : '' }} style="color:black;">500</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="dataTables_length" id="payment_year">
                                                        <label>Sort Year
                                                            <select name="year" aria-controls="" class="form-select form-select-sm">
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}" style="color:black;" {{ request('year') == $year ? 'selected' : '' }}>
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="dataTables_length" id="payment_date">
                                                        <label>Sort date
                                                            <select name="date_range" aria-controls="paymentList" class="form-select form-select-sm">
                                                                <option value="all" {{ request('date_range', 'all') == 'all' ? 'selected' : '' }} style="color:black;">All</option>
                                                                <option value="day" {{ request('date_range') == 'day' ? 'selected' : '' }} style="color:black;">Day</option>
                                                                <option value="week" {{ request('date_range') == 'week' ? 'selected' : '' }} style="color:black;">Weekly</option>
                                                                <option value="month" {{ request('date_range') == 'month' ? 'selected' : '' }} style="color:black;">Monthly</option>
                                                                <option value="quarter" {{ request('date_range') == 'quarter' ? 'selected' : '' }} style="color:black;">Quarterly</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div id="paymentList_filter" class="dataTables_filter">
                                                <form method="GET" action="{{ route('payments.index') }}" id="searchForm" class="d-flex col-12">
                                                    <label for="searchInput" class="mb-0 me-2">Search:</label>
                                                    <input type="search" id="searchInput" name="search" class="form-control form-control-sm" placeholder="Search" aria-controls="paymentList">
                                                </form>
                                            </div>
                                        </div>

                                    
                                        <div class="row dt-row">
                                            <div class="col-sm-12">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-30">
                                                                <div class="btn-group mb-1">
                                                                    <div class="custom-control custom-checkbox ms-1">
                                                                        <input type="checkbox" class="custom-control-input" id="checkAllPayment">
                                                                        <label class="custom-control-label" for="checkAllPayment"></label>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th>Id</th>
                                                            <th>{{__('messages.students.student')}}</th>
                                                            <th>{{__('messages.general.sum')}}</th>
                                                            <th>Date</th>
                                                            <th>{{__('messages.general.type')}}</th>
                                                            <th>{{__('messages.general.status')}}</th>
                                                            <th class="text-end"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="paymentList">
                                                        @if($payments->isEmpty())
                                                            <tr class="single-item font-bold w-100">
                                                                <td>
                                                                    {{ __('messages.general.not_available')}}
                                                                </td>
                                                            </tr>                              
                                                        @else
                                                        @foreach($payments as $payment)
                                                        <tr class="single-item">
                                                            <td>
                                                                <div class="item-checkbox ms-1">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input checkbox" id="checkBox_1">
                                                                        <label class="custom-control-label" for="checkBox_1"></label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><a href="{{route('payments.show',$payment->id)}}" class="fw-bold">#{{$payment->id}}</a></td>
                                                            <td>
                                                                <span>{{$payment->student->first_name}} {{$payment->student->last_name}}</span>
                                                            </td>
                                                            <td>{{ number_format($payment->amount, 0, '.', ' ') }} UZS</td>
                                                            <td>{{ (new DateTime($payment->create_time))->format('d F Y, H:i') }}</td>
                                                            <td >
                                                                @if($payment->type == 'cash')
                                                                    <span>{{__('students.cash')}}</span>                                                            
                                                                @else
                                                                    <img src="https://cdn.payme.uz/logo/payme_color.svg" alt="PAYME" style="width: 50px;"/>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($payment->state == '1')
                                                                    <div class="badge bg-soft-warning text-warning">{{__('messages.group.waiting')}}</div>
                                                                @elseif($payment->state == '2')
                                                                    <div class="badge bg-soft-success text-success">{{__('messages.group.paid')}}</div>
                                                                @elseif($payment->state == '-2')
                                                                    <div class="badge bg-soft-danger text-danger">{{__('messages.general.cenceled')}}</div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <a href="{{route('payments.show',$payment->id)}}" class="avatar-text avatar-md">
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
                                                                                    <span>{{__('messages.general.edit')}}</span>
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
                                                                                    <span>{{__('students.remind')}}</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="dropdown-divider"></li>
                                                                            <li>
                                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                                    <i class="feather feather-trash-2 me-3"></i>
                                                                                    <span>{{__('messages.general.delete')}}</span>
                                                                                </a>
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
                                    
                                    {{ $payments->links('components.pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
    <!-- [ Footer ] start -->
    <x-footer></x-footer>
    <!-- [ Footer ] end -->
</main>
<!--! ================================================================ !-->
<!--! [End] Main Content !-->
<!--! ================================================================ !-->

<!-- jQuery must be loaded first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables and other scripts -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded and parsed');

    // Handle form submission for select elements
    const selects = document.querySelectorAll('select[name="paymentList_length"], select[name="date_range"], select[name="year"]');

    selects.forEach(function(select) {
        select.addEventListener('change', function() {
            console.log('Select changed:', select.name);
            const form = select.closest('form');
            if (form) {
                form.submit();
            } else {
                console.error('Form not found');
            }
        });
    });

    // Handle search input with debounce
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');

    if (searchForm && searchInput) {
        searchInput.addEventListener('input', function() {
            console.log('Search input:', searchInput.value);
            clearTimeout(window.searchTimer);
            window.searchTimer = setTimeout(fetchResults, 200);
        });
    } else {
        console.error('Search form or input not found');
    }

    function fetchResults() {
        if (!searchForm) {
            console.error('Search form not found');
            return;
        }

        const formData = new FormData(searchForm);
        const url = new URL(searchForm.action, window.location.origin); 
        url.search = new URLSearchParams(formData).toString();

        console.log('Fetching results from:', url.toString());

        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);
            if (data.html) {
                const tbody = document.getElementById('paymentList');
                if (tbody) {
                    tbody.innerHTML = data.html; // Update only the rows inside the tbody
                } else {
                    console.error('Table body element not found');
                }
            }
        })
        .catch(error => {
            console.error('Error fetching results:', error);
        });
    }
});

</script>



<!-- vendors.min.js {always must need to be top} -->

<script src="{{ asset('assets/vendors/js/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/dataTables.bs5.min.js') }}"></script>

@endsection