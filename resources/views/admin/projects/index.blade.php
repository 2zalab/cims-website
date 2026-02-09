@extends('layouts.admin')
@section('title', 'Gestion des Projets')
@section('page-title', 'Gestion des Projets')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste des Projets</h5>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nouveau Projet</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Date début</th>
                        <th>Lieu</th>
                        <th>Actif</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>
                            @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="" style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                            @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 50px; height: 50px;">
                                <i class="fas fa-image"></i>
                            </div>
                            @endif
                        </td>
                        <td>{{ $project->title }}</td>
                        <td>
                            @if($project->status === 'planned')
                            <span class="badge bg-info">Planifié</span>
                            @elseif($project->status === 'in_progress')
                            <span class="badge bg-warning">En cours</span>
                            @else
                            <span class="badge bg-success">Terminé</span>
                            @endif
                        </td>
                        <td>{{ $project->start_date ? $project->start_date->format('d/m/Y') : '-' }}</td>
                        <td>{{ $project->location ?? '-' }}</td>
                        <td>
                            @if($project->is_active)
                            <span class="badge bg-success">Actif</span>
                            @else
                            <span class="badge bg-secondary">Inactif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Aucun projet trouvé</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($projects->hasPages())
        <div class="mt-3">
            {{ $projects->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
