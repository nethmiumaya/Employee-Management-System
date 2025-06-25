@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Leave</h1>
    <form action="{{ route('leaves.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
               <select name="employee_id" class="form-control mb-2" required>
            <option value="">Select Employee</option>
            @foreach($employees as $employee)
            <option value="{{ $employee->employee_id }}" {{ old('employee_id') == $employee->employee_id ? 'selected' : '' }}>
            {{ $employee->employee_name }}
            </option>
            @endforeach
        </select>
        <input type="file" name="supporting_doc" class="form-control mb-2">
        <textarea name="reason" class="form-control mb-2" required>{{ old('reason') }}</textarea>
        <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control mb-2" required>
        <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
