<div class="container-fluid py-4">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Édition Utilisateur</h4>
            <p class="text-muted small mb-0">Modifiez les informations et les accès du compte.</p>
        </div>
        <button type="button" wire:click="goToListUser" class="btn btn-link text-decoration-none text-muted p-0 small">
            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
        </button>
    </div>

    <div class="row g-4">
        <!-- Infos de base & Mot de passe -->
        <div class="col-lg-12">
            {{-- Infos de base --}}
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-0 py-3 px-4">
                    <h6 class="fw-bold text-dark mb-0">Informations Générales</h6>
                </div>
                <div class="card-body p-4 pt-0">
                    <form wire:submit.prevent="updateUser">
                        <div class="mb-3">
                            <label class="form-label smallest fw-bold text-muted text-uppercase">Nom complet</label>
                            <input type="text" wire:model="editUser.name"
                                class="form-control form-control-sm border-light bg-light rounded-2 @error('editUser.name') is-invalid @enderror">
                            @error('editUser.name') <div class="invalid-feedback smallest">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label smallest fw-bold text-muted text-uppercase">Adresse e-mail</label>
                            <input type="email" wire:model="editUser.email"
                                class="form-control form-control-sm border-light bg-light rounded-2 @error('editUser.email') is-invalid @enderror">
                            @error('editUser.email') <div class="invalid-feedback smallest">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-sm py-2 rounded-pill fw-bold shadow-sm">
                                Mettre à jour les infos
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Changement de mot de passe --}}
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-0 py-3 px-4">
                    <h6 class="fw-bold text-dark mb-0">Changer de mot de passe</h6>
                </div>
                <div class="card-body p-4 pt-0">
                    <form wire:submit.prevent="updatePassword">
                        <div class="mb-3">
                            <label class="form-label smallest fw-bold text-muted text-uppercase">Mot de passe
                                actuel</label>
                            <input type="password" wire:model="current_password"
                                class="form-control form-control-sm border-light bg-light rounded-2 @error('current_password') is-invalid @enderror">
                            @error('current_password') <div class="invalid-feedback smallest">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label smallest fw-bold text-muted text-uppercase">Nouveau</label>
                                <input type="password" wire:model="new_password"
                                    class="form-control form-control-sm border-light bg-light rounded-2 @error('new_password') is-invalid @enderror">
                                @error('new_password') <div class="invalid-feedback smallest">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label
                                    class="form-label smallest fw-bold text-muted text-uppercase">Confirmation</label>
                                <input type="password" wire:model="new_password_confirmation"
                                    class="form-control form-control-sm border-light bg-light rounded-2">
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-dark btn-sm py-2 rounded-pill fw-bold shadow-sm">
                                Changer le mot de passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Rôles & Permissions -->
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold text-dark mb-0">Rôles & Permissions</h6>
                    <button class="btn btn-success btn-sm rounded-pill px-3 fw-bold"
                        wire:click="updateRoleAndPermissions">
                        <i class="fas fa-check me-1"></i> Appliquer
                    </button>
                </div>
                <div class="card-body p-4 pt-0">
                    <p class="text-muted smallest mb-3">Activez ou désactivez les rôles assignés à cet utilisateur.</p>

                    <div class="list-group list-group-flush mb-4">
                        @foreach($rolePermissions["roles"] as $role)
                            <div
                                class="list-group-item px-0 py-3 border-light d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold text-dark small">{{ $role["role_nom"] }}</div>
                                    <div class="smallest text-muted">Accès {{ strtolower($role["role_nom"]) }}</div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="roleSwitch{{ $role['role_id'] }}"
                                        wire:model.lazy="rolePermissions.roles.{{ $loop->index }}.active">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <h6 class="smallest fw-bold text-muted text-uppercase mb-3" style="letter-spacing: 1px;">Permissions
                        spécifiques</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover align-middle mb-0">
                            <tbody>
                                @foreach($rolePermissions["permissions"] as $permission)
                                    <tr>
                                        <td class="small py-2 ps-0 border-light">{{ $permission["permission_nom"] }}</td>
                                        <td class="text-end pe-0 border-light">
                                            <div class="form-check form-switch d-inline-block">
                                                <input class="form-check-input" type="checkbox"
                                                    id="permSwitch{{ $permission['permission_id'] }}"
                                                    wire:model.lazy="rolePermissions.permissions.{{ $loop->index }}.active">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .smallest {
        font-size: 0.7rem;
    }

    .form-control:focus {
        background-color: #fff;
        border-color: #4761FF;
        box-shadow: none;
    }

    .form-check-input:checked {
        background-color: #198754;
        border-color: #198754;
    }
</style>