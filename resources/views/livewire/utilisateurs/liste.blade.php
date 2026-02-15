@section('title', 'Utilisateurs')
<div class="container-fluid py-4">
    {{-- Simple Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Gérer le Personnel</h4>
            <p class="text-muted small mb-0">Total : {{ $users->total() }} comptes actifs.</p>
        </div>
        <div>
            <button class="btn btn-primary btn-sm rounded-pill px-3 fw-bold shadow-sm" wire:click="goToAddUser">
                <i class="fas fa-plus me-1"></i> Nouvel utilisateur
            </button>
        </div>
    </div>

    {{-- Search Area --}}
    <div class="row mb-4">
        <div class="col-md-5">
            <div class="input-group input-group-sm bg-white border rounded-3 px-2 py-1 shadow-sm">
                <span class="input-group-text bg-transparent border-0 text-muted"><i
                        class="fas fa-search pe-2 border-end"></i></span>
                <input type="text" class="form-control border-0 bg-transparent"
                    placeholder="Rechercher par nom ou email..." wire:model.live="search">
            </div>
        </div>
    </div>

    {{-- Users Table --}}
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="ps-4 py-2 small border-0 fw-bold">NOM & EMAIL</th>
                            <th class="py-2 small border-0 fw-bold">RÔLES</th>
                            <th class="py-2 small border-0 text-center fw-bold">CRÉÉ LE</th>
                            <th class="pe-4 py-2 small border-0 text-end fw-bold">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="border-bottom border-light">
                                <td class="ps-4 py-3">
                                    <div class="fw-bold text-dark small">{{ $user->name }}</div>
                                    <div class="text-muted smallest">{{ $user->email }}</div>
                                </td>
                                <td>
                                    @php
                                        $roles = $user->roles->pluck('nom')->toArray();
                                    @endphp
                                    @foreach($roles as $role)
                                        <span class="badge border text-primary px-2 py-1 rounded-pill bg-light fw-normal"
                                            style="font-size: 0.65rem;">
                                            {{ $role }}
                                        </span>
                                    @endforeach
                                    @if(empty($roles))
                                        <span class="text-muted smallest italic">Aucun rôle</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="small text-muted">{{ $user->created_at->format('d/m/Y') }}</span>
                                </td>
                                <td class="pe-4 text-end">
                                    <div class="d-flex justify-content-end gap-3">
                                        <button class="btn btn-link text-primary p-0 btn-sm text-decoration-none"
                                            wire:click="goToEditUser({{ $user->id }})" title="Modifier">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <button class="btn btn-link text-danger p-0 btn-sm text-decoration-none"
                                            wire:click="confirmDelete({{ $user->id }})" title="Supprimer">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-5 text-center text-muted">
                                    <p class="mb-0">Aucun utilisateur correspondant à votre recherche.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-0 py-3 d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    </div>
</div>

{{-- Modal Simple Minimaliste --}}
@if($confirmingUserId)
    <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.3);">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-3">
                <div class="modal-body p-4 text-center">
                    <div class="text-danger mb-3">
                        <i class="fas fa-exclamation-circle fa-2x"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Confirmer la suppression</h6>
                    <p class="text-muted small mb-4">Cette action supprimera définitivement le compte.</p>
                    <div class="d-grid gap-2">
                        <button class="btn btn-danger btn-sm rounded-pill py-2 fw-bold"
                            wire:click="deleteUser">Supprimer</button>
                        <button class="btn btn-light btn-sm rounded-pill py-2" wire:click="cancelDelete">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<style>
    .smallest {
        font-size: 0.7rem;
    }

    .btn-link:hover {
        opacity: 0.7;
    }
</style>