@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Détails de l'élève</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nom :</strong> {{ $eleve->name }}</li>
        <li class="list-group-item"><strong>Prénom :</strong> {{ $eleve->prénom }}</li>
        <li class="list-group-item"><strong>Date de naissance :</strong> {{ $eleve->date_naissance }}</li>
        <li class="list-group-item"><strong>Numéro étudiant :</strong> {{ $eleve->numéro_étudiant }}</li>
        <li class="list-group-item"><strong>Email :</strong> {{ $eleve->email }}</li>
        <li class="list-group-item"><strong>Image :</strong> {{ $eleve->image }}</li>
    </ul>
    <a href="{{ route('eleves.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
