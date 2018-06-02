<?php

namespace App\Http\Middleware;

use Closure;

class PostValid
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
        if( empty($request['text'])  )
        { return redirect('/home');
        }
        return $next($request);
    }
}
