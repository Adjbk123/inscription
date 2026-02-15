@extends('layouts.app')
@section('title', 'Candidature Reçue')
@section('content')
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="card border-0 shadow-lg rounded-4 p-5 overflow-hidden position-relative">
                    {{-- Element décoratif --}}
                    <div class="position-absolute top-0 start-0 w-100 bg-primary" style="height: 6px;"></div>

                    <div class="mb-4">
                        <div class="bg-success-subtle rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-check-circle text-success fs-1"></i>
                        </div>
                        <h2 class="fw-black text-dark">Merci pour votre intérêt !</h2>
                        <p class="text-secondary">Votre candidature a été enregistrée avec succès sous le numéro :</p>
                        <div class="badge bg-light text-primary border px-3 py-2 rounded-pill fs-6 fw-bold">
                            #{{ str_pad($inscription->id, 5, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>

                    <div class="bg-light p-4 rounded-4 text-start mb-4 border border-light">
                        <p class="small text-muted mb-3">Nous avons bien reçu votre dossier. Notre équipe va procéder à une
                            étude approfondie de vos compétences.</p>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-envelope text-primary me-3 opacity-50"></i>
                            <span class="small fw-bold text-dark">{{ $inscription->email }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone text-primary me-3 opacity-50"></i>
                            <span class="small fw-bold text-dark">{{ $inscription->numero }}</span>
                        </div>
                        <p class="smallest text-muted mt-3 mb-0 text-italic">Vous recevrez une notification par email dès
                            que le statut de votre candidature évoluera.</p>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                        <a href="{{ url('/') }}" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                            Retour à l'accueil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .fw-black {
            font-weight: 900;
        }

        .bg-success-subtle {
            background-color: rgba(40, 167, 69, 0.1) !important;
        }

        .text-italic {
            font-style: italic;
        }
    </style>
@endsection