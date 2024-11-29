@extends('layouts.layout')

@section('content')

<main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Create Expense</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Expense</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="{{ route('payments.create') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>New Expense</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <h1>Add New Expense</h1>

            <form action="{{ route('expenses.store') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <div class="mb-3 col-6 row">
                        <label for="operation_id" class="col-sm-2 col-form-label">Operation</label>
                        <div class="col-sm-10">
                            <select name="operation_id" class="form-control" required>
                                @foreach($operations as $operation)
                                    <option value="{{ $operation->id }}">{{ $operation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 col-6 row">
                        <label for="expense_date" class="col-sm-2 col-form-label">Expense Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="expense_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3 col-6 row">
                        <label for="branch_id" class="col-sm-2 col-form-label">Branch</label>
                        <div class="col-sm-10">
                            <select name="branch_id" class="form-control" required>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 col-6 row">
                        <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option>Select</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                <option value="add_new">Add new</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 col-6 row">
                        <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                        <div class="col-sm-10">
                            <input type="number" name="amount" class="form-control" required step="0.01">
                        </div>
                    </div>
                
                    <div class="mb-3 row">
                        <label for="comment" class="col-1 col-form-label">Comment</label>
                        <div class="col-11">
                            <textarea name="comment" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <x-footer></x-footer>
</main>
<script>
    document.getElementById('category_id').addEventListener('change', function() {
        if (this.value === 'add_new') {
            var myModal = new bootstrap.Modal(document.getElementById('createCategoryFolder'), {});
            myModal.show();
            this.value = ''; // Select value-ni qayta bo'shatish
        }
    });
</script>

@endsection
