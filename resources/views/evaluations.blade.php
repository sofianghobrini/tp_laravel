
@extends('layouts.app')

@section('content')
<h1>Notes de l'évaluation</h1>
    <ul>
        @foreach($notes as $note)
            <li>Élève: {{ $note->eleve->nom }} - Note: {{ $note->note }}</li>
        @endforeach
    </ul>
@endsection
