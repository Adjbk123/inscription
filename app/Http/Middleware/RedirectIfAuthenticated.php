<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Redirection selon le type de guard
            if ($guard === 'administrateur') {
                header("Location: /dashboard");
            } else {
                
                header("Location: /dashboard");
            }

            exit;
        }

        return $next($request);
    }
}
