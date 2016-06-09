<?php

namespace App\Http\Requests\System;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class ClientsRequest extends Request
{
    /**
     * @var Route
     */
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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

            'first_name' => 'required|string|max:30|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'last_name'  => 'required|string|max:30|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',

            'dni'        => 'required|digits_between:6,10|unique:users,dni,'. $this->route->getParameter('id'),

            'email'      => 'required|email|max:30|unique:users,email,'. $this->route->getParameter('id'),

            'phone_c'    => 'required|digits_between:10,15',

            'phone_h'    => 'digits_between:10,15',
        ];
    }
}
