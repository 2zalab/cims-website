@extends('layouts.admin')
@section('title', 'Gestion des Partenaires')
@section('page-title', 'Gestion des Partenaires')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste des Partenaires</h5>
        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nouveau Partenaire</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Nom</th>
                        <th>Site Web</th>
                        <th>Ordre</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($partners as $partner)
                    <tr>
                        <td>
                            @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="" style="width: 50px; height: 50px; object-fit: contain;" class="rounded">
                            @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 50px; height: 50px;">
                                <i class="fas fa-handshake"></i>
                            </div>
                            @endif
                        </td>
                        <td>{{ $partner->name }}</td>
                        <td>
                            @if($partner->website)
                            <a href="{{ $partner->website }}" target="_blank" class="text-primary">
                                <i class="fas fa-external-link-alt me-1"></i>{{ Str::limit($partner->website, 30) }}
                            </a>
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ $partner->order }}</td>
                        <td>
                            @if($partner->is_active)
                            <span class="badge bg-success">Actif</span>
                            @else
                            <span class="badge bg-secondary">Inactif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Aucun partenaire trouvé</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($partners->hasPages())
        <div class="mt-3">
            {{ $partners->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
