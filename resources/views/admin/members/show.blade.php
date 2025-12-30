@extends('layouts.admin')

@section('title', 'Détails du Membre - Administration')
@section('page-title', 'Détails du Membre')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Retour à la liste
    </a>
    <a href="{{ route('admin.members.edit', $member) }}" class="btn btn-warning">
        <i class="fas fa-edit me-2"></i>Modifier
    </a>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                @if($member->photo)
                <img src="{{ asset('storage/' . $member->photo) }}"
                     alt="{{ $member->full_name }}"
                     class="img-fluid rounded-circle mb-3"
                     style="width: 200px; height: 200px; object-fit: cover;">
                @else
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                     style="width: 200px; height: 200px; font-size: 4rem;">
                    {{ strtoupper(substr($member->first_name, 0, 1) . substr($member->last_name, 0, 1)) }}
                </div>
                @endif
                <h4>{{ $member->full_name }}</h4>
                <p class="text-muted">{{ $member->speciality }}</p>
                @if($member->is_active)
                <span class="badge bg-success">Actif</span>
                @else
                <span class="badge bg-secondary">Inactif</span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informations Détaillées</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong><i class="fas fa-envelope text-primary me-2"></i>Email:</strong>
                        <p>{{ $member->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong><i class="fas fa-phone text-primary me-2"></i>Téléphone:</strong>
                        <p>{{ $member->phone ?? 'Non renseigné' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong><i class="fas fa-map-marker-alt text-primary me-2"></i>Arrondissement:</strong>
                        <p>{{ $member->arrondissement ?? 'Non renseigné' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong><i class="fas fa-home text-primary me-2"></i>Village:</strong>
                        <p>{{ $member->village ?? 'Non renseigné' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong><i class="fas fa-sort text-primary me-2"></i>Ordre:</strong>
                        <p>{{ $member->order }}</p>
                    </div>
                </div>

                @if($member->address)
                <div class="mb-3">
                    <strong><i class="fas fa-location-arrow text-primary me-2"></i>Adresse complète:</strong>
                    <p>{{ $member->address }}</p>
                </div>
                @endif

                @if($member->bio)
                <div class="mb-3">
                    <strong><i class="fas fa-user text-primary me-2"></i>Biographie:</strong>
                    <p>{{ $member->bio }}</p>
                </div>
                @endif

                @if($member->linkedin || $member->facebook)
                <div class="mb-3">
                    <strong><i class="fas fa-share-alt text-primary me-2"></i>Réseaux sociaux:</strong>
                    <div class="mt-2">
                        @if($member->linkedin)
                        <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                            <i class="fab fa-linkedin me-1"></i>LinkedIn
                        </a>
                        @endif
                        @if($member->facebook)
                        <a href="{{ $member->facebook }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="fab fa-facebook me-1"></i>Facebook
                        </a>
                        @endif
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <strong><i class="fas fa-calendar-plus text-primary me-2"></i>Créé le:</strong>
                        <p>{{ $member->created_at->format('d/m/Y à H:i') }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong><i class="fas fa-calendar-check text-primary me-2"></i>Modifié le:</strong>
                        <p>{{ $member->updated_at->format('d/m/Y à H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
