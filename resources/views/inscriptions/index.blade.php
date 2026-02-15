@extends('layouts.admin')
@section('title', 'Inscription')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Liste des candidatures</h2>

    {{-- FILTRE PAR SPÉCIALITÉ --}}
    <div class="mb-3 d-flex gap-2 align-items-center">
        <label for="specialiteFilter" class="me-2 fw-bold">Filtrer par spécialité :  </label>
        <select id="specialiteFilter" class="form-control w-auto">
            <option value="">-- Toutes les spécialités --</option>
            @foreach($specialites as $specialite)
                <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
            @endforeach
        </select>

        <a id="filterButton" class="btn btn-primary btn-sm">Filtrer</a>
    </div>

    {{-- BOUTONS DE TÉLÉCHARGEMENT --}}
    <div class="mb-3 text-end d-flex gap-2 justify-content-end">
        <a href="{{ route('employer.gestinscriptions.inscriptions.pdfAlpha') }}" 
           class="btn btn-success">
            <i class="fas fa-file-pdf"></i> Alphabétique
        </a>

        <a href="{{ route('employer.gestinscriptions.inscriptions.pdfDepartement') }}" 
           class="btn btn-primary">
            <i class="fas fa-file-pdf"></i> Département
        </a>

        <a href="{{ route('employer.gestinscriptions.inscriptions.pdfCommune') }}" 
           class="btn btn-info">
            <i class="fas fa-file-pdf"></i> Commune
        </a>

        <a id="downloadBySpecialite" class="btn btn-warning">
            <i class="fas fa-file-pdf"></i> Spécialité
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-hover align-middle datatable">
                <thead class="table-light">
                    <tr>
                        <th>Nom complet</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Département</th>
                        <th>Commune</th>
                        <th>Spécialité</th> {{-- ajouté --}}
                        <th>PDF</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscriptions as $inscription)
                        <tr>
                            <td>{{ $inscription->name }}</td>
                            <td>{{ $inscription->email }}</td>
                            <td>{{ $inscription->numero }}</td>
                            <td>{{ $inscription->departement->nom ?? 'N/A' }}</td>
                            <td>{{ $inscription->commune->nom ?? 'N/A' }}</td>
                            <td>{{ $inscription->specialite->nom ?? 'N/A' }}</td> {{-- affichage spécialité --}}
                           
                            <td>
                                @if($inscription->fichier)
                                    <a href="{{ asset('uploads/'.$inscription->fichier) }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ asset('uploads/'.$inscription->fichier) }}" download class="btn btn-sm btn-success">
                                        <i class="fas fa-download"></i>
                                    </a>
                                @else
                                    <span class="text-muted">Aucun fichier</span>
                                @endif
                            </td>
                            <td>
                                @if($inscription->statut == 'en_attente')
                                    <span class="badge bg-warning text-dark">En attente</span>
                                @elseif($inscription->statut == 'accepte')
                                    <span class="badge bg-success">Accepté</span>
                                @elseif($inscription->statut == 'refuse')
                                    <span class="badge bg-danger">Refusé</span>
                                @endif
                            </td>
                            <td class="d-flex gap-1">
                                @if($inscription->statut == 'en_attente')
                                    <form action="{{ route('employer.gestinscriptions.inscriptions.accepter', $inscription->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success" title="Accepter">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('employer.gestinscriptions.inscriptions.refuser', $inscription->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-warning" title="Refuser">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('employer.gestinscriptions.inscriptions.destroy', $inscription->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete" data-name="{{ $inscription->name }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $inscriptions->links('pagination::bootstrap-5') }}
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
    document.getElementById('filterButton').addEventListener('click', function() {
        const specialiteId = document.getElementById('specialiteFilter').value;
        let url = "{{ route('employer.gestinscriptions.inscriptions.index') }}";
        if(specialiteId) {
            url += "?specialite=" + specialiteId;
        }
        window.location.href = url;
    });

    // Télécharger par spécialité
    document.getElementById('downloadBySpecialite').addEventListener('click', function() {
        const specialiteId = document.getElementById('specialiteFilter').value;
        if(!specialiteId) {
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
