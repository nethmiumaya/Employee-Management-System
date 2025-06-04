@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Document</h1>
    <form action="{{ route('documents.store') }}" method="POST">
        @csrf
        <input type="text" name="document_id" placeholder="Document ID" required>
        <select name="employee_id" required>
            <option value="">Select Employee</option>
            @foreach($employees as $employee)
            <option value="{{ $employee->employee_id }}">{{ $employee->employee_name }}</option>
            @endforeach
        </select>
        <input type="text" name="doc_path" placeholder="Document Path" required>
        <input type="text" name="version" placeholder="Version" required>
        <input type="date" name="review_date" required>
        <input type="text" name="access_permission" placeholder="Access Permission" required>
        <select name="project_id">
            <option value="">Select Project (optional)</option>
            @foreach($projects as $project)
            <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
