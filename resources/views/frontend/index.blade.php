@extends('layouts.app')
@section('title', 'Accueil')

@section('content')

<!-- ================= CAROUSEL ================= -->
<div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img class="w-100" src="{{ asset('frontend/img/car5.jpeg') }}" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-12 col-md-8 col-lg-12 text-start">
                            <h4 class="text-white animated slideInRight">
                                Rejoignez-nous à Maflyt
                            </h4>
                            <a href="#specialites" class="btn btn-primary rounded-pill py-2 px-4 mt-3">
                                En Savoir Plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <img class="w-100" src="{{ asset('frontend/img/caro2.jpeg') }}" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-12 col-md-8 col-lg-7 text-end">
                            <p class="fs-5 text-primary">Bienvenue à la <strong>MAFLYT</strong></p>
                            <h4 class="text-white">Rejoignez-nous à Maflyt.</h4>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4 mt-3">
                                Devenir personnels
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<!-- ================= FIN CAROUSEL ================= -->

<!-- ================= SPÉCIALITÉS ================= -->
<div id="specialites" class="container py-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h2 class="text-primary">Spécialités Recherchées</h2>
        <div class="underline mx-auto"></div>
        <p class="mb-0">Découvrez les pièces et les profils que nous recherchons actuellement.</p>
    </div>

    <div class="row g-4">
        @forelse($specialites as $specialite)
            @if($specialite->statut === 'visible')
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="h-100 shadow-sm border rounded p-4 bg-white specialite-card">
                        <h5 class="mb-3 text-primary">{{ $specialite->nom }}</h5>

                        <h6 class="fw-bold">Pièces à fournir :</h6>
                        <div class="text-start">
                            {!! html_entity_decode($specialite->description_piece) !!}
                        </div>

                        <h6 class="fw-bold">Qualifications, Compétences et Expériences :</h6>
                        <div class="text-start">
                            {!! html_entity_decode($specialite->experience) !!}
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('frontend.recrutementForm') }}" class="btn btn-primary btn-sm w-100">
                                Postuler
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12 text-center">
                <div class="alert alert-danger alert-fade d-flex align-items-center justify-content-center" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <span>Aucune spécialité disponible pour le moment.</span>
                </div>
            </div>
        @endforelse
    </div>
</div>
<!-- ================= FIN SPÉCIALITÉS ================= -->

@endsection

<style>
/* ===== Animation carte spécialité ===== */
.specialite-card {
    transition: all 0.35s ease;
    border-radius: 12px;
}
.specialite-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}
.specialite-card .btn {
    transition: all 0.3s ease;
}
.specialite-card:hover .btn {
    transform: scale(1.05);
}

/* ===== Animation fade-in pour l'alerte ===== */
.alert-fade {
    opacity: 0;
    transform: translateY(-10px);
    animation: fadeInAlert 1s forwards;
}
@keyframes fadeInAlert {
    to { opacity: 1; transform: translateY(0); }
}
</style>
