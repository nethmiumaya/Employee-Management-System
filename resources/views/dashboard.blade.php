@auth
    @php
        return redirect()->route('dashboard');
    @endphp
@endauth

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System - Streamline Your Workforce</title>
    <meta name="description" content="Professional Employee Management System for modern businesses. Manage employees, projects, payroll, and more with our comprehensive solution.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #1d4ed8;
            --primary-light: #60a5fa;
            --secondary: #8b5cf6;
            --accent: #06b6d4;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1f2937;
            --light: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes slideInFromTop {
            from {
                opacity: 0;
                transform: translateY(-100px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-fadeInLeft {
            animation: fadeInLeft 0.8s ease-out forwards;
        }

        .animate-fadeInRight {
            animation: fadeInRight 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-pulse-custom {
            animation: pulse 2s ease-in-out infinite;
        }

        .animate-slideInFromTop {
            animation: slideInFromTop 0.6s ease-out forwards;
        }

        /* Gradient backgrounds */
        .gradient-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }

        .gradient-secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
        }

        .gradient-accent {
            background: linear-gradient(135deg, var(--accent) 0%, var(--secondary) 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Custom button styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary);
            padding: 12px 24px;
            border: 2px solid var(--primary);
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* Card styles */
        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(59, 130, 246, 0.1);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }

        /* Stats counter */
        .stats-card {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Navigation styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Hero section */
        .hero-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Floating elements */
        .floating-element {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-1 {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-2 {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-3 {
            width: 80px;
            height: 80px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        /* Testimonial styles */
        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            position: relative;
            transition: all 0.3s ease;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 20px;
            font-size: 4rem;
            color: var(--primary);
            opacity: 0.3;
            font-family: serif;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem !important;
            }

            .feature-card {
                padding: 1.5rem;
            }

            .stats-number {
                font-size: 2rem;
            }
        }

        /* Scroll reveal animation */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Loading animation */
        .loading-dots {
            display: inline-block;
        }

        .loading-dots::after {
            content: '';
            animation: dots 2s infinite;
        }

        @keyframes dots {
            0%, 20% { content: ''; }
            40% { content: '.'; }
            60% { content: '..'; }
            80%, 100% { content: '...'; }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="navbar fixed w-full top-0 z-50 animate-slideInFromTop">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 gradient-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-white text-lg"></i>
                    </div>
                    <span class="text-2xl font-bold gradient-text">EM System</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-gray-600 hover:text-blue-600 transition-colors">Features</a>
                    <a href="#benefits" class="text-gray-600 hover:text-blue-600 transition-colors">Benefits</a>
                    <a href="#testimonials" class="text-gray-600 hover:text-blue-600 transition-colors">Testimonials</a>
                    <a href="#contact" class="text-gray-600 hover:text-blue-600 transition-colors">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary">
                        <i class="fas fa-user-plus"></i>
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg pt-20 pb-16 relative">
        <div class="floating-element floating-1"></div>
        <div class="floating-element floating-2"></div>
        <div class="floating-element floating-3"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[80vh]">
                <div class="text-white animate-fadeInLeft">
                    <h1 class="hero-title text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Modern Employee Management
                        <span class="text-yellow-300">Made Simple</span>
                    </h1>
                    <p class="text-xl mb-8 text-gray-200 leading-relaxed">
                        Streamline your workforce management with our comprehensive, cloud-based solution.
                        Manage employees, projects, payroll, and performance all in one powerful platform.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <a href="{{ route('register') }}" class="btn-primary text-lg px-8 py-4">
                            <i class="fas fa-rocket"></i>
                            Start Free Trial
                        </a>
                        <a href="#demo" class="btn-secondary text-lg px-8 py-4 bg-white/10 border-white text-white hover:bg-white hover:text-gray-900">
                            <i class="fas fa-play"></i>
                            Watch Demo
                        </a>
                    </div>
                    <div class="flex items-center space-x-6 text-sm text-gray-300">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-400 mr-2"></i>
                            Free 30-day trial
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-400 mr-2"></i>
                            No credit card required
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-400 mr-2"></i>
                            24/7 support
                        </div>
                    </div>
                </div>
                <div class="animate-fadeInRight">
                    <div class="relative">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 animate-float">
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="bg-white/20 rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold text-white">1,250+</div>
                                    <div class="text-sm text-gray-300">Active Employees</div>
                                </div>
                                <div class="bg-white/20 rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold text-white">98%</div>
                                    <div class="text-sm text-gray-300">Satisfaction Rate</div>
                                </div>
                                <div class="bg-white/20 rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold text-white">45</div>
                                    <div class="text-sm text-gray-300">Active Projects</div>
                                </div>
                                <div class="bg-white/20 rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold text-white">24/7</div>
                                    <div class="text-sm text-gray-300">Support</div>
                                </div>
                            </div>
                            <div class="text-center text-white">
                                <i class="fas fa-chart-line text-4xl mb-4 animate-pulse-custom"></i>
                                <p class="text-lg font-semibold">Real-time Analytics Dashboard</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="stats-card reveal">
                    <div class="stats-number" data-count="10000">0</div>
                    <p class="text-gray-600 font-medium">Companies Trust Us</p>
                </div>
                <div class="stats-card reveal">
                    <div class="stats-number" data-count="500000">0</div>
                    <p class="text-gray-600 font-medium">Employees Managed</p>
                </div>
                <div class="stats-card reveal">
                    <div class="stats-number" data-count="99">0</div>
                    <p class="text-gray-600 font-medium">% Uptime</p>
                </div>
                <div class="stats-card reveal">
                    <div class="stats-number" data-count="150">0</div>
                    <p class="text-gray-600 font-medium">Countries Worldwide</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Powerful Features for Modern Businesses
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Everything you need to manage your workforce efficiently and effectively
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Employee Management -->
                <div class="feature-card reveal">
                    <div class="feature-icon gradient-primary text-white">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Employee Management</h3>
                    <p class="text-gray-600 mb-4">
                        Comprehensive employee profiles, onboarding workflows, and performance tracking all in one place.
                    </p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Digital employee profiles</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Automated onboarding</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Performance reviews</li>
                    </ul>
                </div>

                <!-- Project Management -->
                <div class="feature-card reveal">
                    <div class="feature-icon gradient-secondary text-white">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Project Management</h3>
                    <p class="text-gray-600 mb-4">
                        Create, assign, and track projects with built-in collaboration tools and progress monitoring.
                    </p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Task assignment</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Progress tracking</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Team collaboration</li>
                    </ul>
                </div>

                <!-- Payroll & Finance -->
                <div class="feature-card reveal">
                    <div class="feature-icon gradient-accent text-white">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Payroll & Finance</h3>
                    <p class="text-gray-600 mb-4">
                        Automated payroll processing, expense management, and financial reporting with tax compliance.
                    </p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Automated payroll</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Expense tracking</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Tax compliance</li>
                    </ul>
                </div>

                <!-- Leave Management -->
                <div class="feature-card reveal">
                    <div class="feature-icon bg-green-500 text-white">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Leave Management</h3>
                    <p class="text-gray-600 mb-4">
                        Streamlined leave requests, approval workflows, and automatic balance calculations.
                    </p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Leave requests</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Approval workflows</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Balance tracking</li>
                    </ul>
                </div>

                <!-- Analytics & Reports -->
                <div class="feature-card reveal">
                    <div class="feature-icon bg-purple-500 text-white">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Analytics & Reports</h3>
                    <p class="text-gray-600 mb-4">
                        Comprehensive reporting and analytics to make data-driven decisions about your workforce.
                    </p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Custom reports</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Real-time analytics</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Data visualization</li>
                    </ul>
                </div>

                <!-- Security & Compliance -->
                <div class="feature-card reveal">
                    <div class="feature-icon bg-red-500 text-white">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Security & Compliance</h3>
                    <p class="text-gray-600 mb-4">
                        Enterprise-grade security with role-based access control and compliance management.
                    </p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Role-based access</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Data encryption</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Audit trails</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="reveal">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">
                        Why Choose Our EMS Platform?
                    </h2>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 gradient-primary rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-rocket text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Increased Productivity</h3>
                                <p class="text-gray-600">Automate routine HR tasks and focus on strategic initiatives that drive business growth.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 gradient-secondary rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-dollar-sign text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Cost Reduction</h3>
                                <p class="text-gray-600">Reduce administrative costs by up to 40% with automated workflows and digital processes.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 gradient-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Better Employee Experience</h3>
                                <p class="text-gray-600">Empower employees with self-service portals and transparent communication channels.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Data-Driven Decisions</h3>
                                <p class="text-gray-600">Make informed decisions with real-time analytics and comprehensive reporting tools.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="reveal">
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600 mb-2">40%</div>
                                <div class="text-sm text-gray-600">Time Saved</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-purple-600 mb-2">60%</div>
                                <div class="text-sm text-gray-600">Cost Reduction</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-green-600 mb-2">95%</div>
                                <div class="text-sm text-gray-600">User Satisfaction</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-600 mb-2">24/7</div>
                                <div class="text-sm text-gray-600">Support</div>
                            </div>
                        </div>
                        <div class="mt-8 text-center">
                            <i class="fas fa-award text-6xl text-yellow-500 mb-4"></i>
                            <p class="text-lg font-semibold text-gray-800">Award-Winning Platform</p>
                            <p class="text-sm text-gray-600">Recognized by industry leaders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    What Our Clients Say
                </h2>
                <p class="text-xl text-gray-600">
                    Join thousands of satisfied customers worldwide
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card reveal">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face&auto=format" alt="John Smith" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">John Smith</h4>
                            <p class="text-sm text-gray-600">CEO, TechCorp</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "This EMS has transformed how we manage our 500+ employees. The automation features alone have saved us countless hours every week."
                    </p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card reveal">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=60&h=60&fit=crop&crop=face&auto=format" alt="Sarah Johnson" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                            <p class="text-sm text-gray-600">HR Director, InnovateLab</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "The reporting capabilities are outstanding. We can now make data-driven decisions about our workforce with confidence."
                    </p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card reveal">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60&h=60&fit=crop&crop=face&auto=format" alt="Mike Chen" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Mike Chen</h4>
                            <p class="text-sm text-gray-600">Operations Manager, GlobalTech</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Implementation was seamless and the support team is exceptional. Our employees love the self-service features."
                    </p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Get in Touch
                </h2>
                <p class="text-xl text-gray-600">
                    Have questions? We're here to help you choose the best solution for your business.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div class="reveal">
                    <div class="bg-gray-50 p-8 rounded-2xl">
                        <div class="space-y-8">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 gradient-primary rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Our Location</h3>
                                    <p class="text-gray-600">123 Business Avenue, Tech District<br>New York, NY 10001</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 gradient-secondary rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Phone</h3>
                                    <p class="text-gray-600">+1 (555) 123-4567<br>+1 (555) 987-6543</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 gradient-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                                    <p class="text-gray-600">info@emspro.com<br>support@emspro.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reveal">
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                            <input type="text" id="company" name="company" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                        <button type="submit" class="w-full btn-primary py-3 justify-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="reveal">
                <h2 class="text-4xl font-bold mb-6">
                    Ready to Transform Your HR Management?
                </h2>
                <p class="text-xl mb-8 max-w-3xl mx-auto text-blue-100">
                    Join thousands of companies that have streamlined their workforce management with our platform.
                    Start your free trial today and see the difference.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105">
                        <i class="fas fa-rocket mr-2"></i>
                        Start Free Trial
                    </a>
                    <a href="#contact" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg transition-all">
                        <i class="fas fa-phone mr-2"></i>
                        Schedule Demo
                    </a>
                </div>
                <p class="text-sm text-blue-200 mt-6">
                    No credit card required • 30-day free trial • Cancel anytime
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 gradient-primary rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-white text-lg"></i>
                        </div>
                        <span class="text-2xl font-bold">EM System</span>
                    </div>
                    <p class="text-gray-400 mb-6">
                        The most comprehensive employee management solution for modern businesses.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin-in text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Product</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Features</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Integrations</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">API</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Security</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Company</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Press</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Partners</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Support</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Documentation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">System Status</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Community</a></li>
                    </ul>
                </div>
            </div>

            <hr class="border-gray-800 mb-8">

            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    &copy; {{ date('Y') }} EM System. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 bg-blue-600 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-blue-700 z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Smooth scrolling for navigation links
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

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            // Back to top button
            const backToTop = document.getElementById('backToTop');
            if (window.scrollY > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
                backToTop.classList.remove('opacity-100', 'visible');
            }
        });

        // Back to top functionality
        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Scroll reveal animation
        const revealElements = document.querySelectorAll('.reveal');

        function checkReveal() {
            const windowHeight = window.innerHeight;
            const revealPoint = 150;

            revealElements.forEach(element => {
                const revealTop = element.getBoundingClientRect().top;
                if (revealTop < windowHeight - revealPoint) {
                    element.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', checkReveal);
        window.addEventListener('load', checkReveal);

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('[data-count]');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            });
        }

        // Intersection Observer for counters
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    counterObserver.disconnect();
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats-card');
        if (statsSection) {
            counterObserver.observe(statsSection);
        }

        // Mobile menu toggle (if needed)
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Loading animation for buttons
        document.querySelectorAll('.btn-primary, .btn-secondary').forEach(button => {
            button.addEventListener('click', function(e) {
                if (this.href && this.href.includes('register')) {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Loading...';

                    setTimeout(() => {
                        this.innerHTML = originalText;
                    }, 2000);
                }
            });
        });
    </script>

    @auth
        <div class="fixed bottom-4 left-4 z-50">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors shadow-lg">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </button>
            </form>
        </div>
    @endauth
</body>
</html>
