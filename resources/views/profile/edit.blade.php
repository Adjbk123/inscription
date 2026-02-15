@extends('layouts.admin')

@section('title', 'Mon Profil')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{-- En-tête --}}
                <div class="mb-4">
                    <h2 class="fw-bold text-dark mb-1">Mon Profil</h2>
                    <p class="text-muted">Gérez vos informations personnelles et votre mot de passe.</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        @if(session('success'))
                            <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4">
                                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label smallest fw-bold text-muted text-uppercase">Nom Complet</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i
                                                class="fas fa-user text-muted"></i></span>
                                        <input type="text" name="name"
                                            class="form-control bg-light border-0 @error('name') is-invalid @enderror"
                                            value="{{ old('name', $user->name) }}" required>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label smallest fw-bold text-muted text-uppercase">Adresse
                                        Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i
                                                class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" name="email"
                                            class="form-control bg-light border-0 @error('email') is-invalid @enderror"
                                            value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mt-2 mb-4">
                                    <hr class="text-light">
                                    <h6 class="fw-bold text-dark mb-3">Changer le mot de passe</h6>
                                    <p class="smallest text-muted mb-4">Laissez vide si vous ne souhaitez pas changer votre
                                        mot de passe actuel.</p>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label smallest fw-bold text-muted text-uppercase">Nouveau mot de
                                        passe</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i
                                                class="fas fa-lock text-muted"></i></span>
                                        <input type="password" name="password"
                                            class="form-control bg-light border-0 @error('password') is-invalid @enderror">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label smallest fw-bold text-muted text-uppercase">Confirmer le mot de
                                        passe</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i
                                                class="fas fa-check-double text-muted"></i></span>
                                        <input type="password" name="password_confirmation"
                                            class="form-control bg-light border-0">
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                                        <i class="fas fa-save me-2"></i> Mettre à jour le profil
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .smallest {
            font-size: 0.75rem;
        }

        .form-control:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 0.25rem rgba(71, 97, 255, 0.1);
            border: 1px solid var(--primary) !important;
        }

        .input-group-text {
            border-right: none !important;
        }

        .form-control {
            border-left: none !important;
        }
    </style>
@endsection