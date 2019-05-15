<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfSupport
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

        if (Auth::check() && $user->isSupport()) {
            return $next($request);
        }
        return redirect('login');
    }
}
