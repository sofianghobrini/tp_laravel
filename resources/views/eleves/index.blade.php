@extends('layouts.app')

@section('title', 'Liste des élèves') {{-- Ajout d'un titre spécifique à la page --}}

@section('content')
<div class="container">
    <h1>Liste des élèves</h1>

    <a href="{{ route('eleves.create') }}" class="btn btn-primary">Ajouter un élève</a> {{-- Lien pour ajouter un élève --}}

    <table class="table table-bordered table-striped mt-4"> {{-- Classes pour un style Bootstrap ou équivalent --}}
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($eleves as $eleve)
        <tr>
            <td>{{ $eleve->nom }}</td> {{-- Correction : "nom" au lieu de "name" --}}
            <td>{{ $eleve->prenom }}</td> {{-- Correction : "prenom" au lieu de "prénom" --}}
            <td>{{ $eleve->email }}</td>
            <td>
                {{-- Lien pour modifier --}}
                <a href="{{ route('eleves.edit', $eleve->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                {{-- Formulaire pour supprimer --}}
                <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $eleves->links() }}
    </div>
</div>
@endsection
