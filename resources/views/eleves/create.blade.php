@extends('layouts.app')

@section('content')
<h1>Ajouter un nouvel élève</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('eleves.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="dateNaissance">Date de naissance :</label>
        <input type="date" id="dateNaissance" name="dateNaissance" class="form-control" value="{{ old('dateNaissance') }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="numéro_étudiant">Numéro étudiant :</label>
        <input type="text" id="numéro_étudiant" name="numéro_étudiant" class="form-control" value="{{ old('numéro_étudiant') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection
