@extends('layouts.app')

@section('content')
<h1>Détails de l'élève</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Nom : {{ $eleve->nom }}</h5>
        <p class="card-text">Prénom : {{ $eleve->prenom }}</p>
        <p class="card-text">Date de naissance : {{ $eleve->dateNaissance }}</p>
        <p class="card-text">Numéro étudiant : {{ $eleve->numéro_étudiant }}</p>
        <a href="{{ route('eleves.index') }}" class="btn btn-primary">Retour</a>
    </div>
</div>
@endsection
