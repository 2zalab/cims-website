@extends('layouts.admin')
@section('title', 'Modifier Projet')
@section('page-title', 'Modifier Projet')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titre <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenu détaillé</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content', $project->content) }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="start_date" class="form-label">Date de début</label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date?->format('Y-m-d')) }}">
                    @error('start_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="end_date" class="form-label">Date de fin</label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $project->end_date?->format('Y-m-d')) }}">
                    @error('end_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label">Statut <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="planned" {{ old('status', $project->status) === 'planned' ? 'selected' : '' }}>Planifié</option>
                        <option value="in_progress" {{ old('status', $project->status) === 'in_progress' ? 'selected' : '' }}>En cours</option>
                        <option value="completed" {{ old('status', $project->status) === 'completed' ? 'selected' : '' }}>Terminé</option>
                    </select>
                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Lieu</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $project->location) }}">
                @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="" class="img-thumbnail mb-2" style="max-width: 200px;">
                @endif
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Activer ce projet</label>
            </div>
            <div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Mettre à jour</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
