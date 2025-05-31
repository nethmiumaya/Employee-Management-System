@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Admin ID: {{ $admin->admin_id }}</h5>
            <p class="card-text">Admin Name: {{ $admin->admin_name }}</p>
        </div>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back to Admin Dashboard</a>
</div>
@endsection
