@extends('layouts.app')
@section('title', 'Accueil')

@section('content')

    <!-- ================= CAROUSEL ================= -->
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('frontend/img/car5.jpeg') }}" alt="Image"
                    style="height: 100vh; object-fit: cover;">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 text-start">
                                <h4 class="text-white text-uppercase fw-bold mb-3 animated slideInDown">
                                    <span class="bg-primary px-3 py-2 rounded-1 shadow-sm"
                                        style="letter-spacing: 3px;">Bienvenue chez MAFLYT</span>
                                </h4>
                                <h1 class="display-1 text-white mb-4 animated slideInDown fw-black">
                                    Façonnez votre <span class="text-primary">Avenir</span> Professionnel
                                </h1>
                                <p class="fs-5 mb-5 animated slideInDown text-white">
                                    <span class="bg-black bg-opacity-25 px-3 py-2 rounded-2 d-inline-block">
                                        Rejoignez une équipe dynamique et donnez un nouvel élan à votre carrière avec des
                                        spécialités de pointe.
                                    </span>
                                </p>
                                <div class="d-grid gap-3 d-sm-flex align-items-center animated slideInDown pb-5 pb-lg-0">
                                    <a href="#specialites" class="btn btn-primary rounded-pill py-3 px-5 shadow-lg">
                                        Découvrir les Spécialités
                                    </a>
                                    <a href="{{ route('frontend.recrutementForm') }}"
                                        class="btn btn-outline-light rounded-pill py-3 px-5">
                                        Postuler Maintenant
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="w-100" src="{{ asset('frontend/img/caro2.jpeg') }}" alt="Image"
                    style="height: 100vh; object-fit: cover;">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-8">
                                <h4 class="text-white text-uppercase fw-bold mb-3 animated zoomIn">
                                    <span class="bg-primary px-3 py-2 rounded-1 shadow-sm"
                                        style="letter-spacing: 3px;">Recrutement Ouvert</span>
                                </h4>
                                <h1 class="display-1 text-white mb-4 animated zoomIn fw-black">
                                    Devenez notre prochain <span class="text-primary">Talent</span>
                                </h1>
                                <p class="fs-5 mb-5 animated zoomIn text-white">
                                    <span class="bg-black bg-opacity-25 px-3 py-2 rounded-2 d-inline-block">
                                        Nous recherchons des formateurs et des professionnels passionnés pour partager leur
                                        expertise.
                                    </span>
                                </p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-center animated zoomIn pb-5 pb-lg-0">
                                    <a href="{{ route('frontend.recrutementForm') }}"
                                        class="btn btn-primary rounded-pill py-3 px-5 shadow-lg">
                                        Déposer ma Candidature
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <div class="control-btn shadow">
                <span class="carousel-control-prev-icon"></span>
            </div>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <div class="control-btn shadow">
                <span class="carousel-control-next-icon"></span>
            </div>
        </button>
    </div>
    <!-- ================= FIN CAROUSEL ================= -->

    <!-- ================= SPÉCIALITÉS ================= -->
    <div id="specialites" class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h2 class="fw-bold text-dark mb-2">Spécialités <span class="text-primary">Recherchées</span></h2>
            <p class="text-secondary">Découvrez les profils que nous recherchons actuellement pour rejoindre notre équipe
                d'experts.</p>
            <div class="underline mx-auto bg-primary rounded-pill mb-4" style="width: 60px; height: 4px;"></div>
        </div>

        <div class="row g-4">
            @forelse($specialites as $specialite)
                @if($specialite->statut === 'visible')
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="specialite-card h-100 border-0 shadow-sm bg-white overflow-hidden p-0 rounded-4">
                            <div class="card-accent bg-primary" style="height: 5px;"></div>
                            <div class="p-4 d-flex flex-column h-100">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle bg-primary-subtle rounded-3 d-flex align-items-center justify-content-center me-3"
                                        style="width: 45px; height: 45px;">
                                        <i class="fas fa-graduation-cap text-primary fs-5"></i>
                                    </div>
                                    <h5 class="mb-0 fw-bold text-dark">{{ $specialite->nom }}</h5>
                                </div>

                                <div class="job-section mb-3 flex-grow-1">
                                    <h6 class="fw-bold text-uppercase small text-secondary mb-2" style="letter-spacing: 1px;">
                                        <i class="fas fa-file-alt me-2 text-primary"></i>Pièces à fournir
                                    </h6>
                                    <div class="text-secondary small list-unstyled list-check">
                                        {!! html_entity_decode($specialite->description_piece) !!}
                                    </div>
                                </div>

                                <div class="job-section mb-4">
                                    <h6 class="fw-bold text-uppercase small text-secondary mb-2" style="letter-spacing: 1px;">
                                        <i class="fas fa-award me-2 text-primary"></i>Compétences & Expériences
                                    </h6>
                                    <div class="text-secondary small list-unstyled list-check">
                                        {!! html_entity_decode($specialite->experience) !!}
                                    </div>
                                </div>

                                <div class="mt-auto pt-3 border-top border-light">
                                    <a href="{{ route('frontend.recrutementForm', ['specialite' => $specialite->id]) }}"
                                        class="btn btn-primary rounded-pill py-2 w-100 fw-bold shadow-sm btn-apply-now">
                                        Postuler ICI <i class="fas fa-arrow-right ms-2 small"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12 text-center py-5">
                    <div class="bg-light p-5 rounded-4 border border-dashed border-secondary opacity-75">
                        <i class="fas fa-search-minus fa-3x text-secondary mb-3"></i>
                        <h4 class="text-secondary">Aucune spécialité disponible</h4>
                        <p class="text-muted mb-0">Revenez bientôt pour de nouvelles opportunités.</p>
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
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0, 0, 0, 0.05) !important;
    }

    .specialite-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
    }

    .specialite-card .icon-circle {
        transition: all 0.3s ease;
    }

    .specialite-card:hover .icon-circle {
        transform: rotate(10deg) scale(1.1);
        background-color: var(--primary) !important;
    }

    .specialite-card:hover .icon-circle i {
        color: white !important;
    }

    .specialite-card .btn-apply-now {
        transition: all 0.3s ease;
    }

    .specialite-card:hover .btn-apply-now {
        background-color: var(--dark) !important;
        border-color: var(--dark) !important;
    }

    /* Style des listes dans les cartes */
    .list-check ul,
    .list-check ol {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .list-check li {
        position: relative;
        padding-left: 1.5rem;
        margin-bottom: 0.5rem;
        line-height: 1.5;
    }

    .list-check li::before {
        content: "\f00c";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        position: absolute;
        left: 0;
        color: var(--primary);
        font-size: 0.8rem;
    }

    .bg-primary-subtle {
        background-color: rgba(71, 97, 255, 0.1) !important;
    }

    /* Responsivité du Carousel */
    @media (max-width: 768px) {
        #header-carousel .carousel-item {
            height: 70vh !important;
        }

        #header-carousel img {
            height: 70vh !important;
        }

        #header-carousel h1 {
            font-size: 2.5rem !important;
            line-height: 1.2;
        }

        #header-carousel p {
            font-size: 1rem !important;
            margin-bottom: 2rem !important;
        }

        #header-carousel .btn {
            padding: 12px 25px !important;
            font-size: 0.9rem !important;
        }
    }

    @media (max-width: 576px) {
        #header-carousel h1 {
            font-size: 2rem !important;
        }

        #header-carousel .container {
            padding: 0 20px;
        }

        .carousel-caption {
            padding-bottom: 80px;
        }
    }

    /* Dropdowns Refinés */
    .dropdown-menu {
        animation: dropFade 0.3s ease-out;
        transform-origin: top right;
    }

    @keyframes dropFade {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-item:active {
        background-color: var(--primary) !important;
    }
</style>