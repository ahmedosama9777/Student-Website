<?php

namespace App\Http\Middleware;

use Closure;

class GpaValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($Request, Closure $Next)
    {
        if( !ctype_digit($Request['prevcrdts']) || !is_numeric($Request['prevGPA']) )
        {
            return redirect('/gpacalc');
        }
        else if ( $Request['prevGPA'] > 4.0 || $Request['prevGPA'] < 0 )
        {
            return redirect('/gpacalc');
        }

        return $next($Request);
    }
}
