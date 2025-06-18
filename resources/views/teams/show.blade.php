@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Team Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Team ID: {{ $team->team_id }}</h5>
            <p class="card-text">Team Name: {{ $team->team_name }}</p>
            <p class="card-text">
                Employee IDs:
                @forelse($team->employees as $employee)
                {{ $employee->employee_id }}{{ !$loop->last ? ',' : '' }}
                @empty
                N/A
                @endforelse
            </p>
        </div>
    </div>
    <a href="{{ route('teams.index') }}" class="btn btn-secondary mt-3">Back to Teams</a>
</div>
@endsection
