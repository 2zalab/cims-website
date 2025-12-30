@extends('layouts.app-public')

@section('title', $activity->title . ' - CIMS')

@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">Activités</a></li>
            <li class="breadcrumb-item active">{{ $activity->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                @if($activity->image)
                <img src="{{ asset('storage/' . $activity->image) }}" class="card-img-top" alt="{{ $activity->title }}">
                @endif
                <div class="card-body p-5">
                    <h1 class="mb-3">{{ $activity->title }}</h1>
                    <p class="text-muted mb-4">
                        <i class="fas fa-calendar"></i> {{ $activity->activity_date ? $activity->activity_date->format('d F Y') : 'Date à déterminer' }}
                        @if($activity->location)
                        | <i class="fas fa-map-marker-alt"></i> {{ $activity->location }}
                        @endif
                    </p>
                    <div class="mb-4">
                        <h4>Description</h4>
                        <p>{{ $activity->description }}</p>
                    </div>
                    @if($activity->content)
                    <div>
                        <h4>Détails</h4>
                        <div>{!! nl2br(e($activity->content)) !!}</div>
                    </div>
                    @endif
                    <div class="mt-5">
                        <a href="{{ route('activities.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left"></i> Retour aux activités
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
