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
                        <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="/admin/employee/index">{{ __('messages.students.list')}}</a></li>
                        <li class="breadcrumb-item">{{ $user->last_name }}</li>
                        
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
                            <a href="{{ route('user.edit', $user->id ?? '#') }}" class="btn btn-light-brand">
                                <i class="feather-edit me-2"></i>
                                <span>{{ __('messages.general.edit')}}</span>
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
                                            <img src="assets/images/avatar/1.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="top: 76%; right: 10px">
                                            <i class="bi bi-patch-check-fill"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <a href="javascript:void(0);" class="fs-14 fw-bold d-block">{{ $user->first_name }} {{ $user->last_name }}</a>
                                        <a href="javascript:void(0);" onclick="copyToClipboard('{{ $user->email }}')" class="ms-2 text-muted successAlertMessage">
                                            ID: {{ $user->pinfl }} <i class="fa fa-copy"></i>
                                        </a>
                                    </div>

                                    <div class="fs-12 fw-normal text-muted text-left d-flex flex-wrap gap-3 mb-4">
                                        @php
                                            $totalAmount = 0;
                                        @endphp

                                        <!-- user = student [ studentni billingga bog'langan integratsiyasi keladi]  -->

                                        @php
                                            $status = $totalAmount >= 0 ? 'active' : 'non active';
                                            $cardClass = $totalAmount >= 0 ? 'bg-soft-success text-success border-success border-dashed' : 'bg-soft-danger text-danger border-danger border-dashed';
                                            $badgeClass = $totalAmount >= 0 ? 'ms-2 btn btn-sm bg-success text-white d-inline-block' : 'ms-2 btn btn-sm bg-danger text-white d-inline-block';
                                        @endphp

                                        <div class="col-12 p-4 d-xxl-flex d-xl-block d-md-flex rounded border {{ $cardClass }} text-start">
                                            <div>
                                                <div class="fs-14 fw-bold">Balance
                                                    <a href="javascript:void(0);" class="{{ $badgeClass }}">{{ $status }}</a>
                                                </div>
                                                <div class="fs-20">
                                                    <span class="fw-bold">{{ number_format($totalAmount, 0, ',', ' ') }}</span>
                                                    <em class="fs-11 fw-medium">UZS</em>
                                                </div>
                                                
                                                <!-- Amount kelishi kerak
                                                    
                                                 -->
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="hstack justify-content-between mb-4">
                                        <span class="text-muted fw-medium hstack gap-3"><i class="feather-map-pin"></i>{{ __('messages.general.address')}}</span>
                                        <a href="javascript:void(0);" class="float-end">{{ $user->address }}</a>
                                    </li>
                                    <li class="hstack justify-content-between mb-4">
                                        <span class="text-muted fw-medium hstack gap-3"><i class="feather-phone"></i>{{ __('messages.general.phone')}}</span>
                                        <a href="javascript:void(0);" class="float-end">{{ $user->phone_number }}</a>
                                    </li>
                                    <li class="hstack justify-content-between mb-0">
                                        <span class="text-muted fw-medium hstack gap-3"><i class="feather-mail"></i>{{ __('students.birth')}}</span>
                                        <a href="javascript:void(0);" class="float-end">{{ $user->brith_date  ?? 2004}}</a>
                                    </li>
                                </ul>

                                    <div class="d-flex gap-2 text-center pt-4">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post" class="btn-form w-50">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light-brand w-100 h-100 align-items-center" onclick="return confirm('Are you sure you want to delete this student?');">
                                                <i class="feather-trash-2 me-2"></i>
                                                <span>{{ __('messages.general.delete')}}</span>
                                            </button>
                                        </form>
                                        <a href="{{ route('user.edit', $user->id ?? '#') }}" class="w-50 btn btn-primary h-100 align-items-center" 
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
                                        <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#overviewTab" role="tab">{{ __('messages.general.information')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#billingOrder" role="tab">{{ __('branch.billing')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#activityTab" role="tab">{{ __('messages.courses.information')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#notificationsTab" role="tab">Notifications <span class="badge bg-soft-danger text-danger">comming son </span></a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#connectionTab" role="tab">Connection <span class="badge bg-soft-danger text-danger">comming son </span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">
                                    <div class="profile-details mb-5">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">{{ __('students.profile_inf')}}:</h5>
                                            <a href="{{ route('user.edit', $user->id ?? '#') }}" class="btn btn-sm btn-light-brand">{{ __('messages.general.edit')}}</a>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">PINFL:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $user->pinfl }}</div>
                                        </div>                                 
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('messages.general.phone')}}:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $user->phone_number }}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('messages.general.address')}}:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $user->address }}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('messages.general.role')}}:</div>
                                            <div class="col-sm-6 fw-semibold">
                                                @if($user->role== 0)
                                                    {{ __('messages.general.admin')}}
                                                    @elseif($user->role== 1)
                                                    {{ __('messages.students.student')}}
                                                    @elseif($user->role== 2)
                                                    {{ __('messages.students.teacher')}}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('messages.general.role')}}:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $user->specialization }}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('students.date_arrival')}}:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $user->created_at->format('Y-m-d') }}</div>
                                        </div>
                                        <div class="row g-0 mb-4">
                                            <div class="col-sm-6 text-muted">{{ __('students.last_update')}}:</div>
                                            <div class="col-sm-6 fw-semibold">{{ $user->updated_at->format('Y-m-d') }}</div>
                                        </div>
                                    </div>
                                    
                                    <div class="container mt-4">
                                    @php
                                        $updatedAt = \Carbon\Carbon::parse($user->updated_at);
                                        $needsUpdateReminder = $updatedAt->diffInDays(\Carbon\Carbon::now()) > 30;
                                    @endphp

                                    <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-warning-message profile-overview-alert {{ $needsUpdateReminder ? 'd-block' : 'd-none' }}" role="alert">
                                        <div class="me-4 d-none d-md-block">
                                            <i class="feather feather-alert-triangle fs-1"></i>
                                        </div>
                                        <div>
                                            <p class="fw-bold mb-1 text-truncate-1-line">{{ __('students.profile30')}}</p>
                                            <p class="fs-10 fw-medium text-uppercase text-truncate-1-line">Last Update: <strong>{{ $updatedAt->format('d M, Y') }}</strong></p>
                                            <a href="{{ route('students.edit', $student->id ?? '#') }}" class="btn btn-sm bg-soft-warning text-warning d-inline-block">{{ __('students.update_now')}}</a>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="billingOrder" role="tabpanel">
                                <div class="subscription-plan px-4 pt-4">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">{{ __('students.payment_inf')}}</h5>
                                        </div>
                                        <!--
                                        <div class="p-4 mb-4 d-xxl-flex d-xl-block d-md-flex align-items-center justify-content-between gap-4 border border-dashed border-gray-5 rounded-1">
                                            <div>
                                                <div class="fs-14 fw-bold text-dark mb-1">Hisob raqamingiz:</div>
                                            </div>
                                            <div class="my-3 my-xxl-0 my-md-3 my-md-0">
                                                <div class="fs-20 text-dark">
                                                    <a href="javascript:void(0);" onclick="copyToClipboard('{{ $user->email }}')" class="text-muted successAlertMessage">
                                                        {{ $user->pinfl }} <i class="fa fa-copy"></i>
                                                    </a>
                                                </div>
                                                <div class="fs-12 text-muted mt-1">To'lovlarni amalga oshirganda ushbu raqamni kiriting</div>
                                            </div>
                                            <div class="hstack gap-3">
                                                <a href="javascript:void(0);" class="btn btn-light-brand">View transaction</a>
                                            </div>
                                        </div>
                                        
                                         -->
                                    </div>
                                    <div class="payment-history">
                                        <div class="my-4 px-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">Invoice:</h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">{{ __('messages.general.all ')}}</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="">
                                                    <tr>
                                                        <th>{{ __('messages.general.name ')}} {{ __('messages.general.last_name')}}</th>
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
                                                            <td class="fw-bold">
                                                                {{ $invoice->student->first_name }}
                                                            </td>
                                                            <td class="text-start">
                                                                <span class="badge bg-soft-primary text-primary text-start">
                                                                    {{ $invoice->group->courses->course_name }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="d-flex align-items-center">
                                                                    {{ $invoice->amount ? number_format($invoice->amount, 0, '.', ' ') : 'N/A' }} UZS
                                                                </span>
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
                                                                    <form action="#" method="POST" onsubmit="return confirm('Ochirishga ruxsat berasizmi')" class="mb-0">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="avatar-text avatar-md delete-branch text-dark">
                                                                            <i class="feather-trash-2"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">{{ __('messages.general.not_found')}} ...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    <hr class="mt-5">
                                    <div class="payment-history">
                                        <div class="my-4 px-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">{{ __('students.payment')}} :</h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">{{ __('messages.general.all')}}</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="paymentList" aria-describedby="paymentList_info">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('messages.general.name')}} {{ __('messages.general.last_name')}}</th>
                                                        <th>{{ __('messages.general.type')}}</th>
                                                        <th>{{ __('messages.general.sum')}}</th>
                                                        <th>{{ __('messages.general.time')}}</th>
                                                        <th>{{ __('messages.general.status')}}</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($transactions as $payment)
                                                        <tr class="single-item odd" style="font-size: 10px;">
                                                            <td class="fw-bold">
                                                                {{ $payment->student->first_name }}
                                                            </td>
                                                            <td>
                                                                @if($payment->type == 'cash')
                                                                    <span class="text-start">Naqd</span>                                                            
                                                                @else
                                                                    <span class="text-start">Naqd</span>      
                                                                    <!--  <img src="https://cdn.payme.uz/logo/payme_color.svg" alt="PAYME" style="width: 64px;"/> -->
                                                                @endif
                                                            </td>
                                                            <td class="text-dark">
                                                                {{ number_format($payment->amount, 0, '.', ' ') }} UZS
                                                            </td>
                                                            <td>
                                                                <span class="d-flex align-items-center text-dark">{{ (new DateTime($payment->paycom_time_datetime))->format('d F Y, H:i') }}</span>
                                                            </td>
                                                            <td>
                                                                <!--  @if($payment->state == '1')
                                                                        <div class="badge bg-soft-warning text-warning">Kutilayabdi</div>
                                                                    @elseif($payment->state == '2')
                                                                        <div class="badge bg-soft-success text-success">To'landi</div>
                                                                    @elseif($payment->state == '-2')
                                                                        <div class="badge bg-soft-danger text-danger">Bekor qilindi</div>
                                                                @endif  -->
                                                                <div class="badge bg-soft-success text-success">{{ __('messages.group.paid')}}</div>
                                                            </td>
                                                            <td class="">
                                                                <div class="hstack gap-2 d-flex justify-content-end">
                                                                    <a href="{{ route('students.show', $payment->student->id) }}" class="avatar-text avatar-md">
                                                                        <i class="feather-eye"></i>
                                                                    </a>
                                                                    <a href="{{ route('students.edit', $payment->student->id) }}" class="avatar-text avatar-md">
                                                                        <i class="feather-edit-3"></i>
                                                                    </a>
                                                                    <form action="{{ route('students.destroy', $payment->student->id) }}" method="POST" onsubmit="return confirm('Ochirishga ruxsat berasizmi')" class="mb-0">
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
                                                            <td colspan="6" class="text-center">{{ __('messages.general.not_found')}} ...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                        </div>

                                    </div>

                                    <!-- Teacher's Students List
                                    
                                    <div class="teacher-students">
                                        <div class="my-4 px-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">O'qituvchiga biriktirilgan studentlar:</h5>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="studentList" aria-describedby="studentList_info">
                                                <thead>
                                                    <tr>
                                                        <th>Ism</th>
                                                        <th>Familiya</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($teacherStudents as $student)
                                                        <tr class="single-item odd" style="font-size: 10px;">
                                                            <td class="fw-bold">
                                                                {{ $student->first_name }}
                                                            </td>
                                                            <td>
                                                                {{ $student->last_name }}
                                                            </td>
                                                            <td>
                                                                {{ $student->email }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                     -->

                                </div>

      

                                    <div class="tab-pane fade" id="activityTab" role="tabpanel">
                                        <div class="recent-activity p-4 pb-0">
                                            <div class="mb-4 pb-2 d-flex justify-content-between">
                                                <h5 class="fw-bold">{{ __('students.available_courses')}}:</h5>
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
                                                                        {{ __('branch.completed')}}
                                                                    @elseif ($group->status == 'recruiting')
                                                                        {{ __('messages.group.new_groups')}}
                                                                    @elseif ($group->status == 'cancelled')
                                                                        {{ __('messages.general.cenceled')}}
                                                                    @else
                                                                        {{ __('messages.general.not_found')}}
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
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
