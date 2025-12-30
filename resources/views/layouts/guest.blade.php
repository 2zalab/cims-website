<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #d97706;
            --gold-dark: #b45309;
            --green: #10b981;
            --dark-color: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            overflow-x: hidden;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
        }

        /* Left Side - Image/Branding */
        .login-left {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            color: white;
            overflow: hidden;
            background-image: url('{{ asset("images/hero-bg.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(180, 83, 9, 0.9) 0%, rgba(16, 185, 129, 0.9) 100%);
            backdrop-filter: blur(8px);
        }

        .login-left-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 500px;
        }

        .login-left-content .logo-container {
            margin-bottom: 30px;
        }

        .login-left-content .logo-container img {
            height: 120px;
            width: auto;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
        }

        .login-left-content .logo-container i {
            font-size: 80px;
            margin-bottom: 20px;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
        }

        .login-left-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .login-left-content p {
            font-size: 1.1rem;
            opacity: 0.95;
            margin-bottom: 15px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .login-left-content .tagline {
            font-size: 1.2rem;
            font-weight: 600;
            color: #fef3c7;
            margin-top: 30px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Right Side - Form */
        .login-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            background-color: #ffffff;
        }

        .login-form-container {
            width: 100%;
            max-width: 450px;
        }

        .login-form-container .header-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-form-container .header-section h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        .login-form-container .header-section p {
            color: #64748b;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
            display: block;
            font-size: 0.95rem;
        }

        .form-control {
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--gold-dark);
            box-shadow: 0 0 0 4px rgba(180, 83, 9, 0.1);
            outline: none;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .input-icon .form-control {
            padding-left: 45px;
        }

        .form-check {
            margin: 20px 0;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e1;
            border-radius: 5px;
            margin-top: 0;
        }

        .form-check-input:checked {
            background-color: var(--gold-dark);
            border-color: var(--gold-dark);
        }

        .form-check-label {
            margin-left: 8px;
            color: #64748b;
            font-size: 0.95rem;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--gold-dark) 0%, #92400e 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(180, 83, 9, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .forgot-password a {
            color: var(--gold-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .forgot-password a:hover {
            color: var(--green);
            text-decoration: underline;
        }

        .alert {
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 24px;
            border: none;
        }

        .alert-danger {
            background-color: #fee;
            color: #dc2626;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #059669;
        }

        .back-home {
            text-align: center;
            margin-top: 30px;
        }

        .back-home a {
            color: #64748b;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .back-home a:hover {
            color: var(--gold-dark);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
            }

            .login-left {
                padding: 40px 20px;
                min-height: 300px;
            }

            .login-left-content h1 {
                font-size: 2rem;
            }

            .login-right {
                padding: 40px 20px;
            }
        }

        @media (max-width: 576px) {
            .login-left-content h1 {
                font-size: 1.5rem;
            }

            .login-left-content p {
                font-size: 0.95rem;
            }

            .login-form-container .header-section h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Branding -->
        <div class="login-left">
            <div class="login-left-content">
                <div class="logo-container">
                    @if(file_exists(public_path('images/logo-cims.png')))
                        <img src="{{ asset('images/logo-cims.png') }}" alt="CIMS Logo">
                    @else
                        <i class="fas fa-cogs"></i>
                    @endif
                </div>
                <h1>CIMS</h1>
                <p>Cercle des Ingénieurs de Mayo-Sava</p>
                <p class="tagline">Solidarité • Développement • Unité</p>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-right">
            <div class="login-form-container">
                <div class="header-section">
                    <h2>Bienvenue</h2>
                    <p>Connectez-vous à votre espace administrateur</p>
                </div>

                {{ $slot }}

                <div class="back-home">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-arrow-left me-2"></i>Retour au site
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
