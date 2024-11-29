<!-- show.blade.php --> 
@extends('layouts.layout') 
@section('content') 
<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;"> 

@php 
  $totalInvoices = $totalAmountInvoises; 
  $totalTransactions = $totaltransaction; 
  $unpaidAmount = $totalInvoices - $totalTransactions; 
  $courseFee = $group->courses->cost; 
  $unpaidPercentage = ($totalInvoices > 0) ? ($unpaidAmount / $totalInvoices) * 100 : 0; 
  $paidPercentage = ($totalInvoices > 0) ? ($totalTransactions / $totalInvoices) * 100 : 0; 
@endphp 

<div class="nxl-content" style="display: flex; flex-direction: column; justify-content: space-between;">
    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/admin/dashboard"> {{ __('messages.group.home')}} </a>
          </li>
          <li class="breadcrumb-item">
            <a href="/admin/groups"> {{ __('messages.group.groups')}} </a>
          </li>
          <li class="breadcrumb-item">{{ $group->group_name }}</li>
        </ul>
      </div>
      <div class="page-header-right ms-auto">
        <div class="page-header-right-items">
          <div class="d-flex d-md-none">
            <a href="javascript:void(0)" class="page-header-right-close-toggle">
              <i class="feather-arrow-left me-2"></i>
              <span> {{ __('messages.group.back')}} </span>
            </a>
          </div>
          <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-light-brand">
              <i class="feather-edit me-2"></i>
              <span> {{ __('groups.edit')}} </span>
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
                <div class="mb-4">
                  <a href="javascript:void(0);" class="fs-14 fw-bold d-block">{{ $group->group_name }}</a>
                  </a>
                </div>
                <div class="fs-12 fw-normal text-muted text-left d-flex flex-wrap gap-3 mb-4">
                  <div class="col-12 p-4 d-xxl-flex d-xl-block d-md-flex rounded border bg-soft-success text-success border-success border-dashed text-start">
                    <div>
                      <div class="fs-14 fw-bold"> {{ __('groups.balance')}}
                        <a href="javascript:void(0);" class="ms-2 btn btn-sm bg-success text-white d-inline-block"> {{ __('groups.active')}} </a>
                      </div>
                      <div class="fs-20">
                        <span class="fw-bold">0</span>
                        <em class="fs-11 fw-medium">UZS</em>
                      </div>
                      <div class="fs-12 text-muted mt-1"> {{ __('groups.lastPayment')}} </div>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-unstyled mb-4">
                <li class="hstack justify-content-between mb-4">
                  <span class="text-muted fw-medium hstack gap-3">
                    <i class="feather-map-pin"></i> {{ __('messages.branch.branch')}}
                  </span>
                  <a href="javascript:void(0);" class="float-end">{{$group->branch->name}}</a>
                </li>
                <li class="hstack justify-content-between mb-4">
                  <span class="text-muted fw-medium hstack gap-3">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    {{ __('groups.teacher')}}
                  </span>
                  <a href="" class="float-end">{{$group->teachers->last_name}} {{$group->teachers->first_name}}</a>
                </li>
                <li class="hstack justify-content-between mb-4">
                  <span class="text-muted fw-medium hstack gap-3">
                    <i class="fa-solid fa-phone-volume"></i>
                    {{ __('groups.teacherNumber')}}
                  </span>
                  <a href="" class="float-end"> {{$group->teachers->phone_number}}</a>
                </li>
                <li class="hstack justify-content-between mb-4">
                  <span class="text-muted fw-medium hstack gap-3">
                    <i class="fa-brands fa-leanpub"></i> {{ __('groups.course_name')}}
                  </span>
                  <a href="javascript:void(0);" class="float-end">{{$group->courses->course_name}} </a>
                </li>
                <li class="hstack justify-content-between mb-4">
                  <span class="text-muted fw-medium hstack gap-3">
                    <i class="fa-solid fa-clock"></i> {{ __('groups.lesson_time')}}
                  </span>
                  <a href="javascript:void(0);" class="float-end"> @php $startTime = \Carbon\Carbon::parse( old('start_time', $group->start_time), )->format('H:i'); $endTime = \Carbon\Carbon::parse( old('end_time', $group->end_time), )->format('H:i'); @endphp {{ $startTime }} - {{ $endTime }}
                  </a>
                </li>
                <li class="hstack justify-content-between mb-"></li>
              </ul>
              <div class="d-flex gap-2 text-center pt-4">
                <form id="deleteForm" action="{{ route('groups.destroy', $group->id ?? '#') }}" method="POST" class="btn-form w-50" onsubmit="confirmDelete(event)"> @csrf @method('DELETE') <button id="deleteButton" class="btn btn-light-brand w-100 h-100 align-items-center" type="submit" onsubmit="confirmDelete(event)">
                    <i class="feather-trash-2"></i>
                    <span> {{ __('groups.delete')}} </span>
                  </button>
                </form>
                <a href="{{ route('groups.edit', $group->id) }}" class="w-50 btn btn-primary h-100 align-items-center" style="padding: 16px 16px; font-size: 10px;">
                  <i class="feather-edit me-2"></i>
                  <span> {{ __('groups.edit_profile')}} </span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-8 col-xl-6">
          <div class="card border-top-0">
            <div class="card-header p-0">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs d-flex" id="myTab" role="tablist">
                <li class="nav-item flex-fill border-top" role="presentation">
                  <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#overviewTab" role="tab"> {{ __('groups.information')}} </a>
                </li>
                <li class="nav-item flex-fill border-top" role="presentation">
                  <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#student" role="tab"> {{ __('groups.student')}}
                  </a>
                </li>
                <li class="nav-item flex-fill border-top" role="presentation">
                  <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#billingOrder" role="tab"> {{ __('groups.billing')}}
                  </a>
                </li>
                <li class="nav-item flex-fill border-top" role="presentation">
                  <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#attendance" role="tab"> {{ __('groups.attendance')}} </a>
                </li>
                <li class="nav-item flex-fill border-top" role="presentation">
                  <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#notificationsTab" role="tab"> {{ __('groups.notification')}}
                    <span class="badge bg-soft-danger text-danger">comming son </span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">
                <div class="profile-details mb-5">
                  <div class="mb-4 d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0">{{ __('messages.group.information')}} :</h5>
                    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-light-brand">{{ __('groups.change')}} </a>
                  </div>
                  <div class="row g-0 mb-4">
                    <span class=" col-sm-6"> {{ __('groups.number_students')}} :</span>
                    <div class="col-sm-6 ">
                      <div class="d-flex align-items-center">
                        <span class="fw-semibold me-2">{{ $group->enrollments->count() }} / {{ $group->limit }} ta</span>
                        <div class="progress flex-grow-1" style="height: 15px; max-width: 150px;"> 
                        @php 
                        $enrollmentsCount = $group->enrollments->count(); 
                        $limit = $group->limit; 
                        $progress = $limit > 0 ? ($enrollmentsCount / $limit) * 100 : 0; 
                        // Determine the color class for the progress bar 
                        $progressBarClass = 'bg-primary'; 
                        // Default color if ($progress >= 75) { $progressBarClass = 'bg-success'; } elseif ($progress >= 50) { $progressBarClass = 'bg-warning'; } elseif ($progress >= 25) { $progressBarClass = 'bg-info'; } else { $progressBarClass = 'bg-danger'; } 
                        @endphp 
                        <div class="progress-bar {{ $progressBarClass }}" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%; position: relative;">
                            <span class="d-flex justify-content-center align-items-center w-100 text-white" style="font-size: 9px; right: -2px; position: absolute;">{{ number_format($progress, 0) }}%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row g-0 mb-4">
                    <div class="col-sm-6 text-muted"> {{ __('groups.address')}} :</div>
                    <div class="col-sm-6 fw-semibold">{{$group->branch->region->name}} {{$group->branch->district->name}}</div>
                  </div>
                  <div class="row g-0 mb-4">
                    <div class="col-sm-6 text-muted">{{ __('groups.opening_date')}} :</div>
                    <div class="col-sm-6 fw-semibold">{{ \Carbon\Carbon::parse($group->created_at)->format('j F Y') }}</div>
                  </div>
                  <div class="row g-0 mb-4 d-none">
                    <div class="col-sm-6 text-muted">{{ __('groups.closing_date')}} :</div>
                    <div class="col-sm-6 fw-semibold">2024-08-01 11:55:17</div>
                  </div>
                  <div class="row g-0 mb-4">
                    <div class="col-sm-6 text-muted">{{ __('groups.lesson_duration')}} :</div>
                    <div class="col-sm-6 fw-semibold">2 {{ __('groups.hours')}} </div>
                  </div>
                  <div class="row g-0 mb-4">
                    <div class="col-sm-6 text-muted">{{ __('groups.course_duration')}} :</div>
                    <div class="col-sm-6 fw-semibold">{{$group->courses->duration}} {{ __('groups.month')}} </div>
                  </div> 
                  @php 
                  $months = $group->courses->duration; 
                  // Number of months 
                  $classDaysPerWeek = 3; 
                  // Number of class days per week 
                  // Calculate total weeks and total class days 
                  $totalWeeks = $months * 4.33; 
                  $totalClassDays = $totalWeeks * $classDaysPerWeek; 
                  @endphp 
                  <div class="row g-0 mb-4">
                    <div class="col-sm-6 text-muted"> {{ __('groups.total_number_lessons')}} :</div>
                    <div class="col-sm-6 fw-semibold">{{ number_format($totalClassDays) }} {{ __('groups.day')}} </div>
                  </div>
                  <div class="row g-0 mb-4">
                    <div class="col-sm-6 text-muted"> {{ __('groups.total_hours_lessons')}} :</div>
                    <div class="col-sm-6 fw-semibold">{{ number_format($totalClassDays)*2 }} {{ __('groups.hours')}} </div>
                  </div>
                </div>
                <div class="container mt-4">
                  <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-warning-message profile-overview-alert d-none" role="alert">
                    <div class="me-4 d-none d-md-block">
                      <i class="feather feather-alert-triangle fs-1"></i>
                    </div>
                    <div>
                      <p class="fw-bold mb-1 text-truncate-1-line"> {{ __('groups.profile_update30')}} </p>
                      <p class="fs-10 fw-medium text-uppercase text-truncate-1-line">Last Update: <strong>01 Aug, 2024</strong>
                      </p>
                      <a href="https://academy.dora.uz/admin/students/2/edit" class="btn btn-sm bg-soft-warning text-warning d-inline-block"> {{ __('groups.update_now')}} </a>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="student" role="tabpanel">
                <div class="recent-activity">
                  <div class="my-4 px-4 d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0"> {{ __('messages.group.students')}} </h5>
                    <a href="{{ route('studentStoreGet', $group->id) }}" class="btn btn-sm btn-primary">
                      <i class="fa-solid fa-user-plus">&nbsp;</i> {{ __('groups.add_students')}}
                    </a>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover" id="studentList">
                      <thead>
                        <tr>
                          <th> {{ __('groups.first_last_name')}} </th>
                          <th> {{ __('groups.phone')}} </th>
                          <th> {{ __('messages.branch.branch')}} </th>
                          <th> {{ __('groups.general_account')}} </th>
                          <th class="text-end"> {{ __('groups.settings')}} </th>
                        </tr>
                      </thead>
                      <tbody> @forelse ($enrollments as $enrollment) <tr>
                          <td>
                            <a href="{{ route('students.show', $enrollment->student->id ?? '#') }}">
                              {{ $enrollment->student->first_name . ' ' . $enrollment->student->last_name }}
                            </a>
                          </td>
                          <td>
                            <a href="{{ route('students.show', $enrollment->student->id ?? '#') }}">
                              <span>
                                {{ $enrollment ? $enrollment->student->phone : 'N/A' }}
                              </span>
                            </a>
                          </td>
                          <td>
                            <a href="{{ route('branch.show', $enrollment->student->branch->id ?? '#') }}">
                              <span class="badge text-success border border-success border-dashed">
                                {{ $enrollment && $enrollment->student && $enrollment->student->branch ? $enrollment->student->branch->name : 'Mavjud emas' }}
                              </span>
                            </a>
                          </td>
                          <td> @php $totalAmount = 0; @endphp @if($enrollment && $enrollment->student->billing) @foreach($enrollment->student->billing as $billing) @php $totalAmount += $billing->amount; @endphp @endforeach @endif @php $amountColor = $totalAmount < 0 ? 'color: red;' : 'color: green;' ; @endphp <a href="{{ route('students.show', $enrollment->student->id ?? '#') }}">
                              <span style="{{ $amountColor }}">
                                {{ number_format($totalAmount, 0, ',', ' ') }} UZS </span>
                              </a>
                          </td>
                          <td>
                            <div class="hstack gap-2 justify-content-end">
                              <a href="{{ route('students.show', $enrollment->student->id ?? '#') }}" class="avatar-text avatar-md">
                                <i class="feather-eye"></i>
                              </a>
                              <form id="deleteForm" action="{{ route('students.destroy', $enrollment->id ?? '#') }}" method="POST" onsubmit="confirmDelete(event)"> @csrf @method('DELETE') <button id="deleteButton" class="avatar-text avatar-md delete-student text-dark" type="submit">
                                  <i class="feather-trash-2"></i>
                                </button>
                              </form>
                            </div>
                          </td>
                        </tr> @empty <tr>
                          <td colspan="5" class="text-center"> {{ __('messages.group.no_information')}} ...</td>
                        </tr> @endforelse </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="billingOrder" role="tabpanel">
                <div class="row p-4">
                  <!-- [Mini Card Invoices] start -->
                  <div class="col-xxl-4 col-sm-6 cdx-xxl-50">
                    <div class="card card-body">
                      <div class="hstack justify-content-between">
                        <div class="fw-bold text-dark">{{ __('messages.group.waiting')}} </div>
                        <div class="dropdown open">
                          <a href="javascript:void(0);" data-bs-toggle="dropdown">
                            <i class="feather-more-horizontal"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.daily')}} </a>
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.weekly')}}</a>
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.monthly')}}</a>
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.yearly')}}</a>
                          </div>
                        </div>
                      </div>
                      <div class="mt-5">
                        <div class="hstack justify-content-between">
                          <div class="fs-4 fw-bold text-dark">{{ number_format(round($totalAmountInvoises), 0, ',', ' ') }} UZS</div>
                          <div class="badge bg-soft-primary text-primary">
                            <span>100%</span>
                            <i class="feather-chevron-up fs-12 ms-1"></i>
                          </div>
                        </div>
                        <div class="progress ht-5 my-2">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                        <div class="fs-12 text-muted mt-3">Kurs puli: <span class="fw-bold text-dark">{{ number_format($courseFee, 0, ',', ' ') }} UZS</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xxl-4 col-sm-6 cdx-xxl-50">
                    <div class="card card-body">
                      <div class="hstack justify-content-between">
                        <div class="fw-bold text-dark">{{ __('messages.group.paid')}}</div>
                        <div class="dropdown open">
                          <a href="javascript:void(0);" data-bs-toggle="dropdown">
                            <i class="feather-more-horizontal"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.daily')}}</a>
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.weekly')}}</a>
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.monthly')}}</a>
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.yearly')}}</a>
                          </div>
                        </div>
                      </div>
                      <div class="mt-5">
                        <div class="hstack justify-content-between">
                          <div class="fs-4 fw-bold text-dark">{{ number_format(round($totaltransaction), 0, ',', ' ') }} UZS</div>
                          <div class="badge bg-soft-success text-success">
                            <span>{{ number_format($paidPercentage, 0) }}%</span>
                            <i class="feather-chevron-down fs-12 ms-1"></i>
                          </div>
                        </div>
                        <div class="progress ht-5 my-2">
                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $paidPercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $paidPercentage }}%"></div>
                        </div>
                        <div class="fs-12 text-muted mt-3">Kurs puli: <span class="fw-bold text-dark">{{ number_format($courseFee, 0, ',', ' ') }} UZS</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xxl-4 col-sm-6 cdx-xxl-50">
                    <div class="card card-body">
                      <div class="hstack justify-content-between">
                        <div class="fw-bold text-dark">{{ __('messages.group.unpaid')}}</div>
                        <div class="dropdown open">
                          <a href="javascript:void(0);" data-bs-toggle="dropdown">
                            <i class="feather-more-horizontal"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.daily')}}</a>
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.weekly')}}</a>
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.monthly')}}</a>
                            <a class="dropdown-item" href="javascript:void(0);">{{ __('groups.yearly')}}</a>
                          </div>
                        </div>
                      </div>
                      <div class="mt-5">
                        <div class="hstack justify-content-between">
                          <div class="fs-4 fw-bold text-dark">{{ number_format($unpaidAmount, 0, ',', ' ') }} UZS</div>
                          <div class="badge bg-soft-danger text-danger">
                            <span>{{ number_format($unpaidPercentage, 0) }}%</span>
                            <i class="feather-chevron-up fs-12 ms-1"></i>
                          </div>
                        </div>
                        <div class="progress ht-5 my-2">
                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $unpaidPercentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $unpaidPercentage }}%"></div>
                        </div>
                        <div class="fs-12 text-muted mt-3">Kurs puli: <span class="fw-bold text-dark">{{ number_format($courseFee, 0, ',', ' ') }} UZS</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- [Mini Card Invoices] end -->
                </div>
                <hr class="mt-1">
                <div class="payment-history">
                  <div class="my-4 px-4 d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0"> {{ __('messages.group.invoice')}}:</h5>
                    <a href="{{ route('invoice.create', ['group' => $group->id]) }}" class="btn btn-sm btn-primary">
                      <i class="fa-solid fa-plus">&nbsp; </i> Create invoice </a>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <tr>
                          <th>ID</th>
                          <th>{{ __('groups.first_last_name')}}</th>
                          <th>{{ __('groups.course_name')}}</th>
                          <th>Summa</th>
                          <th>{{ __('messages.general.time')}}</th>
                          <th>{{ __('messages.group.lifetime')}}</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody> @forelse($invoices as $invoice) <tr style="font-size: 10px;">
                          <td class="fw-bold">
                            {{ $invoice->id }}
                          </td>
                          <td>
                            {{$invoice->student->first_name}} {{$invoice->student->last_name}}
                          </td>
                          <td class="text-start">
                            <span class="badge bg-soft-primary text-primary text-start">{{$invoice->status}}</span>
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
                            <div class="hstack gap-2 d-flex justify-content-end">
                              <a href="{{route('invoices.show',$invoice->id)}}" class="avatar-text avatar-md">
                                <i class="feather-eye"></i>
                              </a>
                              <div class="dropdown">
                                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                        <i class="feather feather-more-horizontal"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="feather feather-edit-3 me-3"></i>
                                                <span>{{ __('groups.edit')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                <i class="feather feather-printer me-3"></i>
                                                <span>{{ __('groups.print')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="feather feather-clock me-3"></i>
                                                <span>{{ __('groups.remind')}}</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="feather feather-trash-2 me-3"></i>
                                                <span>{{ __('groups.delete')}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                          </td>
                        </tr> @empty <tr>
                          <td colspan="7" class="text-center"> {{ __('messages.group.no_information')}} ...</td>
                        </tr> @endforelse </tbody>
                    </table>
                  </div>
                </div>
                <hr class="mt-5">
                <div class="payment-history">
                  <div class="my-4 px-4 d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0">{{ __('messages.group.transaction')}}:</h5>
                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">{{ __('messages.group.all')}}</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table  dataTable no-footer" id="paymentList" aria-describedby="paymentList_info">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>{{ __('groups.student')}}</th>
                          <th>Summa</th>
                          <th>{{ __('messages.general.time')}}</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody> @forelse($transactions as $transaction) <tr class="single-item" style="font-size: 10px;">
                          <td class="fw-bold"> #{{$transaction->id}}</td>
                          <td>
                            {{$transaction->student->last_name}} {{$transaction->student->first_name}}
                          </td>
                          <td class="text-dark">
                            {{ number_format($transaction->amount, 0, '.', ' ') }} UZS
                          </td>
                          <td>
                            <span class="d-flex align-items-center text-dark">
                              {{ \Carbon\Carbon::parse($transaction->created_at)->format('d F Y, H:i') }}
                            </span>
                          </td>
                          <td>
                            <div class="hstack gap-2 d-flex justify-content-end">
                              <a href="{{ route('transaction.show', $transaction->id) }}" class="avatar-text avatar-md">
                                <i class="feather-eye"></i>
                              </a>
                              <div class="dropdown">
                                  <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                      <i class="feather feather-more-horizontal"></i>
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li>
                                          <a class="dropdown-item" href="javascript:void(0)">
                                              <i class="feather feather-edit-3 me-3"></i>
                                              <span>{{ __('groups.edit')}}</span>
                                          </a>
                                      </li>
                                      <li>
                                          <a class="dropdown-item printBTN" href="javascript:void(0)">
                                              <i class="feather feather-printer me-3"></i>
                                              <span>{{ __('groups.print')}}</span>
                                          </a>
                                      </li>
                                      <li>
                                          <a class="dropdown-item" href="javascript:void(0)">
                                              <i class="feather feather-clock me-3"></i>
                                              <span>{{ __('groups.remind')}}</span>
                                          </a>
                                      </li>
                                      <li class="dropdown-divider"></li>
                                      <li>
                                          <a class="dropdown-item" href="javascript:void(0)">
                                              <i class="feather feather-trash-2 me-3"></i>
                                              <span>{{ __('groups.delete')}}</span>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </td>
                        </tr> @empty <tr>
                          <td colspan="6" class="text-center"> {{ __('messages.group.no_information')}} ...</td>
                        </tr> @endforelse </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="attendance" role="tabpanel">
                <div class="recent-activity p-0">
                  <div class="alert alert-dismissible m-4 p-4 d-flex alert-soft-teal-message" role="alert">
                    <div class="me-4 d-none d-md-block">
                      <i class="feather feather-alert-octagon fs-1"></i>
                    </div>
                    <a href="{{ route('showAttendance', $group->id) }}" class="btn btn-primary">
                      <i class="fa-solid fa-calendar-days me-2"></i>
                      <span>{{ __('groups.student_attendance')}}</span>
                    </a>
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
                      <p class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.soon')}}!</p>
                      <p class="fs-12 fw-medium text-truncate-1-line">Bu yurda - <strong>xabarnomalar jo'natish</strong> imkoniyati qo'shiladi. </p>
                      <a href="javascript:void(0);" class="badge bg-teal text-white d-inline-block">v1.0</a> > <a href="javascript:void(0);" class="badge bg-soft-teal text-teal d-inline-block">v1.5</a>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                  <table class="table mb-0 disabled-table">
                    <thead>
                      <tr>
                        <th>{{ __('groups.description')}}</th>
                        <th class="wd-250 text-end">{{ __('groups.actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="fw-bold text-dark"> {{ __('groups.des1')}} </div>
                          <small class="fs-12 text-muted"> {{ __('groups.title1')}} </small>
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
                            </select>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="fw-bold text-dark">{{ __('groups.attendance')}}</div>
                          <small class="fs-12 text-muted">{{ __('groups.title2')}} </small>
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
                            </select>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="fw-bold text-dark">{{ __('groups.des3')}}</div>
                          <small class="fs-12 text-muted">{{ __('groups.title3')}} </small>
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
                            </select>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="fw-bold text-dark">{{ __('groups.des4')}}</div>
                          <small class="fs-12 text-muted">{{ __('groups.title4')}} </small>
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
                            </select>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <hr>
                <div class="notify-activity-section disabled-table">
                  <div class="px-4 mb-4 d-flex justify-content-between">
                    <h5 class="fw-bold">{{ __('groups.account_activity')}}</h5>
                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand"> {{ __('messages.group.all')}} </a>
                  </div>
                  <div class="px-4">
                    <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                      <div class="hstack me-4">
                        <div class="avatar-text">
                          <i class="feather-message-square"></i>
                        </div>
                        <div class="ms-4">
                          <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des5')}}</a>
                          <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title5')}}</div>
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
                          <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des6')}}</a>
                          <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title6')}}</div>
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
                          <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des7')}}</a>
                          <div class="fs-12 text-muted text-truncate-1-line">{{ __('groups.title7')}}</div>
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
                  <div class="mb-4 d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold">{{ __('groups.developement_connections')}} :</h5>
                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand"> {{ __('messages.group.all')}} </a>
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
                        <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_gitlab')}} </a>
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
                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">{{ __('messages.group.all')}}</a>
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
                        <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_insta')}} </a>
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
                        <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">{{ __('groups.des_pinterest')}} </a>
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
                  <h6 class="fw-bolder">
                    <a href="javascript:void(0);">{{ __('groups.des_auth2')}} </a>
                  </h6>
                  <div class="fs-12 text-muted text-truncate-3-line mt-2 mb-4">{{ __('groups.title_auth2')}}</div>
                  <div class="form-check form-switch form-switch-sm">
                    <label class="form-check-label fw-500 text-dark c-pointer" for="2faVerification">{{ __('groups.label_auth2')}}</label>
                    <input class="form-check-input c-pointer" type="checkbox" id="2faVerification" checked="">
                  </div>
                </div>
                <div class="p-4 mb-4 border border-dashed border-gray-3 rounded-1">
                  <h6 class="fw-bolder">
                    <a href="javascript:void(0);">{{ __('groups.des_verification')}}</a>
                  </h6>
                  <div class="fs-12 text-muted text-truncate-3-line mt-2 mb-4">{{ __('groups.title_verification')}}</div>
                  <div class="form-check form-switch form-switch-sm">
                    <label class="form-check-label fw-500 text-dark c-pointer" for="secondaryVerification">{{ __('groups.label_verification')}}</label>
                    <input class="form-check-input c-pointer" type="checkbox" id="secondaryVerification" checked="">
                  </div>
                </div>
                <div class="p-4 mb-4 border border-dashed border-gray-3 rounded-1">
                  <h6 class="fw-bolder">
                    <a href="javascript:void(0);">{{ __('groups.des_backupcodes')}}</a>
                  </h6>
                  <div class="fs-12 text-muted text-truncate-3-line mt-4 mb-4">{{ __('groups.title_backupcodes')}}</div>
                  <div class="form-check form-switch form-switch-sm">
                    <label class="form-check-label fw-500 text-dark c-pointer" for="generateBackup">{{ __('groups.label_backupcodes')}}</label>
                    <input class="form-check-input c-pointer" type="checkbox" id="generateBackup">
                  </div>
                </div>
                <div class="p-4 border border-dashed border-gray-3 rounded-1">
                  <h6 class="fw-bolder">
                    <a href="javascript:void(0);">{{ __('groups.des_login_verf')}} </a>
                  </h6>
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
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger d-inline-block">{{ __('groups.learn_more')}}</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </div>
                <div class="card mt-5">
                  <div class="card-body">
                    <h6 class="fw-bold">{{ __('groups.delete_account')}}</h6>
                    <p class="fs-11 text-muted">{{ __('groups.delete_account_title')}} </p>
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
                      <a href="javascript:void(0);" class="btn btn-warning mt-2 mt-sm-0 successAlertMessage">{{ __('groups.deactiveted_account')}} </a>
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
    </div>
    <x-footer></x-footer>
</main>
<style>
  .disabled-table {
    pointer-events: none;
    /* Har qanday elementga bosish imkoniyatini cheklaydi */
    opacity: 0.5;
    /* Stildan foydalanib jadvalni bo'yash */
  }
</style> 
@endsection