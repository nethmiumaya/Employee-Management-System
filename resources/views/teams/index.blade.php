@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teams</h1>
    <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Create Team</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Employee</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
        <tr>
            <td>{{ $team->team_id }}</td>
            <td>{{ $team->team_name }}</td>
            <td>{{ $team->employee_id ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('teams.edit', $team->team_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('teams.destroy', $team->team_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('teams.show', $team->team_id) }}" class="btn btn-info">View</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
