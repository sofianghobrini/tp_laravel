@extends('layouts.app')

@section('content')
<h1>Notes de {{ $eleve->name }} {{ $eleve->prénom }}</h1>
<table>
    <thead>
    <tr>
        <th>Évaluation</th>
        <th>Note</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($notes as $note)
    <tr>
        <td>{{ $note->evaluation->titre }}</td>
        <td>{{ $note->note }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<p>Moyenne : {{ $moyenne }}</p>
@endsection
