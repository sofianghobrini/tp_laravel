@extends('layouts.app')

@section('content')
<h1>Détails de l'évaluation</h1>

<div class="card">
    <div class="card-header">Informations sur l'évaluation</div>
    <div class="card-body">
        <p><strong>Titre :</strong> {{ $evaluation->titre }}</p>
        <p><strong>Date :</strong> {{ $evaluation->date }}</p>
        <p><strong>Coefficient :</strong> {{ $evaluation->coefficient }}</p>
        <p><strong>Créée le :</strong> {{ $evaluation->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Dernière mise à jour :</strong> {{ $evaluation->updated_at->format('d/m/Y H:i') }}</p>
    </div>
</div>

<a href="{{ route('evaluations.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
@endsection

