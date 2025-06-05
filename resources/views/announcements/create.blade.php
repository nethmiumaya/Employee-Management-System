@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Announcement</h1>
    <form action="{{ route('announcements.store') }}" method="POST">
        @csrf
        <input type="text" name="announcement_id" placeholder="Announcement ID" required>
        <textarea name="content" placeholder="Content" required></textarea>
        <input type="date" name="date" required>
        <select name="target_team_id">
            <option value="">Select Team (optional)</option>
            @foreach($teams as $team)
            <option value="{{ $team->team_id }}">{{ $team->team_name }}</option>
            @endforeach
        </select>
        <select name="department_id">
            <option value="">Select Department (optional)</option>
            @foreach($departments as $department)
            <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
