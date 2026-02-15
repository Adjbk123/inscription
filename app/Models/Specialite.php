<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;

    // Nom de la table (optionnel si le nom est 'specialites')
    protected $table = 'specialites';

    // Champs qui peuvent être remplis en masse
    protected $fillable = [
    'nom',
    'description_piece',
    'experience',
    'statut'
];


    /**
     * Vérifie si la spécialité est visible pour le frontend
     */
    public function estVisible(): bool
    {
        return $this->statut === 'visible';
    }

    /**
     * Retourne la description des pièces sous forme de tableau
     */
    public function getPiecesArray(): array
    {
        // Séparer par virgule et nettoyer les espaces
        return array_map('trim', explode(',', $this->description_piece));
    }
}
