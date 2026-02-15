<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function loginForm()
    {
        return view('frontend.pages.login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Connecté avec succès !');
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
        return redirect('/')->with('success', 'Inscrit avec succès !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Déconnecté avec succès !');
    }

    // -----------------------------
    // Formulaire de recrutement
    // -----------------------------
    public function recrutementForm()
    {
        return view('frontend.pages.recrutement');
    }

    public function recrutementSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'email' => 'required|email',
            'departement' => 'required|string|max:255',
            'commune' => 'required|string|max:255',
            'fichier' => 'required|file|mimes:pdf|max:5120',
        ]);

        $filename = null;

        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
        }

        // ✅ On récupère l'inscription créée
        $inscription = Inscription::create([
            'name' => $request->name,
            'numero' => $request->numero,
            'email' => $request->email,
            'departement' => $request->departement,
            'commune' => $request->commune,
            'fichier' => $filename,
        ]);

        // ✅ Redirection vers page de remerciement avec ID
        return redirect()->route('recrutement.merci', $inscription->id);
    }

    // -----------------------------
    // Page de remerciement
    // -----------------------------
    public function recrutementMerci($id)
    {
        $inscription = Inscription::findOrFail($id);
        return view('frontend.pages.merci', compact('inscription'));
    }
}
