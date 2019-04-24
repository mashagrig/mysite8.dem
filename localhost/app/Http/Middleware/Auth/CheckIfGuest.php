<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfGuest
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

        $user = $request->user();

        if (!isset($user)) {
            return redirect('home');
        }

        if (Auth::check() && ($user->isGuest() ||  $user->isAdmin())) {
            return $next($request);
        }
        return redirect('login');
    }
}
