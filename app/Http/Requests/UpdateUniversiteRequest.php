<?php

namespace App\Http\Requests;

use App\Models\Universite;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUniversiteRequest extends FormRequest
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
        $id = $this->universite;
        $universite = Universite::find($id);
        $user_id = $universite->user->id;
        return [
            'user.email' => 'required|email|unique:users,email,' . $user_id . '|max:255',
            // 'password' => 'required|confirmed|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[@#$%^&+=_!?,;-])(?=.*[A-Z])[0-9a-zA-Z!@#\$%\^\&*\)\(@#$%^&+=_!?,;-]{8,}$/|min:8',
            'is_admin'=>'nullable',
        ];
    }
}
