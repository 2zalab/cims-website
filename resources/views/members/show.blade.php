@extends('layouts.app-public')

@section('title', $member->full_name . ' - CIMS')

@section('content')
<!-- Hero Section -->
<div class="hero-section with-bg-image text-center py-5">
    <div class="main-container position-relative" style="z-index: 2;">
        <h1 class="display-4 fw-bold mb-3">{{ $member->full_name }}</h1>
        <p class="lead fs-4">{{ $member->speciality }}</p>
    </div>
</div>

<!-- Member Profile -->
<div class="main-container section">
    <div class="mb-4">
        <a href="{{ route('members.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Retour aux membres
        </a>
    </div>

    <div class="row">
        <!-- Left Column: Photo & Contact -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                <div class="card-body text-center p-4">
                    @if($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}"
                         alt="{{ $member->full_name }}"
                         class="img-fluid rounded-circle mb-4"
                         style="width: 200px; height: 200px; object-fit: cover;">
                    @else
                    <div class="rounded-circle bg-gradient d-flex align-items-center justify-content-center mx-auto mb-4"
                         style="width: 200px; height: 200px; background: linear-gradient(135deg, #b45309 0%, #10b981 100%);">
                        <span class="text-white fw-bold display-4">
                            {{ strtoupper(substr($member->first_name, 0, 1) . substr($member->last_name, 0, 1)) }}
                        </span>
                    </div>
                    @endif

                    <h3 class="fw-bold mb-2">{{ $member->full_name }}</h3>
                    <p class="text-primary mb-4">
                        <i class="fas fa-briefcase me-2"></i>{{ $member->speciality }}
                    </p>

                    <!-- Contact Information -->
                    <div class="mb-4 text-start">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-address-card me-2 text-primary"></i>Contact
                        </h6>

                        @if($member->email)
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Email</small>
                            <a href="mailto:{{ $member->email }}" class="text-decoration-none">
                                <i class="fas fa-envelope me-2 text-primary"></i>{{ $member->email }}
                            </a>
                        </div>
                        @endif

                        @if($member->phone)
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Téléphone</small>
                            <a href="tel:{{ $member->phone }}" class="text-decoration-none">
                                <i class="fas fa-phone me-2 text-success"></i>{{ $member->phone }}
                            </a>
                        </div>
                        @endif

                        @if($member->arrondissement || $member->village || $member->address)
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Localisation</small>
                            <div>
                                <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                                @if($member->village)
                                    {{ $member->village }}
                                    @if($member->arrondissement), @endif
                                @endif
                                @if($member->arrondissement)
                                    {{ $member->arrondissement }}
                                @endif
                            </div>
                            @if($member->address)
                            <small class="text-muted mt-1 d-block ps-4">{{ $member->address }}</small>
                            @endif
                        </div>
                        @endif
                    </div>

                    <!-- Social Links -->
                    @if($member->linkedin || $member->facebook)
                    <div class="d-flex gap-2 justify-content-center">
                        @if($member->linkedin)
                        <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-primary">
                            <i class="fab fa-linkedin me-2"></i>LinkedIn
                        </a>
                        @endif
                        @if($member->facebook)
                        <a href="{{ $member->facebook }}" target="_blank" class="btn btn-primary">
                            <i class="fab fa-facebook me-2"></i>Facebook
                        </a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column: Bio & Details -->
        <div class="col-lg-8">
            @if($member->bio)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-user me-2 text-primary"></i>À propos
                    </h5>
                    <p class="text-muted" style="line-height: 1.8; white-space: pre-line;">{{ $member->bio }}</p>
                </div>
            </div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="fas fa-info-circle me-2 text-primary"></i>Informations Professionnelles
                    </h5>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                                    <i class="fas fa-briefcase fa-lg text-primary"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1">Spécialité</small>
                                    <strong>{{ $member->speciality }}</strong>
                                </div>
                            </div>
                        </div>

                        @if($member->arrondissement)
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                                    <i class="fas fa-map-marked-alt fa-lg text-success"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1">Arrondissement</small>
                                    <strong>{{ $member->arrondissement }}</strong>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($member->village)
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                                    <i class="fas fa-home fa-lg text-warning"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1">Village</small>
                                    <strong>{{ $member->village }}</strong>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                                    <i class="fas fa-users fa-lg text-info"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1">Statut</small>
                                    <strong>Membre Actif CIMS</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact CTA -->
            <div class="card border-0 shadow-lg mt-4" style="background: linear-gradient(135deg, #b45309 0%, #10b981 100%);">
                <div class="card-body p-4 text-center text-white">
                    <h5 class="fw-bold mb-3">Besoin d'une expertise en {{ $member->speciality }} ?</h5>
                    <p class="mb-4">N'hésitez pas à contacter {{ $member->first_name }} pour vos projets</p>
                    @if($member->email)
                    <a href="mailto:{{ $member->email }}" class="btn btn-light btn-lg px-5">
                        <i class="fas fa-envelope me-2"></i>Envoyer un message
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
