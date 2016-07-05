<?php

namespace App\Http\Requests\System;

use App\Http\Requests\Request;

class ConsigningRequest extends Request
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

            'name'            => 'required|string|max:30|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'phone'           => 'required|digits_between:10,15',

            'city'            => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'postal_code'     => 'max:10|min:4|regex:/^[a-zA-Z0-9\-]+$/i',

            'address'         => 'required|string|max:150|min:10|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\,\&\-\/ ]+$/i',

            'reference_point' => 'required|string|max:50|min:10|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\,\&\-\/ ]+$/i',

        ];
    }
}
