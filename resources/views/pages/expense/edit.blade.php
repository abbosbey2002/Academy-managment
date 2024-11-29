@extends('layouts.layout')

@section('content')
<div class="nxl-container">
    <h1>Edit Expense</h1>

    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="branch_id">Branch</label>
            <select name="branch_id" class="form-control" required>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}" {{ $branch->id == $expense->branch_id ? 'selected' : '' }}>{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="operation_id">Operation</label>
            <select name="operation_id" class="form-control" required>
                @foreach($operations as $operation)
                    <option value="{{ $operation->id }}" {{ $operation->id == $expense->operation_id ? 'selected' : '' }}>{{ $operation->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $expense->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" required step="0.01" value="{{ $expense->amount }}">
        </div>

        <div class="form-group">
            <label for="expense_date">Expense Date</label>
            <input type="date" name="expense_date" class="form-control" required value="{{ $expense->expense_date }}">
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" class="form-control">{{ $expense->comment }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
