<?php

namespace App\Repositories;

use App\Models\Universite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UniversiteRepository
{

    protected $universite;

    public function __construct(Universite $universite)
	{
		$this->universite = $universite;
	}

	private function saveUser(User $user, Array $inputs)
	{
		// $user->username = $inputs['username'];
		$user->email = $inputs['email'];
		$user->is_admin = isset($inputs['is_admin']);

		return $user->save();
	}

	public function getPaginate($n)
	{
		return $this->universite->paginate($n);
    }

	public function getuniversites()
	{
		return $this->universite->latest()->with([
            'collaborateurs','roles'
        ])->where('etat',1)->where('is_gerant',null)->get();
    }

	public function store(Array $inputs)
	{
		$universite = new $this->universite;
        $universite->password = Hash::make($inputs['password']);
        $universite->mdp_date = now();

		if($this->save($universite, $inputs)) {
            return $universite;
        }
        return false;
	}

	public function getById($id)
	{
		return $this->universite->findOrFail($id);
    }

	public function getByEmailAndIgg($data)
	{
        $email = $data['email'];
        $igg = $data['igg'];
        $universite = $this->universite->where('email',$email)->first();

        if($universite && $universite->collaborateur){
            //Verify if igg equals igg collaborateur
            $verify_igg = $universite->collaborateur->igg == $igg;
            if($verify_igg){
                return $universite;
            }
        }

        return null;
    }

    public function getByIdContain($id)
	{
		return $this->universite->latest()->with([
            'collaborateurs','roles.profil'
        ])->where('universites.id',$id)->get();
    }

	public function update($id, Array $inputs)
	{
        $universite = $this->getById($id);
        $data =  $inputs['user'];
        unset($inputs['user']);
        if(request('user.password')!== null){
            request()->validate([
                'user.password' => 'required|confirmed|min:8',
            ]);
            $data['user']['password'] = Hash::make(request('user.password'));
        }
        $user = request('user');
        if($universite->update($inputs)) {

            return $universite->user->update($user)
            ? true
            : false;
        }
        return false;
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
