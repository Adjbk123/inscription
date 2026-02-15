@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Ajouter une nouvelle spécialité</h4>
                </div>

                <div class="card-body">
                    {{-- Messages d'erreurs --}}
                    @if ($errors->any())
                        <div class="alert alert-danger p-2 mb-3">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulaire --}}
                    <form action="{{ route('employer.gestspecialites.specialites.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nom" class="form-label small">Nom de la spécialité</label>
                            <input type="text" class="form-control form-control-sm" id="nom" name="nom" 
                                   value="{{ old('nom') }}" placeholder="Ex: Formateur, Chauffeur, Maintenancier" required>
                        </div>

                        <div class="mb-3">
                            <label for="description_piece" class="form-label small">Description des pièces</label>
                            <textarea class="form-control form-control-sm editor" id="description_piece" 
                                      name="description_piece" rows="4" 
                                      placeholder="Ex: Lettre, CV, Attestation, Diplôme" required>{{ old('description_piece') }}</textarea>
                            
                        </div>

                        <div class="mb-3">
                            <label for="experience" class="form-label small">Qualification et expérience</label>
                            <textarea class="form-control form-control-sm editor" id="experience" 
                                      name="experience" rows="4" 
                                      placeholder="Ex: Lettre, CV, Attestation, Diplôme" required>{{ old('description_piece') }}</textarea>
                            
                        </div>

                        
                        <div class="text-end">
                        <button class="btn btn-secondary me-2" type="reset">
                            <i class="fa-solid fa-arrows-rotate"></i> Annuler
                        </button>
                        <button class="btn btn-success" type="submit">
                            <i class="fa-solid fa-floppy-disk"></i> Enregistrer
                        </button>
                    </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>


@endsection
