@extends('layouts.app-public')

@section('title', 'Nos Activités - CIMS')

@section('content')
<div class="hero-section text-center py-5">
    <div class="main-container position-relative" style="z-index: 1;">
        <h1 class="display-4 fw-bold mb-3">Nos Activités</h1>
        <p class="lead fs-5">Découvrez nos projets et réalisations sur le terrain</p>
    </div>
</div>

<div class="main-container section">
    @if($activities->count() > 0)
    <div class="row g-4">
        @foreach($activities as $activity)
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                @if($activity->image)
                <div style="height: 250px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $activity->image) }}" class="card-img-top" alt="{{ $activity->title }}" style="height: 100%; width: 100%; object-fit: cover;">
                </div>
                @else
                <div class="bg-gradient d-flex align-items-center justify-content-center" style="height: 250px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="fas fa-image fa-4x text-white opacity-50"></i>
                </div>
                @endif
                <div class="card-body p-4">
                    <div class="mb-3">
                        <span class="badge bg-primary">{{ $activity->activity_date ? $activity->activity_date->format('d M Y') : 'À venir' }}</span>
                        @if($activity->location)
                        <span class="badge bg-secondary ms-2"><i class="fas fa-map-marker-alt me-1"></i>{{ $activity->location }}</span>
                        @endif
                        @if($activity->is_active)
                        <span class="badge bg-success ms-2"><i class="fas fa-check-circle me-1"></i>Actif</span>
                        @endif
                    </div>
                    <h5 class="card-title fw-bold mb-3">{{ $activity->title }}</h5>
                    <p class="card-text text-muted mb-4">{{ Str::limit($activity->description, 150) }}</p>
                    <a href="{{ route('activities.show', $activity) }}" class="btn btn-outline-primary w-100">
                        Lire plus <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($activities->hasPages())
    <div class="d-flex justify-content-center mt-5">
        {{ $activities->links() }}
    </div>
    @endif
    @else
    <div class="text-center py-5">
        <i class="fas fa-calendar-times fa-5x text-muted mb-4"></i>
        <h3 class="text-muted">Aucune activité disponible pour le moment</h3>
        <p class="text-muted">Revenez bientôt pour découvrir nos prochaines initiatives !</p>
    </div>
    @endif
</div>
@endsection
