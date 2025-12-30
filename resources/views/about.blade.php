@extends('layouts.app-public')

@section('title', 'À Propos - CIMS')

@section('content')
<!-- Hero Section -->
<div class="hero-section text-center py-5">
    <div class="main-container position-relative" style="z-index: 1;">
        <h1 class="display-4 fw-bold mb-3">À Propos du CIMS</h1>
        <p class="lead fs-4">Cercle des Ingénieurs de Mayo-Sava</p>
        <p class="fw-bold text-warning fs-5 mt-3">Solidarité - Développement - Unité</p>
    </div>
</div>

<!-- Qui Sommes-Nous -->
<div class="main-container section">
    <div class="row align-items-center g-5">
        <div class="col-lg-6">
            <span class="badge bg-primary mb-3 px-3 py-2">Qui Sommes-Nous ?</span>
            <h2 class="section-title mb-4">Une Association d'Ingénieurs Engagés</h2>
            <p class="lead text-muted mb-4">
                Le Cercle des Ingénieurs de Mayo-Sava (CIMS) est une association créée par des ingénieurs originaires du Département de Mayo-Sava, dans la Région de l'Extrême-Nord du Cameroun.
            </p>
            <p class="mb-4">
                Notre association réunit des professionnels de l'ingénierie déterminés à mettre leur expertise au service du développement de leur terre natale. Nous travaillons en synergie avec les autorités locales, les partenaires techniques et financiers, ainsi que les communautés pour impulser un développement durable et inclusif.
            </p>
            <div class="row g-3">
                <div class="col-sm-6">
                    <div class="d-flex align-items-start">
                        <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                            <i class="fas fa-check text-primary fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Expertise Technique</h6>
                            <p class="small text-muted mb-0">Ingénieurs qualifiés et expérimentés</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex align-items-start">
                        <div class="bg-success bg-opacity-10 rounded p-2 me-3">
                            <i class="fas fa-check text-success fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Engagement Local</h6>
                            <p class="small text-muted mb-0">Profondément ancrés dans notre terroir</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <h4 class="mb-4 text-primary">Notre Identité</h4>
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Siège Social</h6>
                        <p class="text-muted mb-0"><i class="fas fa-map-marker-alt text-primary me-2"></i>Mora, Cameroun</p>
                    </div>
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Année de Création</h6>
                        <p class="text-muted mb-0"><i class="fas fa-calendar text-primary me-2"></i>2024/2025</p>
                    </div>
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Zone d'Intervention</h6>
                        <p class="text-muted mb-0"><i class="fas fa-globe text-primary me-2"></i>Département de Mayo-Sava (3 Communes)</p>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-2">Devise</h6>
                        <p class="text-warning fw-bold mb-0">Solidarité - Développement - Unité</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vision & Mission -->
<div class="bg-light py-5">
    <div class="main-container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                            <i class="fas fa-eye fa-2x text-primary"></i>
                        </div>
                        <h3 class="mb-4">Notre Vision</h3>
                        <p class="text-muted">
                            Promouvoir le développement durable du Département de Mayo-Sava à travers l'expertise et le savoir-faire de nos ingénieurs, en s'appuyant sur les objectifs du développement durable (ODD 2015), la stratégie nationale du développement durable du Cameroun (SND 2020-2030) et la vision 2035.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                            <i class="fas fa-bullseye fa-2x text-success"></i>
                        </div>
                        <h3 class="mb-4">Notre Mission</h3>
                        <p class="text-muted">
                            Participer activement au développement de notre département en mettant notre expertise au service des projets de développement durable, en travaillant dans la paix, la solidarité et l'unité avec tous les acteurs du développement local.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Objectifs -->
<div class="main-container section">
    <div class="text-center mb-5">
        <h2 class="section-title">Nos Objectifs</h2>
        <p class="section-subtitle">Des actions concrètes pour un développement durable</p>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start">
                        <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                            <i class="fas fa-chart-line fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h5 class="mb-2">Planification & Conception</h5>
                            <p class="text-muted mb-0">Participer et accompagner les partenaires dans le processus de planification et de conception des projets de développement durable au niveau communal, départemental et régional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start">
                        <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                            <i class="fas fa-city fa-2x text-success"></i>
                        </div>
                        <div>
                            <h5 class="mb-2">Appui aux Communes</h5>
                            <p class="text-muted mb-0">Appuyer les conseils communaux dans la planification et la conception des Plans Communaux de Développement (PCD) des trois communes du Département.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start">
                        <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                            <i class="fas fa-seedling fa-2x text-warning"></i>
                        </div>
                        <div>
                            <h5 class="mb-2">Projets Agropastoraux</h5>
                            <p class="text-muted mb-0">Appuyer les comités locaux par la promotion des projets agropastoraux pour améliorer les revenus et la sécurité alimentaire des populations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start">
                        <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                            <i class="fas fa-briefcase fa-2x text-info"></i>
                        </div>
                        <div>
                            <h5 class="mb-2">Entrepreneuriat Local</h5>
                            <p class="text-muted mb-0">Participer à la promotion de l'entrepreneuriat local dans les projets du Département pour stimuler l'économie locale.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Domaines d'Intervention -->
