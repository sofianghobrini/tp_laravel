@extends('layouts.app')

@section('content')
<h1>Ajouter un module</h1>

<form action="{{ route('modules.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="code">Code du module</label>
        <input type="text" name="code" id="code" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nom">Nom du module</label>
        <input type="text" name="nom" id="nom" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="coefficient">Coefficient</label>
        <input type="number" step="0.01" name="coefficient" id="coefficient" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
</form>
@endsection

