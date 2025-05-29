@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Admin</h1>
    <form action="{{ route('admins.update', $admin->admin_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="admin_id" class="form-label">Admin ID</label>
            <input type="text" class="form-control" id="admin_id" name="admin_id" value="{{ $admin->admin_id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="admin_name" class="form-label">Admin Name</label>
            <input type="text" class="form-control" id="admin_name" name="admin_name" value="{{ $admin->admin_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
