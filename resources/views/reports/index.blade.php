@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reports</h1>
    <a href="{{ route('reports.create') }}" class="btn btn-primary mb-3">Create Report</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
        <tr>
            <td>{{ $report->report_id }}</td>
            <td>{{ $report->report_name }}</td>
            <td>
                <a href="{{ route('reports.edit', $report->report_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('reports.destroy', $report->report_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('reports.show', $report->report_id) }}" class="btn btn-info">View</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
