@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modules</h1>

    <!-- Affichage des messages de succès ou d'erreur -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Créer un nouveau module</a>

    <!-- Table des modules -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Coefficient</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modules as $module)
        <tr>
            <td>{{ $module->code }}</td>
            <td>{{ $module->nom }}</td>
            <td>{{ $module->coefficient }}</td>
            <td>
                <a href="{{ route('modules.show', $module->id) }}" class="btn btn-info">Détails</a>
                <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce module ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $modules->links() }}
</div>
@endsection
