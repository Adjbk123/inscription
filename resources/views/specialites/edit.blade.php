@extends('layouts.admin')

@section('title', 'Modifier Spécialité')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Modifier la spécialité</h4>
                </div>

                <div class="card-body">
                    {{-- Messages d'erreurs --}}
                    @if ($errors->any())
                        <div class="alert alert-danger p-2 mb-3 small">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulaire --}}
                    <form action="{{ route('employer.gestspecialites.specialites.update', $specialite->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nom" class="form-label small">Nom de la spécialité</label>
                            <input type="text" name="nom" id="nom" class="form-control form-control-sm" 
                                   value="{{ old('nom', $specialite->nom) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description_piece" class="form-label small">
                                Description des pièces 
                            </label>
                            <textarea name="description_piece" id="description_piece" 
                                      class="form-control form-control-sm editor" rows="4" required>{{ old('description_piece', $specialite->description_piece) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="experience" class="form-label small">
                               Qualifications et expériences
                            </label>
                            <textarea name="experience" id="experience" 
                                      class="form-control form-control-sm editor" rows="4" required>{{ old('experience', $specialite->experience) }}</textarea>
                        </div>

                       <div class="text-end">
                        <button class="btn btn-secondary me-2" type="reset">
                            <i class="fa-solid fa-arrows-rotate"></i> Annuler
                        </button>
                        <button class="btn btn-success" type="submit">
                            <i class="fa-solid fa-floppy-disk"></i> Enregistrer
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
