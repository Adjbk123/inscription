@extends('layouts.admin')
@section('title', 'Page Administrateur')
@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
{{--<div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3">
                      <label class="custom-control-label" for="customSwitch3">Toggle this custom switch element with custom colors danger/success</label>
                    </div>
                  </div>--}}
                  
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5 bg-light text-center">

                    {{-- Titre de bienvenue --}}
                    <h1 class="mb-3 display-6 fw-bold">
                        Bienvenue, <span class="text-primary">{{ userFullName() }}</span>
                    </h1>

                    {{-- Badges des rôles --}}
                    <div class="mb-3 d-flex flex-wrap justify-content-center gap-2">
                        @foreach(auth()->user()->roles as $role)
                            @php
                                switch($role->nom) {
                                    case 'administrateur': $badgeColor = 'danger'; break;
                                    case 'employer': $badgeColor = 'primary'; break;
                                    case 'comptable': $badgeColor = 'success'; break;
                                    case 'manager': $badgeColor = 'info'; break;
                                    default: $badgeColor = 'secondary';
                                }
                            @endphp
                            <span class="badge bg-{{ $badgeColor }} text-capitalize fs-6">{{ $role->nom }}</span>
                        @endforeach
                    </div>

                    {{-- Description --}}
                    <p class="fs-6 fs-md-5 text-secondary px-2 px-md-0">
                        Cette plateforme vous permet de gérer facilement vos inscriptions et vos informations de formateur.
                    </p>

                    <hr class="my-4 border-2 border-primary opacity-25">

                    <p class="text-muted fs-7 fs-md-6 px-2 px-md-0">
                        Vous pouvez suivre vos formations, consulter vos documents et gérer vos données personnelles directement depuis votre espace.
                    </p>

                    {{-- Bouton d'accès --}}
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg mt-3 shadow-sm px-4">
                        Accéder à mon espace formateur
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
