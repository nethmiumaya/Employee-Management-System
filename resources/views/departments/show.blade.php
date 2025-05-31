@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Department Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Department ID: {{ $department->department_id }}</h5>
            <p class="card-text">Department Name: {{ $department->department_name }}</p>
        </div>
    </div>
    <a href="{{ route('departments.index') }}" class="btn btn-secondary mt-3">Back to Departments</a>
</div>
@endsection
