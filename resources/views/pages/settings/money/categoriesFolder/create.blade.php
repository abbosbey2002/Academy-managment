@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h1>Create New Folder</h1>

    <form action="{{ route('category-folders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="folder_name">Folder Name</label>
            <input type="text" name="folder_name" id="folder_name" class="form-control" required>
            @error('folder_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Folder</button>
    </form>
</div>
@endsection
