<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::paginate(10);
        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|unique:modules',
            'nom' => 'required|string',
            'coefficient' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Ajoutez les messages d'erreur
                ->withInput(); // Renvoyez les anciennes entrées
        }

        Module::create([
            'code' => $request->code,
            'nom' => $request->nom,
            'coefficient' => $request->coefficient
        ]);

        return redirect()->route('modules.create')->with('success', 'Module ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('modules.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $module = Module::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|unique:modules,code,'. $module->id,
            'nom' => 'required|string',
            'coefficient' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Ajoutez les messages d'erreur
                ->withInput(); // Renvoyez les anciennes entrées
        }
        $module->update($request->all());

        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('modules.index')->with('success', 'Élève supprimé avec succès!');
    }
}
