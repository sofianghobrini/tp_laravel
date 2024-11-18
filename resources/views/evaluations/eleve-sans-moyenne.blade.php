@extends('layouts.app')

@section('content')
<h1>Élèves n'ayant pas eu la moyenne</h1>
<ul>
    @foreach($elevesSansMoyenne as $eleve)
    <li>Élève: {{ $eleve->eleve->nom }} - Note: {{ $eleve->note }}</li>
    @endforeach
</ul>
@endsection
