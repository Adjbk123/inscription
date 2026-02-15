@if(!Request::is('/'))
<div class="container-fluid page-header position-relative py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background: linear-gradient(rgba(15, 23, 43, .8), rgba(15, 23, 43, .8)), url({{ asset('frontend/img/car5.jpeg') }}) center center no-repeat; background-size: cover; min-height: 300px; display: flex; align-items: center;">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown fw-bold" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
            @if(View::hasSection('breadcrumb_title'))
                @yield('breadcrumb_title')
            @else
                @yield('title')
            @endif
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown" style="background: transparent;">
                <li class="breadcrumb-item"><a class="text-white text-decoration-none transition-all" href="{{ url('/') }}" style="opacity: 0.8;"><i class="fas fa-home me-2"></i>Accueil</a></li>
                @if(View::hasSection('breadcrumb_parent'))
                    <li class="breadcrumb-item"><a class="text-white text-decoration-none transition-all" href="@yield('breadcrumb_parent_url')" style="opacity: 0.8;">@yield('breadcrumb_parent')</a></li>
                @endif
                <li class="breadcrumb-item active text-primary fw-bold" aria-current="page" style="letter-spacing: 1px;">
                    @if(View::hasSection('breadcrumb_title'))
                        @yield('breadcrumb_title')
                    @else
                        @yield('title')
                    @endif
                </li>
            </ol>
        </nav>
    </div>
    
    <!-- Decorative element -->
    <div class="position-absolute start-0 bottom-0 w-100" style="height: 10px; background: linear-gradient(to right, transparent, var(--primary), transparent); opacity: 0.5;"></div>
</div>

<style>
    .page-header {
        background-attachment: fixed !important;
    }
    
    .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255, 255, 255, .5) !important;
        content: "\f105" !important; /* FontAwesome angle right */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        padding: 0 15px;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    .transition-all:hover {
        opacity: 1 !important;
        color: var(--primary) !important;
        transform: translateY(-2px);
    }

    .breadcrumb-item.active {
        color: #4761FF !important; /* A bright visible blue if var(--primary) is too dark */
    }
</style>
@endif