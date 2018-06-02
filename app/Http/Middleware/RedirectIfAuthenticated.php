<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($Request, Closure $next, $Guard = null)
    {
        if (Auth::guard($Guard)->check()) {
            return redirect('/home');
        }

        return $next($Request);
    }
}
