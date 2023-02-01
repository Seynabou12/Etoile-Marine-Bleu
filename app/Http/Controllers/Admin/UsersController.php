<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserInfo;
use Faker\Provider\UserAgent;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
	public function index()
	{
        $users = User::where('is_admin',1)->get();
		return view('admin.users.index', compact('users'));
	}

	public function create()
	{
        $user = new User();
		return view('admin.users.create',compact('user'),['title'=>"Create a new user"]);
	}

	public function store(UserCreateRequest $request)
	{
        
        $data = $request->validated();
        $user_data =  request('user_info');
        $data['password'] = Hash::make($data['password']);
        $data['is_admin'] = isset($data['is_admin']) && $data['is_admin'] ? 1 : 0;
        $newUser = new User($data);
        if($newUser->save()) {
            if(isset($data['profil_id']) && $data['profil_id']) {
                $this->createOrUpdateRole($newUser->id, $data['profil_id']);
            }
            $user_info = new UserInfo();
            $user_data['user_id'] = $newUser->id;
            $user_info->create($user_data);
            return redirect()->route("admin.users.index")->withSuccess("Save operation completed successfully!");
        }
        return back()->withError("Save operation failed, veuillez réessayer !");
	}

	public function show($id)
	{
        $user = User::where("id",$id)->with(['user_info'])->firstOrFail();

		return view('admin.users.show',  compact('user'));
    }

	public function edit($id)
	{
        $user = User::where("id",$id)->with(['user_info'])->firstOrFail();

        return view('admin.users.edit',  compact('user'));
	}

	public function update(UserUpdateRequest $request, $id)
	{
        
        $user = User::where('id',$id)->get()->firstOrFail();
        $data = $request->validated();

        if(request('password')!== null){
            request()->validate([
                'password' => 'required|confirmed|min:8',
            ]);
            $data['password'] = Hash::make(request('password'));
        }
        $data['is_admin'] = isset($data['is_admin']) && $data['is_admin'] ? 1 : 0;
        $user_info = request('user_info');
        if($user->update($data)) {
            if(isset($data['profil_id']) && $data['profil_id']) {
                $this->createOrUpdateRole($user->id, $data['profil_id']);
            }
            if($user->user_info == null){
                $isNew = new UserInfo();
                $user_info['user_id'] = $id;
                $isNew->create($user_info);
            }else{
                $user->user_info->update($user_info);
            }
            return redirect()->route("admin.users.index")->withSuccess("L'opération de mise à jour a été effectuée avec succès !");
        }

        return back()->withError("L'opération de mise à jour a échoué, veuillez réessayer !");
    }

	public function destroy($id)
	{
        $user = User::where('id',$id)->get()->first();
        if($user){
            if($user->delete()) {
                return back()->withSuccess("L'opération de suppression a été effectuée avec succès !");
            }
            return back()->withError("L'opération de suppression a échoué, veuillez réessayer !");
        }

		return back()->withError("Utilisateur introuvable");
    }

    private function createOrUpdateRole($user_id, $profil_id = 1)
    {
        $role = Role::where('user_id', $user_id)->first();

        if($role) {
            return $role->update(['profil_id' => $profil_id]);
        }
        return Role::create([
            'user_id' => $user_id,
            "profil_id" => $profil_id,
            "statut" => 1
        ]);
    }

    // public function updatePassword() {
    //     $user = Auth::user();
    //     $days = now()->diff($user->mdp_date)->days;
    //     if(request()->method() == "POST" || request()->method() == "PATCH") {
    //         $data = request()->validate([
    //             'password' => 'required|confirmed|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[@#$%^&+=])(?=.*[A-Z])[0-9a-zA-Z!@#\$%\^\&*\)\(+=._-]{8,}$/|min:8'
    //         ]);

    //         $user->mdp_date = now();
    //         $user->first_connexion = 0; //Changement de l'attribut first connexion
    //         $user->password = Hash::make(request("password"));
    //         if(password_verify(request("password"), $user->getOriginal("password"))) {
    //             flash('Vous devez saisir un mot de passe différent de l\'ancien! ')->error()->important();
    //             return back();
    //         } else {
    //             if($user->save()) {
    //                     //LOG
    //                 LogType::ACTION_USER('update', $user->id);

    //                 flash('Votre mot de passe a été modifié avec succès! ')->success();
    //                 return redirect()->route('home');
    //             }
    //         }
    //     }
    //     return view('update-password', compact('days', 'user'));
    // }
}
