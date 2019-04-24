<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->isGuest()) {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->isTrainer()) {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->isSupport()) {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->isContent()) {
            return $next($request);
        }

        return redirect('login');
    }
}
