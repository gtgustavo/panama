<?php

namespace App\Http\Requests\Security;

use App\Http\Requests\Request;

class ProfileRequest extends Request
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

            'name'        => 'required|string|max:30|min:5|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'description' => 'required|string|max:100|min:10|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

        ];
    }
}
