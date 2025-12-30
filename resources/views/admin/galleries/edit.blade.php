@extends('layouts.admin')
@section('title', 'Modifier l\'Image')
@section('page-title', 'Modifier l\'Image')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titre <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2">{{ old('description', $gallery->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="" class="img-thumbnail mb-2" style="max-width: 300px;">
                <label for="image" class="form-label">Nouvelle image (optionnel)</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="activity_id" class="form-label">Lier à une activité</label>
                <select class="form-select @error('activity_id') is-invalid @enderror" id="activity_id" name="activity_id">
                    <option value="">Aucune activité</option>
                    @foreach($activities as $activity)
                    <option value="{{ $activity->id }}" {{ old('activity_id', $gallery->activity_id) == $activity->id ? 'selected' : '' }}>{{ $activity->title }}</option>
                    @endforeach
                </select>
                @error('activity_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Publier cette image</label>
            </div>
            <div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Mettre à jour</button>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
