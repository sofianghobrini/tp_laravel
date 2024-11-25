@extends('layouts.app')

@section('content')
<h1>Modifier l'élève</h1>

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
    @method('PUT')
    <div class="form-group mb-3">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom', $eleve->nom) }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom', $eleve->prenom) }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="dateNaissance">Date de naissance :</label>
        <input type="date" id="dateNaissance" name="dateNaissance" class="form-control" value="{{ old('dateNaissance', $eleve->dateNaissance) }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="numéro_étudiant">Numéro étudiant :</label>
        <input type="text" id="numéro_étudiant" name="numéro_étudiant" class="form-control" value="{{ old('numéro_étudiant', $eleve->numéro_étudiant) }}" required>
    </div>
    <button type="submit" class="btn btn-success">Modifier</button>
</form>
@endsection
