<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::with('module')->paginate(10);
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        $modules = Module::all(); // Récupère tous les modules pour le formulaire
        return view('evaluations.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'module_id' => 'required|exists:modules,id',
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
            'coefficient' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Evaluation::create($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Évaluation ajoutée avec succès!');
    }

    public function show($id)
    {
        $evaluation = Evaluation::with('module')->findOrFail($id);
        return view('evaluations.show', compact('evaluation'));
    }

    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $modules = Module::all();
        return view('evaluations.edit', compact('evaluation', 'modules'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'module_id' => 'required|exists:modules,id',
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
            'coefficient' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $evaluation = Evaluation::findOrFail($id);
        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Évaluation mise à jour avec succès!');
    }

    public function destroy($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluations.index')->with('success', 'Évaluation supprimée avec succès!');
    }
}
