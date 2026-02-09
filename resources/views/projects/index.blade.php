@extends('layouts.app-public')

@section('title', 'Nos Projets - CIMS')

@section('content')
<div class="hero-section with-bg-image text-center py-5">
    <div class="main-container position-relative" style="z-index: 2;">
        <h1 class="display-4 fw-bold mb-3">Nos Projets</h1>
        <p class="lead fs-5">Découvrez nos projets en cours et réalisés</p>
    </div>
</div>

<div class="main-container section">
    @if($projects->count() > 0)
    <div class="row g-4">
        @foreach($projects as $project)
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                @if($project->image)
                <div style="height: 250px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 100%; width: 100%; object-fit: cover;">
                </div>
                @else
                <div class="bg-gradient d-flex align-items-center justify-content-center" style="height: 250px; background: linear-gradient(135deg, #b45309 0%, #10b981 100%);">
                    <i class="fas fa-project-diagram fa-4x text-white opacity-50"></i>
                </div>
                @endif
                <div class="card-body p-4">
                    <div class="mb-3">
                        @if($project->status === 'planned')
                        <span class="badge bg-info">Planifié</span>
                        @elseif($project->status === 'in_progress')
                        <span class="badge bg-warning">En cours</span>
                        @else
                        <span class="badge bg-success">Terminé</span>
                        @endif
                        @if($project->location)
                        <span class="badge bg-secondary ms-2"><i class="fas fa-map-marker-alt me-1"></i>{{ $project->location }}</span>
                        @endif
                    </div>
                    <h5 class="card-title fw-bold mb-3">{{ $project->title }}</h5>
                    <p class="card-text text-muted mb-4">{{ Str::limit($project->description, 150) }}</p>
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-primary w-100">
                        Lire plus <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($projects->hasPages())
    <div class="d-flex justify-content-center mt-5">
        {{ $projects->links() }}
    </div>
    @endif
    @else
    <div class="text-center py-5">
        <i class="fas fa-project-diagram fa-5x text-muted mb-4"></i>
        <h3 class="text-muted">Aucun projet disponible pour le moment</h3>
        <p class="text-muted">Revenez bientôt pour découvrir nos prochains projets !</p>
    </div>
    @endif
</div>
@endsection
