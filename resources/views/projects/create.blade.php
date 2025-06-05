@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <input type="text" name="project_id" placeholder="Project ID" required class="form-control mb-2">
        <input type="text" name="project_name" placeholder="Project Name" required class="form-control mb-2">
        <select name="team_id" class="form-control mb-2" required>
            <option value="">Select Team</option>
            @foreach($teams as $team)
            <option value="{{ $team->team_id }}">{{ $team->team_name }}</option>
            @endforeach
        </select>
        <textarea name="description" placeholder="Description" class="form-control mb-2"></textarea>
        <input type="text" name="client" placeholder="Client" class="form-control mb-2">
        <input type="text" name="status" placeholder="Status" class="form-control mb-2">
        <input type="date" name="start_date" class="form-control mb-2">
        <input type="date" name="end_date" class="form-control mb-2">
        <textarea name="milestone_info" placeholder="Milestone Info" class="form-control mb-2"></textarea>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
