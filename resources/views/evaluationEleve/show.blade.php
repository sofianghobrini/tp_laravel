@extends('layouts.app')

@section('content')
<h1>Détails de l'évaluation de l'élève</h1>

<div class="card">
    <div class="card-header">
        Informations
    </div>
    <div class="card-body">
        <p><strong>Élève :</strong> {{ $evaluationEleve->eleve->nom }} {{ $evaluationEleve->eleve->prenom }}</p>
        <p><strong>Évaluation :</strong> {{ $evaluationEleve->evaluation->titre }}</p>
        <p><strong>Note :</strong> {{ $evaluationEleve->note }}</p>
        <p><strong>Créé le :</strong> {{ $evaluationEleve->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Mis à jour le :</strong> {{ $evaluationEleve->updated_at->format('d/m/Y H:i') }}</p>
    </div>
</div>

<a href="{{ route('evaluationEleve.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
@endsection
