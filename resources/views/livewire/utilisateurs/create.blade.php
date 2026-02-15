<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            {{-- Simple Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-dark mb-1">Nouvel Utilisateur</h4>
                    <p class="text-muted small mb-0">Remplissez les informations pour créer un accès.</p>
                </div>
                <button type="button" wire:click="goToListUser"
                    class="btn btn-link text-decoration-none text-muted p-0 small">
                    <i class="fas fa-arrow-left me-1"></i> Retour à la liste
                </button>
            </div>

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <form wire:submit.prevent="addUser">
                        {{-- Nom --}}
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted text-uppercase"
                                style="letter-spacing: 0.5px;">Nom complet</label>
                            <input type="text" wire:model="newUser.name"
                                class="form-control form-control-sm border-light bg-light rounded-2 @error('newUser.name') is-invalid @enderror"
                                placeholder="Ex: Jean Dupont">
                            @error('newUser.name')
                                <div class="invalid-feedback smallest">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted text-uppercase"
                                style="letter-spacing: 0.5px;">Adresse e-mail</label>
                            <input type="email" wire:model="newUser.email"
                                class="form-control form-control-sm border-light bg-light rounded-2 @error('newUser.email') is-invalid @enderror"
                                placeholder="email@exemple.com">
                            @error('newUser.email')
                                <div class="invalid-feedback smallest">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Mot de passe Info --}}
                        <div class="bg-light p-3 rounded-3 mb-4 border-start border-primary border-4">
                            <div class="small fw-bold text-dark mb-1">Sécurité</div>
                            <p class="text-muted smallest mb-0">Le mot de passe par défaut est : <strong
                                    class="text-primary">azertyui</strong>. L'utilisateur pourra le modifier après sa
                                première connexion.</p>
                        </div>

                        {{-- Actions --}}
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-sm py-2 rounded-pill fw-bold shadow-sm">
                                <i class="fas fa-check me-2"></i> Créer le compte
                            </button>
                        </div>
                    </form>
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
</style>