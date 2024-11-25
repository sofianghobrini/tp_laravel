@extends('layouts.app')

@section('content')
<h1>Liste des élèves</h1>

<a href="{{ route('eleves.create') }}" class="btn btn-primary mb-3">Ajouter un nouvel élève</a>

<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Numéro étudiant</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($eleves as $eleve)
    <tr>
        <td>{{ $eleve->id }}</td>
        <td>{{ $eleve->nom }}</td>
        <td>{{ $eleve->prenom }}</td>
        <td>{{ $eleve->dateNaissance }}</td>
        <td>{{ $eleve->numéro_étudiant }}</td>
        <td>
            <a href="{{ route('eleves.show', $eleve->id) }}" class="btn btn-info btn-sm">Voir</a>
            <a href="{{ route('eleves.edit', $eleve->id) }}" class="btn btn-warning btn-sm">Modifier</a>
            <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

{{ $eleves->links() }}
@endsection
