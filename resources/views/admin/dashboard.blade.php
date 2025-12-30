@extends('layouts.admin')

@section('title', 'Dashboard - Administration CIMS')
@section('page-title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-calendar"></i> Activités</h5>
                <h2>{{ $stats['activities'] }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-newspaper"></i> Actualités</h5>
                <h2>{{ $stats['news'] }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-images"></i> Photos</h5>
                <h2>{{ $stats['galleries'] }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-envelope"></i> Messages non lus</h5>
                <h2>{{ $stats['contacts'] }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-calendar"></i> Dernières Activités</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentActivities as $activity)
                            <tr>
                                <td>{{ Str::limit($activity->title, 30) }}</td>
                                <td>{{ $activity->activity_date ? $activity->activity_date->format('d/m/Y') : '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted">Aucune activité</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.activities.index') }}" class="btn btn-sm btn-primary">Voir tout</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-envelope"></i> Messages Récents</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentContacts as $contact)
                            <tr class="{{ !$contact->is_read ? 'fw-bold' : '' }}">
                                <td>{{ Str::limit($contact->name, 20) }}</td>
                                <td>{{ Str::limit($contact->email, 25) }}</td>
                                <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Aucun message</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-primary">Voir tout</a>
            </div>
        </div>
    </div>
</div>
@endsection
