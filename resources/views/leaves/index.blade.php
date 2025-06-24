@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" action="{{ route('leaves.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by Employee Name" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <h1>Leaves</h1>
    <a href="{{ route('leaves.create') }}" class="btn btn-primary mb-3">Create Leave</a>
    <table class="table">
        <thead>
        <tr>
            <th>Leave ID</th>
            <th>Employee</th>
            <th>Reason</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($leaves as $leave)
        <tr>
            <td>{{ $leave->leave_id }}</td>
            <td>{{ $leave->employee->employee_name ?? 'N/A' }}</td>
            <td>{{ $leave->reason }}</td>
            <td>{{ $leave->start_date }}</td>
            <td>{{ $leave->end_date }}</td>
            <td>
                <a href="{{ route('leaves.show', $leave->leave_id) }}" class="btn btn-info">View</a>
                <a href="{{ route('leaves.edit', $leave->leave_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('leaves.destroy', $leave->leave_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this leave?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
