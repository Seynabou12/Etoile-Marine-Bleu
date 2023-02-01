<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompteFTPRequest extends FormRequest
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
           "hote" => "required",
           "identifiant" => "required",
           "port" => "required",
           "mot_passe" => "required",
           "entreprise_id" => "required"
        ];
    }
}
