@extends('layouts.app')

@section('content')
    <h1>Notes de l'élève</h1>

    @if($notes->isEmpty())
        <p>Aucune note disponible.</p>
    @else
        <ul>
            @foreach($notes as $note)
                <li>Évaluation: {{ $note->evaluation->titre }} - Note: {{ $note->note }}</li>
            @endforeach
        </ul>
        <p>Moyenne: {{ $moyenne }}</p>
    @endif
@endsection
