<?php

namespace App\Http\Controllers\Administration;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Security\EmployeesRequest;
use App\Models\Security\Profile;
use App\Models\Security\Role;
use App\Models\User;
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
        if(Access::allow('view-employees'))
        {
            $employees     = User::FilterAndPaginate($request->get('search'), $request->get('type'));

            $cant_profiles = count(Profile::where('id', '!=', '2')->get());

            $roles         = count(Role::where('id', '>', 2)->get());

            $users         = count(User::where('profile_id', '!=', 2)->get());

            return view('administration.employee.index', compact('employees', 'roles', 'users', 'cant_profiles'));
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
        if(Access::allow('create-employees'))
        {
            $profile = Profile::where('id', '>', 2)->lists('name', 'id');

            return view('administration.employee.create', compact('profile'));
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
        if(Access::allow('create-employees'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $employee = new User($collection->all());

            $employee->password = bcrypt($request->input('password'));

            $employee->save();

            Alert::message(trans('messages.employee.create', ['employee' => $employee->full_name]), 'success');

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Access::allow('edit-employees'))
        {
            $profile = Profile::where('id', '>', 2)->lists('name', 'id');

            $employee = User::findOrFail($id);

            return view('administration.employee.edit', compact('employee', 'profile'));
        }

        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeesRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesRequest $request, $id)
    {
        if(Access::allow('edit-employees'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $employee = User::findOrFail($id);

            $employee->update($collection->all());

            $employee->password = bcrypt($request->input('password'));

            $employee->save();

            Alert::message(trans('messages.employee.update', ['employee' => $employee->full_name]), 'info');

            return $this->redirectDefault();
        }

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
        if(Access::allow('delete-employees'))
        {
            $employee = User::findOrFail($id);

            if($id != 1) // Protection User administration
            {
                User::destroy($id);

                Alert::message(trans('messages.employee.delete', ['employee' => $employee->full_name]), 'warning');

            } else {

                Alert::message(trans('messages.employee.danger', ['employee' => $employee->full_name]), 'danger');
            }

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('employee_home');
    }
}
