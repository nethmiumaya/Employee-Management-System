<!-- resources/views/auth/forgot-password.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
<h1>Forgot Password</h1>
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Send Password Reset Link</button>
</form>
</body>
</html>
