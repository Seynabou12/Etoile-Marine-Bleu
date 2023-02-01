<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
        $id = $this->user;

        return [
            'email' => 'required|email|unique:users,email,' . $id . '|max:255',

            // 'password' => 'required|confirmed|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[@#$%^&+=_!?,;-])(?=.*[A-Z])[0-9a-zA-Z!@#\$%\^\&*\)\(@#$%^&+=_!?,;-]{8,}$/|min:8',
            'is_admin'=>'nullable',
        ];
    }
}
