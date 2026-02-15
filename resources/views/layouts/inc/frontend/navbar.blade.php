@php
    $logo = $parametres?->photo ? asset('uploads/' . $parametres->photo) : asset('uploads/default.png');
    $siteName = $parametres?->website_name ?? 'MAFLYT SARL';
@endphp

<div class="container-fluid bg-primary text-white d-none d-lg-flex">
    <div class="container py-1 d-flex align-items-center">
        <a href="{{ url('/') }}">
            <img src="{{  $logo }}" class="img-fluid" alt="Logo"
                style="height: 70px; width: 70px; border-radius: 50%; object-fit: cover;">
        </a>
        <div class="ms-auto d-flex align-items-center">
            <small class="ms-4">
                <i class="fa fa-map-marker-alt me-2"></i>
                {{ $parametres->address ?? 'Adresse par défaut' }}
            </small>
            <small class="ms-4">
                <i class="fa fa-envelope me-2"></i>
                <a href="mailto:{{ $parametres->email1 ?? '' }}" class="text-white footer-link">
                    {{ $parametres->email1 ?? 'Email par défaut' }}
                </a>
            </small>
            <small class="ms-4">
                <i class="fa fa-phone-alt me-2"></i>
                <a href="tel:{{ $parametres->phone1 ?? '' }}" class="text-white footer-link">
                    {{ $parametres->phone1 ?? 'Téléphone par défaut' }}
                </a>
            </small>
            <div class="ms-3 d-flex">
                @if(!empty($parametres->whatsapp))
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                        href="{{ $parametres->whatsapp }}" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                @endif

                @if(!empty($parametres->facebook))
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                        href="{{ $parametres->facebook }}" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                @endif

                @if(!empty($parametres->twitter))
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                        href="{{ $parametres->twitter }}" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                @endif

                @if(!empty($parametres->youtube))
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                        href="{{ $parametres->youtube }}" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">

            <!-- Logo mobile -->
            <a href="{{ url('/') }}" class="navbar-brand d-lg-none">
                <img src="{{ $logo }}" style="height:40px;width:40px;border-radius:50%;object-fit:cover;">
            </a>

            <!-- Bouton menu mobile -->
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- Liens principaux -->
                <div class="navbar-nav me-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">
                        <i class="fa fa-home"></i> Accueil
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="fa fa-list"></i> Services
                    </a>
                </div>

                <!-- Partie droite -->
                <div class="navbar-nav ms-auto align-items-lg-center">

                    @guest
                        @if (Route::has('frontend.login'))
                            <a href="{{ route('frontend.login') }}" class="nav-item nav-link">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Connexion
                            </a>
                        @endif

                        {{-- @if (Route::has('frontend.register'))
                        <a href="{{ route('frontend.register') }}" class="nav-item nav-link">
                            <i class="bi bi-person-plus me-1"></i> Inscription
                        </a>
                        @endif --}}
                    @else
                        <div class="nav-item dropdown">
                            <a href="javascript:void(0)"
                                class="nav-link dropdown-toggle fw-bold text-primary d-flex align-items-center"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="bg-primary-subtle rounded-circle p-1 me-2 d-flex align-items-center justify-content-center"
                                    style="width: 30px; height: 30px;">
                                    <i class="bi bi-person-fill text-primary"></i>
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 p-2 mt-2">
                                @if(auth()->user()->hasAnyRoles(['administrateur', 'employer']))
                                    <a href="{{ url('/home') }}" class="dropdown-item rounded-3 py-2 px-3 mb-1">
                                        <i class="bi bi-speedometer2 me-2 text-primary"></i> Tableau de bord
                                    </a>
                                @endif

                                <a href="{{ route('profile.edit') }}" class="dropdown-item rounded-3 py-2 px-3 mb-1">
                                    <i class="bi bi-user-circle me-2 text-primary"></i> Mon Profil
                                </a>
                                
                                <div class="dropdown-divider"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item rounded-3 py-2 px-3 text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->