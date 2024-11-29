@extends('layouts.layout')
@section('content')

<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10"> {{ __('messages.group.groups')}} </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""> {{ __('messages.group.home')}} </a></li>
                    <li class="breadcrumb-item"> {{ __('messages.group.list')}} </li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>{{ __('branch.back') }}</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">                        
                        <a href="{{ route('groups.create') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>{{ __('messages.group.create') }}</span>
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

        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th> {{ __('messages.group.information')}} </th>
                                            <th> {{ __('messages.branch.branch')}} </th>
                                            <th> {{ __('messages.students.student')}} </th>
                                            <th> {{ __('groups.duration')}} </th>
                                            <th> {{ __('messages.general.status')}} </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          
                                    @if($groups->isEmpty())
                                        <tr class="single-item font-bold w-100">
                                            <td>
                                                {{ __('messages.general.not_available')}}
                                            </td>
                                        </tr>                            
                                    @else

                                        @foreach($groups as $group)
                                            <tr class="time-tracker-item">
                                                <td>
                                                    <div class="fw-semibold mb-1"><a href="{{ route('groups.show',['group' => $group->id])}}">{{ $group->group_name }}</a></div>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ route('groups.index')}}" class="hstack gap-1 fs-11 fw-normal text-muted">
                                                            <i class="feather-clock fs-10"></i>
                                                            <span>{{ \Carbon\Carbon::parse($group->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($group->end_time)->format('H:i') }}</span>
                                                        </a>
                                                        <a href="{{ route('courses.index')}}" class="badge bg-soft-primary text-primary gap-1 fs-11 fw-normal text-muted">
                                                            <i class="fa-solid fa-book fs-10"></i>
                                                            <span> {{ $group->courses->course_name }}</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-semibold mb-1">{{ $group->branch->name }}</div>
                                                </td>
                                                <td>
                                                    <div class="fs-11 d-flex justify-content-between mb-1">
                                                        <span>{{ $group->enrollments->count() }} ta </span>
                                                        <span>{{ $groupsWithLimit[$group->id] ?? 'N/A' }} ta </span>
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
                                                    <div class="fw-semibold mb-1">{{ $group->courses->duration }} {{ __('groups.monthly')}} </div>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ route('groups.index')}}" class="hstack gap-1 fs-11 fw-normal text-muted">
                                                            <i class="fa-solid fa-calendar-days fs-10"></i>
                                                            <span>12.07.2024 - 12.12.2024</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($group->status == 'active')
                                                        <span class="badge bg-soft-primary text-success mb-1"> {{ __('groups.active')}} </span>
                                                    @elseif($group->status == 'paused')
                                                        <span class="badge bg-soft-primary text-warning mb-1"> {{ __('groups.suspended')}} </span>
                                                    @elseif($group->status == 'completed')
                                                        <span class="badge bg-soft-primary text-info mb-1"> {{ __('groups.completed')}} </span>
                                                    @elseif($group->status == 'recruiting')
                                                        <span class="badge bg-soft-primary text-primary mb-1"> {{ __('groups.progress_admission')}} </span>
                                                    @elseif($group->status == 'cancelled')
                                                        <span class="badge bg-soft-primary text-danger mb-1"> {{ __('groups.canceled')}} </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">

                                                        <a href="{{ route('groups.show', $group->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather-eye"></i>
                                                        </a>

                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                
                                                                @if($group->status != 'cancelled') {{-- Guruh "Bekor qilingan" bo'lsa, edit va student qo'shish yopilsin --}}
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('groups.edit', $group->id) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>{{ __('groups.edit')}} </span>
                                                                    </a>
                                                                </li>
                                                                @endif
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="{{ route('studentStoreGet', $group->id) }}">
                                                                        <i class="fa-solid fa-user-plus me-3"></i>
                                                                        <span>{{ __('groups.add_students')}} </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>{{ __('groups.remind')}} </span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>

                                                                @if($group->status != 'active' && $group->status != 'cancelled' && $group->status != 'paused' && $group->status != 'completed') {{-- Guruh "Faol", "Bekor qilingan", "Vaqtinchalik To'xtatilgan" yoki "Yakunlangan" bo'lsa, student qo'shish yopilsin --}}
                                                                <li>
                                                                    <form class="dropdown-item" action="{{ route('groups.destroy', $group->id) }}" method="POST" onsubmit="confirmDelete(event)">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" style="background: none; border: none; padding: 0;">
                                                                            <i class="feather feather-trash-2 me-3"></i>
                                                                            Delete
                                                                        </button>
                                                                    </form>                                                                
                                                                </li>
                                                                @endif
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
    <x-footer></x-footer>
</main>
    
<style>
    .main-content {
        height: 100% !important;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

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

<script>
    function submitDeleteForm(actionUrl) {
        if (confirm('Haqiqatdan ham ushbu guruhi o\'chirib tashlashni istaysizmi?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = actionUrl;

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

@endsection
