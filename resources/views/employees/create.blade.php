@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <input type="text" name="employee_name" placeholder="Name" required>
        <input type="text" name="employee_type" placeholder="Type" required>
        <input type="text" name="employee_status" placeholder="Status" required>
        <input type="text" name="contact_no" placeholder="Contact No" required>
        <select name="department_id">
            <option value="">Select Department</option>
            @foreach($departments as $department)
            <option value="{{ $department->department_id }}">{{ $department->department_id }}</option>
            @endforeach
        </select>
        <select name="team_ids[]" multiple>
            @foreach($teams as $team)
            <option value="{{ $team->team_id }}">{{ $team->team_name }}</option>
            @endforeach
        </select>
        <select name="admin_id">
            <option value="">Select Admin</option>
            @foreach($admins as $admin)
            <option value="{{ $admin->admin_id }}">{{ $admin->admin_id }}</option>
            @endforeach
        </select>
        <input type="text" name="paid_status" placeholder="Paid Status" required>
        <input type="text" name="role" placeholder="Role" required>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
