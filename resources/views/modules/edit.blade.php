@extends('layouts.app')

@section('content')
<h1>Modifier un module</h1>

<form action="{{ route('modules.update', $module->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="code">Code du module</label>
        <input type="text" name="code" id="code" class="form-control" value="{{ $module->code }}" required>
    </div>
    <div class="form-group">
        <label for="nom">Nom du module</label>
        <input type="text" name="nom" id="nom" class="form-control" value="{{ $module->nom }}" required>
    </div>
    <div class="form-group">
        <label for="coefficient">Coefficient</label>
        <input type="number" step="0.01" name="coefficient" id="coefficient" class="form-control" value="{{ $module->coefficient }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
</form>
@endsection

