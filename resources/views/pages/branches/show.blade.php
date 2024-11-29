@extends('layouts.layout')
@section('content')
<style>
        .pagination .page-link {
            background-color: #000;
            color: white; /* Matn rangini qora qilish */
        }
        .pagination .page-link:hover {
            color: white; /* Hover vaqtida ham qora qilish */
        }
        .pagination .page-item.active .page-link {
            background-color: #000; /* Aktiv sahifa rangini qora qilish */
            border-color: white; /* Aktiv sahifa bordir rangini qora qilish */
        }   
    </style>
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->

    <!-- Main Content -->
    <main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{ __('branch.branches')}}</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('branch.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="/admin/branch">{{ __('messages.branch.list')}}</a></li>
                        <li class="breadcrumb-item">{{ $branch->name }}</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items d-flex">
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper me-3">
                            <a href="{{ route('branch.index') }}" class="btn btn-primary w-100">
                                <i class="fa-solid fa-arrow-left-long me-2"></i> {{ __('branch.back')}}
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <a href="{{ route('branch.edit', $branch->id) }}" class="btn btn-primary w-100">
                                <i class="fa-solid fa-pen-to-square me-2"></i> <span>{{ __('branch.change')}}</span>
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
            <!-- End Page Header -->

            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-top-0">
                            <div class="card-header p-0">
                                <!-- Nav Tabs -->
                                <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profileTab" role="tab">{{ __('branch.profile')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#branches" role="tab">{{ __('branch.group')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#transaction" role="tab">{{ __('branch.billing')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#employees" role="tab">{{ __('branch.employee')}}</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#student" role="tab">{{ __('branch.student')}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <!-- Profile Tab -->
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                        <form action="{{ route('branch.store') }}" method="POST">
                                            @csrf
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="fullnameInput" class="fw-semibold">{{ __('messages.filial.name')}}:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-user"></i></div>
                                                        <input type="text" class="form-control"value="{{ $branch->name }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="phoneInput" class="fw-semibold">{{ __('branch.phone')}}:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-phone"></i></div>
                                                        <input type="text" class="form-control" value="{{ $branch->phone }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                use Carbon\Carbon;
                                                ?>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="phoneInput" class="fw-semibold">{{ __('branch.openingTime')}}:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                        <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($branch->date)->format('Y M d') }}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="regionSelect" class="fw-semibold">{{ __('branch.address')}}:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="fa-regular fa-map"></i></div>
                                                        <input type="text" class="form-control" value="{{ $branch->region->name }}, {{ $branch->district->name }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label class="fw-semibold">{{ __('branch.status')}}:</label>
                                                </div>
                                                
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="fa-solid fa-list"></i></div>
                                                        <input type="text" class="form-control" value="{{ $branch->status }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="coordinate" class="fw-semibold">{{ __('branch.coordinate')}}:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="fa-solid fa-location-dot"></i></div>
                                                        <input type="text" class="form-control" id="coordinate" placeholder="76VM+8V Ташкент, Узбекистан" name="coordinate">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="branches" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <!-- Billing & Shipping Form -->
                                        <div class="col-lg-12">
                                            <div class="card stretch stretch-full">
                                                
                                                <div class="card-body custom-card-action p-0">
                                                    <div class="table-responsive">

                                                        <table class="table table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ __('branch.group_information')}}</th>
                                                                    <th>{{ __('branch.student')}}</th>
                                                                    <th>{{ __('branch.direction')}}</th>
                                                                    <th>{{ __('branch.duration')}}</th>
                                                                    <th>{{ __('branch.status')}}</th>
                                                                    <th class="text-end"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @forelse($groups as $group)
                                                                <tr class="time-tracker-item">
                                                                    <td>
                                                                        <div class="fw-semibold mb-1">{{ $group->group_name }}</div>
                                                                        <div class="d-flex gap-3">
                                                                            <a href="javascript:void(0);" class="hstack gap-1 fs-11 fw-normal text-muted">
                                                                                <i class="feather-clock fs-10"></i>
                                                                                <span>{{ \Carbon\Carbon::parse($group->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($group->end_time)->format('H:i') }}</span>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fs-11 d-flex justify-content-between mb-1">
                                                                            <span>{{ $group->enrollments->count() }}ta </span>
                                                                            <span>{{ $groupsWithLimit[$group->id] ?? 'N/A' }}ta </span>
                                                                        </div>
                                                                        <div class="progress ht-3">
                                                                            @php
                                                                                $enrollmentsCount = $group->enrollments->count();
                                                                                $limit = $groupsWithLimit[$group->id] ?? 0;
                                                                                $progress = $limit > 0 ? ($enrollmentsCount / $limit) * 100 : 0;

                                                                                // Rang tanlash uchun shart
                                                                                $progressBarClass = 'bg-primary'; // Default color
                                                                                if ($progress >= 75) {
                                                                                    $progressBarClass = 'bg-success';
                                                                                } elseif ($progress >= 50) {
                                                                                    $progressBarClass = 'bg-warning';
                                                                                }
                                                                            @endphp
                                                                            <div class="progress-bar {{ $progressBarClass }}" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="badge bg-soft-primary text-primary mb-1">{{ $group->courses->course_name }}</div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fw-semibold mb-1">{{$group->courses->duration}} {{ __('branch.monthly')}} </div>
                                                                        <div class="d-flex gap-3">
                                                                            <a href="javascript:void(0);" class="hstack gap-1 fs-11 fw-normal text-muted">
                                                                                <i class="fa-solid fa-calendar-days fs-10"></i>
                                                                                <span>{{ $group->created_at->format('d.m.Y') }} - {{ $group->created_at->addMonths($group->courses->duration)->format('d.m.Y') }}</span>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if($group->status == 'active')
                                                                            <span class="badge bg-soft-primary text-success mb-1">{{ __('messages.general.active')}}</span>
                                                                        @elseif($group->status == 'paused')
                                                                            <span class="badge bg-soft-primary text-warning mb-1">{{ __('branch.suspended')}}</span>
                                                                        @elseif($group->status == 'completed')
                                                                            <span class="badge bg-soft-primary text-info mb-1">{{ __('branch.completed')}}</span>
                                                                        @elseif($group->status == 'recruiting')
                                                                            <span class="badge bg-soft-primary text-primary mb-1">{{ __('branch.progress_admission')}}</span>
                                                                        @elseif($group->status == 'cancelled')
                                                                            <span class="badge bg-soft-primary text-danger mb-1">{{ __('branch.canceled')}}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="hstack gap-2 justify-content-end">
                                                                            <a href="{{ route('groups.show', $group->id) }}" class="avatar-text avatar-md">
                                                                                <i class="feather-eye"></i>
                                                                            </a>

                                                                            @if($group->status != 'cancelled') {{-- Guruh "Bekor qilingan" bo'lsa, edit va student qo'shish yopilsin --}}
                                                                                <a href="{{ route('groups.edit', $group->id) }}" class="avatar-text avatar-md">
                                                                                    <i class="feather-edit"></i>
                                                                                </a>
                                                                            @endif

                                                                            @if($group->status != 'active' && $group->status != 'cancelled' && $group->status != 'paused' && $group->status != 'completed') {{-- Guruh "Faol", "Bekor qilingan", "Vaqtinchalik To'xtatilgan" yoki "Yakunlangan" bo'lsa, student qo'shish yopilsin --}}
                                                                                <a href="{{ route('studentStoreGet', $group->id) }}" class="avatar-text avatar-md">
                                                                                    <i class="fa-solid fa-user-plus"></i>
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @empty
                                                                <tr>
                                                                    <td colspan="6" class="text-center"> {{ __('branch.not_found')}} </td>
                                                                </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    {{ $groups->links() }}

                                                </div>
                                            </div>
                                        </div>
                                        <!-- [Recent Orders] end -->

                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="transaction" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <div class="col-lg-12">
                                            <div class="card stretch stretch-full">

                                                <div class="card-body custom-card-action p-0">
                                                    <div class="table-responsive">
                                                        <table class="table  dataTable no-footer" id="paymentList" aria-describedby="paymentList_info">
                                                            <thead>
                                                                <tr>
                                                                    <th> {{ __('branch.account_number')}} </th>
                                                                    <th> {{ __('branch.student')}} </th>
                                                                    <th> {{ __('branch.payment_price')}} </th>
                                                                    <th> {{ __('branch.payment_time')}} </th>
                                                                    <th> {{ __('branch.status')}} </th>
                                                                    <th class="text-end"> {{ __('branch.more')}} </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>  

                                                                @forelse($transactions as $transaction)
                                                                
                                                                <tr class="single-item odd">
                                                                    <td>
                                                                        <span class="badge text-success border border-success border-dashed">{{ $transaction->id }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0)" class="hstack gap-3">
                                                                            <div>
                                                                                <span>{{$transaction->student->first_name}} {{$transaction->student->last_name}}  </span>
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                    
                                                                    <td class="fw-bold text-dark">
                                                                        <span>
                                                                            {{ number_format($transaction->amount, 2, '.', ',') }} UZS
                                                                        </span>
                                                                    </td>

                                                                    <td><span> {{$transaction->created_at->format('Y.m.d') ?? '2024.08.03  18:54'}}</span></td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center badge bg-soft-success text-success"><i class="fa-solid fa-square-check me-2"></i> {{ __('branch.paid')}} </div>
                                                                    </td>
                                                                    <td class="d-flex justify-content-end">
                                                                        <a href="{{route('students.show' , $transaction->student->id)}}" class="avatar-text avatar-md me-2">
                                                                            <i class="feather-eye"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                 @empty
                                                                <tr>
                                                                    <td colspan="6" class="text-center"> {{ __('branch.not_found')}} </td>
                                                                </tr>
                                                                @endforelse
                                                                
                                                            </tbody>
                                                        </table>                                                       
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                {{ $transactions->links() }}
                                                      
                                                </div>
                                            </div>
                                        </div>
                                    <!-- [Store Overview] end -->                                      
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="employees" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <div class="col-lg-12">
                                            <div class="card stretch stretch-full">

                                                <div class="card-body custom-card-action p-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th> {{ __('branch.name')}} </th>
                                                                    <th> {{ __('branch.direction')}} </th>
                                                                    <th>Lavozimi</th>
                                                                    <th> {{ __('branch.phone')}} </th>
                                                                    <th> {{ __('branch.number_of_groups')}} </th>
                                                                    <th class="text-end"> {{ __('branch.more')}} </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                        
                                                                @forelse($groups as $group)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center gap-3">
                                                                            <div>
                                                                                <a href="{{ route('employee.view', $group->teachers->id) }}" class="text-dark d-block">{{ $group->teachers->first_name  ?? null}} {{ $group->teachers->last_name  ?? null}}</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><span class="badge bg-soft-primary text-primary">{{ $group->teachers->specialization  ?? null}}</span></td>
                                                                    <td>
                                                                        <div>
                                                                            <a href="{{ route('employee.view', $group->teachers->id) }}" class="fw-bold"> {{ __('branch.student')}} </a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <a href="{{ route('employee.view', $group->teachers->id) }}" class="fw-bold">{{ $group->teachers->phone_number  ?? null}}</a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <a href="{{ route('employee.view', $group->teachers->id) }}" class="fw-bold">3 ta</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="d-flex justify-content-end">
                                                                        <a href="{{ route('employee.view', $group->teachers->id) }}" class="avatar-text avatar-md me-2">
                                                                            <i class="feather-eye"></i>
                                                                        </a>
                                                                    </td>                                                                    
                                                                </tr>
                                                               @empty
                                                                <tr>
                                                                    <td colspan="6" class="text-center"> {{ __('branch.not_found')}} </td>
                                                                </tr>
                                                                @endforelse

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                  {{ $groups->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    <!-- [Store Overview] end -->                                      
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="student" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <div class="col-lg-12">
                                            <div class="card stretch stretch-full">

                                                <div class="card-body custom-card-action p-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                   <th>ID</th>
                                                                    <th> {{ __('branch.name')}} </th>
                                                                     <th> {{ __('branch.pinfl')}}  </th>
                                                                    <th> {{ __('branch.direction')}} </th>
                                                                    <th> {{ __('branch.group')}} </th>
                                                                    <th> {{ __('branch.arrival_time')}} </th>
                                                                    <th> {{ __('branch.account')}} </th>
                                                                    <th class="text-end"> {{ __('branch.more')}} </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @forelse($students as $student)                                                      
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>  
                                                                    <td>
                                                                        <div class="d-flex align-items-center gap-3">
                                                                            <div>
                                                                                <a href="{{ route('students.show', $student->id) }}" class="text-dark d-block">{{ $student->full_name }}</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td> {{$student->pinfl}}</td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center gap-3">
                                                                            <div>
                                                                                <a href="{{ route('students.show', $student->id) }}" class="text-dark d-block">{{ $student->course_name }}</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <a href="#guruh_url">
                                                                                <span class="badge text-success border border-success border-dashed">{{$student->group_name}}</span>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    @php

                                                                        $created_at = null;
                                                                        if (!empty($student->created_at) && $student->created_at !== 'no result') {
                                                                            try {
                                                                                $created_at = Carbon::parse($student->created_at);
                                                                            } catch (Exception $e) {
                                                                                // Handle the exception if parsing fails
                                                                                $created_at = null;
                                                                            }
                                                                        }
                                                                    @endphp

                                                                    <td>
                                                                        @if ($created_at)
                                                                            {{ $created_at->format('Y.m.d') }}
                                                                        @else
                                                                            {{ '2024.08.03' }}
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        <span class="badge bg-soft-primary {{ $student->amount >= 0 ? 'text-success' : 'text-danger' }}">
                                                                            {{number_format($student->amount,2)}} UZS
                                                                        </span>
                                                                    </td>

                                                                    <td class="text-end">
                                                                        <a href="{{ route('students.show', $student->id) }}" class="avatar-text avatar-md ms-auto"><i class="feather-eye"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @empty
                                                                <tr>
                                                                    <td colspan="6" class="text-center"> {{ __('branch.not_found')}} </td>
                                                                </tr>
                                                                @endforelse

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card-footer pt-3 px-2 p-0">
                                                       {{$students->links()}}
                                                </div>
                                            </div>
                                        </div>
                                    <!-- [Store Overview] end -->                                      
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
        <!-- Footer -->

        <!-- End Footer -->
        <x-footer></x-footer>
    </main>
    <!-- End Main Content -->

    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->

@endsection
