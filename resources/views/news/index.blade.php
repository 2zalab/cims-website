@extends('layouts.app-public')

@section('title', 'Actualités - CIMS')

@section('content')
<div class="hero-section text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Actualités</h1>
        <p class="lead">Restez informés de nos dernières nouvelles</p>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        @forelse($news as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 250px; object-fit: cover;">
                @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 250px;">
                    <i class="fas fa-newspaper fa-4x"></i>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-muted small">
                        <i class="fas fa-clock"></i> {{ $item->created_at->format('d/m/Y') }} ({{ $item->created_at->diffForHumans() }})
                    </p>
                    <p class="card-text">{{ Str::limit($item->excerpt ?? $item->content, 150) }}</p>
                    <a href="{{ route('news.show', $item) }}" class="btn btn-primary">Lire la suite</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> Aucune actualité disponible pour le moment.
            </div>
        </div>
        @endforelse
    </div>

    @if($news->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $news->links() }}
    </div>
    @endif
</div>
@endsection
