@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>{{ __('billing.create')}}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('billings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="student_id">{{ __('message.students.student')}}</label>
                <select name="student_id" class="form-control" required>
                    <option value="" disabled selected>{{ __('billing.select_student')}}</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="account">{{ __('billing.account')}}</label>
                <input type="text" name="account" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="amount">{{ __('billing.amount')}}</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('messages.general.save')}}</button>
        </form>
    </div>
@endsection
