@extends('layouts.app')

@section('content')
<div class="container">

    <form method="GET" action="{{ route('projects.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by Project ID" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create Project</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Team</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->project_id }}</td>
            <td>{{ $project->project_name }}</td>
            <td>{{ $project->team_id }}</td>
            <td>
                <a href="{{ route('projects.show', $project->project_id) }}" class="btn btn-info">View</a>
                <a href="{{ route('projects.edit', $project->project_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('projects.destroy', $project->project_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

