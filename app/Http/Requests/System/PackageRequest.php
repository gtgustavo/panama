<?php

namespace App\Http\Requests\System;

use App\Http\Requests\Request;

class PackageRequest extends Request
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

            'dni'           => 'required|digits_between:6,10',

            'consigning_id' => 'required',

            'type'          => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/i',

            'cost'          => 'required|numeric|between:0,999999.99',

            'note'          => 'required|string|max:150|min:10|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/i',

        ];
    }
}
