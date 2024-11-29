@extends('layouts.layout')

@section('content')

<main class="nxl-container d-flex flex-column justify-content-between">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ __('sidebar.general.expense') }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">{{ __('sidebar.general.home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('sidebar.general.expense') }}</li>
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
                        <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>Add Expense</span>
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
                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Expense Date</th>
                                            <th>Operation</th>
                                            <th>Amount</th>
                                            <th>Category</th>
                                            <th>Branch</th> <!-- Branch ustuni qo'shildi -->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($expenses->isEmpty())
                                            <tr class="single-item font-bold w-100">
                                                <td colspan='12' class="text-center">
                                                    {{ __('messages.general.not_available')}}
                                                </td>
                                            </tr>                             
                                        @else

                                        @foreach($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($expense->expense_date)->format('d.m.Y') }}</td>
                                            <td>{{ $expense->operation->name }}</td>
                                            <td>{{ number_format($expense->amount, 2, '.', ' ') }} UZS</td>
                                            <td>{{ $expense->category ? $expense->category->name : 'No Category' }}</td>
                                            <td>{{ $expense->branch->name ?? 'N/A' }}</td> <!-- Branch nomi ko'rsatilmoqda -->
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="{{ route('expenses.show', $expense->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather-eye"></i>
                                                    </a>

                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">

                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('expenses.edit', $expense->id) }}">
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

                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <form class="dropdown-item" action="{{ route('expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('Ochirishga ruxsat berasizmi')">
                                                                    @csrf
                                                                    @method('DELETE')   
                                                                    <input type="hidden" value="{{ $expense->id }}" name="expense_id">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
    <x-footer></x-footer>
</main>
@endsection
