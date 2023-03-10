<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversiteUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'sigle' => 'required|max:256',
			'user.email' => 'required|email|unique:users,email|max:255',
            'user.password' => 'required|confirmed|min:8'
        ];
    }
}
