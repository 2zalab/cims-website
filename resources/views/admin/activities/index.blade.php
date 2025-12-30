@extends('layouts.admin')
@section('title', 'Gestion des Activités')
@section('page-title', 'Gestion des Activités')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste des Activités</h5>
        <a href="{{ route('admin.activities.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nouvelle Activité</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities as $activity)
                    <tr>
                        <td>
                            @if($activity->image)
                            <img src="{{ asset('storage/' . $activity->image) }}" alt="" style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                            @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 50px; height: 50px;">
                                <i class="fas fa-image"></i>
                            </div>
                            @endif
                        </td>
                        <td>{{ $activity->title }}</td>
                        <td>{{ $activity->activity_date ? $activity->activity_date->format('d/m/Y') : '-' }}</td>
                        <td>{{ $activity->location ?? '-' }}</td>
                        <td>
                            @if($activity->is_active)
                            <span class="badge bg-success">Actif</span>
                            @else
                            <span class="badge bg-secondary">Inactif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.activities.edit', $activity) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Aucune activité trouvée</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($activities->hasPages())
        <div class="mt-3">
            {{ $activities->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
