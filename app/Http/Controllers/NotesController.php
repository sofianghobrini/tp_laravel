<?php

namespace App\Http\Controllers;

use App\Models\EvaluationEleve;
use App\Models\Eleve;
use Illuminate\Http\Request;


class NotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:is-prof');
        $this->middleware('can:is-eleve')->only(['showInsuffisants', 'showEvaluation', 'showEleve']);
    }
    // Affiche toutes les notes d'une évaluation
    public function showEvaluation($id)
    {
        $notes = EvaluationEleve::where('evaluation_id', $id)->get();
        return view('notes.evaluation', compact('notes'));
    }

    // Affiche toutes les notes d'un élève et calcule la moyenne
    public function showEleve($id)
    {
        dd(auth()->user());
        // Récupère l'élève avec l'ID passé en paramètre
        $eleve = Eleve::findOrFail($id);

        // Récupère les notes de l'élève pour cette évaluation
        $notes = EvaluationEleve::where('eleve_id', $id)->get();

        // Calcule la moyenne des notes
        $moyenne = $notes->avg('note');

        // Retourne la vue avec l'élève, ses notes et sa moyenne
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
    public function index()
    {
        // Récupère toutes les notes d'un élève ou d'une évaluation
        $notes = EvaluationEleve::all();

        // Calcule la moyenne des notes
        $moyenne = $notes->avg('note');

        // Retourne la vue avec les notes et la moyenne
        return view('notes.index', compact('notes', 'moyenne'));
    }

}
