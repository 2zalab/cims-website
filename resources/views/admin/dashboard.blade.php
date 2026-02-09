@extends('layouts.admin')

@section('title', 'Dashboard - Administration CIMS')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-card-primary">
            <div class="stat-content">
                <h6>Activités</h6>
                <h2>{{ $stats['activities'] }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-card-success">
            <div class="stat-content">
                <h6>Actualités</h6>
                <h2>{{ $stats['news'] }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-card-warning">
            <div class="stat-content">
                <h6>Photos</h6>
                <h2>{{ $stats['galleries'] }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-images"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-card-danger">
            <div class="stat-content">
                <h6>Messages non lus</h6>
                <h2>{{ $stats['contacts'] }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-envelope"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-card-success">
            <div class="stat-content">
                <h6>Projets</h6>
                <h2>{{ $stats['projects'] }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-project-diagram"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Content -->
<div class="row g-4">
    <!-- Recent Activities -->
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                    Dernières Activités
                </h5>
                <a href="{{ route('admin.activities.index') }}" class="btn btn-sm btn-outline-primary">
                    Voir tout
                </a>
            </div>
            <div class="card-body">
                @forelse($recentActivities as $activity)
                    <div class="d-flex align-items-center mb-3 pb-3 @if(!$loop->last) border-bottom @endif">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                                <i class="fas fa-calendar-check text-primary"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ Str::limit($activity->title, 40) }}</h6>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                {{ $activity->activity_date ? $activity->activity_date->format('d/m/Y') : 'Non planifié' }}
                            </small>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.activities.edit', $activity) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Aucune activité enregistrée</p>
                        <a href="{{ route('admin.activities.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Créer une activité
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Recent News -->
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-newspaper text-success me-2"></i>
                    Dernières Actualités
                </h5>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-success">
                    Voir tout
                </a>
            </div>
            <div class="card-body">
                @forelse($recentNews as $news)
                    <div class="d-flex align-items-center mb-3 pb-3 @if(!$loop->last) border-bottom @endif">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded-circle bg-success bg-opacity-10 p-3">
                                <i class="fas fa-newspaper text-success"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ Str::limit($news->title, 40) }}</h6>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                {{ $news->created_at->format('d/m/Y') }}
                            </small>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Aucune actualité publiée</p>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Créer une actualité
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Recent Projects -->
<div class="row g-4 mt-2">
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-project-diagram text-warning me-2"></i>
                    Derniers Projets
                </h5>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-warning">
                    Voir tout
                </a>
            </div>
            <div class="card-body">
                @forelse($recentProjects as $project)
                    <div class="d-flex align-items-center mb-3 pb-3 @if(!$loop->last) border-bottom @endif">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                                <i class="fas fa-project-diagram text-warning"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ Str::limit($project->title, 40) }}</h6>
                            <small class="text-muted">
                                @if($project->status === 'planned')<span class="badge bg-info">Planifié</span>
                                @elseif($project->status === 'in_progress')<span class="badge bg-warning">En cours</span>
                                @else<span class="badge bg-success">Terminé</span>
                                @endif
                            </small>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Aucun projet enregistré</p>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Créer un projet
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Recent Messages -->
<div class="row g-4 mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-envelope text-danger me-2"></i>
                    Messages Récents
                </h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-danger">
                    Voir tout
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px;"></th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Sujet</th>
                                <th>Date</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentContacts as $contact)
                                <tr class="{{ !$contact->is_read ? 'table-warning' : '' }}">
                                    <td class="text-center">
                                        @if(!$contact->is_read)
                                            <span class="badge bg-danger rounded-pill">
                                                <i class="fas fa-exclamation"></i>
                                            </span>
                                        @else
                                            <i class="fas fa-check-circle text-success"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $contact->name }}</strong>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $contact->email }}</small>
                                    </td>
                                    <td>
                                        {{ Str::limit($contact->subject ?? 'Sans sujet', 40) }}
                                    </td>
                                    <td>
                                        <small>{{ $contact->created_at->format('d/m/Y H:i') }}</small>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                        <p class="text-muted">Aucun message reçu</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
