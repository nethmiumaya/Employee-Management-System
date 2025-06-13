@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Report</h1>
    <form method="POST" action="{{ route('reports.update', $report->report_id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="report_name" class="form-label">Report Name</label>
            <input type="text" class="form-control" id="report_name" name="report_name" value="{{ old('report_name', $report->report_name) }}" required>
        </div>
        <div class="mb-3">
            <label for="super_admin_id" class="form-label">Super Admin</label>
            <select class="form-control" id="super_admin_id" name="super_admin_id" required>
                <option value="">Select Super Admin</option>
                @foreach($superAdmins as $admin)
                <option value="{{ $admin->super_admin_id }}" {{ $report->super_admin_id == $admin->super_admin_id ? 'selected' : '' }}>
                    {{ $admin->super_admin_name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Report</button>
    </form>
</div>
@endsection
