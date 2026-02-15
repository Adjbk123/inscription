<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token pour sécuriser les formulaires POST -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Titre dynamique, défini dans les vues enfants -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon"
        href="{{ $parametres?->photo ? asset('uploads/' . $parametres->photo) : asset('uploads/default.png') }}"
        type="image/x-icon">




    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Polices Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Plugins Styles -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Theme Main Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <!-- Custom Stylesheet (Overwrites theme) -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body class="d-flex flex-column min-vh-100">
    <div id="app">

        {{-- Inclusion du navbar frontend --}}
        @include('layouts.inc.frontend.navbar')

        {{-- Inclusion du breadcrumb public --}}
        @include('layouts.inc.frontend.breadcrumb')

        {{-- Zone de contenu dynamique injectée par chaque page --}}
        <main class="flex-grow-1">
            @yield('content')
        </main>

        {{-- Inclusion du footer frontend --}}
        @include('layouts.inc.frontend.footer')

    </div>






    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- AlertifyJS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        // Écouteur d'événement personnalisé pour les notifications via AlertifyJS
        window.addEventListener('notify', event => {
            alertify.set('notifier', 'position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        });
    </script>

    <!-- Plugins -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Fermer le menu mobile quand on clique sur un lien (pour les ancres)
            $('.navbar-nav .nav-link').on('click', function () {
                if ($('.navbar-toggler').is(':visible') && !$(this).hasClass('dropdown-toggle')) {
                    const navbarCollapse = document.getElementById('navbarCollapse');
                    if (navbarCollapse) {
                        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse) || new bootstrap.Collapse(navbarCollapse);
                        bsCollapse.hide();
                    }
                }
            });
        });
    </script>




    {{-- Section pour scripts spécifiques à chaque page --}}
    @yield('script')

    {{-- Scripts Livewire --}}
    @livewireScripts

    {{-- Pile pour scripts supplémentaires --}}
    @stack('scripts')


</body>

</html>