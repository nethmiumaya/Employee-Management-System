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

    <style>
        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --primary-light: #fb923c;
            --secondary: #dc2626;
            --accent: #f59e0b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --dark: #1f2937;
            --light: #f8fafc;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: var(--gray-800);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Enhanced Sidebar Styles */
        .sidebar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 50%, var(--secondary) 100%);
            width: 280px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            box-shadow: var(--shadow-2xl);
            backdrop-filter: blur(20px);
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.1;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .sidebar-brand {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .sidebar-brand h2 {
            color: white;
            font-size: 1.875rem;
            font-weight: 900;
            margin: 0;
            letter-spacing: 0.05em;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .sidebar-brand .subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.875rem;
            font-weight: 500;
            margin-top: 0.5rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .sidebar-menu {
            padding: 1.5rem 0;
            position: relative;
            z-index: 1;
        }

        .sidebar-menu-section {
            margin-bottom: 2rem;
        }

        .sidebar-menu-title {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            padding: 0 1.5rem;
            margin-bottom: 1rem;
        }

        .sidebar-menu-item {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 0;
            margin: 0.25rem 0.75rem;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .sidebar-menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 0.75rem;
        }

        .sidebar-menu-item::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 1rem;
            width: 0;
            height: 0;
            border-left: 6px solid rgba(255, 255, 255, 0.6);
            border-top: 4px solid transparent;
            border-bottom: 4px solid transparent;
            transform: translateY(-50%) scale(0);
            transition: transform 0.3s ease;
        }

        .sidebar-menu-item:hover::before,
        .sidebar-menu-item.active::before {
            width: 100%;
        }

        .sidebar-menu-item:hover::after,
        .sidebar-menu-item.active::after {
            transform: translateY(-50%) scale(1);
        }

        .sidebar-menu-item:hover,
        .sidebar-menu-item.active {
            color: white;
            transform: translateX(8px);
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .sidebar-menu-item i {
            width: 24px;
            margin-right: 1rem;
            font-size: 1.125rem;
            position: relative;
            z-index: 1;
        }

        .sidebar-menu-item span {
            font-weight: 500;
            position: relative;
            z-index: 1;
            flex: 1;
        }

        .sidebar-menu-item .badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            margin-left: auto;
            position: relative;
            z-index: 1;
            font-weight: 600;
            min-width: 1.5rem;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        /* Enhanced Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        /* Enhanced Top Navigation */
        .top-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 1rem 2rem;
            box-shadow: var(--shadow-lg);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(249, 115, 22, 0.1);
        }

        .nav-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--gray-800);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-title i {
            color: var(--primary);
            text-shadow: 0 2px 4px rgba(249, 115, 22, 0.3);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .notification-btn {
            position: relative;
            background: var(--gray-100);
            border: none;
            padding: 0.875rem;
            border-radius: 0.75rem;
            color: var(--gray-600);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
        }

        .notification-btn:hover {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            min-width: 1.5rem;
            text-align: center;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: var(--gray-50);
            border-radius: 1rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
        }

        .user-menu:hover {
            background: white;
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }

        .user-avatar {
            width: 2.5rem;
            height: 2.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
        }

        .user-info h4 {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-800);
        }

        .user-info p {
            font-size: 0.75rem;
            color: var(--gray-500);
            font-weight: 500;
        }

        /* Enhanced Dashboard Content */
        .dashboard-content {
            padding: 2rem;
            position: relative;
        }

        /* Enhanced Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background: white;
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .stats-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(249, 115, 22, 0.05) 0%, transparent 70%);
            transform: scale(0);
            transition: transform 0.4s ease;
        }

        .stats-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-2xl);
        }

        .stats-card:hover::after {
            transform: scale(1);
        }

        .stats-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .stats-icon {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
        }

        .stats-card:hover .stats-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .stats-icon.primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }

        .stats-icon.success {
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
        }

        .stats-icon.warning {
            background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
        }

        .stats-icon.info {
            background: linear-gradient(135deg, var(--info) 0%, #2563eb 100%);
        }

        .stats-value {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--gray-800);
            line-height: 1;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--gray-800) 0%, var(--gray-600) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stats-label {
            font-size: 0.875rem;
            color: var(--gray-600);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stats-change {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            font-size: 0.75rem;
            font-weight: 700;
            margin-top: 0.75rem;
            padding: 0.375rem 0.75rem;
            border-radius: 0.5rem;
            backdrop-filter: blur(10px);
        }

        .stats-change.positive {
            color: var(--success);
            background: rgba(16, 185, 129, 0.1);
        }

        .stats-change.negative {
            color: var(--danger);
            background: rgba(239, 68, 68, 0.1);
        }

        /* Enhanced Charts Section */
        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-card {
            background: white;
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
            backdrop-filter: blur(20px);
        }

        .chart-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-100);
        }

        .chart-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--gray-800);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .chart-title::before {
            content: '';
            width: 4px;
            height: 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 2px;
        }

        .chart-filter {
            display: flex;
            gap: 0.5rem;
            background: var(--gray-50);
            padding: 0.25rem;
            border-radius: 0.75rem;
            border: 1px solid var(--gray-200);
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border: none;
            background: transparent;
            color: var(--gray-600);
            border-radius: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
        }

        /* Enhanced Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
            margin-bottom: 2rem;
            backdrop-filter: blur(20px);
        }

        .actions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-100);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: 1rem;
            text-decoration: none;
            color: var(--gray-700);
            font-weight: 500;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            transition: width 0.4s ease;
            z-index: 0;
        }

        .action-btn:hover::before {
            width: 100%;
        }

        .action-btn:hover {
            color: white;
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .action-icon {
            width: 3rem;
            height: 3rem;
            background: white;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.25rem;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .action-btn:hover .action-icon {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: scale(1.1);
        }

        .action-content {
            position: relative;
            z-index: 1;
        }

        .action-content h4 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .action-content p {
            font-size: 0.875rem;
            opacity: 0.8;
        }

        /* Enhanced Activities Card */
        .activities-card {
            background: white;
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
            backdrop-filter: blur(20px);
        }

        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--gray-100);
            transition: all 0.3s ease;
            border-radius: 0.75rem;
            margin: 0 -0.5rem;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-item:hover {
            background: var(--gray-50);
            transform: translateX(8px);
        }

        .activity-avatar {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.875rem;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow: var(--shadow-md);
        }

        .activity-content {
            flex: 1;
        }

        .activity-content h4 {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.375rem;
        }

        .activity-content p {
            font-size: 0.75rem;
            color: var(--gray-600);
            margin-bottom: 0.375rem;
            line-height: 1.5;
        }

        .activity-time {
            font-size: 0.75rem;
            color: var(--gray-500);
            font-weight: 500;
        }

        /* Enhanced Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 1.75rem;
            border-radius: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.875rem;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
            transform: translateY(-1px);
        }

        /* Enhanced Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1050;
            overflow-y: auto;
            backdrop-filter: blur(8px);
            animation: fadeIn 0.3s ease;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-content {
            background: white;
            border-radius: 1.5rem;
            width: 90%;
            max-width: 600px;
            position: relative;
            padding: 0;
            margin: 2rem;
            box-shadow: var(--shadow-2xl);
            animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 2rem 1rem;
            border-bottom: 1px solid var(--gray-200);
            background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--gray-800);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .modal-title i {
            color: var(--primary);
        }

        .modal-close {
            background: var(--gray-100);
            border: none;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            font-size: 1.25rem;
            color: var(--gray-500);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            background: var(--danger);
            color: white;
            transform: scale(1.1);
        }

        .modal-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 0.75rem;
            font-size: 0.875rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--gray-50);
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.1);
            outline: none;
            background: white;
            transform: translateY(-1px);
        }

        .form-input:valid {
            border-color: var(--success);
        }

        .modal-footer {
            padding: 1.5rem 2rem 2rem;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            background: var(--gray-50);
        }

        /* Notification Panel Styles */
        .notification-panel {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: var(--shadow-2xl);
            z-index: 1100;
            transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
        }

        .notification-panel.show {
            right: 0;
        }

        .notification-header {
            padding: 2rem;
            border-bottom: 1px solid var(--gray-200);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .notification-header h3 {
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .notification-header p {
            opacity: 0.9;
            font-size: 0.875rem;
        }

        .notification-list {
            padding: 1rem;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .notification-item:hover {
            background: var(--gray-50);
            border-color: var(--gray-200);
        }

        .notification-item.unread {
            background: rgba(249, 115, 22, 0.05);
            border-color: rgba(249, 115, 22, 0.2);
        }

        .notification-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            flex-shrink: 0;
        }

        .notification-icon.info {
            background: rgba(59, 130, 246, 0.1);
            color: var(--info);
        }

        .notification-icon.success {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .notification-icon.warning {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .notification-content h4 {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.25rem;
        }

        .notification-content p {
            font-size: 0.75rem;
            color: var(--gray-600);
            margin-bottom: 0.25rem;
        }

        .notification-time {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }

            .notification-panel {
                width: 100%;
                right: -100%;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .dashboard-content {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .top-nav {
                padding: 1rem;
            }

            .nav-actions {
                gap: 0.5rem;
            }

            .user-info {
                display: none;
            }

            .modal-content {
                width: 95%;
                margin: 1rem;
            }

            .modal-header,
            .modal-body,
            .modal-footer {
                padding: 1.5rem;
            }
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--gray-600);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: var(--gray-100);
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* Utility Classes */
        .flex {
            display: flex;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .gap-3 {
            gap: 0.75rem;
        }

        .text-orange-500 {
            color: var(--primary);
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .inline {
            display: inline;
        }

        /* Add fallback styles for charts */
        .chart-error {
            text-align: center;
            padding: 2rem;
            color: var(--gray-600);
        }
        .chart-error i {
            font-size: 3rem;
            color: var(--gray-400);
            margin-bottom: 1rem;
        }
    </style>
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
                    <a href="{{ route('employees.index') }}" class="sidebar-menu-item">
                        <i class="fas fa-users"></i>
                        <span>Employees</span>
                        <span class="badge">{{ $totalEmployees ?? 156 }}</span>
                    </a>
                    <a href="{{ route('departments.index') }}" class="sidebar-menu-item">
                        <i class="fas fa-building"></i>
                        <span>Departments</span>
                    </a>
                </div>

                <div class="sidebar-menu-section">
                    <div class="sidebar-menu-title">Management</div>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-project-diagram"></i>
                        <span>Projects</span>
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
            <div class="dashboard-content">
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
</body>
</html>
