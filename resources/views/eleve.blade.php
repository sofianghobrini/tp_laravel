<!-- resources/views/eleves/index.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Liste des élèves</h1>

<!-- Vérifie s'il y a un message de succès -->
@if(session('success'))
<div>
    {{ session('success') }}
</div>
@endif

<!-- Affiche la liste des élèves -->
<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Email</th>
        <th>Numéro étudiant</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($eleves as $eleve)
    <tr>
        <td>{{ $eleve->nom }}</td>
        <td>{{ $eleve->prenom }}</td>
        <td>{{ $eleve->date_naissance }}</td>
        <td>{{ $eleve->email }}</td>
        <td>{{ $eleve->numero_etudiant }}</td>
        <td>
            <a href="{{ route('eleves.show', $eleve->id) }}">Voir</a>
            <a href="{{ route('eleves.edit', $eleve->id) }}">Modifier</a>
            <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
