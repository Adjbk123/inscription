<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Parametre;
use App\Models\Specialite;
use App\Models\Departement;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    // -----------------------------
    // Page d'accueil
    // -----------------------------
    public function index()
    {
        $parametres = Parametre::first();
        $specialites = Specialite::where('statut', 'visible')->get();

        return view('frontend.index', [
            'parametres' => $parametres,
            'specialites' => $specialites
        ]);
    }

    // -----------------------------
    // Authentification
    // -----------------------------
    public function loginForm()
    {
        return view('frontend.pages.login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('success', 'Connecté avec succès !');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect']);
    }

    public function registerForm()
    {
        return view('frontend.pages.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/home')->with('success', 'Inscrit avec succès !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Déconnecté avec succès !');
    }

    // -----------------------------
    // Formulaire de recrutement / inscription
    // -----------------------------
    public function recrutementForm(Request $request)
    {
        $departements = Departement::all();
        $specialites = Specialite::where('statut', 'visible')->get();

        $selectedSpecialite = null;
        if ($request->has('specialite')) {
            $selectedSpecialite = Specialite::find($request->specialite);
        }

        return view('frontend.pages.recrutement', compact('departements', 'specialites', 'selectedSpecialite'));
    }

    public function recrutementSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'email' => 'required|email|unique:inscriptions,email',
            'departement_id' => 'required|exists:departements,id',
            'commune_id' => 'required|exists:communes,id',
            'specialite_id' => 'required|exists:specialites,id',
            'fichier' => 'required|file|max:30720', // 30 Mo
        ]);

        // Détection manuelle permissive pour débugger
        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $extension = strtolower($file->getClientOriginalExtension());
            $mimeType = $file->getMimeType();

            // On accepte TOUT ce qui finit par .pdf pour ce test de déblocage
            if ($extension !== 'pdf' && !str_contains($mimeType, 'pdf')) {
                return back()->withErrors(['fichier' => "Format non reconnu : extension=$extension, mime=$mimeType. Veuillez fournir un vrai PDF."])->withInput();
            }
        }

        $filename = null;
        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
        }

        // Créer l'inscription avec token généré automatiquement
        $inscription = Inscription::create([
            'name' => $request->name,
            'numero' => $request->numero,
            'email' => $request->email,
            'departement_id' => $request->departement_id,
            'commune_id' => $request->commune_id,
            'specialite_id' => $request->specialite_id,
            'fichier' => $filename,
            'token' => Str::random(64),
        ]);

        return redirect()->route('recrutement.merci', $inscription->id);
    }

    public function recrutementMerci($id)
    {
        $inscription = Inscription::findOrFail($id);
        $parametres = Parametre::first();
        return view('frontend.pages.merci', compact('inscription', 'parametres'));
    }

    // -----------------------------
    // Formulaire de disponibilité (sans login)
    // -----------------------------
    public function disponibiliteForm($token)
    {
        $inscription = Inscription::where('token', $token)->firstOrFail();
        return view('frontend.disponibilite', compact('inscription'));
    }

    public function disponibiliteUpdate(Request $request, $token)
    {
        $inscription = Inscription::where('token', $token)->firstOrFail();

        $request->validate([
            'disponible' => 'required|boolean'
        ]);

        $inscription->disponible = $request->disponible;
        $inscription->save();

        return back()->with('success', 'Votre disponibilité a été enregistrée.');
    }
}
