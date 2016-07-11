<?php

namespace App\Http\Requests\Administration;

use App\Http\Requests\Request;

class BoxRequest extends Request
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

            'box'              => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',

            'dimensions'       => 'required|string|max:20|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',

            'maximum_poundage' => 'numeric|between:0,999999.99',

            'cost_extra_pound' => 'numeric|between:0,999999.99',

            'cost_standard'    => 'required|numeric|between:0,999999.99',

            'cost_express'     => 'numeric|between:0,999999.99'

        ];
    }
}
