<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - HRMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .login-container {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #dc2626 100%);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .login-container::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)"/><circle cx="800" cy="300" r="150" fill="url(%23a)"/><circle cx="400" cy="700" r="120" fill="url(%23a)"/></svg>') no-repeat center center;
            background-size: cover;
            opacity: 0.3;
        }
        .login-split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
        }
        .login-form-section {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }
        .login-illustration {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.1) 0%, rgba(234, 88, 12, 0.1) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .login-card {
            background: white;
            border-radius: 24px;
            padding: 2rem 2rem;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(249, 115, 22, 0.1);
            position: relative;
        }
        .hrms-logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .hrms-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 0.1em;
        }
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fafafa;
        }
        .form-input:focus {
            outline: none;
            border-color: #f97316;
            background: white;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
            transform: translateY(-1px);
        }
        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            transition: color 0.3s ease;
        }
        .form-input:focus + .input-icon {
            color: #f97316;
        }
        .login-button {
            width: 100%;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        .login-button:hover::before {
            left: 100%;
        }
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(249, 115, 22, 0.4);
        }
        .register-link {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }
        .register-link a {
            color: #f97316;
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
        }
        .register-link a:hover {
            color: #ea580c;
        }
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-top: 16px;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px);}
            to { opacity: 1; transform: translateY(0);}
        }
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }
        .floating-shape:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        .floating-shape:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 15%;
            animation-delay: 3s;
        }
        .floating-shape:nth-child(3) {
            width: 80px;
            height: 80px;
            bottom: 20%;
            left: 20%;
            animation-delay: 6s;
        }
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
            }
        }
        @media (max-width: 1024px) {
            .login-split {
                grid-template-columns: 1fr;
            }
            .login-illustration {
                display: none;
            }
            .login-form-section {
                background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #dc2626 100%);
            }
            .login-card {
                margin: 1rem;
            }
        }
        @media (max-width: 640px) {
            .login-card { padding: 2rem 1.5rem; }
            .hrms-title { font-size: 2rem; }
        }
    </style>
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
