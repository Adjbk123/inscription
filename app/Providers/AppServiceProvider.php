<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Parametre;
use App\Models\Specialite;
use App\Models\Inscription;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

     View::composer('*', function ($view) {
        $view->with('parametres', Parametre::first());
    });

    view()->composer('*', function ($view) {
    $view->with('nbInscriptions', Inscription::count());
    $view->with('nbSpecialites', Specialite::count());
});

        
        Gate::define('employer', function (User $user) {
            return $user->hasRole('employer');
        });

        Gate::after(function (User $user) {
           return $user->hasRole("administrateur");
        });
    }
}
