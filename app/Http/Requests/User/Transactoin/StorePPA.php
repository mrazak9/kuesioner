<?php

namespace App\Http\Requests\User\Transactoin;

use Illuminate\Foundation\Http\FormRequest;

class StorePPA extends FormRequest
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
            'user_name' => 'required|string',
            'nim' => 'required|numeric|digits_between:7,10|unique:people,nim',
            'prodi_asal' => 'required|string',
            'year' => 'required|numeric|digits:4',
            'user_email' => 'required|email|unique:users,email',
            'user_phone' => 'required|numeric|digits_between:10,13|unique:people,phone',
            'name' => 'required|string',
            'email' => 'required|email|unique:prospects,email',
            'phone' => 'required|numeric|digits_between:10,13|unique:prospects,phone',
            'city' => 'required|string',
            'school' => 'required|string',
            'address' => 'required|string',            
        ];
    }
}
