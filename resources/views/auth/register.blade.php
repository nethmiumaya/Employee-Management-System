<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>
    <div>
        <label for="contact_no">Contact Number</label>
        <input id="contact_no" type="text" name="contact_no" required>
    </div>
    <div>
        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value="employee">Employee</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <button type="submit">Register</button>
</form>
</body>
</html>
