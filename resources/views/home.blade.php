@extends('layouts.app-public')

@section('title', 'Accueil - CIMS')

@section('styles')
<style>
    .hero-section {
        position: relative;
        background-image: url('{{ asset("images/hero.png") }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(180, 83, 9, 0.85) 0%, rgba(16, 185, 129, 0.85) 100%);
        backdrop-filter: blur(3px);
        z-index: 1;
    }

    /* Si pas d'image, utiliser un fond par défaut */
    .hero-section.no-bg {
        background: linear-gradient(135deg, #b45309 0%, #10b981 100%);
    }

    .hero-section > * {
        position: relative;
        z-index: 2;
    }

    .president-photo {
        width: 280px;
        height: 280px;
        object-fit: cover;
        border-radius: 50%;
        border: 6px solid white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .stat-card {
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-10px);
    }

    .stat-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    /* Override Bootstrap colors avec or et vert */
    .text-primary {
        color: #d97706 !important;
    }

    .bg-primary {
        background-color: #d97706 !important;
    }

    .badge.bg-primary {
        background-color: #d97706 !important;
    }

    .btn-primary {
        background: linear-gradient(135deg, #b45309 0%, #92400e 100%) !important;
    }

    .btn-outline-primary {
        border-color: #d97706 !important;
        color: #d97706 !important;
    }

    .btn-outline-primary:hover {
        background-color: #d97706 !important;
        color: white !important;
    }

    .stat-icon.text-primary,
    .text-primary i {
        color: #d97706 !important;
    }

    .bg-gradient-placeholder {
        background: linear-gradient(135deg, #b45309 0%, #10b981 100%) !important;
    }
</style>
@endsection

@section('content')
<!-- Hero Section with Background -->
<div class="hero-section text-center {{ !file_exists(public_path('images/hero.png')) ? 'no-bg' : '' }}">
    <div class="main-container position-relative" style="z-index: 2; padding: 50px 0 80px;">
        <h1 class="display-3 fw-bold mb-4 fade-in-up">Cercle des Ingénieurs de Mayo-Sava</h1>
        <p class="lead mb-2 fs-3 fw-semibold">Solidarité - Développement - Unité</p>
        <p class="mb-5 fs-5" style="max-width: 700px; margin: 0 auto;">
            Ensemble pour le développement durable et harmonieux du Département de Mayo-Sava
        </p>
        <div class="fade-in-up">
            <a href="{{ route('about') }}" class="btn btn-light btn-lg me-3 px-4 py-3">
                <i class="fas fa-info-circle me-2"></i>Découvrir CIMS
            </a>
            <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg px-4 py-3">
                <i class="fas fa-envelope me-2"></i>Nous Contacter
            </a>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="main-container my-5 py-5">
    <div class="text-center mb-5">
        <h2 class="section-title">CIMS en Chiffres</h2>
        <p class="section-subtitle">Notre impact sur le terrain</p>
    </div>
    <div class="row g-4">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm stat-card h-100 text-center p-4">
                <div class="card-body">
                    <div class="stat-icon text-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number text-primary">{{ $activities->count() + 15 }}+</div>
                    <h5 class="fw-semibold mb-0">Membres Actifs</h5>
                    <p class="text-muted small mt-2">Ingénieurs qualifiés et engagés</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm stat-card h-100 text-center p-4">
                <div class="card-body">
                    <div class="stat-icon text-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number text-success">{{ $activities->count() }}+</div>
                    <h5 class="fw-semibold mb-0">Activités</h5>
                    <p class="text-muted small mt-2">Projets réalisés et en cours</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm stat-card h-100 text-center p-4">
                <div class="card-body">
                    <div class="stat-icon text-warning">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-number text-warning">{{ $news->count() }}+</div>
                    <h5 class="fw-semibold mb-0">Actualités</h5>
                    <p class="text-muted small mt-2">Publications et annonces</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm stat-card h-100 text-center p-4">
                <div class="card-body">
                    <div class="stat-icon text-danger">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="stat-number text-danger">12+</div>
                    <h5 class="fw-semibold mb-0">Partenaires</h5>
                    <p class="text-muted small mt-2">Collaborations actives</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mot du Président -->
<div class="bg-light py-5">
    <div class="main-container">
        <div class="row align-items-center g-5">
            <div class="col-lg-4 text-center">
                <div class="position-relative d-inline-block">
                    @if(file_exists(public_path('images/president.jpg')))
                        <img src="{{ asset('images/president.jpg') }}" alt="M. GOGOLA LALA" class="president-photo">
                    @else
                        <!-- Placeholder avec initiales -->
                        <div class="president-photo bg-primary d-flex align-items-center justify-content-center text-white" style="font-size: 5rem; font-weight: bold;">
                            GL
                        </div>
                    @endif
                    <div class="position-absolute bottom-0 start-50 translate-middle-x bg-white rounded-pill px-4 py-3 shadow" style="min-width: 250px;">
                        <p class="mb-0 fw-bold text-primary fs-6">M. GOGOLA LALA</p>
                        <p class="mb-0 small text-muted">Président CIMS</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <span class="badge bg-primary mb-3 px-3 py-2 fs-6">
                    <i class="fas fa-quote-left me-2"></i>Mot du Président
                </span>
                <h2 class="section-title mb-4">Un Engagement pour Notre Développement</h2>
                <div class="position-relative ps-4 border-start border-primary border-4">
                    <p class="fs-5 text-muted fst-italic mb-4">
                        "Chers membres, chers partenaires, chers amis du développement,"
                    </p>
                    <p class="mb-3 text-muted">
                        C'est avec un immense honneur et une profonde reconnaissance que je m'adresse à vous en tant que Président du Cercle des Ingénieurs de Mayo-Sava. Notre association, guidée par les valeurs de <strong>Solidarité, Développement et Unité</strong>, s'est donnée pour mission de contribuer activement à l'émergence de notre département.
                    </p>
                    <p class="mb-3 text-muted">
                        Ensemble, nous mettons notre expertise d'ingénieurs au service des communautés de Mayo-Sava. Que ce soit dans les domaines de l'eau et l'assainissement, de l'énergie, de l'agriculture ou de l'environnement, notre engagement reste inébranlable.
                    </p>
                    <p class="mb-4 text-muted">
                        Je vous invite tous à vous joindre à nous dans cette noble mission de bâtir un Mayo-Sava prospère, résilient et durable pour les générations présentes et futures.
                    </p>
                    <p class="mb-0 fw-bold text-primary fs-5">
                        <i class="fas fa-heart me-2"></i>Ensemble, construisons l'avenir !
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mission & Vision -->
<div class="main-container section">
    <div class="text-center mb-5">
        <h2 class="section-title">Notre Mission</h2>
        <p class="section-subtitle">Contribuer au développement durable de Mayo-Sava</p>
    </div>
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="card-body">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <i class="fas fa-lightbulb fa-2x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Innovation</h4>
                    <p class="text-muted">Promouvoir l'innovation technologique et l'entrepreneuriat local pour un développement inclusif et durable.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="card-body">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <i class="fas fa-users fa-2x text-success"></i>
                    </div>
                    <h4 class="mb-3">Solidarité</h4>
                    <p class="text-muted">Travailler ensemble dans la solidarité pour le bien-être et l'épanouissement de nos communautés.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="card-body">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <i class="fas fa-chart-line fa-2x text-warning"></i>
                    </div>
                    <h4 class="mb-3">Développement</h4>
                    <p class="text-muted">Participer activement aux projets de développement durable alignés sur la vision 2035 du Cameroun.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Activités Récentes -->
<div class="bg-light py-5">
    <div class="main-container">
        <div class="text-center mb-5">
            <h2 class="section-title">Nos Dernières Activités</h2>
            <p class="section-subtitle">Découvrez nos actions sur le terrain</p>
        </div>
        <div class="row g-4">
            @forelse($activities as $activity)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    @if($activity->image)
                    <div style="height: 220px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $activity->image) }}" class="card-img-top" alt="{{ $activity->title }}" style="height: 100%; width: 100%; object-fit: cover;">
                    </div>
                    @else
                    <div class="bg-gradient d-flex align-items-center justify-content-center" style="height: 220px; background: linear-gradient(135deg, #b45309 0%, #10b981 100%);">
                        <i class="fas fa-image fa-4x text-white opacity-50"></i>
                    </div>
                    @endif
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <span class="badge bg-primary">{{ $activity->activity_date ? $activity->activity_date->format('d M Y') : 'À venir' }}</span>
                            @if($activity->location)
                            <span class="badge bg-secondary ms-2"><i class="fas fa-map-marker-alt me-1"></i>{{ Str::limit($activity->location, 15) }}</span>
                            @endif
                        </div>
                        <h5 class="card-title fw-bold mb-3">{{ $activity->title }}</h5>
                        <p class="card-text text-muted mb-4">{{ Str::limit($activity->description, 120) }}</p>
                        <a href="{{ route('activities.show', $activity) }}" class="btn btn-outline-primary btn-sm">
                            Lire plus <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-calendar-times fa-4x text-muted mb-3"></i>
                <p class="text-muted fs-5">Aucune activité pour le moment.</p>
            </div>
            @endforelse
        </div>
        @if($activities->count() > 0)
        <div class="text-center mt-5">
            <a href="{{ route('activities.index') }}" class="btn btn-primary btn-lg px-5">
                Voir toutes les activités <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Actualités -->
<div class="main-container section">
    <div class="text-center mb-5">
        <h2 class="section-title">Actualités Récentes</h2>
        <p class="section-subtitle">Restez informés de nos dernières nouvelles</p>
    </div>
    <div class="row g-4">
        @forelse($news as $item)
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                @if($item->image)
                <div style="height: 220px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 100%; width: 100%; object-fit: cover;">
                </div>
                @else
                <div class="bg-gradient d-flex align-items-center justify-content-center" style="height: 220px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-newspaper fa-4x text-white opacity-50"></i>
                </div>
                @endif
                <div class="card-body p-4">
                    <div class="mb-3">
                        <span class="badge bg-success">
                            <i class="fas fa-clock me-1"></i>{{ $item->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <h5 class="card-title fw-bold mb-3">{{ $item->title }}</h5>
                    <p class="card-text text-muted mb-4">{{ Str::limit($item->excerpt ?? $item->content, 120) }}</p>
                    <a href="{{ route('news.show', $item) }}" class="btn btn-outline-success btn-sm">
                        Lire la suite <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
            <p class="text-muted fs-5">Aucune actualité pour le moment.</p>
        </div>
        @endforelse
    </div>
    @if($news->count() > 0)
    <div class="text-center mt-5">
        <a href="{{ route('news.index') }}" class="btn btn-success btn-lg px-5">
            Toutes les actualités <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
    @endif
</div>

<!-- Galerie Aperçu -->
@if($galleries->count() > 0)
<div class="bg-light py-5">
    <div class="main-container">
        <div class="text-center mb-5">
            <h2 class="section-title">Galerie Photos</h2>
            <p class="section-subtitle">Nos moments en images</p>
        </div>
        <div class="row g-3">
            @foreach($galleries->take(6) as $gallery)
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <a href="{{ asset('storage/' . $gallery->image) }}" class="d-block position-relative overflow-hidden rounded" style="height: 150px;">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 opacity-0 d-flex align-items-center justify-content-center" style="transition: opacity 0.3s;">
                        <i class="fas fa-search-plus text-white fa-2x"></i>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('gallery.index') }}" class="btn btn-outline-primary btn-lg px-5">
                Voir toute la galerie <i class="fas fa-images ms-2"></i>
            </a>
        </div>
    </div>
</div>
@endif

<!-- Call to Action -->
<div class="main-container section">
    <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #b45309 0%, #10b981 100%); border-radius: 20px;">
        <div class="card-body p-5 text-center text-white">
            <h2 class="display-5 fw-bold mb-4">Rejoignez-nous dans notre mission !</h2>
            <p class="lead mb-4">Ensemble, construisons un Mayo-Sava prospère et durable</p>
            <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 py-3">
                <i class="fas fa-envelope me-2"></i>Contactez-nous
            </a>
        </div>
    </div>
</div>
@endsection
