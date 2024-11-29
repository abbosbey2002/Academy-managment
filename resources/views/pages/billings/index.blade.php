@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>{{ __('billing.billings')}} </h1>
        <a href="{{ route('billings.create') }}" class="btn btn-primary">Create Billing</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('billing.student_name')}}</th>
                <th>{{ __('billing.account')}}</th>
                <th>{{ __('students.amount')}}</th>
                <th>{{ __('students.actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($billings as $billing)
                <tr>
                    <td>{{ $billing->id }}</td>
                    <td>{{ $billing->student->first_name }} {{ $billing->student->last_name }}</td>
                    <td>{{ $billing->account }}</td>
                    <td>{{ $billing->amount }}</td>
                    <td>
                        <a href="{{ route('billings.show', $billing) }}" class="btn btn-info">View</a>
                        <a href="{{ route('billings.edit', $billing) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('billings.destroy', $billing) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('messages.general.delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
