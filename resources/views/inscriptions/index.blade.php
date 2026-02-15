@extends('layouts.admin')
@section('title', 'Inscription')@section('content')<div class="container-fluid py-4">
        {{-- Header de la page --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">Candidatures</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gestion des inscriptions</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex gap-2">
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle rounded-pill px-4" type="button"
                        data-bs-toggle="dropdown">
                        <i class="fas fa-file-export me-2"></i> Exporter PDF
                    </button>
                    <div class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
                        <a class="dropdown-item py-2" href="{{ route('employer.gestinscriptions.inscriptions.pdfAlpha') }}">
                            <i class="fas fa-sort-alpha-down me-2 text-success"></i> Par ordre alphabétique
                        </a>
                        <a class="dropdown-item py-2"
                            href="{{ route('employer.gestinscriptions.inscriptions.pdfDepartement') }}">
                            <i class="fas fa-map-marker-alt me-2 text-primary"></i> Par département
                        </a>
                        <a class="dropdown-item py-2"
                            href="{{ route('employer.gestinscriptions.inscriptions.pdfCommune') }}">
                            <i class="fas fa-city me-2 text-info"></i> Par commune
                        </a>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item py-2" id="downloadBySpecialiteBtn">
                            <i class="fas fa-graduation-cap me-2 text-warning"></i> Par spécialité filtrée
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filtres Refinés --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body py-3 px-4">
                        <div class="row align-items-center g-3">
                            <div class="col-md-auto pe-4 border-end d-none d-md-block">
                                <h6 class="fw-bold text-dark mb-0"><i class="fas fa-sliders-h me-2 text-primary"></i>Filtres</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative">
                                    <select id="specialiteFilter" class="form-select form-select-sm border-0 bg-light rounded-2 ps-5 py-2">
                                        <option value="">Toutes les spécialités de formation...</option>
                                        @foreach($specialites as $specialite)
                                            <option value="{{ $specialite->id }}" {{ request('specialite') == $specialite->id ? 'selected' : '' }}>
                                                {{ $specialite->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-graduation-cap position-absolute text-muted" style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <button id="filterButton" class="btn btn-primary btn-sm rounded-pill px-4 fw-bold shadow-sm">
                                    Appliquer le filtre
                                </button>
                            </div>
                            <div class="col-md-auto ms-auto">
                                <div class="text-end">
                                    <div class="smallest text-muted text-uppercase fw-bold mb-0">Total Candidatures</div>
                                    <div class="h5 fw-bold mb-0 text-primary">{{ $inscriptions->total() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table des inscriptions --}}
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-secondary">
                            <tr>
                                <th class="ps-4 border-0 py-3 small text-uppercase fw-bold">Candidat</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold">Contact</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold">Localisation</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold">Spécialité</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold text-center">Documents</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold text-center">Statut</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold text-center pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inscriptions as $inscription)
                                <tr>
                                    <td class="ps-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3 bg-light rounded-circle d-flex align-items-center justify-content-center text-primary fw-bold"
                                                style="width: 40px; height: 40px;">
                                                {{ strtoupper(substr($inscription->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark">{{ $inscription->name }}</div>
                                                <div class="text-muted small">Inscrit le
                                                    {{ $inscription->created_at->format('d/m/Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-dark"><i
                                                class="bi bi-envelope me-2 opacity-50"></i>{{ $inscription->email }}</div>
                                        <div class="small text-muted"><i
                                                class="bi bi-telephone me-2 opacity-50"></i>{{ $inscription->numero }}</div>
                                    </td>
                                    <td>
                                        <div class="small text-dark fw-medium">{{ $inscription->departement->nom ?? 'N/A' }}
                                        </div>
                                        <div class="small text-muted">{{ $inscription->commune->nom ?? 'N/A' }}</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-primary border border-primary-subtle px-2 py-1">
                                            {{ $inscription->specialite->nom ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @if($inscription->fichier)
                                            <div class="btn-group shadow-sm rounded-3 overflow-hidden">
                                                <a href="{{ asset('uploads/' . $inscription->fichier) }}" target="_blank"
                                                    class="btn btn-sm btn-white border-end" title="Voir">
                                                    <i class="fas fa-eye text-primary"></i>
                                                </a>
                                                <a href="{{ asset('uploads/' . $inscription->fichier) }}" download
                                                    class="btn btn-sm btn-white" title="Télécharger">
                                                    <i class="fas fa-download text-success"></i>
                                                </a>
                                            </div>
                                        @else
                                            <span class="text-muted small">Aucun fichier</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($inscription->statut == 'en_attente')
                                            <span
                                                class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill border border-warning-subtle">
                                                <i class="fas fa-clock me-1"></i> En attente
                                            </span>
                                        @elseif($inscription->statut == 'accepte')
                                            <span
                                                class="badge bg-success-subtle text-success px-3 py-2 rounded-pill border border-success-subtle">
                                                <i class="fas fa-check-circle me-1"></i> Accepté
                                            </span>
                                        @elseif($inscription->statut == 'refuse')
                                            <span
                                                class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill border border-danger-subtle">
                                                <i class="fas fa-times-circle me-1"></i> Refusé
                                            </span>
                                        @endif
                                    </td>
                                    <td class="pe-4 text-center">
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center mx-auto"
                                                style="width: 32px; height: 32px;" type="button" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v small"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
                                                @if($inscription->statut == 'en_attente')
                                                    <form
                                                        action="{{ route('employer.gestinscriptions.inscriptions.accepter', $inscription->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item py-2 text-success">
                                                            <i class="fas fa-check-circle me-2"></i> Accepter la candidature
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('employer.gestinscriptions.inscriptions.refuser', $inscription->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item py-2 text-warning">
                                                            <i class="fas fa-times-circle me-2"></i> Refuser la candidature
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                @endif
                                                <form
                                                    action="{{ route('employer.gestinscriptions.inscriptions.destroy', $inscription->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item py-2 text-danger btn-delete"
                                                        data-name="{{ $inscription->name }}">
                                                        <i class="fas fa-trash-alt me-2"></i> Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-top-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="small text-muted">
                        Affichage de {{ $inscriptions->firstItem() }} à {{ $inscriptions->lastItem() }} sur
                        {{ $inscriptions->total() }} inscriptions
                    </div>
                    <div>
                        {{ $inscriptions->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    const nom = this.getAttribute('data-name');
                    Swal.fire({
                        title: `Supprimer "${nom}" ?`,
                        text: "Cette action est irréversible.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Oui, supprimer',
                        cancelButtonText: 'Annuler'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: {!! json_encode(session('success')) !!},
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: {!! json_encode(session('error')) !!},
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            // Filtrer par spécialité côté front (simple redirection)
            document.getElementById('filterButton').addEventListener('click', function () {
                const specialiteId = document.getElementById('specialiteFilter').value;
                let url = "{{ route('employer.gestinscriptions.inscriptions.index') }}";
                if (specialiteId) {
                    url += "?specialite=" + specialiteId;
                }
                window.location.href = url;
            });

            // Télécharger par spécialité
            document.getElementById('downloadBySpecialiteBtn').addEventListener('click', function () {
                const specialiteId = document.getElementById('specialiteFilter').value;
                if (!specialiteId) {
                    Swal.fire('Erreur', 'Veuillez sélectionner une spécialité pour télécharger le PDF.', 'error');
                    return;
                }
                let url = "{{ route('employer.gestinscriptions.inscriptions.pdfSpecialite', ':id') }}";
                url = url.replace(':id', specialiteId);
                window.open(url, '_blank');
            });
        });
    </script>
@endsection