<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminPerusahaanRequest extends FormRequest
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
 
    public function rules()
    {
        return [
            'logo'     => 'required|image:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'logo.required'         => 'Logo wajib diisi.',
            'logo.image'            => 'Logo tidak valid.',
        ];
    }
}
