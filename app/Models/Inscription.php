<?php

namespace App\Models;

use App\Models\Commune;
use App\Models\Departement;
use App\Models\Specialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'numero',
        'email',
        'departement_id',
        'commune_id',
        'specialite_id', // <-- ajouté
        'fichier',
        'token',         // <-- ajouté pour accès sans login
        'disponible',    // <-- ajouté pour disponibilité
        'statut',        // <-- ajouté pour statut ('en_attente', 'accepte', 'refuse')
    ];

    // Relation avec le département
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    // Relation avec la commune
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    // Relation avec la spécialité
    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }
}
