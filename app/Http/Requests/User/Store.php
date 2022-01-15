<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits_between:10,13|unique:people,phone',
            'nim' => 'required|numeric|digits_between:7,10|unique:people,nim',
            'prodi_asal' => 'required|string',
            'year' => 'required|numeric|digits:4',
            'occupation' => 'required|string',
        ];
    }
}
