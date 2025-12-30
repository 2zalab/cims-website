@extends('layouts.app-public')

@section('title', 'Actualités - CIMS')

@section('content')
<div class="hero-section text-center py-5">
    <div class="main-container position-relative" style="z-index: 1;">
        <h1 class="display-4 fw-bold mb-3">Actualités</h1>
        <p class="lead fs-5">Restez informés de nos dernières nouvelles et événements</p>
    </div>
</div>

<div class="main-container section">
    @if($news->count() > 0)
    <div class="row g-4">
        @foreach($news as $item)
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                @if($item->image)
                <div style="height: 250px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 100%; width: 100%; object-fit: cover;">
                </div>
                @else
                <div class="bg-gradient d-flex align-items-center justify-content-center" style="height: 250px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-newspaper fa-4x text-white opacity-50"></i>
                </div>
                @endif
                <div class="card-body p-4">
                    <div class="mb-3">
                        <span class="badge bg-success">
                            <i class="fas fa-clock me-1"></i>{{ $item->created_at->diffForHumans() }}
                        </span>
                        <span class="badge bg-info ms-2">{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                    <h5 class="card-title fw-bold mb-3">{{ $item->title }}</h5>
                    @if($item->excerpt)
                    <p class="card-text text-muted mb-4">{{ Str::limit($item->excerpt, 150) }}</p>
                    @else
                    <p class="card-text text-muted mb-4">{{ Str::limit($item->content, 150) }}</p>
                    @endif
                    <a href="{{ route('news.show', $item) }}" class="btn btn-outline-success w-100">
                        Lire la suite <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($news->hasPages())
    <div class="d-flex justify-content-center mt-5">
        {{ $news->links() }}
    </div>
    @endif
    @else
    <div class="text-center py-5">
        <i class="fas fa-newspaper fa-5x text-muted mb-4"></i>
        <h3 class="text-muted">Aucune actualité disponible pour le moment</h3>
        <p class="text-muted">Revenez bientôt pour nos dernières nouvelles !</p>
    </div>
    @endif
</div>
@endsection
