@extends('layouts.app')

@section('content')
<h1>Liste des élèves</h1>
<a href="{{ route('eleves.create') }}">Ajouter un élève</a>
<table>
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
        <td>{{ $eleve->name }}</td>
        <td>{{ $eleve->prénom }}</td>
        <td>{{ $eleve->email }}</td>
        <td>
            <a href="{{ route('eleves.edit', $eleve->id) }}">Modifier</a>
            <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $eleves->links() }}
@endsection
