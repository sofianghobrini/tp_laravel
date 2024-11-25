@extends('layouts.app')

@section('content')
<h1>Modifier une évaluation</h1>

<form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="titre">Titre de l'évaluation</label>
        <input type="text" name="titre" id="titre" class="form-control" value="{{ $evaluation->titre }}" required>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ $evaluation->date }}" required>
    </div>
    <div class="form-group">
        <label for="coefficient">Coefficient</label>
        <input type="number" step="0.01" name="coefficient" id="coefficient" class="form-control" value="{{ $evaluation->coefficient }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
</form>
@endsection

