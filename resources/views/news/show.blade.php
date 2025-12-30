@extends('layouts.app-public')

@section('title', $news->title . ' - CIMS')

@section('content')
<div class="main-container my-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none"><i class="fas fa-home me-1"></i>Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('news.index') }}" class="text-decoration-none">Actualités</a></li>
            <li class="breadcrumb-item active">{{ Str::limit($news->title, 50) }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                @if($news->image)
                <div style="height: 400px; overflow: hidden; border-radius: 16px 16px 0 0;">
                    <img src="{{ asset('storage/' . $news->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $news->title }}">
                </div>
                @endif
                <div class="card-body p-5">
                    <div class="mb-4">
                        <span class="badge bg-success me-2"><i class="fas fa-clock me-1"></i>{{ $news->created_at->diffForHumans() }}</span>
                        <span class="badge bg-info">{{ $news->created_at->format('d F Y') }}</span>
                    </div>

                    <h1 class="fw-bold mb-4">{{ $news->title }}</h1>

                    @if($news->excerpt)
                    <div class="alert alert-light border-start border-4 border-primary mb-5">
                        <p class="mb-0 fs-5 fw-semibold">{{ $news->excerpt }}</p>
                    </div>
                    @endif

                    <div class="content mb-5" style="line-height: 1.8;">
                        {!! nl2br(e($news->content)) !!}
                    </div>

                    <hr class="my-5">

                    <div class="d-flex gap-2">
                        <a href="{{ route('news.index') }}" class="btn btn-outline-success">
                            <i class="fas fa-arrow-left me-2"></i>Retour aux actualités
                        </a>
                        <a href="{{ route('contact.index') }}" class="btn btn-success">
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
                    <h5 class="fw-bold mb-4"><i class="fas fa-calendar text-success me-2"></i>Informations</h5>
                    <div class="mb-3">
                        <p class="small text-muted mb-1">Date de publication</p>
                        <p class="fw-semibold mb-0">{{ $news->created_at->format('d F Y à H:i') }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="small text-muted mb-1">Dernière mise à jour</p>
                        <p class="fw-semibold mb-0">{{ $news->updated_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="card-body p-4 text-white text-center">
                    <i class="fas fa-bell fa-3x mb-3"></i>
                    <h5 class="mb-3">Restez informé</h5>
                    <p class="mb-4">Contactez-nous pour recevoir nos actualités</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-light w-100">
                        <i class="fas fa-envelope me-2"></i>Nous Contacter
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
