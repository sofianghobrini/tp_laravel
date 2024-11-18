@extends('layouts.app')

@section('content')
<h1>Notes de l'élève</h1>
    <ul>
        @foreach($notes as $note)
            <li>Évaluation: {{ $note->evaluation->titre }} - Note: {{ $note->note }}</li>
        @endforeach
    </ul>
    <p>Moyenne: {{ $moyenne }}</p>
@endsection
