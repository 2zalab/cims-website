<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'CIMS - Cercle des Ingénieurs de Mayo-Sava')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #10b981;
            --accent-color: #f59e0b;
            --dark-color: #1e293b;
            --light-gray: #f8fafc;
            --border-color: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--dark-color);
            background-color: #ffffff;
            line-height: 1.6;
        }

        /* Navbar moderne et claire */
        .navbar {
            background-color: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            padding: 0.8rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.3rem;
            color: var(--primary-color) !important;
            gap: 10px;
            padding: 0.5rem 0;
        }

        .navbar-brand img {
            height: 50px;
            width: auto;
            object-fit: contain;
        }

        .navbar-toggler {
            border: 2px solid var(--primary-color);
            padding: 0.5rem 0.75rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(37, 99, 235, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .nav-link {
            color: var(--dark-color) !important;
            margin: 0 8px;
            padding: 8px 16px !important;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: var(--light-gray);
            color: var(--primary-color) !important;
        }

        .nav-link.active {
            background-color: var(--light-gray);
            color: var(--primary-color) !important;
        }

        /* Container 90% */
        .main-container {
            width: 90%;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Buttons */
        .btn {
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1d4ed8 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #059669 100%);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* Cards */
        .card {
            border: 1px solid var(--border-color);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
            background: white;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .card-img-top {
            transition: transform 0.4s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><rect fill="rgba(255,255,255,0.03)" width="50" height="50"/></svg>');
            opacity: 0.5;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: #fff;
            padding: 60px 0 30px;
            margin-top: 80px;
        }

        footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        footer a:hover {
            color: var(--secondary-color);
        }

        /* Sections */
        .section {
            padding: 80px 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #64748b;
            margin-bottom: 3rem;
        }

        /* Badges */
        .badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.85rem;
        }

        /* Animations */
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

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-container {
                width: 95%;
            }

            .section-title {
                font-size: 2rem;
            }

            .hero-section {
                padding: 60px 0 40px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar moderne -->
    <nav class="navbar navbar-expand-lg">
        <div class="main-container d-flex flex-wrap align-items-center justify-content-between">
            <a class="navbar-brand" href="{{ route('home') }}">
                @if(file_exists(public_path('images/logo-cims.png')))
                    <img src="{{ asset('images/logo-cims.png') }}" alt="CIMS Logo">
                @else
                    <i class="fas fa-cogs"></i>
                @endif
                <span>CIMS</span>
            </a>
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home"></i> Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="fas fa-info-circle"></i> À Propos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('activities.*') ? 'active' : '' }}" href="{{ route('activities.index') }}">
                            <i class="fas fa-calendar-alt"></i> Activités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">
                            <i class="fas fa-newspaper"></i> Actualités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">
                            <i class="fas fa-images"></i> Galerie
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="btn btn-success btn-sm ms-2" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Admin
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer moderne -->
    <footer>
        <div class="main-container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="mb-3">
                        @if(file_exists(public_path('images/logo-cims.png')))
                            <img src="{{ asset('images/logo-cims.png') }}" alt="CIMS" style="height: 40px; margin-right: 10px;">
                        @else
                            <i class="fas fa-cogs"></i>
                        @endif
                        CIMS
                    </h5>
                    <p>Cercle des Ingénieurs de Mayo-Sava</p>
                    <p class="fw-bold text-warning">Solidarité - Développement - Unité</p>
                    <div class="mt-3">
                        <a href="#" class="me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3">Liens Rapides</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('about') }}"><i class="fas fa-chevron-right me-2"></i>À Propos</a></li>
                        <li class="mb-2"><a href="{{ route('activities.index') }}"><i class="fas fa-chevron-right me-2"></i>Activités</a></li>
                        <li class="mb-2"><a href="{{ route('news.index') }}"><i class="fas fa-chevron-right me-2"></i>Actualités</a></li>
                        <li class="mb-2"><a href="{{ route('gallery.index') }}"><i class="fas fa-chevron-right me-2"></i>Galerie</a></li>
                        <li class="mb-2"><a href="{{ route('contact.index') }}"><i class="fas fa-chevron-right me-2"></i>Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3">Contact</h6>
                    <p>
                        <i class="fas fa-map-marker-alt me-2"></i> Mora, Département de Mayo-Sava<br>
                        <i class="fas fa-phone me-2"></i> +237 691 805 321<br>
                        <i class="fas fa-phone me-2"></i> +237 672 277 579<br>
                        <i class="fas fa-envelope me-2"></i> contact@cims.cm
                    </p>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.1)">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} CIMS - Cercle des Ingénieurs de Mayo-Sava. Tous droits réservés.</p>
                <p class="small mt-1">Développé avec <i class="fas fa-heart text-danger"></i> par <a href="https://mit.cm" target="_blank" class="text-warning">Maroua Innovation Technology</a></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
