<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $table = 'eleves'; // Nom de la table
    protected $fillable = ['nom', 'prenom']; // Colonnes modifiables
    public function evaluationEleves()
    {
        return $this->hasMany(EvaluationEleve::class); // Remplacez par le modèle exact si différent
    }
}
