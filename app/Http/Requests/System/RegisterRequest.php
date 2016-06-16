<?php

namespace App\Http\Requests\System;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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

            'first_name'  => 'required|string|max:30|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'last_name'   => 'required|string|max:30|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'dni'         => 'required|string|max:15|min:6|regex:/^[a-zA-Z0-9\-]+$/i|unique:people,dni',

            'email'       => 'required|email|max:30|unique:user,email',

            'phone_c'     => 'required|digits_between:10,15',

            'phone_h'     => 'digits_between:10,15',

            'password'    => 'required|confirmed|min:8',

            'country'     => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'province'    => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'city'        => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'postal_code' => 'max:10|min:4|regex:/^[a-zA-Z0-9\-]+$/i',

            'address'     => 'required|string|max:150|min:10|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\,\&\-\/ ]+$/i',
        ];
    }
}
