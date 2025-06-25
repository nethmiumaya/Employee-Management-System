@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Department</h1>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <input type="text" name="department_name" placeholder="Department Name" required>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
