<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:eleve,professeur'],  // Validation du rôle
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,  // Utilisation du rôle choisi
        ]);

        event(new Registered($user));

        Auth::login($user);
        if (Auth::check()) {
            // Si l'utilisateur est connecté, rediriger vers le dashboard en fonction du rôle
            if ($user->role == 'eleve') {
                return redirect()->route('dashboard');  // Dashboard de l'élève
            } elseif ($user->role == 'professeur') {
                return redirect()->route('dashboard');  // Dashboard du professeur
            }
        }
        // Si l'utilisateur n'est pas connecté, rediriger vers la page de login
        return redirect()->route('login');
    }

}
