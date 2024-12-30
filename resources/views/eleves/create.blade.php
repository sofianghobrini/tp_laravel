@extends('layouts.app')

@section('content')
    <div class="container mt-8 px-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Ajouter un nouvel élève</h1>

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('eleves.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom :</label>
                    <input type="text" id="name" name="name" class="form-input mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
                </div>
                <div class="mb-4">
                    <label for="prénom" class="block text-sm font-medium text-gray-700">Prénom :</label>
                    <input type="text" id="prénom" name="prénom" class="form-input mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('prénom') }}" required>
                </div>
                <div class="mb-4">
                    <label for="date_naissance" class="block text-sm font-medium text-gray-700">Date de naissance :</label>
                    <input type="date" id="date_naissance" name="date_naissance" class="form-input mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('date_naissance') }}" required>
                </div>
                <div class="mb-4">
                    <label for="numéro_étudiant" class="block text-sm font-medium text-gray-700">Numéro étudiant :</label>
                    <input type="text" id="numéro_étudiant" name="numéro_étudiant" class="form-input mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('numéro_étudiant') }}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                    <input type="email" id="email" name="email" class="form-input mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image :</label>
                    <input type="file" name="image" id="image" class="form-input mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 shadow-sm">
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Ajouter
                </button>
            </form>
        </div>
    </div>
@endsection
