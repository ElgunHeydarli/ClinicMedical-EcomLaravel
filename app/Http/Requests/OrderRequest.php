<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'product_id' => 'integer',   
            'name'    => 'required|string|max:100', 
            'surname' => 'required|string|max:100',   
            'email'   => 'required|string|max:200',   
            'tel'   => 'required|string|max:30',   
            'city'   => 'required|string|max:100',   
            'address'   => 'required|string|max:250',   
            'address_2'   => 'string|max:250',   
            'payment_method'   => 'required|string|max:100',
            'status' => 'integer'     
        ];
    }
}
