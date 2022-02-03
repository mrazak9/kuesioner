<?php

namespace App\Http\Requests\User\Transactoin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Store extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required|numeric|digits_between:10,13|unique:prospects,phone',
            'email' => 'required|email|unique:prospects,email',
            'address' => 'required|string',            
            'school' => 'required|string',
            'city' => 'required|string',
        ];
    }
}
