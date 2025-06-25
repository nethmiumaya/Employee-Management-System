@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Super Admin</h1>
    <form action="{{ route('super_admins.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="super_admin_name" class="form-label">Super Admin Name</label>
            <input type="text" class="form-control" id="super_admin_name" name="super_admin_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
