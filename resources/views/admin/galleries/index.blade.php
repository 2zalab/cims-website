@extends('layouts.admin')
@section('title', 'Gestion de la Galerie')
@section('page-title', 'Gestion de la Galerie')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste des Images</h5>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter une Image</a>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($galleries as $gallery)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title">{{ Str::limit($gallery->title, 30) }}</h6>
                        @if($gallery->activity)
                        <p class="small text-muted mb-2"><i class="fas fa-link"></i> {{ Str::limit($gallery->activity->title, 20) }}</p>
                        @endif
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-warning flex-fill"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="flex-fill" onsubmit="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center text-muted">Aucune image dans la galerie</p>
            </div>
            @endforelse
        </div>
        @if($galleries->hasPages())
        <div class="mt-3">
            {{ $galleries->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
