@extends('layouts.app')

@section('content')
<h1>Détails du module</h1>

<div class="card">
    <div class="card-header">Informations sur le module</div>
    <div class="card-body">
        <p><strong>Code :</strong> {{ $module->code }}</p>
        <p><strong>Nom :</strong> {{ $module->nom }}</p>
        <p><strong>Coefficient :</strong> {{ $module->coefficient }}</p>
        <p><strong>Créé le :</strong> {{ $module->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Dernière mise à jour :</strong> {{ $module->updated_at->format('d/m/Y H:i') }}</p>
    </div>
</div>

<a href="{{ route('modules.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
@endsection

