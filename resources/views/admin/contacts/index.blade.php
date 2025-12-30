@extends('layouts.admin')
@section('title', 'Messages de Contact')
@section('page-title', 'Messages de Contact')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Liste des Messages</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Statut</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Sujet</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr class="{{ !$contact->is_read ? 'table-primary' : '' }}">
                        <td>
                            @if($contact->is_read)
                            <i class="fas fa-envelope-open text-muted"></i>
                            @else
                            <i class="fas fa-envelope text-primary"></i>
                            @endif
                        </td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject ?? '-' }}</td>
                        <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Aucun message trouvé</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($contacts->hasPages())
        <div class="mt-3">
            {{ $contacts->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
