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
            <label for="name" class="form-label">Nom :</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $eleve->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="prénom" class="form-label">Prénom :</label>
            <input type="text" id="prénom" name="prénom" class="form-control" value="{{ old('prénom', $eleve->prénom) }}" required>
        </div>
        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ old('date_naissance', $eleve->date_naissance) }}" required>
        </div>
        <div class="mb-3">
            <label for="numéro_étudiant" class="form-label">Numéro étudiant :</label>
            <input type="text" id="numéro_étudiant" name="numéro_étudiant" class="form-control" value="{{ old('numéro_étudiant', $eleve->numéro_étudiant) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $eleve->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="image">Image :</label>
            <input type="file" name="image" id="image">
        </div>
        <label for="image">Image :</label>
        <input type="file" name="image" id="image">
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
