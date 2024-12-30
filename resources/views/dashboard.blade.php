<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    @if (Auth::user()->role === 'professeur')
                        <p>Bienvenue, Professeur !</p>
                        <!-- Liens ou informations spécifiques aux professeurs -->
                        <ul>
                            <li><a href="{{ route('evaluations.index') }}" class="text-blue-500">Voir les évaluations</a></li>
                            <li><a href="{{ route('modules.index') }}" class="text-blue-500">Gérer les modules</a></li>
                            <li><a href="{{ route('eleves.index') }}" class="text-blue-500">Gérer les élèves</a></li>
                            <li><a href="{{ route('evaluation-eleve.index') }}" class="text-blue-500">Consulter les évaluations des élèves</a></li>
                        </ul>
                    @elseif (Auth::user()->role === 'eleve')
                        <p>Bienvenue, Élève !</p>
                        <!-- Liens ou informations spécifiques aux élèves -->
                        <ul>
                            <li><a href="{{ route('modules.index') }}" class="text-blue-500">Voir les modules</a></li>
                            <li><a href="{{ route('evaluation-eleve.index') }}" class="text-blue-500">Consulter mes évaluations</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
