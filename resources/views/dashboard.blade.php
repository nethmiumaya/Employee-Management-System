<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: blue; cursor: pointer;">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</nav>

<h1>Welcome to the Dashboard!</h1>
</body>
</html>
