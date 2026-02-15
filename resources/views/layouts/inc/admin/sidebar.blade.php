<section>
    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ETS SALAM PROVIK</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="images/faces/6.png" alt="" style="width: 40px; height: 40px;">
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="{{ url('/home') }}" class="nav-item nav-link {{ Request::is('home') ? 'active' : '' }}">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>

                @if(auth()->user()->role === 'administrateur' || auth()->user()->role === 'employer')
                    <a href="{{ route('employer.gestinscriptions.inscriptions.index') }}"
                        class="nav-item nav-link {{ Request::is('gestinscriptions*') ? 'active' : '' }}">
                        <i class="fa fa-pen-nib me-2"></i>Inscriptions
                    </a>

                    <a href="{{ route('employer.gestspecialites.specialites.index') }}"
                        class="nav-item nav-link {{ Request::is('gestspecialites*') ? 'active' : '' }}">
                        <i class="fa fa-graduation-cap me-2"></i>Spécialités
                    </a>
                @endif

                @if(auth()->user()->role === 'administrateur')
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('gestutilisateurs*') ? 'active' : '' }}"
                            data-bs-toggle="dropdown">
                            <i class="fa fa-users me-2"></i>Utilisateurs
                        </a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ url('/gestutilisateurs/utilisateurs') }}" class="dropdown-item">Gérer
                                Utilisateurs</a>
                        </div>
                    </div>

                    <a href="{{ route('administrateur.gestparametres.parametres.index') }}"
                        class="nav-item nav-link {{ Request::is('gestparametres*') ? 'active' : '' }}">
                        <i class="fa fa-cog me-2"></i>Paramètres
                    </a>
                @endif
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->


</section>