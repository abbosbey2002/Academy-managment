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
                        <h5 class="m-b-10">Reports</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item">Sales</li>
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
                            <div class="dropdown filter-dropdown">
                                <a class="btn btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter me-2"></i>
                                    <span>Filter</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Role" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Role">Role</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Team" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Team">Team</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Email" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Email">Email</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Member" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Member">Member</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Recommendation" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Recommendation">Recommendation</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-plus me-3"></i>
                                        <span>Create New</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-filter me-3"></i>
                                        <span>Manage Filter</span>
                                    </a>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Add Widgets</span>
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
                
                    <!-- [Mini Cards] start -->
                    @foreach($data as $status => $info)
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">

                                <div class="fs-12 fw-medium text-muted">{{ ucfirst($status) }} Overview</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h5><span class="counter">{{ number_format($info['totalAmount'], 2) }}</span> UZS</h5>
                                </div>
                                <div class="hstack gap-2 fs-11 text-success">
                                    <span>{{ $info['countInvoices'] }} ta</span>
                                </div>

                                <div class="fs-12 fw-medium text-muted mt-3">{{ ucfirst($status) }} Transactions</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h5><span class="counter">{{ number_format($info['transactionAmount'], 2) }}</span> UZS</h5>
                                </div>
                                <div class="hstack gap-2 fs-11 text-success">
                                    <span>{{ $info['transactionCount'] }} ta</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- [Mini Cards] end -->

                    <!-- [Critical Issues] start -->
                    <div class="col-xxl-4">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Critical Issues</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                <div class="text-center mb-4">
                                    <div class="goal-prigress"></div>
                                </div>
                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <div class="card px-4 py-3 text-center bg-soft-danger text-danger border-danger border-dashed rounded-3">
                                            <div class="avatar-text bg-gray-200 mx-auto mb-2">
                                                <i class="feather-activity"></i>
                                            </div>
                                            <h2 class="fs-13 tx-spacing-1">Refunded Invoices</h2>
                                            <div class="fs-11 text-muted">{{ number_format($refundedAmount, 2, '.', ' ') }} UZS</div>
                                            <div class="hstack gap-2 fs-11 text-danger text-center justify-content-center">
                                                <span>{{ $refundedCount }} ta</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card px-4 py-3 text-center bg-soft-primary text-primary border-primary border-dashed rounded-3">
                                            <div class="avatar-text bg-gray-200 mx-auto mb-2">
                                                <i class="feather-users"></i>
                                            </div>
                                            <h2 class="fs-13 tx-spacing-1">Disputed Invoices</h2>
                                            <div class="fs-11 text-muted">{{ number_format($disputedAmount, 2, '.', ' ') }} UZS</div>
                                            <div class="hstack gap-2 fs-11 text-danger text-center justify-content-center">
                                                <span>{{ $disputedCount }} ta</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="javascript:void(0);" class="btn btn-primary">Generate Report</a>
                            </div>
                        </div>
                    </div>
                    <!-- [Critical Issues] end -->
                    <!-- [Critical Invoices] start -->
                    <div class="col-lg-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Critical Invoices</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Invoice ID</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($criticalIssues->isEmpty())
                                                <tr>
                                                    <td colspan="12" class="text-center">Critical Issues not found.</td>
                                                </tr>
                                            @else
                                                @foreach ($criticalIssues as $issue)
                                                    <tr>
                                                        <td>{{ $issue->id }}</td>
                                                        <td>{{ number_format($issue->amount, 2, ',', ' ') }} USD</td>
                                                        <td>
                                                            <span class="badge 
                                                                @if($issue->status == 'refunded') 
                                                                    bg-soft-danger text-danger
                                                                @elseif($issue->status == 'disputed') 
                                                                    bg-soft-primary text-primary
                                                                @endif
                                                            ">
                                                                {{ ucfirst($issue->status) }}
                                                            </span>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($issue->created_at)->format('Y-m-d') }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style">
                                    <li>
                                        <a href="javascript:void(0);"><i class="bi bi-arrow-left"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);" class="active">1</a></li>
                                    <li><a href="javascript:void(0);">2</a></li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="bi bi-dot"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);">8</a></li>
                                    <li><a href="javascript:void(0);">9</a></li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="bi bi-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- [Critical Invoices]] end -->

                    <!-- [Sales Pipeline] start -->
                    <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Sales Pipeline</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                <ul class="nav mb-4 gap-4 sales-pipeline-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link text-start active" data-bs-toggle="tab" data-bs-target="#leadsTab" role="tab">
                                            <span class="fw-semibold text-dark d-block">Leads</span>
                                            <span class="amount fs-18 fw-bold my-1 d-block">$47,569</span>
                                            <span class="deals fs-12 text-muted d-block">57 Deals</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link text-start" data-bs-toggle="tab" data-bs-target="#proposalTab" role="tab">
                                            <span class="fw-semibold text-dark d-block">Proposal</span>
                                            <span class="amount fs-18 fw-bold my-1 d-block">$35,258</span>
                                            <span class="deals fs-12 text-muted d-block">46 Deals</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link text-start" data-bs-toggle="tab" data-bs-target="#contractTab" role="tab">
                                            <span class="fw-semibold text-dark d-block">Contract</span>
                                            <span class="amount fs-18 fw-bold my-1 d-block">$24,569</span>
                                            <span class="deals fs-12 text-muted d-block">34 Deals</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link text-start" data-bs-toggle="tab" data-bs-target="#projectTab" role="tab">
                                            <span class="fw-semibold text-dark d-block">Project</span>
                                            <span class="amount fs-18 fw-bold my-1 d-block">$53,853</span>
                                            <span class="deals fs-12 text-muted d-block">42 Deals</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="leadsTab" role="tabpanel">
                                        <div id="leads-bar-chart"></div>
                                    </div>
                                    <div class="tab-pane fade" id="proposalTab" role="tabpanel">
                                        <div id="proposal-bar-chart"></div>
                                    </div>
                                    <div class="tab-pane fade" id="contractTab" role="tabpanel">
                                        <div id="contract-bar-chart"></div>
                                    </div>
                                    <div class="tab-pane fade" id="projectTab" role="tabpanel">
                                        <div id="project-bar-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-md-flex flex-wrap p-4 pt-5 border-top border-gray-5">
                                <div class="flex-fill mb-4 mb-md-0 pb-2 pb-md-0">
                                    <p class="fs-11 fw-semibold text-uppercase text-primary mb-2">Current</p>
                                    <h2 class="fs-20 fw-bold mb-0">$65,658 USD</h2>
                                </div>
                                <div class="vr mx-4 text-gray-600 d-none d-md-flex"></div>
                                <div class="flex-fill mb-4 mb-md-0 pb-2 pb-md-0">
                                    <p class="fs-11 fw-semibold text-uppercase text-danger mb-2">Overdue</p>
                                    <h2 class="fs-20 fw-bold mb-0">$34,54 USD</h2>
                                </div>
                                <div class="vr mx-4 text-gray-600 d-none d-md-flex"></div>
                                <div class="flex-fill">
                                    <p class="fs-11 fw-semibold text-uppercase text-success mb-2">Additional</p>
                                    <h2 class="fs-20 fw-bold mb-0">$20,478 USD</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Sales Pipeline] end -->

                    <!-- [Mini Cards] start -->
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-xxl-3 col-lg-6">
                                        <div class="border border-dashed border-gray-5 p-4 rounded-3 gap-4 text-center">
                                            <div class="sales-progress-1"></div>
                                            <div class="mt-4">
                                                <p class="fs-12 text-muted mb-1">Clossing date: <span class="fs-11 fw-medium text-dark">22 March, 2023</span></p>
                                                <a href="javascript:void(0);" class="fw-bold text-truncate-1-line">Web developement deal with alex</a>
                                                <div class="hstack gap-3 mt-3 justify-content-center">
                                                    <div class="avatar-image avatar-sm">
                                                        <img src="assets/images/avatar/1.png" alt="" class="img-fluid">
                                                    </div>
                                                    <a href="javascript:void(0);">Alexandra Della</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-6">
                                        <div class="border border-dashed border-gray-5 p-4 rounded-3 gap-4 text-center">
                                            <div class="sales-progress-2"></div>
                                            <div class="mt-4">
                                                <p class="fs-12 text-muted mb-1">Clossing date: <span class="fs-11 fw-medium text-dark">23 March, 2023</span></p>
                                                <a href="javascript:void(0);" class="fw-bold text-truncate-1-line">Web developement deal with alex</a>
                                                <div class="hstack gap-3 mt-3 justify-content-center">
                                                    <div class="avatar-image avatar-sm">
                                                        <img src="assets/images/avatar/2.png" alt="" class="img-fluid">
                                                    </div>
                                                    <a href="javascript:void(0);">Green Cute</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-6">
                                        <div class="border border-dashed border-gray-5 p-4 rounded-3 gap-4 text-center">
                                            <div class="sales-progress-3"></div>
                                            <div class="mt-4">
                                                <p class="fs-12 text-muted mb-1">Clossing date: <span class="fs-11 fw-medium text-dark">24 March, 2023</span></p>
                                                <a href="javascript:void(0);" class="fw-bold text-truncate-1-line">Web developement deal with alex</a>
                                                <div class="hstack gap-3 mt-3 justify-content-center">
                                                    <div class="avatar-image avatar-sm">
                                                        <img src="assets/images/avatar/3.png" alt="" class="img-fluid">
                                                    </div>
                                                    <a href="javascript:void(0);">Holmes Cherryman</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-6">
                                        <div class="border border-dashed border-gray-5 p-4 rounded-3 gap-4 text-center">
                                            <div class="sales-progress-4"></div>
                                            <div class="mt-4">
                                                <p class="fs-12 text-muted mb-1">Clossing date: <span class="fs-11 fw-medium text-dark">25 March, 2023</span></p>
                                                <a href="javascript:void(0);" class="fw-bold text-truncate-1-line">Web developement deal with alex</a>
                                                <div class="hstack gap-3 mt-3 justify-content-center">
                                                    <div class="avatar-image avatar-sm">
                                                        <img src="assets/images/avatar/4.png" alt="" class="img-fluid">
                                                    </div>
                                                    <a href="javascript:void(0);">Malanie Hanvey</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Mini Cards] end -->

                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        <x-footer/>
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
@endsection
