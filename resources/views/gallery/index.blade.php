@extends('layouts.app-public')

@section('title', 'Galerie - CIMS')

@section('content')
<div class="hero-section text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Galerie Photos</h1>
        <p class="lead">Nos moments en images</p>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        @forelse($galleries as $gallery)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h6 class="card-title">{{ $gallery->title }}</h6>
                    @if($gallery->description)
                    <p class="card-text small text-muted">{{ Str::limit($gallery->description, 60) }}</p>
                    @endif
                    @if($gallery->activity)
                    <a href="{{ route('activities.show', $gallery->activity) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-link"></i> Voir l'activité
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> Aucune photo disponible pour le moment.
            </div>
        </div>
        @endforelse
    </div>

    @if($galleries->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $galleries->links() }}
    </div>
    @endif
</div>
@endsection
