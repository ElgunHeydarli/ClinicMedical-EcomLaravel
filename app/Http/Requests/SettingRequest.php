<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'lang'        =>  'integer',
            'title'       => 'string|max:60',
            'description' => 'string|max:160',
            'site_title'       => 'string|max:60',
            'site_description' => 'string|max:160',
            'contact_title'       => 'string|max:60',
            'contact_description' => 'string|max:160',
            'about_img'   => 'image|mimes:jpeg,png,jpg|max:2048',
            'about_title' => 'string|max:100',
            'address'     => 'string|max:100',
            'tel'         => 'string|max:100',
            'email'       => 'email|max:100',
            'facebook'    => 'url|max:255',
            'instagram'   => 'url|max:255',
            'youtube'     => 'url|max:255',
            'favicon'     => 'image|mimes:jpeg,png,jpg|max:1072',
            'logo'        => 'image|mimes:jpeg,png,jpg|max:1072',
            'robots_txt'  => 'file|mimes:txt'
        ];
    }
}
