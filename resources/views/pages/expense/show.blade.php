@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Expense Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Operation: {{ $expense->operation->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Category: {{ $expense->category->name }}</h6>
            <p class="card-text">Amount: {{ $expense->amount }}</p>
            <p class="card-text">Expense Date: {{ $expense->expense_date }}</p>
            <p class="card-text">Branch: {{ $expense->branch->name }}</p> <!-- Display branch name -->
            <p class="card-text">Comment: {{ $expense->comment }}</p>
            <a href="{{ route('expenses.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
