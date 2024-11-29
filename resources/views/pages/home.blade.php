    @extends('layouts.layout')
    @section('content')

    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-xxl-2 col-lg-4 col-md-6">
                    <div class="card stretch stretch-full">
                        <a href="{{ route('employee.index')}}">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.teachers') }}</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$totalCounts['amount_of_teacher'] ??  __('messages.general.not_found')  }} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_teacher'] >= 0 ? 'text-success' : 'text-danger' }}">
                                        <i class="feather-arrow-{{ $percentageChanges['amount_of_teacher'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                        <span>{{ number_format($percentageChanges['amount_of_teacher'], 2) ??__('messages.general.not_found') }}%</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-2 col-lg-4 col-md-6">
                    <div class="card stretch stretch-full">
                        <a href="{{ route('courses.index')}}">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.courses') }}</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$totalCounts['amount_of_course'] ??  __('messages.general.not_found')  }} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_course'] >= 0 ? 'text-success' : 'text-danger' }}">
                                        <i class="feather-arrow-{{ $percentageChanges['amount_of_course'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                        <span>{{ number_format($percentageChanges['amount_of_course'], 2) ?? __('messages.general.not_found') }}%</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-2 col-lg-4 col-md-6">
                    <div class="card stretch stretch-full">
                        <a href="{{ route('groups.index')}}">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.groups') }}</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$totalCounts['amount_of_group'] ?? __('messages.general.not_found') }} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_group'] >= 0 ? 'text-success' : 'text-danger' }}">
                                        <i class="feather-arrow-{{ $percentageChanges['amount_of_group'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                        <span>{{ number_format($percentageChanges['amount_of_group'], 2) ?? __('messages.general.not_found') }}%</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-2 col-lg-4 col-md-6">
                    <div class="card stretch stretch-full">
                        <a href="{{ route('branch.index')}}">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.branches') }}</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$totalCounts['amount_of_branch'] ?? __('messages.general.not_found') }} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_branch'] >= 0 ? 'text-success' : 'text-danger' }}">
                                        <i class="feather-arrow-{{ $percentageChanges['amount_of_branch'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                        <span>{{ number_format($percentageChanges['amount_of_branch'], 2) ?? __('messages.general.not_found') }}%</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-2 col-lg-4 col-md-6">
                    <div class="card stretch stretch-full">
                        <a href="{{ route('employee.index')}}">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.employees') }}</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$totalCounts['amount_of_staff'] ?? __('messages.general.not_found') }} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_staff'] >= 0 ? 'text-success' : 'text-danger' }}">
                                        <i class="feather-arrow-{{ $percentageChanges['amount_of_staff'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                        <span>{{ number_format($percentageChanges['amount_of_staff'], 2) ?? __('messages.general.not_found') }}%</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-2 col-lg-4 col-md-6">
                    <div class="card stretch stretch-full">
                        <a href="{{ route('students.index')}}">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.students') }}</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$totalCounts['amount_of_student'] ?? __('messages.general.not_found') }} </span></h3>
                                    <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_student'] >= 0 ? 'text-success' : 'text-danger' }}">
                                        <i class="feather-arrow-{{ $percentageChanges['amount_of_student'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                        <span>{{ number_format($percentageChanges['amount_of_student'], 2) ?? __('messages.general.not_found') }}%</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- [TOP Branch] start -->
                <div class="col-xxl-6">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('home.general.top_branches') }}</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="Delete" class="">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"></a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"></a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="Maximize/Minimize" class="">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"></a>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive mb-3">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                        @foreach($sortedBranches->take(10) as $data)
                                            <tr>
                                                <td>
                                                    <div class="hstack gap-3">
                                                        <div class="wd-30">
                                                            <span class="nxl-micon"><i class="fa-solid fa-building"></i></span>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('branch.show', ['branch' => $data['branch']->id ]) }}" class="d-block">
                                                                {{ $data['branch']->name ?? __('messages.general.not_found') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="{{ $data['percentage_change'] >= 0 ? 'text-success' : 'text-danger' }}">
                                                    <i class="feather-chevron-{{ $data['percentage_change'] >= 0 ? 'up' : 'down' }} fs-12 me-1"></i>
                                                    {{ number_format($data['percentage_change'], 2) ?? __('messages.general.not_found') }}%
                                                </td>
                                                <td class="fw-bold">{{ $data['student_count'] ?? __('messages.general.not_found') }} ta</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [TOP Branch] end -->

                <!-- [TOP Course] start -->
                <div class="col-xxl-6">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            
                            <h5 class="card-title">{{ __('home.general.top_courses') }}</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive mb-3">
                                <table class="table mb-0">
                                    <tbody>
                                        @foreach($coursesWithStudentCount as $course)
                                            <tr>
                                                <td>
                                                    <div class="hstack gap-3">
                                                        <div class="wd-30">
                                                            <span class="nxl-micon"><i class="feather-users"></i></span>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('courses.show', ['course' => $course->id])}}" class="d-block">
                                                                {{ $course->course_name ?? __('messages.general.not_found') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="{{ $course->percentage_change >= 0 ? 'text-success' : 'text-danger' }}">
                                                    <i class="feather-chevron-{{ $course->percentage_change >= 0 ? 'up' : 'down' }} fs-12 me-1"></i> 
                                                    {{ number_format($course->percentage_change, 2) ?? __('messages.general.not_found') }}%
                                                </td>
                                                <td class="fw-bold">{{ $course->current_student_count ?? __('messages.general.not_found') }} ta</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [TOP Course] end -->                 

                <!-- [GROUP] start -->
                <div class="col-xxl-12">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('sidebar.general.groups') }}</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="" data-bs-original-title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>{{ __('home.general.new')}}</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>{{ __('home.general.event')}}</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>{{ __('home.general.snoozed')}}</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>{{ __('home.general.deleted')}}</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>{{ __('messages.general.settings')}}</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-card-action p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('home.general.group_info') }}</th>
                                            <th>{{ __('home.general.branch_name') }}</th>
                                            <th>{{ __('messages.students.student') }}</th>
                                            <th>{{ __('home.general.duration') }}</th>
                                            <th>{{ __('home.general.status') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($last_groups as $group)
                                            <tr class="time-tracker-item">
                                                <td>
                                                    <div class="fw-semibold mb-1"><a href="{{ route('groups.show',['group' => $group->id])}}">{{ $group->group_name ?? __('messages.general.not_found') }}</a></div>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ route('groups.index')}}" class="hstack gap-1 fs-11 fw-normal text-muted">
                                                            <i class="feather-clock fs-10"></i>
                                                            <span>{{ \Carbon\Carbon::parse($group->start_time)->format('H:i') ?? __('messages.general.not_found') }} - {{ \Carbon\Carbon::parse($group->end_time)->format('H:i') ?? __('messages.general.not_found') }}</span>
                                                        </a>
                                                        <a href="{{ route('courses.index')}}" class="badge bg-soft-primary text-primary gap-1 fs-11 fw-normal text-muted">
                                                            <i class="fa-solid fa-book fs-10"></i>
                                                            <span> {{ $group->courses->course_name ?? __('messages.general.not_found') }}</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-semibold mb-1">{{ $group->branch->name ?? __('messages.general.not_found') }}</div>
                                                </td>
                                                <td>
                                                    <div class="fs-11 d-flex justify-content-between mb-1">
                                                        <span>{{ $group->enrollments->count() ?? __('messages.general.not_found') }}ta </span>
                                                        <span>{{ $groupsWithLimit[$group->id] ?? __('messages.general.not_found') }}ta </span>
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
                                                    <div class="fw-semibold mb-1">{{ $group->courses->duration ?? __('messages.general.not_found') }} Oylik</div>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ route('groups.index')}}" class="hstack gap-1 fs-11 fw-normal text-muted">
                                                            <i class="fa-solid fa-calendar-days fs-10"></i>
                                                            <span>{{ \Carbon\Carbon::parse($group->start_date)->format('d.m.Y') ?? __('messages.general.not_found') }} - {{ \Carbon\Carbon::parse($group->end_date)->format('d.m.Y') ?? __('messages.general.not_found') }}</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($group->status == 'active')
                                                        <span class="badge bg-soft-primary text-success mb-1">{{ __('messages.general.active')}}</span>
                                                    @elseif($group->status == 'paused')
                                                        <span class="badge bg-soft-primary text-warning mb-1">{{ __('messages.general.suspended')}}</span>
                                                    @elseif($group->status == 'completed')
                                                        <span class="badge bg-soft-primary text-info mb-1">{{ __('messages.general.completed')}}</span>
                                                    @elseif($group->status == 'recruiting')
                                                        <span class="badge bg-soft-primary text-primary mb-1">{{ __('messages.general.recruiting')}}</span>
                                                    @elseif($group->status == 'cancelled')
                                                        <span class="badge bg-soft-primary text-danger mb-1">{{ __('messages.general.cenceled')}}</span>
                                                    @else
                                                        <span class="badge bg-soft-primary text-secondary mb-1">{{ __('messages.general.inactive') }}</span>
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
                <!-- [GROUP] end -->

                <!-- [No active Student] start -->
                <div class="col-xxl-12">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('messages.general.none_active') }}</h5>
                            <div class="card-header-action">
                                <div class="card-header-btn">
                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Refresh">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                    </div>
                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Maximize/Minimize">
                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="" data-bs-original-title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>{{ __('home.general.new')}} </a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>{{ __('home.general.event')}}</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>{{ __('home.general.snoozed')}}</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>{{ __('home.general.deleted')}}</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>{{ __('messages.general.settings')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-card-action p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.general.name')}}</th>
                                            <th>{{ __('messages.branch.branch')}}</th>
                                            <th>{{ __('messages.general.phone')}}</th>
                                            <th>{{ __('messages.general.status')}}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($students->isEmpty())
                                            <tr class="single-item font-bold w-100">
                                                <td>
                                                    {{ __('messages.general.not_available')}}
                                                </td>
                                            </tr>                              
                                        @else

                                        
                                            @foreach($students as $student)
                                                @if($student->status !== 'active' && $student->status !== 'faol')
                                                    <tr class="time-tracker-item">
                                                        <td>
                                                            <div class="fw-semibold mb-1">{{ $student->first_name ?? __('messages.general.not_found') }} {{ $student->last_name ?? __('messages.general.not_found') }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="fw-semibold mb-1">{{ $student->branch->name ?? __('messages.general.not_found') }}</div>
                                                        </td>
                                                        <td>
                                                            {{ $student->phone ?? __('messages.general.not_found') }}
                                                        </td>
                                                        <td>
                                                            @if($student->status == 'active')
                                                                <span class="badge bg-soft-primary text-success mb-1">{{ __('messages.general.active')}}</span>
                                                            @elseif($student->status == 'paused')
                                                                <span class="badge bg-soft-primary text-warning mb-1">{{ __('messages.general.suspended')}}</span>
                                                            @elseif($student->status == 'completed')
                                                                <span class="badge bg-soft-primary text-info mb-1">{{ __('messages.general.completed')}}</span>
                                                            @elseif($student->status == 'recruiting')
                                                                <span class="badge bg-soft-primary text-primary mb-1">{{ __('messages.general.recruiting')}}</span>
                                                            @elseif($student->status == 'cancelled')
                                                                <span class="badge bg-soft-primary text-danger mb-1">{{ __('messages.general.cenceled')}}</span>
                                                            @else
                                                                <span class="badge bg-soft-primary text-secondary mb-1">{{ __('messages.general.inactive') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <a href="{{ route('students.show', $student->id ?? 'ID') }}" class="avatar-text avatar-md">
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
                                                                                <span>{{ __('courses.edit')}}</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                        
                                                                            @if(isset($group) && $group->status != 'active' && $group->status != 'cancelled' && $group->status != 'paused' && $group->status != 'completed')
                                                                                <a class="dropdown-item printBTN" href="javascript:void(0)" 
                                                                                onclick="openModal({{ $student->id ?? 'null' }}, {{ $student->group_id }})">
                                                                                    <i class="fa-solid fa-dollar-sign me-3"></i>
                                                                                    <span>Hibob to'ldirish</span>
                                                                                </a>
                                                                            @else
                                                                                
                                                                            @endif
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="javascript:void(0)">
                                                                                <i class="feather feather-clock me-3"></i>
                                                                                <span>{{ __('courses.remind')}}</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li>
                                                                            <form class="dropdown-item" action="{{ route('students.destroy', $student->id ?? '#') }}" method="POST" onsubmit="confirmDelete(event)">
                                                                                @csrf
                                                                                @method('DELETE')
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
                                                @endif
                                            @endforeach

                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [No active Student] end -->


            </div>
        </div>
        <!-- [ Main Content ] end -->
        </div>
        <x-footer></x-footer>
    </main>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', (event) => {

                        if(document.querySelector('.printBTN')){
                            document.querySelector('.printBTN').addEventListener('click', function() {
                                var element = document.getElementById('printable-area');
                                html2canvas(element, {
                                    onrendered: function(canvas) {
                                        var imgData = canvas.toDataURL('image/png');
                                        var link = document.createElement('a');
                                        link.href = imgData;
                                        link.download = 'screenshot.png';
                                        link.click();
                                    }
                                });
                            });
                        }
                    });
                </script>

 
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->

<style>
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
        border: none;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.3rem;
        color: #007bff;
        /* Bootstrap primary color */
    }

    .card-text strong {
        color: #6c757d;
        /* Bootstrap secondary color */
    }

    .btn-primary {
        background-color: #007bff;
        /* Bootstrap primary color */
        border-color: #007bff;
        /* Bootstrap primary color */
    }

    .btn-primary:hover {
        background-color: #0056b3;
        /* Slightly darker shade of primary color on hover */
        border-color: #0056b3;
        /* Slightly darker shade of primary color on hover */
    }
    .pagination .page-link {
        background-color: #0f172a; /* Black background */
        color: #fff; /* White text */
        border-color: #000; /* Black border */
    }

    .pagination .page-link:hover {
        background-color: #555; /* Darker shade on hover */
        color: #fff; /* White text on hover */
        border-color: #000; /* Black border on hover */
    }

    .pagination .page-item.active .page-link {
        background-color: #000; /* Darker shade for active page */
        border-color: #000; /* Black border for active page */
    }
    </style>
    @endsection