<div class="bg-light py-5">
    <div class="main-container">
        <div class="text-center mb-5">
            <h2 class="section-title">Nos Domaines d'Intervention</h2>
            <p class="section-subtitle">Une expertise pluridisciplinaire au service du développement</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-tint fa-2x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Eau & Assainissement</h5>
                        <p class="text-muted small">Réhabilitation des points d'eau, hygiène et assainissement environnemental</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-bolt fa-2x text-warning"></i>
                        </div>
                        <h5 class="mb-3">Énergie</h5>
                        <p class="text-muted small">Réfection des infrastructures d'éclairage public et énergies renouvelables</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-leaf fa-2x text-success"></i>
                        </div>
                        <h5 class="mb-3">Agriculture</h5>
                        <p class="text-muted small">Appui technique aux agriculteurs et éleveurs pour une agriculture moderne</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-tree fa-2x text-info"></i>
                        </div>
                        <h5 class="mb-3">Environnement</h5>
                        <p class="text-muted small">Lutte contre la désertification et adaptation au changement climatique</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bureau Exécutif -->
<div class="main-container section">
    <div class="text-center mb-5">
        <h2 class="section-title">Notre Bureau Exécutif</h2>
        <p class="section-subtitle">Une équipe dédiée au service du développement</p>
    </div>
    <div class="row g-4">
        <!-- Président -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body p-4">
                    <div class="position-relative d-inline-block mb-3">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 120px; height: 120px;">
                            <i class="fas fa-user-tie fa-3x text-white"></i>
                        </div>
                        <div class="position-absolute bottom-0 end-0 bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                            <i class="fas fa-crown text-white"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">M. GOGOLA LALA</h5>
                    <p class="text-primary fw-semibold mb-2">Président</p>
                    <p class="text-muted small">Leader visionnaire et ingénieur expérimenté, il guide l'association vers ses objectifs de développement.</p>
                </div>
            </div>
        </div>

        <!-- Vice-Président -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 120px; height: 120px;">
                        <i class="fas fa-user-tie fa-3x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Vice-Président</h5>
                    <p class="text-success fw-semibold mb-2">Vice-Président</p>
                    <p class="text-muted small">Assiste le président dans ses fonctions et coordonne les activités opérationnelles.</p>
                </div>
            </div>
        </div>

        <!-- Secrétaire Général -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 120px; height: 120px;">
                        <i class="fas fa-user-edit fa-3x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-1">M. MEGUEWE YAKOUBA</h5>
                    <p class="text-info fw-semibold mb-2">Secrétaire Général</p>
                    <p class="text-muted small">Gère la correspondance, les archives et assure le suivi administratif de l'association.</p>
                </div>
            </div>
        </div>

        <!-- Trésorière -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 120px; height: 120px;">
                        <i class="fas fa-coins fa-3x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Mme. LABANNE</h5>
                    <p class="text-warning fw-semibold mb-2">Trésorière</p>
                    <p class="text-muted small">Responsable de la gestion financière et du patrimoine de l'association.</p>
                </div>
            </div>
        </div>

        <!-- Commissaire aux Comptes -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 120px; height: 120px;">
                        <i class="fas fa-calculator fa-3x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Commissaire aux Comptes</h5>
                    <p class="text-danger fw-semibold mb-2">Commissaire aux Comptes</p>
                    <p class="text-muted small">Veille à la régularité des opérations financières et comptables.</p>
                </div>
            </div>
        </div>

        <!-- Conseiller -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 120px; height: 120px;">
                        <i class="fas fa-user-graduate fa-3x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Conseiller</h5>
                    <p class="text-secondary fw-semibold mb-2">Conseiller</p>
                    <p class="text-muted small">Apporte conseils et orientations pour la bonne marche de l'association.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-light py-5">
    <div class="main-container">
        <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px;">
            <div class="card-body p-5 text-center text-white">
                <h2 class="fw-bold mb-4">Vous êtes ingénieur originaire de Mayo-Sava ?</h2>
                <p class="lead mb-4">Rejoignez-nous et participez au développement de notre département</p>
                <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 py-3">
                    <i class="fas fa-user-plus me-2"></i>Nous Rejoindre
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
