<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS - Create Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
</head>
<body class="register-container">
    <div class="register-split">
        <!-- Left Side - Registration Form -->
        <div class="register-form-section">
            <div class="register-card">
                <!-- HRMS Logo -->
                <div class="hrms-logo">
                    <h1 class="hrms-title">HRMS</h1>
                </div>

                <!-- User Avatar -->
                <div class="user-avatar">
                    <svg width="35" height="35" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="white" stroke-width="2"/>
                        <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="white" stroke-width="2"/>
                    </svg>
                </div>

                <!-- Header -->
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-1">Create Account</h2>
                    <p class="text-gray-600 text-sm">Join our team today</p>
                </div>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <div class="form-row">
                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="relative">
                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    required
                                    value="{{ old('name') }}"
                                    class="form-input"
                                    placeholder="Enter your full name"
                                >
                                <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="relative">
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    required
                                    value="{{ old('email') }}"
                                    class="form-input"
                                    placeholder="Enter your email address"
                                >
                                <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Contact Number Field -->
                        <div class="form-group">
                            <label for="contact_no" class="form-label">Contact Number</label>
                            <div class="relative">
                                <input
                                    id="contact_no"
                                    type="tel"
                                    name="contact_no"
                                    required
                                    value="{{ old('contact_no') }}"
                                    class="form-input"
                                    placeholder="Enter your contact number"
                                    pattern="[0-9]{10,15}"
                                >
                                <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Role Selection -->
                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <select
                                id="role"
                                name="role"
                                required
                                class="form-select"
                            >
                                <option value="" disabled selected>Select your role</option>
                                <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee - Basic Access</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin - Management Access</option>
                                <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin - Full Access</option>
                            </select>
                        </div>
                    </div>

                    <!-- Password Fields Row -->
                    <div class="form-row">
                        <!-- Password Field -->
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="relative">
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    class="form-input"
                                    placeholder="Create password"
                                    minlength="8"
                                >
                                <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div id="passwordStrength" class="password-strength" style="display: none;"></div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="relative">
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    class="form-input"
                                    placeholder="Confirm password"
                                >
                                <svg class="input-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="register-button">
                        <span class="relative z-10">Create Account</span>
                    </button>
                </form>

                <!-- Login Link -->
                <div class="login-link">
                    Already have an account?
                    <a href="{{ route('login.form') }}">Sign In</a>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="error-message">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Footer -->
                <div class="text-center pt-4 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        © 2024 HRMS. All rights reserved.
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side - Illustration -->
        <div class="register-illustration">
            <div class="floating-elements">
                <div class="floating-shape"></div>
                <div class="floating-shape"></div>
                <div class="floating-shape"></div>
                <div class="floating-shape"></div>
            </div>

            <div class="illustration-content">
                <h2 class="illustration-title">Join HRMS</h2>
                <p class="illustration-subtitle">Powerful workforce management platform</p>

                <div class="feature-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-1">Team Management</h4>
                        <p class="text-sm opacity-90">Organize and manage your workforce efficiently</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-1">Smart Analytics</h4>
                        <p class="text-sm opacity-90">Data-driven insights for better decisions</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-1">Secure Access</h4>
                        <p class="text-sm opacity-90">Role-based permissions and security</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-1">Time Tracking</h4>
                        <p class="text-sm opacity-90">Automated attendance and scheduling</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthDiv = document.getElementById('passwordStrength');

            if (password.length === 0) {
                strengthDiv.style.display = 'none';
                return;
            }

            strengthDiv.style.display = 'block';

            let strength = 0;
            let feedback = [];

            // Length check
            if (password.length >= 8) strength++;
            else feedback.push('At least 8 characters');

            // Uppercase check
            if (/[A-Z]/.test(password)) strength++;
            else feedback.push('One uppercase letter');

            // Lowercase check
            if (/[a-z]/.test(password)) strength++;
            else feedback.push('One lowercase letter');

            // Number check
            if (/\d/.test(password)) strength++;
            else feedback.push('One number');

            // Special character check
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;
            else feedback.push('One special character');

            // Update strength display
            if (strength < 3) {
                strengthDiv.className = 'password-strength strength-weak';
                strengthDiv.textContent = 'Weak password. Need: ' + feedback.slice(0, 2).join(', ');
            } else if (strength < 5) {
                strengthDiv.className = 'password-strength strength-medium';
                strengthDiv.textContent = 'Medium strength. Consider: ' + feedback.slice(0, 1).join(', ');
            } else {
                strengthDiv.className = 'password-strength strength-strong';
                strengthDiv.textContent = 'Strong password!';
            }
        });

        // Password confirmation validation
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmation = this.value;

            if (confirmation && password !== confirmation) {
                this.style.borderColor = '#ef4444';
            } else if (confirmation) {
                this.style.borderColor = '#10b981';
            }
        });

        // Phone number formatting
        document.getElementById('contact_no').addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 10) {
                value = value.substring(0, 15);
            }
            this.value = value;
        });

        // Form submission validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmation = document.getElementById('password_confirmation').value;

            if (password !== confirmation) {
                e.preventDefault();
                alert('Passwords do not match!');
                return false;
            }

            if (password.length < 8) {
                e.preventDefault();
                alert('Password must be at least 8 characters long!');
                return false;
            }
        });
    </script>
</body>
</html>
