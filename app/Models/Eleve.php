<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $table = 'eleves'; // Nom de la table
    protected $fillable = [
        'name',
        'prénom',
        'date_naissance',
        'numéro_étudiant',
        'email',
        'image',
    ];
    public function evaluationEleves()
    {
        return $this->hasMany(EvaluationEleve::class); // Remplacez par le modèle exact si différent
    }
}
