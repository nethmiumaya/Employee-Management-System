<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - HRMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth/forgot-password.css') }}">
</head>
<body class="login-container">
    <div class="login-split">
        <div class="login-form-section">
            <div class="login-card">
                <div class="hrms-logo">
                    <h1 class="hrms-title">HRMS</h1>
                </div>
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Forgot Password</h2>
                    <p class="text-gray-500 text-sm">Enter your email to receive a password reset link.</p>
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            required
                            class="form-input"
                            placeholder="Enter your email"
                        >
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                    <button type="submit" class="login-button">
                        <span class="relative z-10">Send Password Reset Link</span>
                    </button>
                </form>
                <div class="register-link">
                    Remember your password?
                    <a href="{{ route('login') }}">Back to Login</a>
                </div>
                @if ($errors->any())
                    <div class="error-message">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                @if (session('status'))
                    <div class="error-message" style="color: #16a34a; border-color: #bbf7d0; background: #f0fdf4;">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <!-- Right Side - Illustration with Animation -->
        <div class="login-illustration">
            <div class="floating-elements">
                <div class="floating-shape"></div>
                <div class="floating-shape"></div>
                <div class="floating-shape"></div>
            </div>
            <div class="illustration-content" style="text-align:center;color:white;z-index:10;position:relative;">
                <h2 class="illustration-title" style="font-size:2.5rem;font-weight:700;margin-bottom:1rem;text-shadow:0 4px 8px rgba(0,0,0,0.3);">Reset Your Password</h2>
                <p class="illustration-subtitle" style="font-size:1.2rem;opacity:0.9;margin-bottom:2rem;">We'll send you a link to reset your password securely.</p>
                <ul class="feature-list" style="list-style:none;padding:0;text-align:left;max-width:300px;margin:0 auto;">
                    <li class="feature-item" style="display:flex;align-items:center;margin-bottom:1rem;font-size:1.1rem;">
                        <div class="feature-icon" style="width:24px;height:24px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:12px;">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        Secure Reset Process
                    </li>
                    <li class="feature-item" style="display:flex;align-items:center;margin-bottom:1rem;font-size:1.1rem;">
                        <div class="feature-icon" style="width:24px;height:24px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:12px;">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        Fast Email Delivery
                    </li>
                    <li class="feature-item" style="display:flex;align-items:center;margin-bottom:1rem;font-size:1.1rem;">
                        <div class="feature-icon" style="width:24px;height:24px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:12px;">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        24/7 Support
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
