<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Vérifie si connecté selon le guard
        if (!Auth::guard($guard)->check()) {

            // Redirection selon le type de guard
            if ($guard === 'administrateur') {
                header("Location: /admin/login");
            } 
            else {
                
                header("Location: /login");
            }

            exit; // stoppe l’exécution
        }

        return $next($request);
    }
}
