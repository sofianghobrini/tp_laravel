<?php

namespace App\Http\Controllers;

use App\Models\EvaluationEleve;
use App\Models\Evaluation;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvaluationEleveController extends Controller
{
    public function index()
    {
        $evaluationEleves = EvaluationEleve::with(['evaluation', 'eleve'])->paginate(10);
        return view('evaluationEleve.index', compact('evaluationEleves'));
    }

    public function create()
    {
        $evaluations = Evaluation::all();
        $eleves = Eleve::all();
        return view('evaluationEleve.create', compact('evaluations', 'eleves'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'evaluation_id' => 'required|exists:evaluations,id',
            'eleve_id' => 'required|exists:eleves,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        EvaluationEleve::create($request->all());

        return redirect()->route('evaluationEleve.index')->with('success', 'Note ajoutée avec succès!');
    }

    public function edit($id)
    {
        $evaluationEleve = EvaluationEleve::findOrFail($id);
        $evaluations = Evaluation::all();
        $eleves = Eleve::all();
        return view('evaluationEleve.edit', compact('evaluationEleve', 'evaluations', 'eleves'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'evaluation_id' => 'required|exists:evaluations,id',
            'eleve_id' => 'required|exists:eleves,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $evaluationEleve = EvaluationEleve::findOrFail($id);
        $evaluationEleve->update($request->all());

        return redirect()->route('evaluationEleve.index')->with('success', 'Note mise à jour avec succès!');
    }

    public function destroy($id)
    {
        $evaluationEleve = EvaluationEleve::findOrFail($id);
        $evaluationEleve->delete();

        return redirect()->route('evaluationEleve.index')->with('success', 'Note supprimée avec succès!');
    }

    public function show($id)
    {
        // Récupérer la note spécifiée
        $evaluationEleve = EvaluationEleve::findOrFail($id);

        // Récupérer les données associées (évaluation et élève)
        $evaluation = $evaluationEleve->evaluation; // Relation définie dans le modèle
        $eleve = $evaluationEleve->eleve; // Relation définie dans le modèle

        // Passer les données à la vue
        return view('evaluationEleve.show', compact('evaluationEleve', 'evaluation', 'eleve'));
    }
}
