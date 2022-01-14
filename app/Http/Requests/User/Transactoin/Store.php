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
        return Auth::check();
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
            'email' => 'required|email|unique:prospects,email',
            'phone' => 'required|numeric|digits_between:10,13|unique:prospects,phone',
            'city' => 'required|string',
            'school' => 'required|string',
            'address' => 'required|string',            
        ];
    }
}
