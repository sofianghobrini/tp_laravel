@extends('layouts.app')

@section('content')
<h1>Détails de l'élève</h1>

<div class="card">
    <div class="card-header">
        Informations sur l'élève
    </div>
    <div class="card-body">
        <p><strong>Nom :</strong> {{ $eleve->nom }}</p>
        <p><strong>Prénom :</strong> {{ $eleve->prenom }}</p>
        <p><strong>ID :</strong> {{ $eleve->id }}</p>
        <p><strong>Créé le :</strong> {{ $eleve->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Mis à jour le :</strong> {{ $eleve->updated_at->format('d/m/Y H:i') }}</p>
    </div>
</div>

<a href="{{ route('eleves.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
<a href="{{ route('eleves.edit', $eleve->id) }}" class="btn btn-primary mt-3">Modifier</a>
<form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')">Supprimer</button>
</form>
@endsection
