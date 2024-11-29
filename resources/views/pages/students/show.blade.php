    <?php
    $branches = \App\Models\Branch::all();
    ?>
<style>
    .btn-form {
        display: flex;
        height: 50px; /* Adjust height as needed */
    }

    .btn-delete {
        background: none !important;
        border: none !important;
        color: white !important;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-delete span, .btn-primary span {
        font-size: 12px !important;
    }

    .btn-primary {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
    @extends('layouts.layout')
    @section('content')

        <main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}} </a></li>
                        <li class="breadcrumb-item"><a href="/admin/user/students">{{ __('messages.students.list')}}</a></li>
                        <li class="breadcrumb-item">{{ $student->last_name }}</li>
                        
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>{{ __('messages.back')}} </span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <a href="{{ route('students.edit', $student->id ?? '#') }}" class="btn btn-light-brand">
                                <i class="feather-edit me-2"></i>
                                <span>{{ __('messages.general.edit')}} </span>
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
                    <div class="col-xxl-4 col-xl-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="mb-4 text-center">
                                    <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                        <div class="avatar-image wd-150 ht-150 border border-5 border-gray-3">
                                            <img src="{{ asset('assets/images/avatar/person.jpg') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="top: 76%; right: 10px">
                                            <i class="bi bi-patch-check-fill"></i>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <a href="javascript:void(0);" class="fs-14 fw-bold d-block">{{ $student->first_name }} {{ $student->last_name }}</a>
                                        <a href="javascript:void(0);" onclick="copyToClipboard('{{ $student->email }}')" class="ms-2 text-muted successAlertMessage">
                                            ID: {{ $student->pinfl }} <i class="fa fa-copy"></i>
                                        </a>
                                    </div>

                                    <div class="fs-12 fw-normal text-muted text-left d-flex flex-wrap gap-3 mb-4">
                                        @php
                                            $totalAmount = 0;
                                        @endphp

                                        @foreach($student->billing as $billing)
                                            @php
                                                $totalAmount += $billing->amount;
                                            @endphp
                                        @endforeach

                                        @php
                                            $status = $totalAmount >= 0 ?  __('messages.general.active') :  __('messages.general.inactive');
                                            $cardClass = $totalAmount >= 0 ? 'bg-soft-success text-success border-success border-dashed' : 'bg-soft-danger text-danger border-danger border-dashed';
                                            $badgeClass = $totalAmount >= 0 ? 'ms-2 btn btn-sm bg-success text-white d-inline-block' : 'ms-2 btn btn-sm bg-danger text-white d-inline-block';
                                        @endphp

                                        <div class="col-12 p-4 d-xxl-flex d-xl-block d-md-flex rounded border {{ $cardClass }} text-start">
                                            <div>
                                                <div class="fs-14 fw-bold"> {{ __('students.balance')}}
                                                    <a href="javascript:void(0);" class="{{ $badgeClass }}">{{ $status }}</a>
                                                </div>
                                                <div class="fs-20">
                                                    <span class="fw-bold">{{ number_format($totalAmount, 0, ',', ' ') }}</span>
                                                    <em class="fs-11 fw-medium">UZS</em>
                                                </div>
                                                    @if ($lastTransaction)
                                                        <div class="fs-12 text-muted mt-1">{{ __('students.last_payment')}} <strong class="text-dark">{{ number_format($lastTransaction->amount, 0, '.', ' ') }} <em class="fs-11 fw-medium">UZS</em></strong>
                                                            @if ($lastTransaction->created_at)
                                                                ({{ $lastTransaction->created_at->format('d.m.Y') }})
                                                            @endif
                                                        </div>
                                                    @else
                                                        <div class="fs-12 text-muted mt-1">{{ __('students.not_last_payment')}} </div>
                                                    @endif

                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="hstack justify-content-between mb-4">
                                        <span class="text-muted fw-medium hstack gap-3"><i class="feather-map-pin"></i>{{ __('messages.general.address')}} </span>
                                        <a href="javascript:void(0);" class="float-end">{{ $student->address }}</a>
                                    </li>
                                    <li class="hstack justify-content-between mb-4">
                                        <span class="text-muted fw-medium hstack gap-3"><i class="feather-phone"></i>{{ __('messages.general.phone')}}</span>
                                        <a href="javascript:void(0);" class="float-end">{{ $student->phone }}</a>
                                    </li>
                                    <li class="hstack justify-content-between mb-0">
                                        <span class="text-muted fw-medium hstack gap-3"><i class="feather-mail"></i>{{ __('students.birth')}}</span>
                                        <a href="javascript:void(0);" class="float-end">{{ $student->brith_date }}</a>
                                    </li>
                                </ul>
                                    <div class="d-flex gap-2 text-center pt-4">
                                        <form action="{{ route('students.destroy', ['student' => $student->id]) }}" method="post" class="btn-form w-50">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light-brand w-100 h-100 align-items-center" onclick="return confirm('Are you sure you want to delete this student?');">
                                                <i class="feather-trash-2 me-2"></i>
                                                <span>{{ __('messages.general.delete')}}</span>
                                            </button>
                                        </form>
                                        <a href="{{ route('students.edit',['student' => $student->id] ) }}" class="w-50 btn btn-primary h-100 align-items-center" 
                                            style="padding: 16px 16px; font-size: 10px;">
                                            <i class="feather-edit me-2"></i>
                                            <span>{{ __('messages.general.edit')}}</span>
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-6">
                        <div class="card border-top-0">
                            <div class="card-header p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#overviewTab" role="tab">{{ __('students.information')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#billingOrder" role="tab">{{ __('branch.billing')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#activityTab" role="tab">{{ __('messages.courses.information')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#notificationsTab" role="tab"> {{ __('students.notifications')}} <span class="badge bg-soft-danger text-danger">{{ __('sidebar.general.comming_son')}} </span></a></a> 
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#connectionTab" role="tab"> {{ __('students.connection')}} <span class="badge bg-soft-danger text-danger">{{ __('sidebar.general.comming_son')}}
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">
                                    <div class="profile-details mb-5">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">Profile ma'lumotlari:</h5>
                                            <a href="{{ route('students.edit', $student->id ?? '#') }}" class="btn btn-sm btn-light-brand">{{ __('messages.general.edit')}} </a>
                                        </div>
                                        
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">PINFL:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $student->pinfl }}</div>
                                        </div>                                 
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('students.type')}}:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $student->gender }}</div>
                                        </div>

                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('messages.general.phone')}} :</div>
                                            <div class="col-sm-6 fw-semibold">{{ $student->phone }}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('messages.general.address')}}:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $student->address }}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('students.date_arrival')}}:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $student->created_at->format('Y-m-d') }}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('students.last_update')}}:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $student->updated_at->format('Y-m-d') }}</div>
                                        </div>
                                    </div>
                                    
                                    <div class="container mt-4">
                                    @php
                                        $updatedAt = \Carbon\Carbon::parse($student->updated_at);
                                        $needsUpdateReminder = $updatedAt->diffInDays(\Carbon\Carbon::now()) > 30;
                                    @endphp

                                    <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-warning-message profile-overview-alert {{ $needsUpdateReminder ? 'd-block' : 'd-none' }}" role="alert">
                                        <div class="me-4 d-none d-md-block">
                                            <i class="feather feather-alert-triangle fs-1"></i>
                                        </div>
                                        <div>
                                            <p class="fw-bold mb-1 text-truncate-1-line">{{ __('students.profile30')}}</p>
                                            <p class="fs-10 fw-medium text-uppercase text-truncate-1-line">{{ __('students.last_update')}}: <strong>{{ $updatedAt->format('d M, Y') }}</strong></p>
                                            <a href="{{ route('students.edit', $student->id ?? '#') }}" class="btn btn-sm bg-soft-warning text-warning d-inline-block">Update Now</a>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="billingOrder" role="tabpanel">
                                <div class="subscription-plan px-4 pt-4">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">{{ __('students.update_now')}}</h5>
                                        </div>
                                        <div class="p-4 mb-4 d-xxl-flex d-xl-block d-md-flex align-items-center justify-content-between gap-4 border border-dashed border-gray-5 rounded-1">
                                            <div>
                                                <div class="fs-14 fw-bold text-dark mb-1">{{ __('students.account_number')}} :</div>
                                            </div>
                                            <div class="my-3 my-xxl-0 my-md-3 my-md-0">
                                                <div class="fs-20 text-dark">
                                                    <a href="javascript:void(0);" onclick="copyToClipboard('{{ $student->email }}')" class="text-muted successAlertMessage">
                                                        {{ $student->pinfl }} <i class="fa fa-copy"></i>
                                                    </a>
                                                </div>
                                                <div class="fs-12 text-muted mt-1">{{ __('students.payment_title')}} </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="payment-history">
                                        <div class="my-4 px-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">{{ __('messages.group.invoice')}}:</h5>
                                            <a href="{{ route('showAllInvoice', ['student_id' => $student->id])}}" class="btn btn-sm btn-light-brand">{{ __('messages.general.all')}} </a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="">
                                                    <tr>
                                                      
                                                        <th>{{ __('messages.courses.course')}}</th>
                                                        <th>{{ __('messages.general.sum')}}</th>
                                                        <th>{{ __('messages.general.time')}}</th>
                                                        <th>{{ __('messages.group.lifetime')}}</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($invoices as $invoice)
                                                        <tr style="font-size: 10px;">
                                                            <td class="text-start">
                                                                <span class="badge bg-soft-primary text-primary text-start">{{ $invoice->group->courses->course_name }}</span>
                                                            </td>
                                                            <td>
                                                                <span class="d-flex align-items-center">{{ $invoice->amount ? number_format($invoice->amount, 0, '.', ' ') : 'N/A' }} UZS</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ (new DateTime($invoice->created_at))->format('d F Y, H:i') }}</span>
                                                            </td>
                                                            <td>
                                                                {{ (new DateTime($invoice->start_date))->format('F Y') }} / {{ (new DateTime($invoice->end_date))->format('F Y') }}
                                                            </td>
                                                            <td>
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <a href="{{ route('invoices.show', $invoice->id) }}" class="avatar-text avatar-md">
                                                                        <i class="feather-eye"></i>
                                                                    </a>
                                                                    <a href="#" class="avatar-text avatar-md">
                                                                        <i class="feather-edit-3"></i>
                                                                    </a>
                                                                    <form action="{{ route('invoices.destroy', $invoice->id )}}" method="POST" onsubmit="return confirm('Ochirishga ruxsat berasizmi')" class="mb-0">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="avatar-text avatar-md delete-branch text-dark"><i class="feather-trash-2"></i></button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center"> {{ __('messages.general.not_found')}} ...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr class="mt-5">
                                    <div class="payment-history">
                                        <div class="my-4 px-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">To'lovlar:</h5>
                                            <a href="{{ route('showAllPayment', ['student_id' => $student->id]) }}" class="btn btn-sm btn-light-brand">{{ __('messages.general.all')}} </a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="paymentList" aria-describedby="paymentList_info">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('messages.general.type')}} </th>
                                                        <th>{{ __('messages.general.sum')}}</th>
                                                        <th>{{ __('messages.general.time')}}</th>
                                                        <th>{{ __('messages.general.status')}}</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($payments as $payment)
                                                        <tr class="single-item odd" style="font-size: 10px;">
                                                            <td>
                                                                @if($payment->type == 'cash')
                                                                    <span class="text-start">{{ __('students.cash')}}</span>
                                                                @else
                                                                    <img src="https://cdn.payme.uz/logo/payme_color.svg" alt="PAYME" style="width: 64px;"/>
                                                                @endif
                                                            </td>
                                                            <td class="text-dark">
                                                                {{ number_format($payment->amount, 0, '.', ' ') }} UZS
                                                            </td>
                                                            <td>
                                                                <span class="d-flex align-items-center text-dark">{{ (new DateTime($payment->paycom_time_datetime))->format('d F Y, H:i') }}</span>
                                                            </td>
                                                            <td>
                                                                @if($payment->state == '1')
                                                                    <div class="badge bg-soft-warning text-warning">{{ __('students.waiting')}}</div>
                                                                @elseif($payment->state == '2')
                                                                    <div class="badge bg-soft-success text-success">{{ __('students.paid')}}</div>
                                                                @elseif($payment->state == '-2')
                                                                    <div class="badge bg-soft-danger text-danger">{{ __('students.cenceled')}}</div>
                                                                @endif
                                                            </td>
                                                            <td class="">
                                                                <div class="hstack gap-2 d-flex justify-content-end">
                                                                    <a href="{{ route('payments.show', $payment->id) }}" class="avatar-text avatar-md">
                                                                        <i class="feather-eye"></i>
                                                                    </a>
                                                                    <a href="#" class="avatar-text avatar-md">
                                                                        <i class="feather-edit-3"></i>
                                                                    </a>
                                                                    <form action="#" method="POST" onsubmit="return confirm('Ochirishga ruxsat berasizmi')" class="mb-0">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="avatar-text avatar-md delete-branch text-dark" type="submit">
                                                                            <i class="feather-trash-2"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">{{ __('messages.general.not_found')}} ...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="activityTab" role="tabpanel">
                                    <div class="recent-activity p-4 pb-0">
                                        <div class="mb-4 pb-2 d-flex justify-content-between">
                                            <h5 class="fw-bold">{{ __('students.available_courses')}} :</h5>
                                        </div>
                                        <div class="row">
                                        
                                            @foreach ($groups as $group)
                                            <div class="col-xxl-4 col-md-6">
                                                <div class="card bg-soft-{{ $group->status == 'active' ? 'success' : ($group->status == 'paused' ? 'warning' : ($group->status == 'completed' ? 'secondary' : ($group->status == 'recruiting' ? 'info' : ($group->status == 'cancelled' ? 'danger' : 'secondary')))) }} overflow-hidden">
                                                    <a href="{{ route('groups.show', $group->id) }}" class="position-absolute w-100 h-100 top-0 left-0"></a>
                                                    <div class="card-body">
                                                        <h5 class="fs-4 text-reset mt-4 mb-1">{{ $group->courses->course_name ?? __('messages.courses.name') }}</h5>
                                                        <div class="fs-12 text-reset fw-normal">{{ $group->group_name }}</div>
                                                        <a href="{{ route('groups.show', $group->id) }}" class="mt-2 btn btn-sm bg-{{ $group->status == 'active' ? 'success' : ($group->status == 'paused' ? 'warning' : ($group->status == 'completed' ? 'secondary' : ($group->status == 'recruiting' ? 'info' : ($group->status == 'cancelled' ? 'danger' : 'secondary')))) }} text-white d-inline-block">
                                                            @if ($group->status == 'active')
                                                                {{ __('messages.general.active')}}
                                                            @elseif ($group->status == 'paused')
                                                                {{ __('messages.general.suspended')}}
                                                            @elseif ($group->status == 'completed')
                                                                {{ __('students.finished')}}
                                                            @elseif ($group->status == 'recruiting')
                                                                {{ __('students.new_group')}}
                                                            @elseif ($group->status == 'cancelled')
                                                                {{ __('messages.general.cenceled')}}
                                                            @else
                                                                {{ __('students.unknown')}}
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            @endforeach

                                            

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="notificationsTab" role="tabpanel">
                                    <div class="table-responsive">
                                            <div class="alert alert-dismissible m-4 p-4 d-flex alert-soft-teal-message" role="alert">
                                                <div class="me-4 d-none d-md-block">
                                                    <i class="feather feather-alert-octagon fs-1"></i>
                                                </div>
                                                <div>
                                                    <p class="fw-bold mb-1 text-truncate-1-line">{{ __('sidebar.general.comming_son')}} </p>
                                                    <p class="fs-12 fw-medium text-truncate-1-line">Bu yurda - <strong>Notificationlar jo'natish</strong> imkoniyati qo'shiladi.</p>
                                                    <a href="javascript:void(0);" class="badge bg-teal text-white d-inline-block">v1.0</a> >
                                                    <a href="javascript:void(0);" class="badge bg-soft-teal text-teal d-inline-block">v1.5</a>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('students.des')}} </th>
                                                    <th class="wd-250 text-end">{{ __('students.actions')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.successful_payments')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.notification_payment')}}</small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-1-vs4k" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail" selected="" data-select2-id="select2-data-3-a54x">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-2-tobo" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ln9d-container" aria-controls="select2-ln9d-container"><span class="select2-selection__rendered" id="select2-ln9d-container" role="textbox" aria-readonly="true" title="Email"><span class="hstack gap-3"><i class=" feather-mail"></i> Email</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.payment_dispute')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.dispute_title')}}. </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-4-n7u3" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off" selected="" data-select2-id="select2-data-6-rb5c">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-5-nwaa" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-93wd-container" aria-controls="select2-93wd-container"><span class="select2-selection__rendered" id="select2-93wd-container" role="textbox" aria-readonly="true" title="Deactivate"><span class="hstack gap-3"><i class=" feather-bell-off"></i> Deactivate</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.payment_alert')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.payment_title2')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-7-0xag" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell" selected="" data-select2-id="select2-data-9-hdhp">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-8-wfub" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-3fk0-container" aria-controls="select2-3fk0-container"><span class="select2-selection__rendered" id="select2-3fk0-container" role="textbox" aria-readonly="true" title="Push"><span class="hstack gap-3"><i class=" feather-bell"></i> Push</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.invoice_payments')}} </div>
                                                        <small class="fs-12 text-muted">{{ __('students.invoice_payments_title')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-10-r7mx" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail" selected="" data-select2-id="select2-data-12-6hgq">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-11-pd0t" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-s3xi-container" aria-controls="select2-s3xi-container"><span class="select2-selection__rendered" id="select2-s3xi-container" role="textbox" aria-readonly="true" title="Email"><span class="hstack gap-3"><i class=" feather-mail"></i> Email</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.raiting_des')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.raiting_title')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-13-mmxk" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off" selected="" data-select2-id="select2-data-15-zctr">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-14-gwlv" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-8yxh-container" aria-controls="select2-8yxh-container"><span class="select2-selection__rendered" id="select2-8yxh-container" role="textbox" aria-readonly="true" title="Deactivate"><span class="hstack gap-3"><i class=" feather-bell-off"></i> Deactivate</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.item_notification_des')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.item_notification_title')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-16-hhoz" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone" selected="" data-select2-id="select2-data-18-9lf0">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-17-5f38" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-9l44-container" aria-controls="select2-9l44-container"><span class="select2-selection__rendered" id="select2-9l44-container" role="textbox" aria-readonly="true" title="SMS + Push + Email"><span class="hstack gap-3"><i class=" feather-smartphone"></i> SMS + Push + Email</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.item_comment_notifications')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.item_comment_notifications_title')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-19-e2rr" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone" selected="" data-select2-id="select2-data-21-u0jq">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-20-nggf" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-lbr3-container" aria-controls="select2-lbr3-container"><span class="select2-selection__rendered" id="select2-lbr3-container" role="textbox" aria-readonly="true" title="SMS + Email"><span class="hstack gap-3"><i class=" feather-smartphone"></i> SMS + Email</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.team_comment_notifications')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.team_comment_notifications_title')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-22-lot2" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail" selected="" data-select2-id="select2-data-24-u7zb">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-23-z2kp" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-rkfj-container" aria-controls="select2-rkfj-container"><span class="select2-selection__rendered" id="select2-rkfj-container" role="textbox" aria-readonly="true" title="Email + Push"><span class="hstack gap-3"><i class=" feather-mail"></i> Email + Push</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.item_review_notifications')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.item_review_notifications_title')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-25-nk29" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off" selected="" data-select2-id="select2-data-27-6uxl">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-26-2vtm" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-1rth-container" aria-controls="select2-1rth-container"><span class="select2-selection__rendered" id="select2-1rth-container" role="textbox" aria-readonly="true" title="Deactivate"><span class="hstack gap-3"><i class=" feather-bell-off"></i> Deactivate</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark"> {{ __('students.review_notifications')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.review_notifications_title')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-28-5fup" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone" selected="" data-select2-id="select2-data-30-0qvu">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-29-nk4v" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-7ozi-container" aria-controls="select2-7ozi-container"><span class="select2-selection__rendered" id="select2-7ozi-container" role="textbox" aria-readonly="true" title="SMS + Push"><span class="hstack gap-3"><i class=" feather-smartphone"></i> SMS + Push</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.expiring_support_not')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.expiring_support_not_title')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-31-rriw" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail" selected="" data-select2-id="select2-data-33-vp11">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-32-qbo6" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-peao-container" aria-controls="select2-peao-container"><span class="select2-selection__rendered" id="select2-peao-container" role="textbox" aria-readonly="true" title="Email"><span class="hstack gap-3"><i class=" feather-mail"></i> Email</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">{{ __('students.daily_summary_emails')}}</div>
                                                        <small class="fs-12 text-muted">{{ __('students.daily_summary_emails_title')}} </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control select2-hidden-accessible" data-select2-selector="icon" data-select2-id="select2-data-34-mqfa" tabindex="-1" aria-hidden="true">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell" selected="" data-select2-id="select2-data-36-09ku">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="select2-data-35-f469" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-s58j-container" aria-controls="select2-s58j-container"><span class="select2-selection__rendered" id="select2-s58j-container" role="textbox" aria-readonly="true" title="Push"><span class="hstack gap-3"><i class=" feather-bell"></i> Push</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <div class="notify-activity-section">
                                        <div class="px-4 mb-4 d-flex justify-content-between">
                                            <h5 class="fw-bold">Account Activity</h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">{{ __('messages.general.all')}} </a>
                                        </div>
                                        <div class="px-4">
                                            <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                                <div class="hstack me-4">
                                                    <div class="avatar-text">
                                                        <i class="feather-message-square"></i>
                                                    </div>
                                                    <div class="ms-4">
                                                        <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('students.des1')}}</a>
                                                        <div class="fs-12 text-muted text-truncate-1-line">{{ __('students.title1')}}</div>
                                                    </div>
                                                </div>
                                                <div class="form-check form-switch form-switch-sm">
                                                    <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchComment"></label>
                                                    <input class="form-check-input c-pointer" type="checkbox" id="formSwitchComment">
                                                </div>
                                            </div>
                                            <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                                <div class="hstack me-4">
                                                    <div class="avatar-text">
                                                        <i class="feather-briefcase"></i>
                                                    </div>
                                                    <div class="ms-4">
                                                        <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('students.des2')}}</a>
                                                        <div class="fs-12 text-muted text-truncate-1-line">{{ __('students.title2')}}</div>
                                                    </div>
                                                </div>
                                                <div class="form-check form-switch form-switch-sm">
                                                    <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchReplie"></label>
                                                    <input class="form-check-input c-pointer" type="checkbox" id="formSwitchReplie">
                                                </div>
                                            </div>
                                            <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                                <div class="hstack me-4">
                                                    <div class="avatar-text">
                                                        <i class="feather-briefcase"></i>
                                                    </div>
                                                    <div class="ms-4">
                                                        <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('students.des3')}}</a>
                                                        <div class="fs-12 text-muted text-truncate-1-line">{{ __('students.title3')}}</div>
                                                    </div>
                                                </div>
                                                <div class="form-check form-switch form-switch-sm">
                                                    <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchFollow"></label>
                                                    <input class="form-check-input c-pointer" type="checkbox" id="formSwitchFollow">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="connectionTab" role="tabpanel">
                                    <div class="development-connections p-4 pb-0">
                                        <div class="alert alert-dismissible m-4 p-4 d-flex alert-soft-teal-message" role="alert">
                                                <div class="me-4 d-none d-md-block">
                                                    <i class="feather feather-alert-octagon fs-1"></i>
                                                </div>
                                                <div>
                                                    <p class="fw-bold mb-1 text-truncate-1-line">{{ __('sidebar.general.comming_son')}} </p>
                                                    <p class="fs-12 fw-medium text-truncate-1-line">Bu yurda - <strong>connectionlar jo'natish</strong> imkoniyati qo'shiladi.</p>
                                                    <a href="javascript:void(0);" class="badge bg-teal text-white d-inline-block">v1.0</a> >
                                                    <a href="javascript:void(0);" class="badge bg-soft-teal text-teal d-inline-block">v1.5</a>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold">{{ __('groups.developement_connections')}} :</h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">{{ __('messages.general.all')}} </a>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/google-drive.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_google_drive')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_google_drive')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchGDrive"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchGDrive">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/dropbox.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_dropbox')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_dropbox')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchDropbox"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchDropbox" checked="">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/github.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_github')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_github')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchGitHub"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchGitHub" checked="">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/gitlab.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_gitlab')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_gitlab')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchGitLab"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchGitLab">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/shopify.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_shopify')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_shopify')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchShopify"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchShopify" checked="">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/whatsapp.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_whatsapp')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_whatsapp')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchWhatsApp"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchWhatsApp">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="social-connections px-4 mb-4">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold">{{ __('groups.social_contents')}}:</h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">{{ __('messages.general.all')}} </a>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/facebook.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_facebook')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_facebook')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchFacebook"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchFacebook" checked="">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/instagram.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_insta')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_insta')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchInstagram"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchInstagram">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/twitter.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_twitter')}} </a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_twitter')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchTwitter"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchTwitter" checked="">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/spotify.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_spotify')}} </a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_spotify')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchSpotify"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchSpotify" checked="">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/youtube.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_youtube')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_youtube')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchYouTube"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchYouTube">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="assets/images/brand/pinterest.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_pinterest')}}</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title_pinterest')}}</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchPinterest"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchPinterest" checked="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade p-4" id="securityTab" role="tabpanel">
                                    <div class="p-4 mb-4 border border-dashed border-gray-3 rounded-1">
                                        <h6 class="fw-bolder"><a href="javascript:void(0);">{{ __('groups.des_auth2')}}</a></h6>
                                        <div class="fs-12 text-muted text-truncate-3-line mt-2 mb-4">{{ __('groups.title_auth2')}}</div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer" for="2faVerification">{{ __('groups.label_auth2')}}</label>
                                            <input class="form-check-input c-pointer" type="checkbox" id="2faVerification" checked="">
                                        </div>
                                    </div>
                                    <div class="p-4 mb-4 border border-dashed border-gray-3 rounded-1">
                                        <h6 class="fw-bolder"><a href="javascript:void(0);">{{ __('groups.des_verification')}}</a></h6>
                                        <div class="fs-12 text-muted text-truncate-3-line mt-2 mb-4">{{ __('groups.title_verification')}}</div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer" for="secondaryVerification">{{ __('groups.label_verification')}}</label>
                                            <input class="form-check-input c-pointer" type="checkbox" id="secondaryVerification" checked="">
                                        </div>
                                    </div>
                                    <div class="p-4 mb-4 border border-dashed border-gray-3 rounded-1">
                                        <h6 class="fw-bolder"><a href="javascript:void(0);">{{ __('groups.des_backupcodes')}}</a></h6>
                                        <div class="fs-12 text-muted text-truncate-3-line mt-4 mb-4">{{ __('groups.title_backupcodes')}}</div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer" for="generateBackup">{{ __('groups.label_backupcodes')}}</label>
                                            <input class="form-check-input c-pointer" type="checkbox" id="generateBackup">
                                        </div>
                                    </div>
                                    <div class="p-4 border border-dashed border-gray-3 rounded-1">
                                        <h6 class="fw-bolder"><a href="javascript:void(0);">{{ __('groups.des_login_verf')}}</a></h6>
                                        <div class="fs-12 text-muted text-truncate-3-line mt-2 mb-4">{{ __('groups.title_login_verf')}}</div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer" for="loginVerification">{{ __('groups.label_login_verf')}}</label>
                                            <input class="form-check-input c-pointer" type="checkbox" id="loginVerification" checked="">
                                        </div>
                                    </div>
                                    <hr class="my-5">
                                    <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-danger-message" role="alert">
                                        <div class="me-4 d-none d-md-block">
                                            <i class="feather feather-alert-triangle text-danger fs-1"></i>
                                        </div>
                                        <div>
                                            <p class="fw-bold mb-0 text-truncate-1-line">{{ __('groups.message1')}}</p>
                                            <p class="text-truncate-3-line mt-2 mb-4">{{ __('groups.message2')}}</p>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger d-inline-block">Learn more</a>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body">
                                            <h6 class="fw-bold">{{ __('groups.delete_account')}}</h6>
                                            <p class="fs-11 text-muted">{{ __('groups.delete_account_title')}}:</p>
                                            <div class="my-4 py-2">
                                                <input type="password" class="form-control" placeholder="Enter your password">
                                                <div class="mt-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="acDeleteDeactive">
                                                        <label class="custom-control-label c-pointer" for="acDeleteDeactive">{{ __('groups.delete_account_label')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-flex gap-2">
                                                <a href="javascript:void(0);" class="btn btn-danger" data-action-target="#acSecctingsActionMessage">{{ __('groups.delete_account')}}</a>
                                                <a href="javascript:void(0);" class="btn btn-warning mt-2 mt-sm-0 successAlertMessage">{{ __('groups.deactiveted_account')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    <x-footer></x-footer>
    </main> 

        <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
        <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
        <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
    @endsection
