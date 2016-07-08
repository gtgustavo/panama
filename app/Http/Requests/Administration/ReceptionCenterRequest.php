<?php

namespace App\Http\Requests\Administration;

use App\Http\Requests\Request;

class ReceptionCenterRequest extends Request
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

            'name'        => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',

            'city'        => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'postal_code' => 'digits_between:4,10|',

            'address'     => 'required|string|max:150|min:10|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\,\&\-\/ ]+$/i',

        ];
    }
}
