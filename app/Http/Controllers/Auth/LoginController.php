<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $url_path = '/' . request()->path();
        $explode_path = explode('/', url()->previous());
        $ref = isset($explode_path[5]) ? $explode_path[5] : false;
        // if(!$ref) return back();
        $request->validate([
			'email' => 'required|email|max:255',
            'password' => 'required|string',
        ]);
        
        if(Auth::attempt($credentials)) {
            if(Auth::user()->is_admin){
                $request->session()->flash('success','Welcome, succesfully authentification.');
                return redirect()->route('admin.dashboard');
            }else{

                if($ref == 'connexion-university' && !Auth::user()->is_admin && isset(Auth::user()->role) && in_array(Auth::user()->role->profil_id,[3])){
                    $request->session()->flash('success','Welcome, succesfully authentification.');
                    return redirect()->route('university.dashboard');
                }
                if($ref == 'connexion' && !Auth::user()->is_admin && isset(Auth::user()->role) && in_array(Auth::user()->role->profil_id,[2])){

                    $request->session()->flash('success','Welcome, succesfully authentification.');
                    return redirect()->route('student.dashboard');
                }
                $request->session()->flash('error','Authentification  failed verify your login space !.');

                Auth::logout();
                return back();

            }
        }
        $request->session()->flash('error','Authentification  failed !.');
        return redirect()->back();
    }


}
