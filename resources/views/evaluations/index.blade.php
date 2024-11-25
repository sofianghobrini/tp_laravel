@extends('layouts.app')

@section('content')
<h1>Liste des évaluations</h1>
<a href="{{ route('evaluations.create') }}">Ajouter une évaluation</a>
<table>
    <thead>
    <tr>
        <th>Titre</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($evaluations as $evaluation)
    <tr>
        <td>{{ $evaluation->titre }}</td>
        <td>{{ $evaluation->date }}</td>
        <td>
            <a href="{{ route('evaluations.edit', $evaluation->id) }}">Modifier</a>
            <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $evaluations->links() }}
@endsection
