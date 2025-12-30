@extends('layouts.admin')
@section('title', 'Détails du Message')
@section('page-title', 'Détails du Message')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <strong>De:</strong> {{ $contact->name }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
        </div>
        @if($contact->subject)
        <div class="mb-3">
            <strong>Sujet:</strong> {{ $contact->subject }}
        </div>
        @endif
        <div class="mb-3">
            <strong>Date:</strong> {{ $contact->created_at->format('d F Y à H:i') }}
        </div>
        <hr>
        <div class="mb-4">
            <strong>Message:</strong>
            <p class="mt-2 p-3 bg-light rounded">{{ $contact->message }}</p>
        </div>
        <div>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
