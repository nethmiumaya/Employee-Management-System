<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - HRMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reset-password.css') }}">
</head>
<body class="login-container">
    <div class="login-split">
        <!-- Left Side - Reset Password Form -->
        <div class="login-form-section">
            <div class="login-card">
                <div class="hrms-logo">
                    <h1 class="hrms-title">HRMS</h1>
                </div>
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Reset Password</h2>
                    <p class="text-gray-500 text-sm">Enter your new password below.</p>
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
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                    <div class="form-group">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            required
                            autocomplete="email"
                            class="form-input"
                            placeholder="Enter your email"
                        >
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                    <div class="form-group">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            class="form-input"
                            placeholder="New password"
                        >
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <div class="form-group">
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            class="form-input"
                            placeholder="Confirm new password"
                        >
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <button type="submit" class="login-button">
                        <span class="relative z-10">Reset Password</span>
                    </button>
                </form>
                <div class="register-link">
                    Remembered your password?
                    <a href="{{ route('login') }}">Back to Login</a>
                </div>
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
                <h2 class="illustration-title" style="font-size:2.5rem;font-weight:700;margin-bottom:1rem;text-shadow:0 4px 8px rgba(0,0,0,0.3);">Set a New Password</h2>
                <p class="illustration-subtitle" style="font-size:1.2rem;opacity:0.9;margin-bottom:2rem;">Create a strong password to keep your account secure.</p>
                <ul class="feature-list" style="list-style:none;padding:0;text-align:left;max-width:300px;margin:0 auto;">
                    <li class="feature-item" style="display:flex;align-items:center;margin-bottom:1rem;font-size:1.1rem;">
                        <div class="feature-icon" style="width:24px;height:24px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:12px;">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        Strong Password Policy
                    </li>
                    <li class="feature-item" style="display:flex;align-items:center;margin-bottom:1rem;font-size:1.1rem;">
                        <div class="feature-icon" style="width:24px;height:24px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:12px;">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        Secure Account Recovery
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
