<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inscription;
use App\Models\Specialite;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stats = [
            'total_inscriptions' => Inscription::count(),
            'pending_inscriptions' => Inscription::where('statut', 'en_attente')->count(),
            'accepted_inscriptions' => Inscription::where('statut', 'accepte')->count(),
            'total_specialites' => Specialite::count(),
            'total_users' => User::count(),
            'recent_inscriptions' => Inscription::with('specialite')->latest()->take(5)->get(),
        ];

        return view('home', compact('stats'));
    }
}
