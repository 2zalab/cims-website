@extends('layouts.app-public')

@section('title', 'Accueil - CIMS')

@section('content')
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 fw-bold mb-4">Cercle des Ingénieurs de Mayo-Sava</h1>
        <p class="lead mb-4">Solidarité - Développement - Unité</p>
        <p class="mb-4">Ensemble pour le développement durable du Département de Mayo-Sava</p>
        <div>
            <a href="{{ route('about') }}" class="btn btn-light btn-lg me-2"><i class="fas fa-info-circle"></i> En savoir plus</a>
            <a href="{{ route('contact.index') }}" class="btn btn-success btn-lg"><i class="fas fa-envelope"></i> Nous contacter</a>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row text-center mb-5">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <i class="fas fa-lightbulb fa-3x text-primary mb-3"></i>
                    <h5>Innovation</h5>
                    <p class="text-muted">Promouvoir l'innovation et l'entrepreneuriat local pour le développement</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <i class="fas fa-users fa-3x text-success mb-3"></i>
                    <h5>Solidarité</h5>
                    <p class="text-muted">Travailler ensemble pour le bien-être de notre communauté</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-3x text-warning mb-3"></i>
                    <h5>Développement</h5>
                    <p class="text-muted">Participer activement au développement durable de Mayo-Sava</p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center mb-4">Nos Dernières Activités</h2>
    <div class="row mb-5">
        @forelse($activities as $activity)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($activity->image)
                <img src="{{ asset('storage/' . $activity->image) }}" class="card-img-top" alt="{{ $activity->title }}" style="height: 200px; object-fit: cover;">
                @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="fas fa-image fa-3x"></i>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $activity->title }}</h5>
                    <p class="card-text text-muted small">
                        <i class="fas fa-calendar"></i> {{ $activity->activity_date ? $activity->activity_date->format('d/m/Y') : 'Date à déterminer' }}
                        @if($activity->location)
                        <br><i class="fas fa-map-marker-alt"></i> {{ $activity->location }}
                        @endif
                    </p>
                    <p class="card-text">{{ Str::limit($activity->description, 100) }}</p>
                    <a href="{{ route('activities.show', $activity) }}" class="btn btn-primary btn-sm">Lire plus</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Aucune activité pour le moment.</p>
        </div>
        @endforelse
    </div>
    @if($activities->count() > 0)
    <div class="text-center mb-5">
        <a href="{{ route('activities.index') }}" class="btn btn-outline-primary">Voir toutes les activités</a>
    </div>
    @endif

    <h2 class="text-center mb-4">Actualités Récentes</h2>
    <div class="row mb-5">
        @forelse($news as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="fas fa-newspaper fa-3x"></i>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-muted small"><i class="fas fa-clock"></i> {{ $item->created_at->diffForHumans() }}</p>
                    <p class="card-text">{{ Str::limit($item->excerpt ?? $item->content, 100) }}</p>
                    <a href="{{ route('news.show', $item) }}" class="btn btn-primary btn-sm">Lire la suite</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Aucune actualité pour le moment.</p>
        </div>
        @endforelse
    </div>
    @if($news->count() > 0)
    <div class="text-center mb-5">
        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">Voir toutes les actualités</a>
    </div>
    @endif

    <h2 class="text-center mb-4">Galerie Photos</h2>
    <div class="row">
        @forelse($galleries as $gallery)
        <div class="col-md-2 col-sm-4 col-6 mb-3">
            <a href="{{ asset('storage/' . $gallery->image) }}" data-lightbox="gallery">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid rounded shadow-sm" style="height: 150px; width: 100%; object-fit: cover;">
            </a>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Aucune image dans la galerie pour le moment.</p>
        </div>
        @endforelse
    </div>
    @if($galleries->count() > 0)
    <div class="text-center mt-4">
        <a href="{{ route('gallery.index') }}" class="btn btn-outline-primary">Voir toute la galerie</a>
    </div>
    @endif
</div>
@endsection
