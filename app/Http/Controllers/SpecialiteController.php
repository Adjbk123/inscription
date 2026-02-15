<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Liste des spécialités
     */
    public function index()
    {
        $specialites = Specialite::latest()->get();
        return view('specialites.index', compact('specialites'));
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        return view('specialites.create');
    }

    /**
     * Enregistrement d'une spécialité
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50|unique:specialites,nom',
            'description_piece' => 'required|string',
            'experience' => 'required|string',
        ], [
            'nom.required' => 'Le nom de la spécialité est obligatoire.',
            'nom.unique' => 'Cette spécialité existe déjà.',
            'experience.required' => 'Le champ expérience est obligatoire.',
        ]);

        Specialite::create([
            'nom' => $request->nom,
            'description_piece' => $request->description_piece,
            'experience' => $request->experience,
            'statut' => 'visible'
        ]);

        return redirect()->route('employer.gestspecialites.specialites.index')
                         ->with('success', 'Spécialité créée avec succès.');
    }

    /**
     * Formulaire édition
     */
    public function edit(Specialite $specialite)
    {
        return view('specialites.edit', compact('specialite'));
    }

    /**
     * Mise à jour
     */
    public function update(Request $request, Specialite $specialite)
    {
        $request->validate([
            'nom' => 'required|string|max:50|unique:specialites,nom,' . $specialite->id,
            'description_piece' => 'required|string',
            'experience' => 'required|string',
        ], [
            'nom.required' => 'Le nom de la spécialité est obligatoire.',
            'nom.unique' => 'Une autre spécialité porte déjà ce nom.',
            'experience.required' => 'Le champ expérience est obligatoire.',
        ]);

        $specialite->update([
            'nom' => $request->nom,
            'description_piece' => $request->description_piece,
            'experience' => $request->experience,
        ]);

        return redirect()->route('employer.gestspecialites.specialites.index')
                         ->with('success', 'Spécialité mise à jour avec succès.');
    }

    /**
     * Suppression
     */
    public function destroy(Specialite $specialite)
    {
        $specialite->delete();

        return redirect()->route('employer.gestspecialites.specialites.index')
                         ->with('success', 'Spécialité supprimée avec succès.');
    }

    /**
     * Activer / Désactiver via AJAX
     */
    public function toggleStatut(Specialite $specialite)
    {
        $specialite->statut = $specialite->statut === 'visible' ? 'invisible' : 'visible';
        $specialite->save();

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour avec succès.',
            'statut' => $specialite->statut
        ]);
    }
}
