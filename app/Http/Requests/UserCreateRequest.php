<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{

    public function authorize()
	{
		return true;
    }


	public function rules()
	{
		return [
			'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:8',
            'is_admin'=>'nullable',
            'mobile'=>'nullable',
            'statut'=>'nullable',
            'profil_id'=>'nullable',
		];
	}

}
