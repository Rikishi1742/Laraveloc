<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname'=>['string','max:255'],
            'description'=>['required','string','max:500'],
            'category_id'=>['required','integer','exists:categories,id'],
            'photo'=>['required','image','mimes:jpg,jpeg,png,bmp']
        ];
    }
}
