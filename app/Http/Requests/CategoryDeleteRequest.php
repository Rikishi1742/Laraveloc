<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     *
     */
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id']
        ];
    }
}
