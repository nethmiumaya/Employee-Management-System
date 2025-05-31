@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Department</h1>
    <form action="{{ route('departments.update', $department->department_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="department_id" class="form-label">Department ID</label>
            <input type="text" class="form-control" id="department_id" name="department_id" value="{{ $department->department_id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="department_name" class="form-label">Department Name</label>
            <input type="text" class="form-control" id="department_name" name="department_name" value="{{ $department->department_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
