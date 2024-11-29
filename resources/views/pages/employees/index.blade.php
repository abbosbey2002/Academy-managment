@extends('layouts.layout')

@section('content')

    <!-- Start Main Content -->
    <main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{ __('messages.employee.employees')}}</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}}</a></li>
                        <li class="breadcrumb-item">{{ __('messages.employee.list')}}</li>
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
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <!-- Dropdown for Filters -->
                            <div class="dropdown">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-eye me-3"></i>
                                        <span>{{ __('messages.general.all')}}</span>
                                    </a>
                                    <!-- Add more filter options as needed -->
                                </div>
                            </div>
                            <!-- Link to Create New User -->
                            <a href="{{route('register')}}" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>{{ __('messages.employee.add')}}</span>
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
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="userList">
                                        <thead>
                                        <tr>
                                            <th>{{ __('messages.general.name')}}</th>
                                            <th>{{ __('messages.branch.branch')}}</th>
                                            <th>{{ __('messages.general.phone')}}</th>
                                            <th>{{ __('messages.general.role')}}</th>
                                            <th class="text-end"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $user)

                                            <tr>
                                                <td>
                                                    @if($user)
                                                        @if($user->role == 0)
                                                            <i class="fa-solid fa-circle text-success me-2"></i>
                                                        @else
                                                            <i class="fa-solid fa-circle text-primary me-2"></i>
                                                        @endif
                                                        <a href="{{ route('employee.view', $user->id) }}"> {{ $user->first_name . ' ' . $user->last_name }}</a>
                                                    @else
                                                        {{ __('messages.general.not_found')}}
                                                    @endif
                                                </td>

                                                </td>
                                            
                                                <td>
                                                    @if ($user->branch)
                                                    <a href="{{ route('branch.show', $user->branch_id) }}"> {{ $user->branch->name }}</a>
                                                    @else
                                                        {{ __('messages.general.not_found')}}
                                                    @endif 
                                                </td>
                                    
                                                <td>
                                                    @php
                                                    $formattedPhone = preg_replace('/(\+998)(\d{2})(\d{3})(\d{2})(\d{2})/', '$1 ($2) $3 $4 $5', $user->phone_number);
                                                    @endphp
                                                    @if($user->role == 0)
                                                        <a href="{{ route('employee.view', $user->id) }}"> <span> {{ $user ? $formattedPhone : 'N/A'}}</span></a>
                                                    @else
                                                        <span>{{ $user ? $formattedPhone : __('messages.general.not_found') }}</span>
                                                    @endif
                                                </td>
                                      
                                                <td>
                                                   @if($user->role== 0)
                                                      {{ __('messages.general.admin')}}
                                                      @elseif($user->role== 1)
                                                      {{ __('messages.students.student')}}
                                                      @elseif($user->role== 2)
                                                      {{ __('messages.students.teacher')}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('employee.view',['user'=> $user->id]) }}" class="avatar-text avatar-md me-2">
                                                            <i class="feather-eye"></i>
                                                        </a>

                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('user.edit', ['id'=> $user->id]) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>{{ __('messages.general.edit')}}</span>
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
                                                                        <span>{{ __('students.remind')}}</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <form class="dropdown-item" action="{{ route('employee.delete_status') }}" method="POST" onsubmit="confirmDelete(event)">
                                                                        @csrf
                                                                       <input type="hidden" name="employee_id" value="{{ $user->id }}"/>
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
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    <x-footer></x-footer>
    </main>
    <!-- End Main Content -->

@endsection
