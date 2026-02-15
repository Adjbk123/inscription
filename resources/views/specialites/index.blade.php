@extends('layouts.admin')
@section('title', 'Spécialités')
@section('content')
    <div class="container-fluid py-4">
        {{-- Header de la page --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">Spécialités</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gestion des spécialités</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('employer.gestspecialites.specialites.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                    <i class="fas fa-plus me-2"></i> Nouvelle Spécialité
                </a>
            </div>
        </div>

        {{-- Statistiques Rapides --}}
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 bg-primary text-white h-100">
                    <div class="card-body d-flex align-items-center justify-content-center py-3">
                        <div class="text-center">
                            <h4 class="mb-0 fw-bold">{{ $specialites->count() }}</h4>
                            <span class="small opacity-75">Spécialités au total</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body py-3 d-flex align-items-center px-4">
                        <i class="fas fa-info-circle text-primary me-3 fs-4"></i>
                        <p class="mb-0 text-secondary small">Gérez les spécialités affichées sur le site public. Vous pouvez activer ou désactiver leur visibilité instantanément.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table des spécialités --}}
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 datatable">
                        <thead class="bg-light text-secondary">
                            <tr>
                                <th class="ps-4 border-0 py-3 small text-uppercase fw-bold">Nom de la spécialité</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold">Pièces Requises</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold">Expériences</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold text-center">Visibilité</th>
                                <th class="border-0 py-3 small text-uppercase fw-bold text-center pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($specialites as $specialite)
                                <tr>
                                    <td class="ps-4 py-3">
                                        <div class="fw-bold text-dark">{{ $specialite->nom }}</div>
                                    </td>
                                    <td>
                                        <div class="small text-muted text-truncate" style="max-width: 250px;">
                                            {!! strip_tags(html_entity_decode($specialite->description_piece)) !!}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-muted text-truncate" style="max-width: 250px;">
                                            {!! strip_tags(html_entity_decode($specialite->experience)) !!}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check form-switch d-inline-block">
                                            <input class="form-check-input toggleStatut" type="checkbox" 
                                                   data-id="{{ $specialite->id }}"
                                                   {{ $specialite->statut === 'visible' ? 'checked' : '' }}>
                                            <label class="form-check-label small text-muted ms-1">
                                                {{ $specialite->statut === 'visible' ? 'Visible' : 'Invisible' }}
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pe-4 text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('employer.gestspecialites.specialites.edit', $specialite->id) }}" 
                                               class="btn btn-light btn-sm rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                               style="width: 32px; height: 32px;" title="Modifier">
                                                <i class="fas fa-edit text-warning small"></i>
                                            </a>
                                            <form action="{{ route('employer.gestspecialites.specialites.destroy', $specialite->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light btn-sm rounded-circle shadow-sm d-flex align-items-center justify-content-center btn-delete" 
                                                        data-name="{{ $specialite->nom }}" style="width: 32px; height: 32px;" title="Supprimer">
                                                    <i class="fas fa-trash-alt text-danger small"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-5 text-center text-muted">
                        <i class="fas fa-folder-open fa-3x mb-3 opacity-25"></i>
                        <p class="mb-0">Aucune spécialité trouvée.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Confirmation suppression
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

    // Messages SweetAlert
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

    // Toggle statut
    document.querySelectorAll('.toggleStatut').forEach(switchInput => {
        switchInput.addEventListener('change', function() {
            const id = this.dataset.id;
            const label = this.nextElementSibling;

            let url = "{{ route('employer.gestspecialites.specialites.toggleStatut', ':id') }}";
            url = url.replace(':id', id);

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    label.innerText = data.statut === 'visible' ? 'Visible' : 'Invisible';
                    Swal.fire({icon: 'success', title: data.message, timer: 1200, showConfirmButton: false});
                } else {
                    Swal.fire({icon: 'info', title: data.message, timer: 1500, showConfirmButton: false});
                    this.checked = data.statut === 'visible';
                }
            })
            .catch(() => Swal.fire('Erreur', 'Impossible de mettre à jour le statut', 'error'));
        });
    });
});
</script>
@endsection
