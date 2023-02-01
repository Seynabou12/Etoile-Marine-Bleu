<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
            if(Auth::user()->is_admin) { //Is Administrateur
                return $next($request);
            }
            elseif(Auth::user()->role->profil_id == 3){
                return redirect()->route('university.dashboard');
            }
            elseif(Auth::user()->role->profil_id == 2){
                return redirect()->route('student.dashboard');
            }else{
                return redirect()->back();
            }
        }
        Auth::logout();
        return redirect()->route('login');

        // return redirect('/home');
    }
}
