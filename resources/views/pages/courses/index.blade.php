@extends('layouts.layout')

@section('content')

<!-- Start Main Content -->
<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('messages.courses.courses')}} </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}}</a></li>
                    <li class="breadcrumb-item">{{ __('messages.courses.list')}}</li>
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
                        <a href="{{ route('courses.create') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>{{ __('messages.courses.create')}}</span>
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
        <div style="overflow-x: visible"  class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div style="overflow-x: visible" class="table-responsive">
                                <table class="table table-hover" id="branchList">
                                    <thead>
                                    <tr>
                                        <th>{{ __('courses.name')}}</th>
                                        <th>{{ __('courses.price')}}</th>
                                        <th>{{ __('courses.duration')}}</th>
                                        <!-- <th>{{ __('messages.general.hours')}}</th> -->
                                        <th class="text-end"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($courses as $course)
                                        <tr>
                                            <td>
                                                <a href="{{ route('courses.show', $course->id) }}">{{ $course->course_name }}</a>
                                            </td>
                                            <td class="fw-bold">
                                                <span>
                                                    {{ number_format($course->cost, 0, '.', ' ') }} UZS
                                                </span>
                                            </td>
                                            <td>
                                              <span>{{ $course->duration }} {{ __('messages.general.month')}} </span>
                                            </td>
                                            <!--
                                            <td class="fw-bold">
                                                <span>
                                                    {{ $course->duration*12*2  }}  {{ __('messages.general.hours')}}
                                                </span>
                                            </td>
                                            -->
                                            <td class="d-flex justify-content-end">
                                                <div class="hstack gap-2 ">
                                                    <a href="{{ route('courses.show', $course->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather-eye"></i>
                                                    </a>

                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('courses.edit', $course->id) }}">
                                                                    <i class="feather feather-edit-3 me-3"></i>
                                                                    <span>{{ __('messages.general.edit')}}</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                    <i class="feather feather-printer me-3"></i>
                                                                    <span>{{ __('courses.print')}}</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="feather feather-clock me-3"></i>
                                                                    <span>{{ __('courses.remind')}}</span>
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <form class="dropdown-item" action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="confirmDelete(event)">
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
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">{{ __('messages.general.not_found')}} </td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="">
                            {{ $courses->links() }}
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
<script>
    document.write(new Date().getFullYear());
</script>

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
