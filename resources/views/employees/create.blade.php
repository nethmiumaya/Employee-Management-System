@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <input type="text" name="employee_id" placeholder="Employee ID" required>
        <input type="text" name="employee_name" placeholder="Name" required>
        <input type="text" name="employee_type" placeholder="Type" required>
        <input type="text" name="employee_status" placeholder="Status" required>
        <input type="text" name="contact_no" placeholder="Contact No" required>
        <input type="text" name="department_id" placeholder="Department ID">
        <input type="text" name="admin_id" placeholder="Admin ID">
        <input type="text" name="paid_status" placeholder="Paid Status" required>
        <input type="text" name="team_id" placeholder="Team ID">
        <input type="text" name="role" placeholder="Role" required>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
