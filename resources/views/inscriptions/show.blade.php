@extends('layouts.admin')
@section('title', 'Détails de la Candidature')

@section('content')
    <div class="container-fluid py-4">
        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('employer.gestinscriptions.inscriptions.index') }}">Inscriptions</a></li>
                        <li class="breadcrumb-item active">Détails</li>
                    </ol>
                </nav>
                <h2 class="fw-bold text-dark mb-0">Détails de la Candidature</h2>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('employer.gestinscriptions.inscriptions.index') }}"
                    class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="fas fa-arrow-left me-2"></i> Retour
                </a>
                @if($inscription->statut == 'en_attente')
                    <form action="{{ route('employer.gestinscriptions.inscriptions.accepter', $inscription->id) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success rounded-pill px-4">
                            <i class="fas fa-check-circle me-2"></i> Accepter
                        </button>
                    </form>
                    <form action="{{ route('employer.gestinscriptions.inscriptions.refuser', $inscription->id) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger rounded-pill px-4">
                            <i class="fas fa-times-circle me-2"></i> Refuser
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="row g-4">
            {{-- Profil & Info --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="bg-primary py-5 text-center px-4">
                        <div class="avatar-xl mx-auto bg-white rounded-circle d-flex align-items-center justify-content-center text-primary fw-bold shadow-lg mb-3"
                            style="width: 100px; height: 100px; font-size: 2.5rem;">
                            {{ strtoupper(substr($inscription->name, 0, 1)) }}
                        </div>
                        <h4 class="text-white fw-bold mb-1">{{ $inscription->name }}</h4>
                        <span
                            class="badge {{ $inscription->statut == 'accepte' ? 'bg-success' : ($inscription->statut == 'refuse' ? 'bg-danger' : 'bg-warning') }} px-3 py-2 rounded-pill shadow-sm">
                            <i
                                class="fas {{ $inscription->statut == 'accepte' ? 'fa-check-circle' : ($inscription->statut == 'refuse' ? 'fa-times-circle' : 'fa-clock') }} me-1"></i>
                            {{ ucfirst(str_replace('_', ' ', $inscription->statut)) }}
                        </span>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light rounded-circle p-2 me-3">
                                <i class="fas fa-envelope text-primary w-20 text-center"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">E-mail</small>
                                <span class="fw-bold">{{ $inscription->email }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-0">
                            <div class="bg-light rounded-circle p-2 me-3">
                                <i class="fas fa-phone text-primary w-20 text-center"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Téléphone</small>
                                <span class="fw-bold">{{ $inscription->numero }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h6 class="fw-bold text-dark mb-3">Documents Joints</h6>
                    @if($inscription->fichier)
                        <div class="d-flex align-items-center p-3 bg-light rounded-3 border border-light">
                            <i class="fas fa-file-pdf text-danger fs-3 me-3"></i>
                            <div class="flex-grow-1">
                                <div class="fw-bold text-dark small mb-1">Dossier de candidature</div>
                                <div class="smallest text-muted">Format PDF</div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ asset('uploads/' . $inscription->fichier) }}" target="_blank"
                                    class="btn btn-sm btn-primary rounded-circle" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ asset('uploads/' . $inscription->fichier) }}" download
                                    class="btn btn-sm btn-success rounded-circle" title="Télécharger">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-3">
                            <i class="fas fa-file-excel text-muted fs-2 mb-2"></i>
                            <p class="small text-muted mb-0">Aucun fichier joint</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Détails du Poste --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-0">
                        <h5 class="fw-bold text-dark mb-0">Détails de la demande</h5>
                    </div>
                    <div class="card-body p-4 pt-0">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-4 h-100">
                                    <small class="text-muted text-uppercase fw-bold smallest mb-2 d-block">Poste /
                                        Spécialité</small>
                                    <h5 class="fw-bold text-primary mb-0">{{ $inscription->specialite->nom ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-4 h-100">
                                    <small class="text-muted text-uppercase fw-bold smallest mb-2 d-block">Date de
                                        soumission</small>
                                    <h5 class="fw-bold text-dark mb-0">{{ $inscription->created_at->format('d/m/Y à H:i') }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-4 h-100">
                                    <small
                                        class="text-muted text-uppercase fw-bold smallest mb-2 d-block">Département</small>
                                    <h5 class="fw-bold text-dark mb-0">{{ $inscription->departement->nom ?? 'N/A' }}</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-4 h-100">
                                    <small class="text-muted text-uppercase fw-bold smallest mb-2 d-block">Commune</small>
                                    <h5 class="fw-bold text-dark mb-0">{{ $inscription->commune->nom ?? 'N/A' }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Preview PDF (si supporté par le browser) --}}
        @if($inscription->fichier)
            <div class="col-12 mt-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold text-dark mb-0">Aperçu du Dossier</h5>
                        <span class="badge bg-primary-subtle text-primary">{{ $inscription->fichier }}</span>
                    </div>
                    <div class="card-body p-0" style="height: 800px;">
                        <iframe src="{{ asset('uploads/' . $inscription->fichier) }}#toolbar=0" width="100%" height="100%"
                            frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>

    <style>
        .smallest {
            font-size: 0.7rem;
            letter-spacing: 0.5px;
        }

        .w-20 {
            width: 20px;
        }

        .avatar-xl {
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .bg-primary-subtle {
            background-color: rgba(71, 97, 255, 0.1) !important;
        }
    </style>
@endsection