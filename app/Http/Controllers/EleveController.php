<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;use Illuminate\Support\Facades\Storage;

class EleveController extends Controller
{

    public function __construct()
    {
        // Applique le middleware can:is-prof pour sécuriser les routes du contrôleur
        $this->middleware('can:is-prof');
        $this->middleware('can:is-eleve')->only(['show']);
    }
    public function index()
    {
        $eleves = Eleve::paginate(10);
        return view('eleves.index', compact('eleves'));
    }

    public function destroy($id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->delete();

        return redirect()->route('eleves.index')->with('success', 'Élève supprimé avec succès!');
    }

    public function edit($id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('eleves.edit', compact('eleve'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'prénom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numéro_étudiant' => 'required|string|max:255',
            'email' => 'required|email|unique:eleves,email,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $eleve = Eleve::findOrFail($id);
        $eleve->update($request->only(['name', 'prénom', 'date_naissance', 'numéro_étudiant', 'email']));

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($eleve->image) {
                Storage::delete('public/' . $eleve->image);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $eleve->image = $imagePath;
            $eleve->save();
        }

        $eleve = Eleve::findOrFail($id);
        $eleve->update([
            'name' => $request->name,
            'prénom' => $request->prénom,
            'date_naissance' => $request->date_naissance,
            'numéro_étudiant' => $request->numéro_étudiant,
            'email' => $request->email,
        ]);

        if ($request->hasFile('image')) {
            if ($eleve->image) {
                Storage::delete('public/' . $eleve->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');

            $eleve->image = $imagePath;
            $eleve->save();
        }

        return redirect()->route('eleves.index')->with('success', 'Élève mis à jour avec succès!');
    }


    public function show($id)
    {
        // Find the student by ID or fail if not found
        $eleve = Eleve::findOrFail($id);

        // Return the view with the student's data
        return view('eleves.show', compact('eleve'));
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        return view('eleves.create');
    }

    // Enregistrer un nouvel élève dans la base de données
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'prénom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numéro_étudiant' => 'required|string|unique:eleves,numéro_étudiant',
            'email' => 'required|email|unique:eleves,email|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Ajoutez les messages d'erreur
                ->withInput(); // Renvoyez les anciennes entrées
        }

        // Enregistrer l'élève
        $imagePath = $request->file('image')->store('images', 'public');;
        Eleve::create([
            'name' => $request->name,
            'prénom' => $request->prénom,
            'date_naissance' => $request->date_naissance,
            'numéro_étudiant' => $request->numéro_étudiant,
            'email' => $request->email,
            'image' => $imagePath
        ]);

        return redirect()->route('eleves.create')->with('success', 'Élève ajouté avec succès!');
    }
}
