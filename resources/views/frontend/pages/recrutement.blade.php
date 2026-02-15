@extends('layouts.app')
@section('title', 'Candidature - ' . ($selectedSpecialite ? $selectedSpecialite->nom : 'Recrutement'))

@section('content')
    <div class="container py-5 mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="row g-0">
                        {{-- Colonne Information --}}
                        <div class="col-lg-4 bg-light p-5 border-end d-none d-lg-block">
                            <div class="mb-4">
                                <h5 class="fw-bold text-dark">Conseils de candidature</h5>
                                <div class="underline bg-primary rounded-pill mb-4" style="width: 40px; height: 3px;"></div>
                                <ul class="list-unstyled small text-secondary">
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                                        <span>Utilisez une adresse e-mail fonctionnelle pour recevoir nos
                                            notifications.</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                                        <span>Regroupez tous vos documents (CV, diplômes, etc.) dans un seul fichier
                                            PDF.</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                                        <span>Vérifiez la taille de votre fichier PDF (maximum 10 Mo).</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="bg-primary-subtle p-4 rounded-3 mt-5">
                                <h6 class="fw-bold text-primary mb-2">Besoin d'aide ?</h6>
                                <p class="smallest text-secondary mb-0">Contactez-nous via notre support technique pour
                                    toute difficulté lors de votre inscription.</p>
                            </div>
                        </div>

                        {{-- Colonne Formulaire --}}
                        <div class="col-lg-8 p-4 p-md-5 bg-white">
                            @if ($selectedSpecialite)
                                <div
                                    class="bg-primary-subtle p-3 rounded-3 mb-4 d-flex align-items-center border border-primary-subtle">
                                    <div class="bg-primary rounded-circle p-2 me-3 d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-briefcase text-white small"></i>
                                    </div>
                                    <div>
                                        <small class="text-primary text-uppercase fw-bold smallest"
                                            style="letter-spacing: 1px;">Vous postulez pour :</small>
                                        <h5 class="mb-0 fw-black text-dark">{{ $selectedSpecialite->nom }}</h5>
                                    </div>
                                </div>
                            @endif

                            {{-- Affichage des erreurs globales --}}
                            @if ($errors->any())
                                <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4 small">
                                    <i class="fas fa-exclamation-triangle me-2"></i> Veuillez corriger les erreurs dans le
                                    formulaire.
                                </div>
                            @endif

                            <form id="recrutementForm" method="POST" action="{{ route('frontend.recrutementSubmit') }}"
                                enctype="multipart/form-data">
                                @csrf

                                @if ($selectedSpecialite)
                                    <input type="hidden" name="specialite_id" value="{{ $selectedSpecialite->id }}">
                                @endif

                                <div class="row g-3">
                                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">Informations Personnelles</h6>

                                    <div class="col-md-12">
                                        <label class="form-label smallest fw-bold text-muted text-uppercase">Nom
                                            Complet</label>
                                        <input type="text" name="name"
                                            class="form-control bg-light border-0 py-2 rounded-2 @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label smallest fw-bold text-muted text-uppercase">Email
                                            fonctionnel</label>
                                        <input type="email" name="email"
                                            class="form-control bg-light border-0 py-2 rounded-2 @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label
                                            class="form-label smallest fw-bold text-muted text-uppercase">Téléphone</label>
                                        <input type="text" name="numero"
                                            class="form-control bg-light border-0 py-2 rounded-2 @error('numero') is-invalid @enderror"
                                            value="{{ old('numero') }}" required>
                                        @error('numero')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <h6 class="fw-bold text-dark border-bottom pb-2 mt-4 mb-3">Localisation</h6>

                                    <div class="col-md-6">
                                        <label
                                            class="form-label smallest fw-bold text-muted text-uppercase">Département</label>
                                        <select name="departement_id" id="departement"
                                            class="form-select bg-light border-0 py-2 rounded-2 @error('departement_id') is-invalid @enderror"
                                            required>
                                            <option value="">-- Sélectionner --</option>
                                            @foreach ($departements as $departement)
                                                <option value="{{ $departement->id }}" {{ old('departement_id') == $departement->id ? 'selected' : '' }}>
                                                    {{ $departement->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('departement_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label smallest fw-bold text-muted text-uppercase">Commune</label>
                                        <select name="commune_id" id="commune"
                                            class="form-select bg-light border-0 py-2 rounded-2 @error('commune_id') is-invalid @enderror"
                                            required>
                                            <option value="">-- Sélectionner --</option>
                                            @if(old('commune_id'))
                                                <option value="{{ old('commune_id') }}" selected>Chargé...</option>
                                            @endif
                                        </select>
                                        @error('commune_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if (!$selectedSpecialite)
                                        <h6 class="fw-bold text-dark border-bottom pb-2 mt-4 mb-3">Poste & Spécialité</h6>
                                        <div class="col-md-12">
                                            <label class="form-label smallest fw-bold text-muted text-uppercase">Domaine de
                                                compétence</label>
                                            <select name="specialite_id"
                                                class="form-select bg-light border-0 py-2 rounded-2 @error('specialite_id') is-invalid @enderror"
                                                required>
                                                <option value="">-- Choisir une spécialité --</option>
                                                @foreach ($specialites as $specialite)
                                                    @if ($specialite->statut === 'visible')
                                                        <option value="{{ $specialite->id }}" {{ old('specialite_id') == $specialite->id ? 'selected' : '' }}>
                                                            {{ $specialite->nom }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('specialite_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif

                                    <h6 class="fw-bold text-dark border-bottom pb-2 mt-4 mb-3">Documents joints</h6>

                                    <div class="col-md-12">
                                        <label class="form-label smallest fw-bold text-muted text-uppercase">Votre Dossier
                                            (PDF Unique)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0 rounded-start-2">
                                                <i class="fas fa-file-pdf text-danger"></i>
                                            </span>
                                            <input type="file" name="fichier" id="fichier"
                                                class="form-control bg-light border-0 py-2 rounded-end-2 @error('fichier') is-invalid @enderror"
                                                required>
                                        </div>
                                        @error('fichier')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <div class="progress mt-2" style="height: 5px;">
                                            <div id="progress-bar" class="progress-bar bg-success rounded-pill"
                                                role="progressbar" style="width: 0%"></div>
                                        </div>
                                        <p class="smallest text-muted mt-1">Max: 10 Mo. Contenu suggéré : CV, Diplômes,
                                            Certifications.</p>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <button type="submit" id="submitBtn"
                                            class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">
                                            <span class="btn-text">Envoyer ma candidature <i
                                                    class="fas fa-paper-plane ms-2"></i></span>
                                            <span class="btn-loader d-none">
                                                <span class="spinner-border spinner-border-sm me-2" role="status"
                                                    aria-hidden="true"></span>
                                                Envoi en cours...
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('recrutementForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoader = submitBtn.querySelector('.btn-loader');
            const fichierInput = document.getElementById('fichier');
            const progressBar = document.getElementById('progress-bar');

            // Feedback au changement de fichier
            fichierInput.addEventListener('change', function () {
                const file = this.files[0];
                if (!file) return;

                if (file.type !== 'application/pdf') {
                    Swal.fire('Erreur', 'Seul un fichier PDF est accepté !', 'error');
                    this.value = '';
                    progressBar.style.width = '0%';
                    return;
                }

                if (file.size > 10 * 1024 * 1024) {
                    Swal.fire('Erreur', 'Le fichier dépasse 10 Mo !', 'error');
                    this.value = '';
                    progressBar.style.width = '0%';
                    return;
                }

                progressBar.style.width = '100%';
            });

            // Feedback lors de la soumission
            form.addEventListener('submit', function () {
                submitBtn.disabled = true;
                btnText.classList.add('d-none');
                btnLoader.classList.remove('d-none');
            });

            // Départements → Communes
            const departementSelect = document.getElementById('departement');
            const communeSelect = document.getElementById('commune');

            function loadCommunes(departementId, selectedCommuneId = null) {
                if (!departementId) {
                    communeSelect.innerHTML = '<option value="">-- Sélectionner --</option>';
                    return;
                }

                communeSelect.innerHTML = '<option value="">Chargement...</option>';

                fetch(`/communes/by-departement/${departementId}`)
                    .then(res => res.json())
                    .then(data => {
                        communeSelect.innerHTML = '<option value="">-- Sélectionner --</option>';
                        data.forEach(commune => {
                            const selected = selectedCommuneId == commune.id ? 'selected' : '';
                            communeSelect.innerHTML += `<option value="${commune.id}" ${selected}>${commune.nom}</option>`;
                        });
                    });
            }

            departementSelect.addEventListener('change', function () {
                loadCommunes(this.value);
            });

            // Recharger les communes si old value
            @if(old('departement_id'))
                loadCommunes("{{ old('departement_id') }}", "{{ old('commune_id') }}");
            @endif
            });
    </script>

    <style>
        .smallest {
            font-size: 0.75rem;
        }

        .fw-black {
            font-weight: 900;
        }

        .bg-primary-subtle {
            background-color: rgba(71, 97, 255, 0.1) !important;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 0.25rem rgba(71, 97, 255, 0.1);
            border: 1px solid var(--primary) !important;
        }

        .invalid-feedback {
            font-size: 0.7rem;
            font-weight: 600;
        }
    </style>
@endsection