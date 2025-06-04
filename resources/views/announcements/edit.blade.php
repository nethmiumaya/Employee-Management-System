@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Announcement</h1>
    <form method="POST" action="{{ route('announcements.update', $announcement->announcement_id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="announcement_id" value="{{ $announcement->announcement_id }}" readonly>
        <textarea name="content" required>{{ old('content', $announcement->content) }}</textarea>
        <input type="date" name="date" value="{{ old('date', $announcement->date) }}" required>
        <select name="target_team_id">
            <option value="">Select Team (optional)</option>
            @foreach($teams as $team)
            <option value="{{ $team->team_id }}" {{ $announcement->target_team_id == $team->team_id ? 'selected' : '' }}>
                {{ $team->team_name }}
            </option>
            @endforeach
        </select>
        <select name="department_id">
            <option value="">Select Department (optional)</option>
            @foreach($departments as $department)
            <option value="{{ $department->department_id }}" {{ $announcement->department_id == $department->department_id ? 'selected' : '' }}>
                {{ $department->department_name }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
