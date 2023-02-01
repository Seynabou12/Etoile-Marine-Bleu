<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UtilitiesController as utility;
use App\Models\Entreprise;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()) {
            if(Auth::user()->is_super_admin) return redirect()->route('admin.dashboard');
            // && Auth::user()->role
            elseif(!Auth::user()->is_super_admin && Auth::user()->entreprise) {
                return redirect()->route('comptes.dashboard');
            }
        }
        Auth::logout();

        return redirect('/');
    }

}
