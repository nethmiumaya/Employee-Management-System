@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Team</h1>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <input type="text" name="team_id" placeholder="Team ID" required>
        <input type="text" name="team_name" placeholder="Team Name" required>
        <select name="employee_id">
            <option value="">Select Employee (optional)</option>
            @foreach($employees as $employee)
            <option value="{{ $employee->employee_id }}">{{ $employee->employee_name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
