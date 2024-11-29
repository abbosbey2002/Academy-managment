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
<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
    <div class="nxl-content">
      
        <div class="page-header row justify-content-between">
            <div class="page-header-left d-flex align-items-center col-lg-6 col-sm-4" style="width: inherit;">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('branch.invoice')}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('messages.general.home')}}</a></li>
                </ul>
            </div>
            <!-- Page Header Right -->
            <div class="col-lg-6 col-sm-8 d-flex justify-content-end" style="width: inherit;">
                <form action="{{ route('invoices.index') }}" method="GET" class="d-flex col-md-4 justify-content-end w-100">
                    <div class="position-relative" style="flex-grow: 1;">
                        <input type="search" id="search" name="search" class="form-control form-control-sm" placeholder="Ism familiyani kiriting" aria-controls="proposalList" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-primary position-absolute top-0 end-0" style="height: 100%; padding: 0 15px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
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
                                            <th>ID</th>
                                            <th>{{ __('messages.students.student')}}</th>
                                            <th>{{ __('messages.courses.course')}}</th>
                                            <th>{{ __('messages.general.sum')}}</th>
                                            <th>{{__('messages.general.date')}} </th>
                                            <th>{{__('messages.group.lifetime')}} </th>
                                            <th>{{__('messages.general.status')}}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                     @if($invoices->isEmpty())
                                        <tr class="single-item font-bold w-100">
                                            <td>
                                                {{ __('messages.general.not_available')}}
                                            </td>
                                        </tr>                             
                                    @else


                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">#{{ $invoice->id }}</span>                                                                                                                                                                                                       
                                                </td>
                                                <td>
                                                    {{ $invoice->student ? $invoice->student->first_name . ' ' . $invoice->student->last_name : 'N/A' }}
                                                </td>
                                                <td>
                                                    <span> {{$invoice->group->courses->course_name}}</span>
                                                </td>
                                                <td>
                                                    <span>{{ $invoice->amount ? number_format(abs($invoice->amount), 2, '.', ',') : 'N/A' }} UZS</span>
                                                </td>
                                                <td>
                                                    <span>{{ $invoice->created_at->format('d F Y, H:i') }}</span>
                                                </td>
                                                <td>{{ $invoice->start_date }} - {{ $invoice->end_date }}</td>
                                                <td>
                                                    @if($invoice->status == 'draft')
                                                        <div class="badge bg-soft-secondary text-secondary">{{ __('Draft') }}</div>
                                                    @elseif($invoice->status == 'sent')
                                                        <div class="badge bg-soft-info text-info">{{ __('Sent') }}</div>
                                                    @elseif($invoice->status == 'paid')
                                                        <div class="badge bg-soft-success text-success">{{ __('Paid') }}</div>
                                                    @elseif($invoice->status == 'partially paid')
                                                        <div class="badge bg-soft-warning text-warning">{{ __('Partially Paid') }}</div>
                                                    @elseif($invoice->status == 'overdue')
                                                        <div class="badge bg-soft-danger text-danger">{{ __('Overdue') }}</div>
                                                    @elseif($invoice->status == 'canceled')
                                                        <div class="badge bg-soft-dark text-dark">{{ __('Canceled') }}</div>
                                                    @elseif($invoice->status == 'refunded')
                                                        <div class="badge bg-soft-primary text-primary">{{ __('Refunded') }}</div>
                                                    @elseif($invoice->status == 'disputed')
                                                        <div class="badge bg-soft-danger text-danger">{{ __('Disputed') }}</div>
                                                    @else
                                                        <div class="badge bg-soft-secondary text-secondary">{{ __('Unknown') }}</div>
                                                    @endif
                                                </td>


                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{route('invoices.show',$invoice->id)}}" class="avatar-text avatar-md">
                                                            <i class="feather-eye"></i>
                                                        </a>

                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('invoices.edit', ['invoice'=>$invoice->id])}}">
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
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <form class="dropdown-item" action="{{ route('invoices.delete_status') }}" method="POST" onsubmit="return confirm('Ochirishga ruxsat berasizmi')">
                                                                        @csrf
                                                                        <input type="hidden" value="{{ $invoice->id }}" name="invoice_id">
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

                                    @endif
   
                                    </tbody>
                                </table>
                            </div>
                        
                        </div>
                            {{$invoices->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</main>
@endsection
