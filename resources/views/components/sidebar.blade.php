<aside class="main-sidebar sidebar-dark-primary elevation-4">

    @php
        $logo = $parametres?->photo ? asset('uploads/' . $parametres->photo) : asset('uploads/default.png');
        $siteName = $parametres?->website_name ?? 'MAFLYT';
    @endphp

    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ $logo }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity:.8">
        <span class="brand-text font-weight-light">{{ $siteName }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-modern" data-widget="treeview" role="menu">

                {{-- ACCUEIL --}}
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ setMenuClass('home', 'active') }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Accueil</p>
                    </a>
                </li>

                {{-- MODULES PRINCIPAUX --}}
                @can('employer')
                    <li class="nav-item">
                        <a href="{{ route('employer.gestinscriptions.inscriptions.index') }}"
                            class="nav-link {{ setMenuClass('employer.gestinscriptions.', 'active') }}">
                            <i class="nav-icon fas fa-file-signature text-warning"></i>
                            <p>Inscriptions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employer.gestspecialites.specialites.index') }}"
                            class="nav-link {{ setMenuClass('employer.gestspecialites.', 'active') }}">
                            <i class="nav-icon fas fa-briefcase text-success"></i>
                            <p>Spécialités</p>
                        </a>
                    </li>
                @endcan

                @can('administrateur')
                    <li class="nav-header">ADMINISTRATION</li>
                    <li class="nav-item">
                        <a href="{{ route('administrateur.gestutilisateurs.users.index') }}"
                            class="nav-link {{ setMenuClass('administrateur.gestutilisateurs.', 'active') }}">
                            <i class="nav-icon fas fa-users text-info"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('administrateur.gestparametres.parametres.index') }}"
                            class="nav-link {{ setMenuClass('administrateur.gestparametres.', 'active') }}">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Paramètres</p>
                        </a>
                    </li>
                @endcan

                <li class="nav-header">MON COMPTE</li>
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}"
                        class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Mon Profil</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>