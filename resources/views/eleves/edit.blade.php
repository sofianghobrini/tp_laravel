@extends('layouts.app')

@section('content')
<h1>Modifier les informations de l'élève</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('eleves.update', $eleve->id) }}" method="POST">
    @csrf
    @method('PUT') {{-- Méthode HTTP PUT pour la mise à jour --}}
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom', $eleve->nom) }}" required>
    </div>
    <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom', $eleve->prenom) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
