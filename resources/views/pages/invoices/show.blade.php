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
                        <h5 class="m-b-10">Invoice</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item">View</li>
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
                        <div class="col-lg-3">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fw-bold d-block">
                                            <span class="d-block">Paid</span>
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
                        <div class="col-lg-3">
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
                        <div class="col-lg-3">
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
                        <div class="col-lg-3">
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
            <div class="main-content container-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card invoice-container">
                            <div class="card-header">
                                <div>
                                    <h2 class="fs-16 fw-700 text-truncate-1-line mb-0 mb-sm-1">Invoice Preview</h2>
                                    <div class="dropdown d-none d-sm-block">
                                        <a href="javascript:void(0)" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" data-bs-offset="0,25" aria-expanded="false">
                                            <span class="fs-11 fw-400 text-muted me-2">Invoice Templates</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item active">Default</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Simple</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Classic</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Modern</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Untimate</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Essential</a>
                                            </li>
                                            <li class="dropdown-divider"></li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Create Template</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Delete Template</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="javascript:void(0)" class="d-flex me-1" data-alert-target="invoicSendMessage">
                                        <div class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Send Invoice">
                                            <i class="feather feather-send"></i>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex me-1 printBTN">
                                        <div class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Print Invoice"><i class="feather feather-printer"></i></div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex me-1">
                                        <div class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Add Payment"><i class="feather feather-dollar-sign"></i></div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex me-1 file-download">
                                        <div class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Download Invoice"><i class="feather feather-download"></i></div>
                                    </a>
                                    <a href="invoice-create.html" class="d-flex me-1">
                                        <div class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit Invoice">
                                            <i class="feather feather-edit"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="px-4 pt-4">
                                    <div class="d-sm-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="fs-24 fw-bolder font-montserrat-alt text-uppercase">Academy</div>
                                            <address class="text-muted">
                                                Chilanzar 2.2,<br>
                                                Tashkent, Uzbekistan<br>
                                                VAT No: 306 334 591
                                            </address>
                                            <div class="d-flex gap-2">
                                                <a href="javascript:void(0);" class="avatar-text avatar-sm">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="avatar-text avatar-sm">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="avatar-text avatar-sm">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="avatar-text avatar-sm">
                                                    <i class="feather-linkedin"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="avatar-text avatar-sm">
                                                    <i class="feather-github"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="lh-lg pt-3 pt-sm-0">
                                            <h2 class="fs-4 fw-bold text-primary">Invoice</h2>
                                            <div>
                                                <span class="fw-bold text-dark">Invoice:</span>
                                                <span class="fw-bold text-primary">#{{ $invoice->id }}</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark">Boshlanish sanasi:</span>
                                                <span class="text-muted"> {{ \Carbon\Carbon::parse($invoice->start_date)->format('d M, Y') }}</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark">Tugash vaqti:</span>
                                                <span class="text-muted"> {{ \Carbon\Carbon::parse($invoice->end_date)->format('d M, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border-dashed">
                                <div class="px-4 py-sm-5">
                                    <div class="d-sm-flex gap-4 justify-content-center">
                                        <div class="text-sm-end">
                                            <h2 class="fs-16 fw-bold text-dark mb-3">Invoiced To:</h2>
                                            
                                            <address class="text-muted lh-lg">
                                                @if($invoice->student)
                                                    {{ $invoice->student->first_name }} {{ $invoice->student->last_name }}
                                                @else
                                                    Not available
                                                @endif<br>
                                                 <div>
                                                     {{$invoice->group->branch->name}}
                                                </div>
                                                <div>
                                                   {{$invoice->group->group_name}}
                                                </div>
                                            </address>
                                        </div>
                                        <div class="border-end border-end-dashed border-gray-500 d-none d-sm-block"></div>
                                        <div class="mt-4 mt-sm-0">
                                            <h2 class="fs-16 fw-bold text-dark mb-3">Payment Details:</h2>
                                            <div class="text-muted lh-lg">
                                                <div>
                                                    <span class="text-muted">Yaratilgan to'lov:</span>
                                                    <span class="fw-bold text-dark">{{ $invoice->amount ? number_format($invoice->amount, 2, '.', ' ') : 'N/A' }} UZS</span>
                                                </div>
                                                <div>
                                                    <span class="text-muted">To'lov yaratuvchi :</span>
                                                    <span class="fw-bold text-dark">{{Auth()->user()->first_name}} {{Auth()->user()->last_name}}</span>
                                                </div>
                                                <div>
                                                    <span class="text-muted">Kurs:</span>
                                                    <span class="fw-bold text-dark">  {{ $invoice->group->courses->course_name }}</span>
                                                </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border-dashed mb-0">
                                <div class="table-responsive py-4">
                                <h3 class="title ms-3" >Transaction </h3>
                                    
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th> Pinfl</th>
                                                <th>Summa</th>
                                                <th>Guruh</th>
                                                <th>Holati </th>
                                                <th>Sana</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                         @foreach($transactions as $transaction)
                                          
                                             <tr>
                                                <td>#{{$transaction->id}}</td>
                                                 <td>{{$transaction->student->pinfl}} </td>
                                                <td>{{$transaction->amount ? number_format($transaction->amount, 0, '.', ' ') : 'N/A' }} UZS</td>
                                                <td>{{$transaction->group->group_name}}</td>
                                                 <td>   
                                                    <div class="badge bg-soft-success text-success">To'landi</div>
                                                 </td>
                                                <td>{{ \Carbon\Carbon::parse($transaction->date)->format('F j, Y') }}</td>
                                               
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr class="border-dashed mt-0">
                                <div class="px-4">
                                    <div class="alert alert-dismissible p-4 mt-3 alert-soft-warning-message" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <p class="mb-0">
                                            <strong>Eslatma:</strong> Bu yerda shu invoicga tegishli transactionlar chiqadi. <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="px-4 pt-4 d-sm-flex align-items-center justify-content-between">
                                    <div class="mb-5 mb-sm-0">
                                        <h6 class="fs-13 fw-bold mb-3">Tarm &amp; Condition :</h6>
                                        <ul class="list-unstyled lh-lg fs-12">
                                            <li># All accounts are to be paid within 7 days from receipt of invoice.</li>
                                            <li># To be paid by cheque or credit card or direct payment online.</li>
                                            <li># If account is not paid within 7 days the credits details supplied as confirmation.</li>
                                            <li># This is computer generated receipt and does not require physical signature.</li>
                                        </ul>
                                    </div>
                                    <div class="text-center">
                                        <h6 class="fs-13 fw-bold mt-2">Account Manager</h6>
                                        <p class="fs-11 fw-semibold text-muted">26 MAY 2023, 10:35PM</p>
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

        <!-- [ Footer ] end -->
        <x-footer></x-footer>
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->

    @endsection