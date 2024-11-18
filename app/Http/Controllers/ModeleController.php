<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    public function index()
    {
        // Récupérer les modules avec une pagination
        $modules = Module::paginate(10); // Corrigé "paignate" -> "paginate"
        return view('module.index', compact('modules')); // Pluriel pour la variable dans la vue
    }

    /**
     * Afficher le formulaire pour créer un nouveau module.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('module.create');
    }

    /**
     * Enregistrer un nouveau module.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'code' => 'required|string|max:255|unique:modules',
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|numeric|min:1',
        ]);

        // Créer le module
        Module::create($request->only(['code', 'nom', 'coefficient']));

        // Rediriger avec un message de succès
        return redirect()->route('modules.index')->with('success', 'Module créé avec succès.');
    }

    /**
     * Afficher les détails d'un module.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $module = Module::findOrFail($id); // Trouver le module ou générer une erreur 404
        return view('module.show', compact('module'));
    }

    /**
     * Afficher le formulaire d'édition pour un module existant.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('module.edit', compact('module'));
    }

    /**
     * Mettre à jour un module existant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Valider les données
        $request->validate([
            'code' => 'required|string|max:255|unique:modules,code,' . $id,
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|numeric|min:1',
        ]);

        // Trouver et mettre à jour le module
        $module = Module::findOrFail($id);
        $module->update($request->only(['code', 'nom', 'coefficient']));

        // Rediriger avec un message de succès
        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès.');
    }

    /**
     * Supprimer un module.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès.');
    }
}
