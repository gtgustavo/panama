<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Requests\Security\EmployeesRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Styde\Html\Facades\Alert;

class RegisterController extends Controller
{
    /**
     * Create a new account controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request)
    {
        $collection = Helper::convert_to_uppercase($request->all());

        $client = new User($collection->all());

        $client->password   = bcrypt($request->input('password'));

        $client->profile_id = 2;

        $client->save();

        Alert::message(trans('messages.client.account'), 'success');

        return $this->redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('auth');
    }
}
