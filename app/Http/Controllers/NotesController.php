<?php

namespace App\Http\Controllers;

use App\Models\EvaluationEleve;
use App\Models\Eleve;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    // Affiche toutes les notes d'une évaluation
    public function showEvaluation($id)
    {
        $notes = EvaluationEleve::where('evaluation_id', $id)->get();
        return view('notes.evaluation', compact('notes'));
    }

    // Affiche toutes les notes d'un élève et calcule la moyenne
    public function showEleve($id)
    {
        $eleve = Eleve::find($id);
        $notes = EvaluationEleve::where('eleve_id', $id)->get();
        $moyenne = $notes->avg('note');

        return view('notes.eleve', compact('eleve', 'notes', 'moyenne'));
    }

    // Affiche tous les élèves n'ayant pas eu la moyenne à un contrôle
    public function showInsuffisants($id)
    {
        $notes = EvaluationEleve::where('evaluation_id', $id)
            ->where('note', '<', 10)
            ->get();

        return view('notes.insuffisants', compact('notes'));
    }
}
