<?php


namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index(){
        $evaluations = Evaluation::all();
        return view('evaluation.index', compact('evaluations'));
    }
    // Afficher toutes les notes d'une évaluation
    public function showNotes($id)
    {
        // Trouver l'évaluation par son ID
        $evaluation = Evaluation::find($id);

        if (!$evaluation) {
            return redirect()->back()->with('error', 'Évaluation non trouvée');
        }

        // Obtenir toutes les notes des élèves pour cette évaluation
        $notes = $evaluation->evaluationEleves;

        // Retourner la vue avec les notes
        return view('evaluations.notes', compact('notes'));
    }

    // Lister les élèves qui n'ont pas eu la moyenne dans une évaluation
    public function elevesSansMoyenne($id)
    {
        // Trouver l'évaluation par son ID
        $evaluation = Evaluation::find($id);

        if (!$evaluation) {
            return redirect()->back()->with('error', 'Évaluation non trouvée');
        }

        // Obtenir les élèves qui n'ont pas eu la moyenne (note < 10)
        $elevesSansMoyenne = $evaluation->evaluationEleves->where('note', '<', 10);

        // Retourner la vue avec la liste des élèves sans moyenne
        return view('evaluations.eleves-sans-moyenne', compact('elevesSansMoyenne'));
    }
}
