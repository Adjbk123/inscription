<?php

namespace App\Models;

use App\Models\Commune;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['nom'];

    public function communes()
    {
        return $this->hasMany(Commune::class);
    }
}
