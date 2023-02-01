<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EntreprisesMiddleware
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
        if(Auth::check()) {
            //&& Auth::user()->role
            if(!Auth::user()->is_super_admin && Auth::user()->entreprise) { //Is entreprise
                return $next($request);
            }
        }

        return redirect('/home');
    }
}
