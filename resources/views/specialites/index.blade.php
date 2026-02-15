@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-3">
        <!-- Card Header -->
        <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
            <h4 class="mb-2 mb-md-0">Liste des Spécialités</h4>

            <!-- Bouton Ajouter à droite -->
            <a href="{{ route('employer.gestspecialites.specialites.create') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-1">
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <!-- Card Body -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0 align-middle datatable">
                    <thead class="table-light">
                        <tr>
                            
                            <th>Nom</th>
                            <th>Description des pièces</th>
                             <th>Compétences et Expériences</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($specialites as $specialite)
                        <tr>
                           
                            <td>{{ $specialite->nom }}</td>
                            <td>{!! html_entity_decode($specialite->description_piece) !!}</td>
                            <td>{!! html_entity_decode($specialite->experience) !!}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggleStatut" type="checkbox" 
                                           data-id="{{ $specialite->id }}"
                                           {{ $specialite->statut === 'visible' ? 'checked' : '' }}>
                                    <label class="form-check-label small">
                                        {{ $specialite->statut === 'visible' ? 'Visible' : 'Invisible' }}
                                    </label>
                                </div>
                            </td>
                            <td class="text-nowrap">
                                <!-- Éditer uniquement icône -->
                                <a href="{{ route('employer.gestspecialites.specialites.edit', $specialite->id) }}" 
                                   class="btn btn-warning btn-sm mb-1" title="Éditer">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Supprimer uniquement icône avec SweetAlert -->
                                <form action="{{ route('employer.gestspecialites.specialites.destroy', $specialite->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete" data-name="{{ $specialite->nom }}" title="Supprimer">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Aucune spécialité trouvée.</td>
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
