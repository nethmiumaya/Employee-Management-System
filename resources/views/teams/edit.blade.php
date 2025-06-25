@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Team</h1>
    <form method="POST" action="{{ route('teams.update', $team->team_id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="team_name" value="{{ old('team_name', $team->team_name) }}" required>
        <select name="employee_ids[]" multiple>
            @foreach($employees as $employee)
            <option value="{{ $employee->employee_id }}" {{ $team->employees->contains($employee->employee_id) ? 'selected' : '' }}>
                {{ $employee->employee_name }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
