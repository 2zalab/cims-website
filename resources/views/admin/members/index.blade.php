@extends('layouts.admin')

@section('title', 'Gestion des Membres - Administration')
@section('page-title', 'Gestion des Membres')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Liste des Membres</h4>
    <a href="{{ route('admin.members.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Ajouter un Membre
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Nom Complet</th>
                        <th>Email</th>
                        <th>Spécialité</th>
                        <th>Arrondissement</th>
                        <th>Statut</th>
                        <th>Ordre</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                    <tr>
                        <td>
                            @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}"
                                 alt="{{ $member->full_name }}"
                                 class="rounded-circle"
                                 style="width: 45px; height: 45px; object-fit: cover;">
                            @else
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                 style="width: 45px; height: 45px;">
                                {{ strtoupper(substr($member->first_name, 0, 1) . substr($member->last_name, 0, 1)) }}
                            </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $member->full_name }}</strong>
                        </td>
                        <td>{{ $member->email }}</td>
                        <td>
                            <span class="badge bg-info">{{ $member->speciality }}</span>
                        </td>
                        <td>{{ $member->arrondissement ?? '-' }}</td>
                        <td>
                            @if($member->is_active)
                            <span class="badge bg-success">Actif</span>
                            @else
                            <span class="badge bg-secondary">Inactif</span>
                            @endif
                        </td>
                        <td>{{ $member->order }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.members.show', $member) }}"
                                   class="btn btn-sm btn-info" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.members.edit', $member) }}"
                                   class="btn btn-sm btn-warning" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.members.destroy', $member) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="fas fa-users fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted">Aucun membre enregistré.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($members->hasPages())
        <div class="mt-4">
            {{ $members->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
