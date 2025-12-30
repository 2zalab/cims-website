@extends('layouts.app-public')

@section('title', $activity->title . ' - CIMS')

@section('content')
<div class="main-container my-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none"><i class="fas fa-home me-1"></i>Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('activities.index') }}" class="text-decoration-none">Activités</a></li>
            <li class="breadcrumb-item active">{{ Str::limit($activity->title, 50) }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                @if($activity->image)
                <div style="height: 400px; overflow: hidden; border-radius: 16px 16px 0 0;">
                    <img src="{{ asset('storage/' . $activity->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $activity->title }}">
                </div>
                @endif
                <div class="card-body p-5">
                    <div class="mb-4">
                        <span class="badge bg-primary me-2">{{ $activity->activity_date ? $activity->activity_date->format('d F Y') : 'Date à déterminer' }}</span>
                        @if($activity->location)
                        <span class="badge bg-secondary me-2"><i class="fas fa-map-marker-alt me-1"></i>{{ $activity->location }}</span>
                        @endif
                        @if($activity->is_active)
                        <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Actif</span>
                        @endif
                    </div>

                    <h1 class="fw-bold mb-4">{{ $activity->title }}</h1>

                    <div class="mb-5">
                        <h4 class="fw-semibold mb-3"><i class="fas fa-align-left text-primary me-2"></i>Description</h4>
                        <p class="text-muted fs-5">{{ $activity->description }}</p>
                    </div>

                    @if($activity->content)
                    <div class="mb-5">
                        <h4 class="fw-semibold mb-3"><i class="fas fa-file-alt text-success me-2"></i>Détails</h4>
                        <div class="text-muted" style="line-height: 1.8;">{!! nl2br(e($activity->content)) !!}</div>
                    </div>
                    @endif

                    <hr class="my-5">

                    <div class="d-flex gap-2">
                        <a href="{{ route('activities.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i>Retour aux activités
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
                        <p class="small text-muted mb-1">Date de l'activité</p>
                        <p class="fw-semibold mb-0">{{ $activity->activity_date ? $activity->activity_date->format('d F Y') : 'À déterminer' }}</p>
                    </div>
                    @if($activity->location)
                    <div class="mb-3">
                        <p class="small text-muted mb-1">Lieu</p>
                        <p class="fw-semibold mb-0"><i class="fas fa-map-marker-alt text-danger me-2"></i>{{ $activity->location }}</p>
                    </div>
                    @endif
                    <div class="mb-3">
                        <p class="small text-muted mb-1">Date de publication</p>
                        <p class="fw-semibold mb-0">{{ $activity->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body p-4 text-white text-center">
                    <i class="fas fa-handshake fa-3x mb-3"></i>
                    <h5 class="mb-3">Participez à nos activités</h5>
                    <p class="mb-4">Contactez-nous pour en savoir plus sur cette activité</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-light w-100">
                        <i class="fas fa-envelope me-2"></i>Nous Contacter
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
