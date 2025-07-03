<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html { height: 100%; margin: 0; }
        .dashboard-container { display: flex; min-height: 100vh; }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            padding-top: 60px;
        }
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 2rem;
            background: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="p-3">Sidebar</h2>
        <ul class="nav flex-column p-3">
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('employees.index') }}">Employees</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('departments.index') }}">Departments</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('projects.index') }}">Projects</a>
            </li>
            <!-- Add more sidebar links as needed -->
        </ul>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        @yield('dashboard-content')
    </div>
</div>
</body>
</html>
