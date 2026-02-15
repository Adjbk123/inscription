<?php

namespace App\Http\Controllers;

use App\Mail\InscriptionAccepteMail;
use App\Mail\InscriptionRefuseMail;
use App\Models\Inscription;
use App\Models\Parametre;
use App\Models\Specialite;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InscriptionController extends Controller
{
    public function index(Request $request)
    {
        $query = Inscription::with(['departement', 'commune', 'specialite']);

        if ($request->has('specialite') && !empty($request->specialite)) {
            $query->where('specialite_id', $request->specialite);
        }

        $inscriptions = $query->orderBy('created_at', 'desc')
            ->paginate(15);

        $specialites = Specialite::all();

        return view('inscriptions.index', compact('inscriptions', 'specialites'));
    }

    public function show($id)
    {
        $inscription = Inscription::with(['departement', 'commune', 'specialite'])->findOrFail($id);
        return view('inscriptions.show', compact('inscription'));
    }

    // Supprimer une inscription
    public function destroy($id)
    {
        $inscription = Inscription::findOrFail($id);

        // Supprimer le fichier PDF si existant
        if ($inscription->fichier && File::exists(public_path('uploads/' . $inscription->fichier))) {
            File::delete(public_path('uploads/' . $inscription->fichier));
        }

        $inscription->delete();

        return redirect()->route('employer.gestinscriptions.inscriptions.index')
            ->with('success', 'Inscription supprimée avec succès !');
    }

    public function accepter($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->statut = 'accepte';
        $inscription->save();

        Mail::to($inscription->email)->send(new InscriptionAccepteMail($inscription));

        return back()->with('success', 'Formateur accepté et email envoyé.');
    }

    public function refuser($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->statut = 'refuse';
        $inscription->save();

        Mail::to($inscription->email)->send(new InscriptionRefuseMail($inscription));

        return back()->with('success', 'Formateur refusé et email envoyé.');
    }

    // PDF 1 : Candidatures par ordre alphabétique
    public function pdfAcceptesAlpha()
    {
        $parametres = Parametre::first();

        $inscriptions = Inscription::with(['departement', 'commune', 'specialite'])
            ->orderBy('name', 'asc')
            ->get();

        $pdf = Pdf::loadView('pdf.acceptes_alpha', compact('inscriptions', 'parametres'));

        return $pdf->download('liste_candidatures_alphabetique.pdf');
    }

    // PDF 2 : Candidatures par département
    public function pdfAcceptesDepartement()
    {
        $parametres = Parametre::first();

        $inscriptions = Inscription::with(['departement', 'commune', 'specialite'])
            ->get()
            ->groupBy(function ($item) {
                return $item->departement->nom ?? 'Sans Département';
            });

        $pdf = Pdf::loadView('pdf.acceptes_par_departement', compact('inscriptions', 'parametres'));

        return $pdf->download('liste_candidatures_departement.pdf');
    }

    // PDF 3 : Candidatures par commune
    public function pdfAcceptesCommune()
    {
        $parametres = Parametre::first();

        $inscriptions = Inscription::with(['departement', 'commune', 'specialite'])
            ->get()
            ->groupBy(function ($item) {
                return $item->commune->nom ?? 'Sans Commune';
            });

        $pdf = Pdf::loadView('pdf.acceptes_par_commune', compact('inscriptions', 'parametres'));

        return $pdf->download('liste_candidatures_commune.pdf');
    }

    // PDF 4 : Candidatures par spécialité
    public function pdfAcceptesSpecialite($id)
    {
        $parametres = Parametre::first();

        $specialite = Specialite::findOrFail($id);

        $inscriptions = Inscription::with(['departement', 'commune', 'specialite'])
            ->where('specialite_id', $id)
            ->orderBy('name', 'asc')
            ->get();

        $pdf = Pdf::loadView('pdf.acceptes_par_specialite', compact('inscriptions', 'specialite', 'parametres'));

        return $pdf->download('liste_candidatures_' . Str::slug($specialite->nom) . '.pdf');
    }
}
