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
    <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection
