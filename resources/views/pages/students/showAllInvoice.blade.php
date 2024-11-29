@extends('layouts.layout')

@section('content')

<style> 
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a,
    .pagination span {
        color: #fff; /* Black text color */
        text-decoration: none;
        background-color: #3454d1; /* Light background for contrast */
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination a:hover {
        background-color: #3454d1; /* Bootstrap primary color */
        color: #fff; /* White text color on hover */
    }

    .pagination .active span {
        background-color: #3454d1; /* Bootstrap primary color for active page */
        color: #fff; /* White text color for active page */
    }

    .page-item.disabled .page-link {
        color: #fff;
        pointer-events: none;
        background-color: #3454d1;
        border-color: #ddd;
    }
</style>
<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header row">
            <div class="page-header-left d-flex align-items-center col-md-6">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('students.payment')}} </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">{{ __('messages.general.home')}} </a></li>
                    <li class="breadcrumb-item active">{{ __('students.payment_list')}} </li>
                </ul>
            </div>
            <div class="col-md-2"></div>
                <form action="{{ route('invoices.index') }}" method="GET" class="d-flex col-md-4 justify-content-end">
                    <div class="position-relative" style="flex-grow: 1;">
                        <input type="search" id="search" name="search" class="form-control form-control-sm" placeholder="Ism familiyani kiriting" aria-controls="proposalList" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-primary position-absolute top-0 end-0" style="height: 100%; padding: 0 15px;">{{ __('students.search')}} </button>
                    </div>
                </form>
        </div>

        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.general.name')}} </th>
                                            <th>{{ __('messages.courses.course')}} </th>
                                            <th>{{ __('messages.general.sum')}} </th>
                                            <th>{{ __('messages.general.time')}} </th>
                                            <th>Muddat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                
                                                <td>
                                                    {{ $invoice->student->first_name }} {{ $invoice->student->last_name }}
                                                </td>
                                                <td class="text-center">
                                                    {{$invoice->group->courses->course_name}}
                                                </td>
                                                <td>
                                                    <span class="d-flex align-items-center badge {{ $invoice->amount ? number_format($invoice->amount, 0, '.', ' ') : 'N/A' }} UZS"><i class="fa-solid fa-money-bill-1 me-2"></i>{{ $invoice->amount ? number_format($invoice->amount, 0, '.', ' ') : 'N/A' }} UZS</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-soft-success text-success">{{ (new DateTime($invoice->created_at))->format('d F Y, H:i') }}</span>
                                                </td>
                                                <td>
                                                    {{ (new DateTime($invoice->start_date))->format('F Y') }} / {{ (new DateTime($invoice->end_date))->format('F Y') }}
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="#" class="avatar-text avatar-md">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="#" class="avatar-text avatar-md">
                                                            <i class="feather-edit-3"></i>
                                                        </a>
                                                        <form action="#" method="POST" onsubmit="return confirm('Ochirishga ruxsat berasizmi')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="avatar-text avatar-md delete-branch text-dark"><i class="feather-trash-2"></i></button>
                                                        </form>
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
    </div>
</main>

@endsection