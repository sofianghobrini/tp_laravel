@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Liste des élèves</h1>
    <a href="{{ route('eleves.create') }}" class="btn btn-success mb-3">Ajouter un élève</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Numéro étudiant</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($eleves as $eleve)
        <tr>
            <td>{{ $eleve->name }}</td>
            <td>{{ $eleve->prénom }}</td>
            <td>{{ $eleve->date_naissance }}</td>
            <td>{{ $eleve->numéro_étudiant }}</td>
            <td>{{ $eleve->email }}</td>
            <td>
                <a href="{{ route('eleves.show', $eleve->id) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('eleves.edit', $eleve->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $eleves->links() }}
</div>
@endsection
