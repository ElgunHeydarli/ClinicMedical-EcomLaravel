<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'title'  => 'required|string|max:200',
            'content_title_1'  => 'required|string|max:255',
            'content_image_1'  => 'image|mimes:jpg,jpeg,png|max:300',
            'content_title_2'  => 'required|string|max:255',
            'content_image_2'  => 'image|mimes:jpg,jpeg,png|max:300',
            'sort'    => 'required|integer'
        ];
    }
}
