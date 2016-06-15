<?php

namespace App\Http\Controllers\Administration;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Security\EmployeesRequest;
use App\Models\Administration\ReceptionCenter;
use App\Models\Credentials\People;
use App\Models\Security\Profile;
use App\Models\Security\Role;
use App\Models\Credentials\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // validate if you have permission to perform this action
        if(Access::allow('view-employees'))
        {
            //
            $employees     = User::FilterAndPaginate($request->get('search'), $request->get('type'));

            $cant_profiles = count(Profile::where('id', '!=', '2')->get());

            $roles         = count(Role::where('id', '>', 2)->get());

            $users         = count(User::where('profile_id', '!=', 2)->get());

            return view('administration.employee.index', compact('employees', 'roles', 'users', 'cant_profiles'));
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
        return Access::redirectDefault();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // validate if you have permission to perform this action
        if(Access::allow('create-employees'))
        {
            // list all user profiles by name and id
            $profile = Profile::where('id', '>', 2)->lists('name', 'id');

            // list all user reception centers by name and id
            $reception_center = ReceptionCenter::where('id', '>', 1)->lists('name', 'id');

            // return a view with lists
            return view('administration.employee.create', compact('profile', 'reception_center'));
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
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
        // validate if you have permission to perform this action
        if(Access::allow('create-employees'))
        {
            // transform all data received to capital letter
            $collection = Helper::convert_to_uppercase($request->all());

            // create record personal information
            $people = People::create($collection->all());

            // build data access credentials
            $credentials = [

                'full_name'    => $collection['first_name'] . ' ' .$collection['last_name'],

                'email'        => $collection['email'],

                'password'     => bcrypt($request->input('password')),

                'people_id'    => $people->id,

                'profile_id'   => $request->input('profile_id'),

                'reception_id' => $request->input('reception_id'),
            ];

            // create log access credentials
            $employee = User::create($credentials);

            // build message operation
            Alert::message(trans('messages.employee.create', ['employee' => $employee->full_name]), 'success');

            // back to the main page
            return $this->redirectDefault();
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
        return Access::redirectDefault();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param int $people
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $people)
    {
        // validate if you have permission to perform this action
        if(Access::allow('edit-employees'))
        {
            // list all user profiles by name and id
            $profile = Profile::where('id', '>', 2)->lists('name', 'id');

            // list all user reception centers by name and id
            $reception_center = ReceptionCenter::where('id', '>', 1)->lists('name', 'id');

            // obtain registration of user credentials
            $employee = User::findOrFail($id);

            // obtain registration of personal data
            $people = People::findOrFail($people);

            // return a view with variables
            return view('administration.employee.edit', compact('employee', 'people', 'profile', 'reception_center'));
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeesRequest $request
     * @param  int $id
     * @param int $people
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesRequest $request, $id, $people)
    {
        // validate if you have permission to perform this action
        if(Access::allow('edit-employees'))
        {
            // transform all data received to capital letter
            $collection = Helper::convert_to_uppercase($request->all());

            // obtain registration of user credentials
            $employee = User::findOrFail($id);

            // obtain registration of personal data
            $people = People::findOrFail($people);

            // update give you personal
            $people->update($collection->all());

            // build data access credentials
            if($id == 1) // Super Admin
            {
                $credentials = [

                    'full_name'    => $collection['first_name'] . ' ' .$collection['last_name'],

                    'email'        => $collection['email'],

                    'password'     => bcrypt($request->input('password')),
                ];

            } else { // other users

                $credentials = [

                    'full_name'    => $collection['first_name'] . ' ' .$collection['last_name'],

                    'email'        => $collection['email'],

                    'password'     => bcrypt($request->input('password')),

                    'profile_id'   => $request->input('profile_id'),

                    'reception_id' => $request->input('reception_id'),
                ];
            }

            // update access credentials
            $employee->update($credentials);

            // build message operation
            Alert::message(trans('messages.employee.update', ['employee' => $employee->full_name]), 'info');

            // back to the main page
            return $this->redirectDefault();
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
        return Access::redirectDefault();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // validate if you have permission to perform this action
        if(Access::allow('delete-employees'))
        {
            // obtain registration of user credentials
            $employee = User::findOrFail($id);

            if($id != 1) // Protection User administration
            {
                // delete record
                User::destroy($id);

                // build message operation
                Alert::message(trans('messages.employee.delete', ['employee' => $employee->full_name]), 'warning');

            } else { // Operation invalid

                // build message operation invalid
                Alert::message(trans('messages.employee.danger', ['employee' => $employee->full_name]), 'danger');
            }

            // back to the main page
            return $this->redirectDefault();
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
        return Access::redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        // redirect to a home page after completing an operation
        return redirect()->route('employee_home');
    }
}
