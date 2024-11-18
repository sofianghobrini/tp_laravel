<?php


namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    // Afficher toutes les notes d'un élève et calculer sa moyenne
    public function showNotes($id)
    {
        // Trouver l'élève par son ID
        $eleve = Eleve::find($id);

        if (!$eleve) {
            return redirect()->back()->with('error', 'Élève non trouvé');
        }

        // Obtenir toutes les notes de cet élève
        $notes = $eleve->evaluationEleves;

        // Calculer la moyenne des notes
        $moyenne = $notes->isNotEmpty() ? $notes->avg('note') : 0;


        // Retourner la vue avec les notes et la moyenne
        return view('eleve.notes', compact('notes', 'moyenne'));
    }
}
