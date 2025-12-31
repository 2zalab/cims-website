@extends('layouts.app-public')

@section('title', 'Contact - CIMS')

@section('content')
<div class="hero-section with-bg-image text-center py-5">
    <div class="main-container position-relative" style="z-index: 2;">
        <h1 class="display-4 fw-bold mb-3">Contactez-Nous</h1>
        <p class="lead fs-5">Nous sommes à votre écoute</p>
    </div>
</div>

<div class="main-container section">
    <div class="row g-5">
        <!-- Formulaire de Contact -->
        <div class="col-lg-7">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h2 class="mb-4">Envoyez-nous un message</h2>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">Nom complet <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="subject" class="form-label fw-semibold">Sujet</label>
                                <input type="text" class="form-control form-control-lg @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}">
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-lg @error('message') is-invalid @enderror" id="message" name="message" rows="6" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Informations de Contact -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h5 class="mb-2">Adresse</h5>
                            <p class="text-muted mb-0">Mora, Département de Mayo-Sava<br>Région de l'Extrême-Nord, Cameroun</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                            <i class="fas fa-phone fa-2x text-success"></i>
                        </div>
                        <div>
                            <h5 class="mb-2">Téléphone</h5>
                            <p class="text-muted mb-1"><a href="tel:+237691805321" class="text-decoration-none text-muted">+237 691 805 321</a></p>
                            <p class="text-muted mb-0"><a href="tel:+237672277579" class="text-decoration-none text-muted">+237 672 277 579</a></p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                            <i class="fas fa-envelope fa-2x text-warning"></i>
                        </div>
                        <div>
                            <h5 class="mb-2">Email</h5>
                            <p class="text-muted mb-0"><a href="mailto:contact@cims.cm" class="text-decoration-none text-muted">contact@cims.cm</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #10b981 0%, #10b981 80%);">
                <div class="card-body p-4 text-white">
                    <h5 class="mb-3">Horaires d'ouverture</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Lundi - Vendredi</span>
                        <span class="fw-bold">8h - 17h</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Samedi</span>
                        <span class="fw-bold">9h - 13h</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Dimanche</span>
                        <span class="fw-bold">Fermé</span>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-center">
                <h6 class="mb-3">Suivez-nous</h6>
                <a href="#" class="btn btn-outline-primary btn-lg me-2"><i class="fab fa-facebook"></i></a>
                <a href="#" class="btn btn-x btn-lg me-2"><i class="fab fa-x-twitter"></i></a>
                <a href="#" class="btn btn-linkedin btn-lg"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
