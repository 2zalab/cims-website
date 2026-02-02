@extends('layouts.admin')

@section('title', 'Ajouter un Membre - Administration')
@section('page-title', 'Ajouter un Membre')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Retour à la liste
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i>Informations du Membre</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">Prénom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                           id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Nom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                           id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="fonction" class="form-label">Fonction <span class="text-danger">*</span></label>
                <select class="form-select @error('fonction') is-invalid @enderror"
                        id="fonction" name="fonction" required>
                    @foreach(\App\Models\Member::FONCTIONS as $key => $label)
                        <option value="{{ $key }}" {{ old('fonction', 'membre') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('fonction')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                           id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="speciality" class="form-label">Spécialité / Domaine de Compétence <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('speciality') is-invalid @enderror"
                       id="speciality" name="speciality" value="{{ old('speciality') }}"
                       placeholder="Ex: Génie Civil, Informatique, Électrotechnique..." required>
                @error('speciality')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bio" class="form-label">Biographie</label>
                <textarea class="form-control @error('bio') is-invalid @enderror"
                          id="bio" name="bio" rows="4">{{ old('bio') }}</textarea>
                @error('bio')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="arrondissement" class="form-label">Arrondissement</label>
                    <select class="form-select @error('arrondissement') is-invalid @enderror"
                            id="arrondissement" name="arrondissement">
                        <option value="">-- Sélectionner --</option>
                        <option value="Mora" {{ old('arrondissement') == 'Mora' ? 'selected' : '' }}>Mora</option>
                        <option value="Tokombere" {{ old('arrondissement') == 'Tokombere' ? 'selected' : '' }}>Tokombere</option>
                        <option value="Kolofata" {{ old('arrondissement') == 'Kolofata' ? 'selected' : '' }}>Kolofata</option>
                    </select>
                    @error('arrondissement')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="village" class="form-label">Village</label>
                    <input type="text" class="form-control @error('village') is-invalid @enderror"
                           id="village" name="village" value="{{ old('village') }}">
                    @error('village')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="address" class="form-label">Adresse Complète</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                           id="address" name="address" value="{{ old('address') }}">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="linkedin" class="form-label">LinkedIn (URL)</label>
                    <input type="url" class="form-control @error('linkedin') is-invalid @enderror"
                           id="linkedin" name="linkedin" value="{{ old('linkedin') }}"
                           placeholder="https://linkedin.com/in/...">
                    @error('linkedin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="facebook" class="form-label">Facebook (URL)</label>
                    <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                           id="facebook" name="facebook" value="{{ old('facebook') }}"
                           placeholder="https://facebook.com/...">
                    @error('facebook')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                           id="photo" name="photo" accept="image/*">
                    @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format: JPG, PNG, GIF. Taille max: 2MB</small>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="order" class="form-label">Ordre d'affichage</label>
                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                           id="order" name="order" value="{{ old('order', 0) }}">
                    @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label d-block">Statut</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_active"
                               name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Actif</label>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Enregistrer
                </button>
                <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
