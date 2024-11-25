@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Modifier l'élève</h1>

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
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom', $eleve->nom) }}" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom', $eleve->prenom) }}" required>
        </div>
        <div class="mb-3">
            <label for="dateNaissance" class="form-label">Date de naissance :</label>
            <input type="date" id="dateNaissance" name="dateNaissance" class="form-control" value="{{ old('dateNaissance', $eleve->dateNaissance) }}" required>
        </div>
        <div class="mb-3">
            <label for="numéro_étudiant" class="form-label">Numéro étudiant :</label>
            <input type="text" id="numéro_étudiant" name="numéro_étudiant" class="form-control" value="{{ old('numéro_étudiant', $eleve->numéro_étudiant) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $eleve->email) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
