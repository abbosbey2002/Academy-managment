@extends('layouts.layout')

@section('content')

<!-- Start Main Content -->
<main class="nxl-container d-flex flex-column justify-content-between">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('sidebar.general.branches') }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('sidebar.general.home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('messages.branch.list') }}</li>
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
                        <a href="{{ route('branch.create') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>{{ __('messages.branch.create') }}</span>
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
                                <table class="table table-hover" id="branchList">
                                    <thead>
                                        <tr>
                                            <th>{{ __('home.general.name') }}</th>
                                            <th>{{ __('branch.region') }}</th>
                                            <th>{{ __('branch.district') }}</th>
                                            <th>{{ __('branch.phone') }}</th>
                                            <th>{{ __('branch.openingTime') }}</th>
                                            <th>{{ __('branch.status') }}</th>
                                            <th class="text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($branches->isEmpty())
                                            <tr class="single-item font-bold w-100">
                                                <td>
                                                    {{ __('messages.general.not_available')}}
                                                </td>
                                            </tr>                              
                                        @else
                                        @foreach ($branches as $branch)
                                        <tr>
                                            <td>
                                                <a href="{{ route('branch.show', $branch->id) }}" class="hstack gap-3">
                                                    <div>
                                                        <span class="text-truncate-1-line">{{ $branch->name }}</span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><a href="#">{{ $branch->region->name ?? null }}</a></td>
                                            <td><a href="#">{{ $branch->district->name ?? null }}</a></td>

                                            @php
                                            $formattedPhone = preg_replace('/(\+998)(\d{2})(\d{3})(\d{2})(\d{2})/', '$1 ($2) $3 $4 $5', $branch->phone);
                                            @endphp

                                            <td><a href="tel:{{ $branch->phone }}">{{ $formattedPhone }}</a></td>

                                            <td><a href="">{{ $branch->date }}</a></td>
                                            <td>
                                                @if($branch->status=='Active')
                                                <span class="badge bg-soft-primary text-success mb-1">{{ __('messages.general.active') }}</span>
                                                @endif
                                                @if($branch->status=='Inactive')
                                                <span class="badge bg-soft-primary text-warning mb-1">{{ __('branch.suspended') }}</span>
                                                @endif
                                                @if($branch->status=='Declined')
                                                <span class="badge bg-soft-primary text-danger mb-1">{{ __('branch.canceled') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="{{ route('branch.show', $branch->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather-eye"></i>
                                                    </a>

                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('branch.edit', $branch->id) }}">
                                                                    <i class="feather feather-edit-3 me-3"></i>
                                                                    <span>Edit</span>
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
                                                                    <span>Remind</span>
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <form class="dropdown-item" action="{{ route('branch.delete_status') }}" method="POST" onsubmit="confirmDelete(event)">
                                                                    @csrf
                                                                    <input type="hidden" name="branch_id" value="{{ $branch->id }}"/>
                                                                    <button type="submit" style="background: none; border: none; padding: 0;">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        Delete
                                                                    </button>
                                                                </form>                                                                
                                                            </li>
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
            <div class="row justify-content-center mt-4">
                <div class="">
                    {{ $branches->links() }}
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
function confirmDelete(event) {
    event.preventDefault();
    var num1 = Math.floor(Math.random() * 10) + 1;
    var num2 = Math.floor(Math.random() * 10) + 1;
    var answer = prompt(`Iltimos, quyidagi amalni bajaring: ${num1} + ${num2} = ?`);

    if (answer == (num1 + num2)) {
        event.target.submit();
    } else {
        alert('Notogri javob. O\'chirish uchun to\'g\'ri javob kiritilishi kerak.');
    }
}
</script>

@endsection
