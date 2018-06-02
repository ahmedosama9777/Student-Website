<?php

namespace App\Http\Middleware;

use Closure;

class CommentValid
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
        if ( empty($request['ctext']))
        {
            return redirect('/home');
        }
        return $next($request);
    }
}
