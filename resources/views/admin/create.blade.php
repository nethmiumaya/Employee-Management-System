@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Admin</h1>
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="admin_id" class="form-label">Admin ID</label>
            <input type="text" class="form-control" id="admin_id" name="admin_id" required>
        </div>
        <div class="mb-3">
            <label for="admin_name" class="form-label">Admin Name</label>
            <input type="text" class="form-control" id="admin_name" name="admin_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Admin</button>
    </form>
</div>
@endsection
