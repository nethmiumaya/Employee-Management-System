@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->employee_id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="employee_name" value="{{ $employee->employee_name }}" required>
        <input type="text" name="employee_type" value="{{ $employee->employee_type }}" required>
        <input type="text" name="employee_status" value="{{ $employee->employee_status }}" required>
        <input type="text" name="contact_no" value="{{ $employee->contact_no }}" required>
        <input type="text" name="department_id" value="{{ $employee->department_id }}">
        <input type="text" name="admin_id" value="{{ $employee->admin_id }}">
        <input type="text" name="paid_status" value="{{ $employee->paid_status }}" required>
        <input type="text" name="team_id" value="{{ $employee->team_id }}">
        <input type="text" name="role" value="{{ $employee->role }}" required>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
