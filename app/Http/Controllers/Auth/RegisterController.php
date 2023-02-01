<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EleveUserRequest;
use App\Http\Requests\EntrepriseUserRequest;
use App\Models\Eleve;
use App\Models\Entreprise;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    // public function register(EleveUserRequest $request)
    // {
    //     $data = $request->validated();
    //     $data['password'] = Hash::make($data['password']);
    //     $user = new User($data);
    //     $year = request('radio') == 0 ? now()->format('Y') : now()->addYear(1)->format('Y');
    //     if($user->save()) {
    //         $this->createRole($user->id,2);
    //         $eleve = new Eleve();
    //         $eleve->user_id = $user->id;
    //         $eleve->anne_diplome = $year;
    //         $eleve->save();
    //         return redirect()->route('myPathway.connexion')->withSuccess('Votre inscription a été bien prise en compte, veuillez vous connecter.');
    //     }
    //     return back()->withError('Votre inscription a échoué, veuillez réessayer.');
    // }

    private function createRole($user_id, $profil_id = 1)
    {
        return Role::create([
            'user_id' => $user_id,
            "profil_id" => $profil_id,
            "statut" => 1
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


}
