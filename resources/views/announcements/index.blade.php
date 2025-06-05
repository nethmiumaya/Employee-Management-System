@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Announcements</h1>
    <a href="{{ route('announcements.create') }}" class="btn btn-primary mb-3">Create Announcement</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Content</th>
            <th>Date</th>
            <th>Target Team</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($announcements as $announcement)
        <tr>
            <td>{{ $announcement->announcement_id }}</td>
            <td>{{ Str::limit($announcement->content, 30) }}</td>
            <td>{{ $announcement->date }}</td>
            <td>{{ $announcement->target_team_id ?? 'N/A' }}</td>
            <td>{{ $announcement->department_id ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('announcements.edit', $announcement->announcement_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('announcements.destroy', $announcement->announcement_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('announcements.show', $announcement->announcement_id) }}" class="btn btn-info">View</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
