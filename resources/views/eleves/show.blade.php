@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Détails de l'élève</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nom :</strong> {{ $eleve->nom }}</li>
        <li class="list-group-item"><strong>Prénom :</strong> {{ $eleve->prenom }}</li>
        <li class="list-group-item"><strong>Date de naissance :</strong> {{ $eleve->dateNaissance }}</li>
        <li class="list-group-item"><strong>Numéro étudiant :</strong> {{ $eleve->numéro_étudiant }}</li>
        <li class="list-group-item"><strong>Email :</strong> {{ $eleve->email }}</li>
    </ul>
    <a href="{{ route('eleves.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
