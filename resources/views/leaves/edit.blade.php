@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Leave</h1>
    <form action="{{ route('leaves.update', $leave->leave_id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" value="{{ $leave->leave_id }}" class="form-control mb-2" disabled>
        <select name="employee_id" class="form-control mb-2" required>
            <option value="">Select Employee</option>
            @foreach($employees as $employee)
            <option value="{{ $employee->employee_id }}" {{ $leave->employee_id == $employee->employee_id ? 'selected' : '' }}>
                {{ $employee->employee_name }}
            </option>
            @endforeach
        </select>
        <input type="text" name="supporting_doc" value="{{ old('supporting_doc', $leave->supporting_doc) }}" placeholder="Supporting Document" class="form-control mb-2">
        <textarea name="reason" class="form-control mb-2" required>{{ old('reason', $leave->reason) }}</textarea>
        <input type="date" name="start_date" value="{{ old('start_date', $leave->start_date) }}" class="form-control mb-2" required>
        <input type="date" name="end_date" value="{{ old('end_date', $leave->end_date) }}" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
