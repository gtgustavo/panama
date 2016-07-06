<?php

namespace App\Http\Controllers\System\Panel;

use App\Helpers\Helper;
use App\Http\Requests\Panel\PasswordRequest;
use App\Http\Requests\Security\EmployeesRequest;
use App\Http\Requests\System\ClientsRequest;
use App\Models\Administration\Country;
use App\Models\Credentials\People;
use App\Models\Credentials\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Styde\Html\Facades\Alert;

class AccountController extends Controller
{
    private $user;

    private $people;

    public function __construct()
    {
        $this->user   = User::findOrFail(Auth::user()->id);

        $this->people = People::findOrFail(Auth::user()->people_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view profiles and reception centers
        $isEmployee = false;

        // List of country
        $country = Country::all();

        return view('panel.index', compact('isEmployee', 'country'))->with('user', $this->user)->with('people', $this->people);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PasswordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PasswordRequest $request)
    {
        $data = [
            'password' => bcrypt($request->input('password')),
        ];

        $this->user->update($data);

        Alert::message(trans('messages.panel.password'), 'success');

        return $this->redirectDefault();
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //view profiles and reception centers
        $isEmployee = false;

        // List of country
        $country = Country::all();

        return view('panel.personal', compact('isEmployee', 'country'))->with('user', $this->user)->with('people', $this->people);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeesRequest $request
     * @param $id
     * @param $people
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesRequest $request, $id, $people)
    {
        $collection = Helper::convert_to_uppercase($request->all());

        $this->people->update($collection->all());

        $credentials = [
            'email' => $collection['email'],
        ];

        $this->user->update($credentials);

        // build message operation
        Alert::message(trans('messages.panel.personal'), 'success');

        // back to the main page
        return $this->redirectDefault();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('panel.image');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function file()
    {
        $file = Input::file('file');

        $image = Image::make($file);

        $path = 'assets/img/avatars/';

        $image->resize(165,165);

        $image->save($path.$this->user->id.'.jpg');

        Alert::message(trans('messages.panel.image'), 'success');

        $data = [
            'file' => 'true',
        ];

        $this->user->update($data);

        return $this->redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        // redirect to a home page after completing an operation
        return redirect()->route('panel_home');
    }
}
