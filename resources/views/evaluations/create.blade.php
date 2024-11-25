@extends('layouts.app')

@section('content')
<h1>Ajouter une évaluation</h1>

<form action="{{ route('evaluations.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="titre">Titre de l'évaluation</label>
        <input type="text" name="titre" id="titre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="coefficient">Coefficient</label>
        <input type="number" step="0.01" name="coefficient" id="coefficient" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
</form>
@endsection

