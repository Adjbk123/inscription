@extends('layouts.app')
@section('title', 'Recrutement')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary">Formulaire de Recrutement</h2>
                <p class="text-muted">Remplissez ce formulaire pour postuler</p>
            </div>

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-3 p-md-4">
                    <form method="POST" action="{{ route('frontend.recrutementSubmit') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nom complet -->
                        <div class="mb-3">
                            <label class="form-label">Nom complet</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <!-- Numéro -->
                        <div class="mb-3">
                            <label class="form-label">Numéro de téléphone</label>
                            <input type="text" name="numero" class="form-control" value="{{ old('numero') }}" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email fonctionnel</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <!-- Département -->
                        <div class="mb-3">
                            <label class="form-label">Département</label>
                            <select name="departement_id" id="departement" class="form-select" required>
                                <option value="">-- Sélectionnez un département --</option>
                                @foreach($departements as $departement)
                                    <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Commune -->
                        <div class="mb-3">
                            <label class="form-label">Commune</label>
                            <select name="commune_id" id="commune" class="form-select" required>
                                <option value="">-- Sélectionnez une commune --</option>
                            </select>
                        </div>

                        <!-- Spécialité -->
                        <div class="mb-3">
                            <label class="form-label">Spécialité</label>
                            <select name="specialite_id" class="form-select" required>
                                <option value="">-- Sélectionnez une spécialité --</option>
                                @foreach($specialites as $specialite)
                                    @if($specialite->statut === 'visible')
                                        <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- Fichier -->
                        <div class="mb-3">
                            <label class="form-label">Fichier (PDF uniquement, max 10 Mo)</label>
                            <input type="file" name="fichier" id="fichier" class="form-control" required>
                            <div class="progress mt-2">
                                <div id="progress-bar" class="progress-bar bg-success" role="progressbar" style="width: 0%">0%</div>
                            </div>
                            <small class="text-muted">Joignez vos documents en un fichier unique PDF.</small>
                        </div>

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary fw-bold rounded-3">Postuler</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const fichierInput = document.getElementById('fichier');
    const progressBar = document.getElementById('progress-bar');

    fichierInput.addEventListener('change', function() {
        const file = this.files[0];
        if (!file) return;

        if (file.type !== 'application/pdf') {
            Swal.fire('Erreur', 'Seul un fichier PDF est accepté !', 'error');
            this.value = '';
            progressBar.style.width = '0%';
            progressBar.textContent = '0%';
            return;
        }

        if (file.size > 10 * 1024 * 1024) { // 10 Mo
            Swal.fire('Erreur', 'Le fichier dépasse 10 Mo !', 'error');
            this.value = '';
            progressBar.style.width = '0%';
            progressBar.textContent = '0%';
            return;
        }

        progressBar.style.width = '100%';
        progressBar.textContent = '100%';
    });

    // Départements → Communes dynamique
    const departementSelect = document.getElementById('departement');
    const communeSelect = document.getElementById('commune');

    departementSelect.addEventListener('change', function() {
        const departementId = this.value;
        communeSelect.innerHTML = '<option value="">Chargement...</option>';

        if (!departementId) {
            communeSelect.innerHTML = '<option value="">-- Sélectionnez une commune --</option>';
            return;
        }

        fetch(`/communes/by-departement/${departementId}`)
            .then(res => res.json())
            .then(data => {
                communeSelect.innerHTML = '<option value="">-- Sélectionnez une commune --</option>';
                data.forEach(commune => {
                    communeSelect.innerHTML += `<option value="${commune.id}">${commune.nom}</option>`;
                });
            });
    });
</script>
@endsection
