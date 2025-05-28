<!-- resources/views/admin/create.blade.php -->

<form action="{{ route('admin.store') }}" method="POST">
    @csrf
    <div>
        <label for="admin_id">Admin ID:</label>
        <input type="text" id="admin_id" name="admin_id" required>
    </div>
    <div>
        <label for="admin_name">Admin Name:</label>
        <input type="text" id="admin_name" name="admin_name" required>
    </div>
    <button type="submit">Create Admin</button>
</form>
