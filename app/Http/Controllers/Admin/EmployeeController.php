<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Security\EmployeesRequest;
use App\Models\Administration\Country;
use App\Models\Administration\ReceptionCenter;
use App\Models\Credentials\People;
use App\Models\Security\Profile;
use App\Models\Security\Role;
use App\Models\Credentials\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Styde\Html\Facades\Alert;

class EmployeeController extends Controller
{
    private $country;

    private $isEmployee;

    private $profile;

    private $reception_center;

    public function __construct()
    {
        // Is Super Admin
        if(Auth::user()->profile_id == 1)
        {
            // Get Country
            $this->country = Country::all();

            // list all user reception centers by name and id
            $this->reception_center = ReceptionCenter::getList();

        } else {

            // Get Country
            $this->country = Country::singleCountry(Auth::user()->myCountry());

            // list all user reception centers by name and id
            $this->reception_center = ReceptionCenter::receptions(Auth::user()->myCountry());
        }

        //view profiles and reception centers
        $this->isEmployee = true;

        // list all user profiles by name and id
        $this->profile = Profile::employee();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // validate if you have permission to perform this action
        if(Access::allow('view-employees'))
        {
            //
            $employees     = User::FilterAndPaginate(Auth::user()->reception_id, Auth::user()->profile_id);

            $cant_profiles = Profile::where('id', '!=', 3)->count();

            $roles         = Role::where('id', '>', 2)->count();

            $users         = User::where('profile_id', '!=', 3)->count();

            $user_admin    = User::where('profile_id', 2)->count();

            return view('administration.employee.index', compact('employees', 'roles', 'users', 'cant_profiles', 'user_admin'));
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
            // return the form view with lists
            return view('administration.employee.create')->with(['country' => $this->country, 'isEmployee' => $this->isEmployee, 'profile' => $this->profile, 'reception_center' => $this->reception_center]);
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

            // generate random password
            $password = Helper::generate_random_password(15);

            // build data access credentials
            $credentials = [

                'email'        => $collection['email'],

                'password'     => bcrypt($password),

                'people_id'    => $people->id,

                'profile_id'   => $request->input('profile_id'),

                'reception_id' => $request->input('reception_id'),
            ];

            // create log access credentials
            $employee = User::create($credentials);

            // send email to the customer with your credentials
            $this->send_mail($people->full_name, $employee->email, $password);

            // build message operation
            Alert::message(trans('messages.employee.create', ['employee' => $people->full_name]), 'success');

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
            // obtain registration of user credentials
            $employee = User::findOrFail($id);

            // obtain registration of personal data
            $people = People::findOrFail($people);

            // return the form view with variables
            return view('administration.employee.edit', compact('employee', 'people'))->with(['country' => $this->country, 'isEmployee' => $this->isEmployee, 'profile' => $this->profile, 'reception_center' => $this->reception_center]);
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
            if($employee->profile_id < 3) // Super Admin, Admin, Client
            {
                $credentials = [

                    'email'        => $collection['email'],

                    'reception_id' => $request->input('reception_id'),
                ];

            } else { // other users

                $credentials = [

                    'email'        => $collection['email'],

                    'profile_id'   => $request->input('profile_id'),

                    'reception_id' => $request->input('reception_id'),
                ];
            }

            // update access credentials
            $employee->update($credentials);

            // build message operation
            Alert::message(trans('messages.employee.update', ['employee' => $people->full_name]), 'info');

            // back to the main page
            return $this->redirectDefault();
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
        return Access::redirectDefault();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param  int $people
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $people)
    {
        // validate if you have permission to perform this action
        if(Access::allow('delete-employees'))
        {
            // obtain registration of user credentials
            $employee = User::findOrFail($id);

            // Get name people
            $name = $employee->people->full_name;

            if($employee->profile_id > 3) // Protection User administration
            {
                // delete record
                People::destroy($people);

                // build message operation
                Alert::message(trans('messages.employee.delete', ['employee' => $name]), 'warning');

            } else { // Operation invalid

                // build message operation invalid
                Alert::message(trans('messages.employee.danger', ['employee' => $name]), 'danger');
            }

            // back to the main page
            return $this->redirectDefault();
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
        return Access::redirectDefault();
    }

    /**
     * send mail to client
     * @param string $name
     * @param string $email
     * @param string $password
     */
    private function send_mail($name, $email, $password)
    {
        Mail::send('emails.credentials', compact('name', 'email', 'password'), function ($message) use ($email) {

            $message->to($email)->subject(trans('front.email.subject_credentials'));

        });
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
