<?php

namespace App\Http\Requests\User\Transactoin;

use Illuminate\Foundation\Http\FormRequest;

class StorePPG extends FormRequest
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
            'user_email' => 'required|email|unique:users,email',
            'user_phone' => 'required|numeric|digits_between:10,13|unique:people,phone',
            'school_origin' => 'required|string',
            'wali_id' => 'required|numeric',
            'name' => 'required|string',
            'phone' => 'required|numeric|digits_between:10,13|unique:prospects,phone',
            'email' => 'required|email|unique:prospects,email',
            'address' => 'required|string',            
            'school' => 'required|string',
            'city' => 'required|string',
        ];
    }
}
