@extends('layouts.app-public')

@section('title', 'Nos Membres - CIMS')

@section('content')
<!-- Hero Section -->
<div class="hero-section with-bg-image text-center py-5">
    <div class="main-container position-relative" style="z-index: 2;">
        <h1 class="display-4 fw-bold mb-3">Nos Membres</h1>
        <p class="lead fs-4">Découvrez les ingénieurs qui font la force du CIMS</p>
    </div>
</div>

<!-- Search Section -->
<div class="bg-light py-4">
    <div class="main-container">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('members.index') }}" method="GET" class="row g-3">
                    <div class="col-md-3">
                        <label for="search" class="form-label small fw-semibold">
                            <i class="fas fa-search me-1"></i>Rechercher par nom
                        </label>
                        <input type="text" class="form-control" id="search" name="search"
                               value="{{ request('search') }}" placeholder="Nom ou email...">
                    </div>

                    <div class="col-md-3">
                        <label for="speciality" class="form-label small fw-semibold">
                            <i class="fas fa-briefcase me-1"></i>Spécialité
                        </label>
                        <select class="form-select" id="speciality" name="speciality">
                            <option value="">Toutes les spécialités</option>
                            @foreach($specialities as $speciality)
                            <option value="{{ $speciality }}" {{ request('speciality') == $speciality ? 'selected' : '' }}>
                                {{ $speciality }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="arrondissement" class="form-label small fw-semibold">
                            <i class="fas fa-map-marked-alt me-1"></i>Arrondissement
                        </label>
                        <select class="form-select" id="arrondissement" name="arrondissement">
                            <option value="">Tous</option>
                            @foreach($arrondissements as $arrondissement)
                            <option value="{{ $arrondissement }}" {{ request('arrondissement') == $arrondissement ? 'selected' : '' }}>
                                {{ $arrondissement }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="village" class="form-label small fw-semibold">
                            <i class="fas fa-home me-1"></i>Village
                        </label>
                        <select class="form-select" id="village" name="village">
                            <option value="">Tous</option>
                            @foreach($villages as $village)
                            <option value="{{ $village }}" {{ request('village') == $village ? 'selected' : '' }}>
                                {{ $village }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary flex-fill">
                            <i class="fas fa-filter me-1"></i>Filtrer
                        </button>
                        @if(request()->hasAny(['search', 'speciality', 'arrondissement', 'village']))
                        <a href="{{ route('members.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-redo"></i>
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Members List -->
<div class="bg-light py-4 section px-4">
    @if(request()->hasAny(['search', 'speciality', 'arrondissement', 'village']))
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>{{ $members->total() }} membre(s) trouvé(s)</strong>
        @if(request('search'))
            avec le nom "{{ request('search') }}"
        @endif
        @if(request('speciality'))
            en {{ request('speciality') }}
        @endif
        @if(request('arrondissement'))
            dans l'arrondissement de {{ request('arrondissement') }}
        @endif
        @if(request('village'))
            au village de {{ request('village') }}
        @endif
    </div>
    @endif

    <div class="row g-4">
        @forelse($members as $member)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm h-100 member-card">
                <div class="card-body text-center p-4">
                    @if($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}"
                         alt="{{ $member->full_name }}"
                         class="rounded-circle mb-3"
                         style="width: 120px; height: 120px; object-fit: cover;">
                    @else
                    <div class="rounded-circle bg-gradient d-flex align-items-center justify-content-center mx-auto mb-3"
                         style="width: 120px; height: 120px; background: linear-gradient(135deg, #b45309 0%, #10b981 100%);">
                        <span class="text-white fw-bold fs-2">
                            {{ strtoupper(substr($member->first_name, 0, 1) . substr($member->last_name, 0, 1)) }}
                        </span>
                    </div>
                    @endif

                    <h5 class="card-title fw-bold mb-2">{{ $member->full_name }}</h5>
                    <p class="text-primary small mb-3">
                        <i class="fas fa-briefcase me-1"></i>{{ $member->speciality }}
                    </p>

                    @if($member->arrondissement || $member->village)
                    <p class="text-muted small mb-3">
                        <i class="fas fa-map-marker-alt me-1"></i>
                        @if($member->village)
                            {{ $member->village }}
                            @if($member->arrondissement), @endif
                        @endif
                        @if($member->arrondissement)
                            {{ $member->arrondissement }}
                        @endif
                    </p>
                    @endif

                    <div class="d-flex gap-2 justify-content-center mb-3">
                        @if($member->email)
                        <a href="mailto:{{ $member->email }}" class="btn btn-sm btn-outline-primary" title="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                        @endif
                        @if($member->phone)
                        <a href="tel:{{ $member->phone }}" class="btn btn-sm btn-outline-success" title="Téléphone">
                            <i class="fas fa-phone"></i>
                        </a>
                        @endif
                        @if($member->linkedin)
                        <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-sm btn-outline-info" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        @endif
                    </div>

                    <a href="{{ route('members.show', $member) }}" class="btn btn-primary btn-sm w-100">
                        Voir le profil <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-users fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">Aucun membre trouvé</h4>
            <p class="text-muted">Essayez de modifier vos critères de recherche.</p>
            <a href="{{ route('members.index') }}" class="btn btn-primary mt-3">
                <i class="fas fa-redo me-2"></i>Réinitialiser la recherche
            </a>
        </div>
        @endforelse
    </div>

    @if($members->hasPages())
    <div class="mt-5 d-flex justify-content-center">
        {{ $members->appends(request()->query())->links() }}
    </div>
    @endif
</div>

<style>
.member-card {
    transition: all 0.3s ease;
}

.member-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15) !important;
}
</style>
@endsection
