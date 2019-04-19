<?php

namespace App\Http\Middleware;

use Closure;

class checkUser
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
       
        $roll = array_slice( func_get_args(),2 );

        if(auth()->user()->hasRoles($roll))
        {
            return $next($request);
        }
        
        return redirect('/');
       
     }
}
