@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Document</h1>
    <form action="{{ route('documents.update', $document->document_id) }}" method="POST">
        @csrf
        @method('PUT')
        <select name="employee_id" required>
            <option value="">Select Employee</option>
            @foreach($employees as $employee)
            <option value="{{ $employee->employee_id }}" {{ $document->employee_id == $employee->employee_id ? 'selected' : '' }}>
                {{ $employee->employee_name }}
            </option>
            @endforeach
        </select>
        <input type="text" name="doc_path" value="{{ $document->doc_path }}" required>
        <input type="text" name="version" value="{{ $document->version }}" required>
        <input type="date" name="review_date" value="{{ $document->review_date }}" required>
        <input type="text" name="access_permission" value="{{ $document->access_permission }}" required>
        <select name="project_id">
            <option value="">Select Project (optional)</option>
            @foreach($projects as $project)
            <option value="{{ $project->project_id }}" {{ $document->project_id == $project->project_id ? 'selected' : '' }}>
                {{ $project->project_name }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
