<!-- FOOTER START -->
<footer class="container-fluid bg-dark text-light pt-5 mt-5">
    <div class="container py-5">
        <div class="row g-5">

            <!-- LOGO + DESCRIPTION -->
            <div class="col-lg-4 col-md-6">
                <h2 class="text-white mb-4 fw-bold">
                    <span class="text-primary">{{ $parametres?->website_name ?? 'MAFLYT SARL' }}</span>
                </h2>
                <p class="mb-4 text-white-50 lh-lg">
                    {{ $parametres?->meta_description ?? 'Entreprise spécialisée en formation informatique et vente d’ordinateurs de qualité.' }}
                </p>

                <div class="d-flex gap-3">
                    @if($parametres?->facebook)
                        <a class="btn btn-outline-light social-circle" href="{{ $parametres->facebook }}" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif

                    @if($parametres?->twitter)
                        <a class="btn btn-outline-light social-circle" href="{{ $parametres->twitter }}" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif

                    @if($parametres?->whatsapp)
                        <a class="btn btn-outline-light social-circle" href="{{ $parametres->whatsapp }}" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    @endif

                    @if($parametres?->youtube)
                        <a class="btn btn-outline-light social-circle" href="{{ $parametres->youtube }}" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- CONTACT -->
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-4 fw-bold">Contact</h4>
                <div class="d-flex mb-3">
                    <i class="fa fa-map-marker-alt me-3 text-primary"></i>
                    <span class="text-white-50">{{ $parametres?->address ?? 'Adresse non définie' }}</span>
                </div>
                <div class="d-flex mb-3">
                    <i class="fa fa-phone-alt me-3 text-primary"></i>
                    <a href="tel:{{ $parametres?->phone1 ?? '' }}" class="text-white-50 text-decoration-none hover-primary">
                        {{ $parametres?->phone1 ?? 'Téléphone non défini' }}
                    </a>
                </div>
                <div class="d-flex mb-3">
                    <i class="fa fa-envelope me-3 text-primary"></i>
                    <a href="mailto:{{ $parametres?->email1 ?? '' }}" class="text-white-50 text-decoration-none hover-primary">
                        {{ $parametres?->email1 ?? 'Email non défini' }}
                    </a>
                </div>
            </div>

            <!-- LIENS RAPIDES -->
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-4 fw-bold">Navigation</h4>
                <div class="row">
                    <div class="col-6">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a class="text-white-50 text-decoration-none hover-primary" href="{{ url('/') }}"><i class="fas fa-chevron-right small me-2"></i> Accueil</a></li>
                            <li class="mb-2"><a class="text-white-50 text-decoration-none hover-primary" href="#"><i class="fas fa-chevron-right small me-2"></i> Services</a></li>
                            <li class="mb-2"><a class="text-white-50 text-decoration-none hover-primary" href="#"><i class="fas fa-chevron-right small me-2"></i> Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a class="text-white-50 text-decoration-none hover-primary" href="#"><i class="fas fa-chevron-right small me-2"></i> Formations</a></li>
                            <li class="mb-2"><a class="text-white-50 text-decoration-none hover-primary" href="#"><i class="fas fa-chevron-right small me-2"></i> Vente PC</a></li>
                            <li class="mb-2"><a class="text-white-50 text-decoration-none hover-primary" href="#"><i class="fas fa-chevron-right small me-2"></i> Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- COPYRIGHT BAR -->
    <div class="container-fluid bg-dark border-top border-secondary py-4" style="font-size: 14px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{ date('Y') }} <span class="text-primary fw-bold">{{ $parametres?->website_name ?? 'MAFLYT' }}</span>. Tous droits réservés.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Conçu par l'équipe Technique.
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .hover-primary:hover {
        color: var(--primary) !important;
        padding-left: 5px;
        transition: 0.3s;
    }
    .social-circle {
        width: 40px !important;
        height: 40px !important;
        padding: 0 !important;
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 50% !important;
    }
    footer .btn-sm-square:hover, .social-circle:hover {
        background-color: var(--primary);
        border-color: var(--primary);
        color: white;
    }
</style>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top shadow-lg"><i class="bi bi-arrow-up"></i></a>
