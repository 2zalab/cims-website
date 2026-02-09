@extends('layouts.app-public')

@section('title', $project->title . ' - CIMS')

@section('content')
<div class="main-container my-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none"><i class="fas fa-home me-1"></i>Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}" class="text-decoration-none">Projets</a></li>
            <li class="breadcrumb-item active">{{ Str::limit($project->title, 50) }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                @if($project->image)
                <div style="height: 400px; overflow: hidden; border-radius: 16px 16px 0 0;">
                    <img src="{{ asset('storage/' . $project->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $project->title }}">
                </div>
                @endif
                <div class="card-body p-5">
                    <div class="mb-4">
                        @if($project->status === 'planned')
                        <span class="badge bg-info me-2">Planifié</span>
                        @elseif($project->status === 'in_progress')
                        <span class="badge bg-warning me-2">En cours</span>
                        @else
                        <span class="badge bg-success me-2">Terminé</span>
                        @endif
                        @if($project->location)
                        <span class="badge bg-secondary me-2"><i class="fas fa-map-marker-alt me-1"></i>{{ $project->location }}</span>
                        @endif
                    </div>

                    <h1 class="fw-bold mb-4">{{ $project->title }}</h1>

                    <div class="mb-5">
                        <h4 class="fw-semibold mb-3"><i class="fas fa-align-left text-primary me-2"></i>Description</h4>
                        <p class="text-muted fs-5">{{ $project->description }}</p>
                    </div>

                    @if($project->content)
                    <div class="mb-5">
                        <h4 class="fw-semibold mb-3"><i class="fas fa-file-alt text-success me-2"></i>Détails</h4>
                        <div class="text-muted" style="line-height: 1.8;">{!! nl2br(e($project->content)) !!}</div>
                    </div>
                    @endif

                    <hr class="my-5">

                    <div class="d-flex gap-2">
                        <a href="{{ route('projects.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i>Retour aux projets
                        </a>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>Contactez-nous
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4"><i class="fas fa-info-circle text-primary me-2"></i>Informations</h5>
                    <div class="mb-3">
                        <p class="small text-muted mb-1">Statut</p>
                        <p class="fw-semibold mb-0">
                            @if($project->status === 'planned') Planifié
                            @elseif($project->status === 'in_progress') En cours
                            @else Terminé
                            @endif
                        </p>
                    </div>
                    @if($project->start_date)
                    <div class="mb-3">
                        <p class="small text-muted mb-1">Date de début</p>
                        <p class="fw-semibold mb-0">{{ $project->start_date->format('d F Y') }}</p>
                    </div>
                    @endif
                    @if($project->end_date)
                    <div class="mb-3">
                        <p class="small text-muted mb-1">Date de fin</p>
                        <p class="fw-semibold mb-0">{{ $project->end_date->format('d F Y') }}</p>
                    </div>
                    @endif
                    @if($project->location)
                    <div class="mb-3">
                        <p class="small text-muted mb-1">Lieu</p>
                        <p class="fw-semibold mb-0"><i class="fas fa-map-marker-alt text-danger me-2"></i>{{ $project->location }}</p>
                    </div>
                    @endif
                    <div class="mb-3">
                        <p class="small text-muted mb-1">Date de publication</p>
                        <p class="fw-semibold mb-0">{{ $project->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #b45309 0%, #10b981 100%);">
                <div class="card-body p-4 text-white text-center">
                    <i class="fas fa-handshake fa-3x mb-3"></i>
                    <h5 class="mb-3">Participez à nos projets</h5>
                    <p class="mb-4">Contactez-nous pour en savoir plus sur ce projet</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-light w-100">
                        <i class="fas fa-envelope me-2"></i>Nous Contacter
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
