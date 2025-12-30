@extends('layouts.app-public')

@section('title', 'Galerie - CIMS')

@section('content')
<div class="hero-section with-bg-image text-center py-5">
    <div class="main-container position-relative" style="z-index: 2;">
        <h1 class="display-4 fw-bold mb-3">Galerie Photos</h1>
        <p class="lead fs-5">Nos moments et réalisations en images</p>
    </div>
</div>

<div class="main-container section">
    @if($galleries->count() > 0)
    <div class="row g-4">
        @foreach($galleries as $gallery)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div style="height: 220px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-100 h-100" style="object-fit: cover;">
                </div>
                <div class="card-body p-3">
                    <h6 class="card-title fw-bold mb-2">{{ $gallery->title }}</h6>
                    @if($gallery->description)
                    <p class="card-text small text-muted mb-2">{{ Str::limit($gallery->description, 80) }}</p>
                    @endif
                    @if($gallery->activity)
                    <a href="{{ route('activities.show', $gallery->activity) }}" class="btn btn-sm btn-outline-primary w-100">
                        <i class="fas fa-link me-1"></i>Voir l'activité
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($galleries->hasPages())
    <div class="d-flex justify-content-center mt-5">
        {{ $galleries->links() }}
    </div>
    @endif
    @else
    <div class="text-center py-5">
        <i class="fas fa-images fa-5x text-muted mb-4"></i>
        <h3 class="text-muted">Aucune photo disponible pour le moment</h3>
        <p class="text-muted">La galerie sera bientôt remplie avec nos activités !</p>
    </div>
    @endif
</div>
@endsection
