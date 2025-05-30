@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Report Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Report ID: {{ $report->report_id }}</h5>
            <p class="card-text">Report Name: {{ $report->report_name }}</p>
            <p class="card-text">Super Admin ID: {{ $report->super_admin_id }}</p>
        </div>
    </div>
    <a href="{{ route('reports.index') }}" class="btn btn-secondary mt-3">Back to Reports</a>
</div>
@endsection
