<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $totalInscriptions = Inscription::count();
    $enAttente = Inscription::where('statut', 'en_attente')->count();
    $acceptees = Inscription::where('statut', 'accepte')->count();
    $refusees = Inscription::where('statut', 'refuse')->count();

    return view('dashboard', compact(
        'totalInscriptions',
        'enAttente',
        'acceptees',
        'refusees'
    ));
}
}