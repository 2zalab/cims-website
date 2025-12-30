@extends('layouts.app-public')

@section('title', 'Nos Activités - CIMS')

@section('content')
<div class="hero-section text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Nos Activités</h1>
        <p class="lead">Découvrez les projets et activités du CIMS</p>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        @forelse($activities as $activity)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($activity->image)
                <img src="{{ asset('storage/' . $activity->image) }}" class="card-img-top" alt="{{ $activity->title }}" style="height: 250px; object-fit: cover;">
                @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 250px;">
                    <i class="fas fa-image fa-4x"></i>
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
                    <p class="card-text">{{ Str::limit($activity->description, 150) }}</p>
                    <a href="{{ route('activities.show', $activity) }}" class="btn btn-primary">Lire plus</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> Aucune activité disponible pour le moment.
            </div>
        </div>
        @endforelse
    </div>

    @if($activities->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $activities->links() }}
    </div>
    @endif
</div>
@endsection
