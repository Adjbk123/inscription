<?php

namespace App\Models;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = ['nom', 'departement_id'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
