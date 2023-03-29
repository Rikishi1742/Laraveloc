<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

           'fio'=>['required','string','max:120'],
           'login' => ['required','string','max:60'],
           'email'=>['required','email','max:60'],
           'password' => ['required','string','confirmed', 'max:60'],
           'password_confirmation' => ['required','string','max:60'],
           'agreement' => ['required']
        
        ];
    }
}
