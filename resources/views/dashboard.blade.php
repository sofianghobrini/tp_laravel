<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-8 text-gray-900 dark:text-gray-100">
                <h2 class="text-3xl font-semibold mb-6">{{ __("You're logged in!") }}</h2>

                @if (Auth::check())
                    @if (Auth::user()->role === 'professeur')
                        <div class="bg-blue-50 p-6 rounded-lg shadow-md">
                            <p class="text-xl font-medium mb-4">Bienvenue, Professeur !</p>
                            <ul class="space-y-4">
                                <li>
                                    <a href="{{ route('evaluations.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-300">Voir les évaluations</a>
                                </li>
                                <li>
                                    <a href="{{ route('modules.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-300">Gérer les modules</a>
                                </li>
                                <li>
                                    <a href="{{ route('eleves.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-300">Gérer les élèves</a>
                                </li>
                                <li>
                                    <a href="{{ route('evaluation-eleve.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-300">Consulter les évaluations des élèves</a>
                                </li>
                            </ul>
                        </div>
                    @elseif (Auth::user()->role === 'eleve')
                        <div class="bg-green-50 p-6 rounded-lg shadow-md">
                            <p class="text-xl font-medium mb-4">Bienvenue, Élève !</p>
                            <ul class="space-y-4">
                                <li>
                                    <a href="{{ route('modules.index') }}" class="text-green-600 hover:text-green-800 font-semibold transition duration-300">Voir les modules</a>
                                </li>
                                <li>
                                    <a href="{{ route('evaluation-eleve.index') }}" class="text-green-600 hover:text-green-800 font-semibold transition duration-300">Consulter mes évaluations</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <p class="text-red-500 font-medium">Votre rôle n'est pas défini ou il y a un problème avec votre rôle.</p>
                    @endif
                @else
                    <p class="text-yellow-500 font-medium">Vous devez être connecté pour voir cette page.</p>
                @endif
            </div>
        </div>
    </div>
</div>
