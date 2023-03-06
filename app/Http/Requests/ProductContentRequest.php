<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductContentRequest extends FormRequest
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
            'lang'   => 'integer',
            'title'  => 'required|string|max:255',
          //  'price'  => 'required|integer',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:200',
            'sort'   => 'required|integer'
        ];
    }
}
