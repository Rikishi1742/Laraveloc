<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login'=>['required','string','max:60'],
            'password' => ['required','string','max:60']
        ];
    }
}
