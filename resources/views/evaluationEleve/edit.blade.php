@extends('layouts.app')

@section('content')
<h1>Modifier une évaluation d'élève</h1>

<form action="{{ route('evaluationEleve.update', $evaluationEleve->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="eleve_id">Élève</label>
        <select name="eleve_id" id="eleve_id" class="form-control">
            @foreach($eleves as $eleve)
            <option value="{{ $eleve->id }}" {{ $eleve->id == $evaluationEleve->eleve_id ? 'selected' : '' }}>
                {{ $eleve->nom }} {{ $eleve->prenom }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="evaluation_id">Évaluation</label>
        <select name="evaluation_id" id="evaluation_id" class="form-control">
            @foreach($evaluations as $evaluation)
            <option value="{{ $evaluation->id }}" {{ $evaluation->id == $evaluationEleve->evaluation_id ? 'selected' : '' }}>
                {{ $evaluation->titre }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="note">Note</label>
        <input type="number" step="0.01" name="note" id="note" class="form-control" value="{{ $evaluationEleve->note }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
</form>
@endsection

