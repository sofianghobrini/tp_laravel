@extends('layouts.app')

@section('content')
<h1>Ajouter une évaluation pour un élève</h1>

<form action="{{ route('evaluationEleve.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="eleve_id">Élève</label>
        <select name="eleve_id" id="eleve_id" class="form-control">
@foreach($eleves as $eleve)
                <option value="{{ $eleve->id }}">{{ $eleve->nom }} {{ $eleve->prenom }}</option>
@endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="evaluation_id">Évaluation</label>
        <select name="evaluation_id" id="evaluation_id" class="form-control">
@foreach($evaluations as $evaluation)
                <option value="{{ $evaluation->id }}">{{ $evaluation->titre }}</option>
@endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="note">Note</label>
        <input type="number" step="0.01" name="note" id="note" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
</form>
@endsection
