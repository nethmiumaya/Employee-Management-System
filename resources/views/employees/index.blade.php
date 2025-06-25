@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employees</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Create Employee</a>

    <form method="GET" action="{{ route('employees.index') }}" class="mb-3">
        <div class="row">
            <div class="col">
                <input type="text" name="employee_name" class="form-control" placeholder="Name" value="{{ request('employee_name') }}">
            </div>
            <div class="col">
                <input type="text" name="role" class="form-control" placeholder="Role" value="{{ request('role') }}">
            </div>
            <div class="col">
                <select name="paid_status" class="form-control">
                    <option value="">Paid Status</option>
                    <option value="paid" {{ request('paid_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="unpaid" {{ request('paid_status') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Contact No</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->employee_id }}</td>
            <td>{{ $employee->employee_name }}</td>
            <td>{{ $employee->employee_type }}</td>
            <td>{{ $employee->employee_status }}</td>
            <td>{{ $employee->contact_no }}</td>
            <td>
                <a href="{{ route('employees.edit', $employee->employee_id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('employees.destroy', $employee->employee_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('employees.show', $employee->employee_id) }}" class="btn btn-info btn-sm">View</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
