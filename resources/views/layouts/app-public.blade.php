<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'CIMS - Cercle des Ingénieurs de Mayo-Sava')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1e2761;
            --secondary-color: #2ecc71;
            --accent-color: #f39c12;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .nav-link {
            color: #fff !important;
            margin: 0 10px;
            transition: all 0.3s;
        }
        .nav-link:hover {
            color: var(--secondary-color) !important;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #141b4d;
            border-color: #141b4d;
        }
        .btn-success {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        footer {
            background-color: var(--primary-color);
            color: #fff;
            padding: 40px 0 20px;
            margin-top: 50px;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #2c3e75 100%);
            color: #fff;
            padding: 80px 0;
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-cogs"></i> CIMS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">À Propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('activities.index') }}">Activités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.index') }}">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery.index') }}">Galerie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white px-3 rounded" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-dashboard"></i> Admin
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5><i class="fas fa-cogs"></i> CIMS</h5>
                    <p>Cercle des Ingénieurs de Mayo-Sava</p>
                    <p class="small">Solidarité - Développement - Unité</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Liens Rapides</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}" class="text-white-50">À Propos</a></li>
                        <li><a href="{{ route('activities.index') }}" class="text-white-50">Activités</a></li>
                        <li><a href="{{ route('news.index') }}" class="text-white-50">Actualités</a></li>
                        <li><a href="{{ route('contact.index') }}" class="text-white-50">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Contact</h6>
                    <p class="small">
                        <i class="fas fa-map-marker-alt"></i> Mora, Cameroun<br>
                        <i class="fas fa-phone"></i> +237 691 805 321<br>
                        <i class="fas fa-envelope"></i> contact@cims.cm
                    </p>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1)">
            <div class="text-center">
                <p class="small mb-0">&copy; {{ date('Y') }} CIMS - Tous droits réservés. Développé par <a href="https://mit.cm" target="_blank" class="text-white-50">MIT</a></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
