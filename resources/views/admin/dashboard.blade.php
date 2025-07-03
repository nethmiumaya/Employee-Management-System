<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HRMS') }} - Admin Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js - Update to specific version -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script> --}}


        <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">

</head>
<body>
    <div id="app">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <h2><i class="fas fa-building mr-2"></i>HRMS</h2>
                <div class="subtitle">Admin Dashboard</div>
            </div>

            <div class="sidebar-menu">
                <div class="sidebar-menu-section">
                    <div class="sidebar-menu-title">Main</div>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-menu-item active">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('employees.index') }}" class="sidebar-menu-item" id="loadEmployees">
                        <i class="fas fa-users"></i>
                        <span>Employees</span>
                        <span class="badge">{{ $totalEmployees ?? 156 }}</span>
                    </a>
                    <a href="{{ route('departments.index') }}" class="sidebar-menu-item" id="loadDepartments">
                        <i class="fas fa-building"></i>
                        <span>Departments</span>
                        <span class="badge">{{ $totalDepartments ?? 12 }}</span>
                    </a>
                </div>

                <div class="sidebar-menu-section">
                    <div class="sidebar-menu-title">Management</div>
                    <a href="{{ route('projects.index') }}" class="sidebar-menu-item" id="loadProjects">
                        <i class="fas fa-briefcase"></i>
                        <span>Projects</span>
                        <span class="badge">{{ $totalProjects ?? 0 }}</span>
                    </a>
                    <a href="{{ route('reports.index') }}" class="sidebar-menu-item">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reports</span>
                    </a>
                    <a href="{{ route('admins.index') }}" class="sidebar-menu-item">
                        <i class="fas fa-user-shield"></i>
                        <span>Admins</span>
                    </a>
                </div>

                <div class="sidebar-menu-section">
                    <div class="sidebar-menu-title">System</div>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                    <a href="#" class="sidebar-menu-item" onclick="openNotificationPanel()">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                        <span class="badge">5</span>
                    </a>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-question-circle"></i>
                        <span>Help & Support</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navigation -->
            <div class="top-nav">
                <div class="nav-title">
                    <button class="mobile-menu-btn" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                    <i class="fas fa-tachometer-alt"></i>
                    Admin Dashboard
                </div>

                <div class="nav-actions">
                    <button class="notification-btn" onclick="openNotificationPanel()">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">5</span>
                    </button>

                    <div class="user-menu" onclick="openProfileModal()">
                        <div class="user-avatar">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="user-info">
                            <h4>{{ Auth::user()->name ?? 'Admin User' }}</h4>
                            <p>{{ ucfirst(Auth::user()->role ?? 'admin') }}</p>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="dashboard-content" id="dashboardContent">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stats-card">
                        <div class="stats-header">
                            <div>
                                <div class="stats-value">{{ $totalEmployees ?? 156 }}</div>
                                <div class="stats-label">Total Employees</div>
                                <div class="stats-change positive">
                                    <i class="fas fa-arrow-up"></i>
                                    +12% from last month
                                </div>
                            </div>
                            <div class="stats-icon primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>

                    <div class="stats-card">
                        <div class="stats-header">
                            <div>
                                <div class="stats-value">{{ $activeProjects ?? 24 }}</div>
                                <div class="stats-label">Active Projects</div>
                                <div class="stats-change positive">
                                    <i class="fas fa-arrow-up"></i>
                                    +8% from last month
                                </div>
                            </div>
                            <div class="stats-icon success">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                        </div>
                    </div>

                    <div class="stats-card">
                        <div class="stats-header">
                            <div>
                                <div class="stats-value">{{ $pendingLeaves ?? 7 }}</div>
                                <div class="stats-label">Pending Leaves</div>
                                <div class="stats-change negative">
                                    <i class="fas fa-arrow-down"></i>
                                    -3% from last month
                                </div>
                            </div>
                            <div class="stats-icon warning">
                                <i class="fas fa-calendar-times"></i>
                            </div>
                        </div>
                    </div>

                    <div class="stats-card">
                        <div class="stats-header">
                            <div>
                                <div class="stats-value">{{ $newJoinings ?? 12 }}</div>
                                <div class="stats-label">New Joinings</div>
                                <div class="stats-change positive">
                                    <i class="fas fa-arrow-up"></i>
                                    +25% from last month
                                </div>
                            </div>
                            <div class="stats-icon info">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="charts-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Employee Growth</h3>
                            <div class="chart-filter">
                                <button class="filter-btn active">7D</button>
                                <button class="filter-btn">1M</button>
                                <button class="filter-btn">3M</button>
                                <button class="filter-btn">1Y</button>
                            </div>
                        </div>
                        <canvas id="employeeChart" height="300"></canvas>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Department Distribution</h3>
                        </div>
                        <canvas id="departmentChart" height="300"></canvas>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="quick-actions">
                    <div class="actions-header">
                        <h3 class="chart-title">Quick Actions</h3>
                        <button class="btn btn-secondary">
                            <i class="fas fa-plus"></i>
                            View All
                        </button>
                    </div>
                    <div class="actions-grid">
                        <a href="{{ route('employees.create') }}" class="action-btn">
                            <div class="action-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="action-content">
                                <h4>Add Employee</h4>
                                <p>Create new employee profile</p>
                            </div>
                        </a>
                        <a href="{{ route('departments.create') }}" class="action-btn">
                            <div class="action-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="action-content">
                                <h4>Add Department</h4>
                                <p>Create new department</p>
                            </div>
                        </a>
                        <a href="{{ route('reports.create') }}" class="action-btn">
                            <div class="action-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="action-content">
                                <h4>Generate Report</h4>
                                <p>Create custom reports</p>
                            </div>
                        </a>
                        <a href="{{ route('admins.create') }}" class="action-btn">
                            <div class="action-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="action-content">
                                <h4>Add Admin</h4>
                                <p>Create admin account</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="activities-card">
                    <div class="chart-header">
                        <h3 class="chart-title">Recent Activities</h3>
                        <button class="btn btn-secondary">
                            <i class="fas fa-eye"></i>
                            View All
                        </button>
                    </div>

                    <div class="activity-item">
                        <div class="activity-avatar">JD</div>
                        <div class="activity-content">
                            <h4>John Doe joined the Development team</h4>
                            <p>New employee onboarding completed successfully</p>
                            <div class="activity-time">2 hours ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-avatar">SM</div>
                        <div class="activity-content">
                            <h4>Sarah Miller submitted leave request</h4>
                            <p>Annual leave request for 5 days pending approval</p>
                            <div class="activity-time">4 hours ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-avatar">MJ</div>
                        <div class="activity-content">
                            <h4>Mike Johnson completed Project Alpha</h4>
                            <p>Project milestone achieved ahead of schedule</p>
                            <div class="activity-time">6 hours ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-avatar">LW</div>
                        <div class="activity-content">
                            <h4>Lisa Wang updated employee records</h4>
                            <p>Bulk update of employee contact information</p>
                            <div class="activity-time">1 day ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div id="profileModal" class="modal">
        <div class="modal-content" style="max-width: 700px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-user-edit"></i>
                    Profile Settings
                </h3>
                <button type="button" class="modal-close" onclick="closeProfileModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="profileForm" action="{{ route('admin.profile.update') ?? '#' }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user mr-2"></i>Full Name
                            </label>
                            <input type="text" name="name" class="form-input" value="{{ Auth::user()->name ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-envelope mr-2"></i>Email Address
                            </label>
                            <input type="email" name="email" class="form-input" value="{{ Auth::user()->email ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-phone mr-2"></i>Contact Number
                            </label>
                            <input type="tel" name="contact_no" class="form-input" value="{{ Auth::user()->contact_no ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-lock mr-2"></i>Current Password
                            </label>
                            <input type="password" name="current_password" class="form-input" placeholder="Enter current password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-key mr-2"></i>New Password
                            </label>
                            <input type="password" name="new_password" class="form-input" placeholder="Leave blank to keep current">
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-check-circle mr-2"></i>Confirm Password
                            </label>
                            <input type="password" name="new_password_confirmation" class="form-input" placeholder="Confirm new password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeProfileModal()">
                    <i class="fas fa-times"></i>
                    Cancel
                </button>
                <button type="submit" form="profileForm" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    <!-- Notification Panel -->
    <div id="notificationPanel" class="notification-panel">
        <div class="notification-header">
            <h3>Notifications</h3>
            <p>Stay updated with latest activities</p>
            <button type="button" class="modal-close" onclick="closeNotificationPanel()" style="position: absolute; top: 1rem; right: 1rem;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="notification-list">
            <div class="notification-item unread">
                <div class="notification-icon info">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="notification-content">
                    <h4>New Employee Registration</h4>
                    <p>John Doe has registered and is pending approval</p>
                    <div class="notification-time">5 minutes ago</div>
                </div>
            </div>

            <div class="notification-item unread">
                <div class="notification-icon warning">
                    <i class="fas fa-calendar-times"></i>
                </div>
                <div class="notification-content">
                    <h4>Leave Request Pending</h4>
                    <p>Sarah Miller submitted a leave request for review</p>
                    <div class="notification-time">1 hour ago</div>
                </div>
            </div>

            <div class="notification-item">
                <div class="notification-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="notification-content">
                    <h4>Project Completed</h4>
                    <p>Development team completed Project Alpha successfully</p>
                    <div class="notification-time">3 hours ago</div>
                </div>
            </div>

            <div class="notification-item">
                <div class="notification-icon info">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="notification-content">
                    <h4>Monthly Report Generated</h4>
                    <p>Employee performance report for October is ready</p>
                    <div class="notification-time">1 day ago</div>
                </div>
            </div>

            <div class="notification-item">
                <div class="notification-icon warning">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="notification-content">
                    <h4>System Maintenance</h4>
                    <p>Scheduled maintenance on Sunday 2:00 AM - 4:00 AM</p>
                    <div class="notification-time">2 days ago</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div id="successMessage" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div id="errorMessage" class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center gap-2">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <script>
        // Mobile Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }

        // Profile Modal Functions
        function openProfileModal() {
            document.getElementById('profileModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeProfileModal() {
            document.getElementById('profileModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        // Notification Panel Functions
        function openNotificationPanel() {
            document.getElementById('notificationPanel').classList.add('show');
            // Mark notifications as read
            document.querySelectorAll('.notification-item.unread').forEach(item => {
                setTimeout(() => item.classList.remove('unread'), 1000);
            });
            // Update badge count
            setTimeout(() => {
                document.querySelectorAll('.notification-badge').forEach(badge => {
                    badge.textContent = '0';
                    badge.style.display = 'none';
                });
            }, 2000);
        }

        function closeNotificationPanel() {
            document.getElementById('notificationPanel').classList.remove('show');
        }

        // Auto-hide messages
        setTimeout(() => {
            const successMsg = document.getElementById('successMessage');
            const errorMsg = document.getElementById('errorMessage');
            if (successMsg) successMsg.style.display = 'none';
            if (errorMsg) errorMsg.style.display = 'none';
        }, 5000);

        // Charts
        document.addEventListener('DOMContentLoaded', function() {
            // Store chart instances globally
            let charts = {
                employee: null,
                department: null
            };

            // Chart initialization function with retry mechanism
            function initializeChart(canvasId, config, retries = 3) {
                return new Promise((resolve, reject) => {
                    function tryInit() {
                        try {
                            const ctx = document.getElementById(canvasId);
                            if (!ctx) throw new Error(`Canvas ${canvasId} not found`);

                            // Destroy existing chart if it exists
                            if (charts[canvasId]) {
                                charts[canvasId].destroy();
                            }

                            // Create new chart
                            charts[canvasId] = new Chart(ctx, config);
                            resolve(charts[canvasId]);
                        } catch (error) {
                            console.error(`Error initializing ${canvasId} chart:`, error);
                            if (retries > 0) {
                                console.log(`Retrying ${canvasId} chart initialization... (${retries} attempts left)`);
                                setTimeout(() => tryInit(), 1000);
                                retries--;
                            } else {
                                showChartError(canvasId);
                                reject(error);
                            }
                        }
                    }

                    tryInit();
                });
            }

            // Error display function
            function showChartError(canvasId) {
                const canvas = document.getElementById(canvasId);
                if (canvas) {
                    canvas.style.display = 'none';
                    canvas.insertAdjacentHTML('afterend', `
                        <div class="chart-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <p>Failed to load chart. <button onclick="retryChart('${canvasId}')" class="btn btn-primary btn-sm">Retry</button></p>
                        </div>
                    `);
                }
            }

            // Global retry function
            window.retryChart = function(canvasId) {
                const canvas = document.getElementById(canvasId);
                const errorDiv = canvas.nextElementSibling;
                canvas.style.display = 'block';
                if (errorDiv && errorDiv.classList.contains('chart-error')) {
                    errorDiv.remove();
                }
                initializeCharts();
            };

            // Initialize all charts
            function initializeCharts() {
                // Employee Growth Chart Configuration
                const employeeConfig = {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Employees',
                            data: [120, 125, 132, 140, 148, 156],
                            borderColor: '#f97316',
                            backgroundColor: 'rgba(249, 115, 22, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#f97316',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 6,
                            pointHoverRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                                borderColor: '#f97316',
                                borderWidth: 1
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: '#f3f4f6' },
                                ticks: { color: '#6b7280' }
                            },
                            x: {
                                grid: { display: false },
                                ticks: { color: '#6b7280' }
                            }
                        }
                    }
                };

                // Department Distribution Chart Configuration
                const departmentConfig = {
                    type: 'doughnut',
                    data: {
                        labels: ['Development', 'Design', 'Marketing', 'HR', 'Sales'],
                        datasets: [{
                            data: [45, 25, 20, 15, 35],
                            backgroundColor: [
                                '#f97316',
                                '#ea580c',
                                '#dc2626',
                                '#f59e0b',
                                '#fb923c'
                            ],
                            borderWidth: 0,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '60%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 20,
                                    usePointStyle: true,
                                    font: {
                                        size: 12,
                                        weight: '500'
                                    },
                                    color: '#6b7280'
                                }
                            }
                        }
                    }
                };

                // Initialize charts with retry mechanism
                Promise.all([
                    initializeChart('employeeChart', employeeConfig),
                    initializeChart('departmentChart', departmentConfig)
                ]).then(() => {
                    console.log('All charts initialized successfully');
                }).catch(error => {
                    console.error('Some charts failed to initialize:', error);
                });
            }

            // Initial charts load
            initializeCharts();

            // Reinitialize charts on window resize (debounced)
            let resizeTimeout;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(initializeCharts, 250);
            });

            // Reinitialize charts when tab becomes visible
            document.addEventListener('visibilitychange', function() {
                if (document.visibilityState === 'visible') {
                    initializeCharts();
                }
            });
        });

        // Filter buttons functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Update chart data based on filter (placeholder)
                console.log('Filter changed to:', this.textContent);
            });
        });

        // Real-time updates (simulated)
        setInterval(() => {
            // Update notification badge randomly
            const badges = document.querySelectorAll('.notification-badge');
            badges.forEach(badge => {
                if (Math.random() > 0.9 && badge.style.display !== 'none') {
                    const current = parseInt(badge.textContent) || 0;
                    badge.textContent = current + 1;
                    badge.style.display = 'block';
                }
            });
        }, 30000);

        // Smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Close modals and panels when clicking outside
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const mobileBtn = document.querySelector('.mobile-menu-btn');
            const profileModal = document.getElementById('profileModal');
            const notificationPanel = document.getElementById('notificationPanel');

            // Close sidebar on mobile
            if (window.innerWidth <= 768 &&
                !sidebar.contains(e.target) &&
                !mobileBtn.contains(e.target) &&
                sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
            }

            // Close profile modal
            if (e.target === profileModal) {
                closeProfileModal();
            }

            // Close notification panel
            if (!notificationPanel.contains(e.target) &&
                !e.target.closest('.notification-btn') &&
                notificationPanel.classList.contains('show')) {
                closeNotificationPanel();
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Escape key closes modals
            if (e.key === 'Escape') {
                if (document.getElementById('profileModal').classList.contains('show')) {
                    closeProfileModal();
                }
                if (document.getElementById('notificationPanel').classList.contains('show')) {
                    closeNotificationPanel();
                }
            }

            // Ctrl/Cmd + K opens search (placeholder)
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                console.log('Search shortcut triggered');
            }
        });

        // Form validation for profile modal
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            const newPassword = document.querySelector('input[name="new_password"]').value;
            const confirmPassword = document.querySelector('input[name="new_password_confirmation"]').value;

            if (newPassword && newPassword !== confirmPassword) {
                e.preventDefault();
                alert('New passwords do not match!');
                return false;
            }

            if (newPassword && newPassword.length < 8) {
                e.preventDefault();
                alert('New password must be at least 8 characters long!');
                return false;
            }
        });

        // Add loading states to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (this.type === 'submit' || this.href) {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Loading...';
                    this.disabled = true;

                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.disabled = false;
                    }, 2000);
                }
            });
        });

        // Initialize tooltips (if needed)
        function initTooltips() {
            const tooltipElements = document.querySelectorAll('[data-tooltip]');
            tooltipElements.forEach(element => {
                element.addEventListener('mouseenter', function() {
                    // Tooltip implementation would go here
                });
            });
        }

        // Call initialization functions
        initTooltips();

        // Performance monitoring
        window.addEventListener('load', function() {
            console.log('Dashboard loaded in:', performance.now(), 'ms');
        });
    </script>
    <script>
        document.getElementById('loadEmployees').addEventListener('click', function(e) {
            e.preventDefault();
            fetch(this.href, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('dashboardContent').innerHTML = html;
                });
        });
    </script>
    <script>
        document.getElementById('loadProjects').addEventListener('click', function(e) {
            e.preventDefault();
            fetch(this.href, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('dashboardContent').innerHTML = html;
                });
        });
    </script>
    <script>
        document.getElementById('loadDepartments').addEventListener('click', function(e) {
            e.preventDefault();
            fetch(this.href, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('dashboardContent').innerHTML = html;
                });
        });
    </script>
</body>
</html>
