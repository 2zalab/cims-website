@extends('layouts.app-public')

@section('title', 'À Propos - CIMS')

@section('content')
<div class="hero-section text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">À Propos du CIMS</h1>
        <p class="lead">Cercle des Ingénieurs de Mayo-Sava</p>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm mb-4">
                <div class="card-body p-5">
                    <h2 class="mb-4">Qui Sommes-Nous ?</h2>
                    <p class="lead">Le Cercle des Ingénieurs de Mayo-Sava (CIMS) est une association créée par des ingénieurs originaires du Département de Mayo-Sava, dans la Région de l'Extrême-Nord du Cameroun.</p>
                    
                    <h3 class="mt-5 mb-3">Notre Vision</h3>
                    <p>Promouvoir le développement durable du Département de Mayo-Sava à travers l'expertise et le savoir-faire de nos ingénieurs, en s'appuyant sur les objectifs du développement durable (ODD 2015), la stratégie nationale du développement durable du Cameroun (SND 2020-2030) et la vision 2035.</p>
                    
                    <h3 class="mt-5 mb-3">Notre Mission</h3>
                    <p>Participer activement au développement de notre département en mettant notre expertise au service des projets de développement durable, en travaillant dans la paix, la solidarité et l'unité.</p>
                    
                    <h3 class="mt-5 mb-3">Notre Devise</h3>
                    <p class="text-center fs-4 fw-bold text-primary">Solidarité - Développement - Unité</p>
                    
                    <h3 class="mt-5 mb-3">Nos Objectifs</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-check text-success me-2"></i> Participer et accompagner les partenaires dans le processus de planification et de conception des projets de développement durable</li>
                        <li class="list-group-item"><i class="fas fa-check text-success me-2"></i> Appuyer les conseils communaux dans la planification et la conception des PCD des trois communes du Département</li>
                        <li class="list-group-item"><i class="fas fa-check text-success me-2"></i> Promouvoir des projets de développement durable favorisant les revenus financiers des communes</li>
                        <li class="list-group-item"><i class="fas fa-check text-success me-2"></i> Appuyer les comités locaux par la promotion des projets agropastoraux</li>
                        <li class="list-group-item"><i class="fas fa-check text-success me-2"></i> Participer à la promotion de l'entreprenariat local dans les projets du Département</li>
                    </ul>

                    <h3 class="mt-5 mb-3">Nos Domaines d'Intervention</h3>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h5><i class="fas fa-tint text-primary"></i> Eau et Assainissement</h5>
                                    <p class="small">Réhabilitation des points d'eau, hygiène et assainissement environnemental</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card border-success">
                                <div class="card-body">
                                    <h5><i class="fas fa-bolt text-success"></i> Énergie</h5>
                                    <p class="small">Réfectionnement des infrastructures d'éclairage public</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card border-warning">
                                <div class="card-body">
                                    <h5><i class="fas fa-seedling text-warning"></i> Agriculture</h5>
                                    <p class="small">Appui technique aux agriculteurs et éleveurs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card border-info">
                                <div class="card-body">
                                    <h5><i class="fas fa-tree text-info"></i> Environnement</h5>
                                    <p class="small">Lutte contre la désertification et le changement climatique</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-5 mb-3">Siège Social</h3>
                    <p><i class="fas fa-map-marker-alt text-danger"></i> Mora, Cameroun</p>
                    
                    <div class="text-center mt-5">
                        <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-envelope"></i> Contactez-nous
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
