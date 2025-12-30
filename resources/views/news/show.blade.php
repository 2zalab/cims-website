@extends('layouts.app-public')

@section('title', $news->title . ' - CIMS')

@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Actualités</a></li>
            <li class="breadcrumb-item active">{{ $news->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->title }}">
                @endif
                <div class="card-body p-5">
                    <h1 class="mb-3">{{ $news->title }}</h1>
                    <p class="text-muted mb-4">
                        <i class="fas fa-clock"></i> Publié le {{ $news->created_at->format('d F Y à H:i') }}
                    </p>
                    @if($news->excerpt)
                    <div class="alert alert-light mb-4">
                        <strong>{{ $news->excerpt }}</strong>
                    </div>
                    @endif
                    <div class="content">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left"></i> Retour aux actualités
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
