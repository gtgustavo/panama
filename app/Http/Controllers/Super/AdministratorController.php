<?php

namespace App\Http\Controllers\Super;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Security\EmployeesRequest;
use App\Models\Administration\ReceptionCenter;
use App\Models\Credentials\People;
use App\Models\Credentials\User;
use App\Models\Security\Profile;
use App\Models\Security\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Access::allow('view-administrator'))
        {
            $employees     = User::FilterAndPaginateAdministrator($request->get('search'), $request->get('type'));

            $cant_profiles = count(Profile::where('id', '!=', '3')->get());

            $roles         = count(Role::where('id', '>', 2)->get());

            $users         = count(User::where('profile_id', '!=', 3)->get());

            return view('administration.admin.index', compact('employees', 'roles', 'users', 'cant_profiles'));
        }

        return Access::redirectDefault();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Access::allow('create-administrator'))
        {
            // list all user profiles by name and id
            $profile = Profile::where('id', 2)->lists('name', 'id');

            // list all user reception centers by name and id
            $reception_center = ReceptionCenter::where('id', '>', 1)->lists('name', 'id');

            // return the form view with lists
            return view('administration.admin.create', compact('profile', 'reception_center'));
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request)
    {
        if(Access::allow('create-administrator'))
        {
            // transform all data received to capital letter
            $collection = Helper::convert_to_uppercase($request->all());

            // create record personal information
            $people = People::create($collection->all());

            // build data access credentials
            $credentials = [

                'email'        => $collection['email'],

                'password'     => bcrypt($request->input('password')),

                'people_id'    => $people->id,

                'profile_id'   => $request->input('profile_id'),

                'reception_id' => $request->input('reception_id'),
            ];

            // create log access credentials
            $employee = User::create($credentials);

            // build message operation
            Alert::message(trans('messages.administrator.create', ['employee' => $people->full_name]), 'success');

            // back to the main page
            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param $people
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $people)
    {
        if(Access::allow('edit-administrator'))
        {
            // list all user profiles by name and id
            $profile = Profile::where('id', 2)->lists('name', 'id');

            // list all user reception centers by name and id
            $reception_center = ReceptionCenter::where('id', '>', 1)->lists('name', 'id');

            // obtain registration of user credentials
            $employee = User::findOrFail($id);

            // obtain registration of personal data
            $people = People::findOrFail($people);

            // return the form view with variables
            return view('administration.admin.edit', compact('employee', 'people', 'profile', 'reception_center'));
        }

        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeesRequest $request
     * @param  int $id
     * @param $people
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesRequest $request, $id, $people)
    {
        if(Access::allow('edit-administrator'))
        {
            // transform all data received to capital letter
            $collection = Helper::convert_to_uppercase($request->all());

            // obtain registration of user credentials
            $employee = User::findOrFail($id);

            // obtain registration of personal data
            $people = People::findOrFail($people);

            // update give you personal
            $people->update($collection->all());

            $credentials = [

                'email'        => $collection['email'],

                'password'     => bcrypt($request->input('password')),
            ];

            // update access credentials
            $employee->update($credentials);

            // build message operation
            Alert::message(trans('messages.administrator.update', ['employee' => $people->full_name]), 'info');

            // back to the main page
            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param $people
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $people)
    {
        if(Access::allow('delete-administrator'))
        {
            // obtain registration of user credentials
            $employee = User::findOrFail($id);

            // Get name people
            $name = $employee->people->full_name;

            if($id != 1) // Protection User administration
            {
                // delete record
                People::destroy($people);

                // build message operation
                Alert::message(trans('messages.administrator.delete', ['employee' => $name]), 'warning');

            } else { // Operation invalid

                // build message operation invalid
                Alert::message(trans('messages.administrator.danger', ['employee' => $name]), 'danger');
            }

            // back to the main page
            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('administrator_home');
    }
}
