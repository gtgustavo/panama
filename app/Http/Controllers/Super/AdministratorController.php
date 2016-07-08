<?php

namespace App\Http\Controllers\Super;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Security\EmployeesRequest;
use App\Models\Administration\Country;
use App\Models\Administration\ReceptionCenter;
use App\Models\Credentials\People;
use App\Models\Credentials\User;
use App\Models\Security\Profile;
use App\Models\Security\Role;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Styde\Html\Facades\Alert;

class AdministratorController extends Controller
{
    private $country;

    private $isEmployee;

    private $profile;

    private $reception_center;

    public function __construct()
    {
        // Get Country
        $this->country = Country::all();

        // list all user reception centers by name and id
        $this->reception_center = ReceptionCenter::getList();

        //view profiles and reception centers
        $this->isEmployee = true;

        // list all user profiles by name and id
        $this->profile = Profile::administrator();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Access::allow('view-administrator'))
        {
            $employees     = User::FilterAndPaginateAdministrator();

            $cant_profiles = Profile::where('id', '!=', 3)->count();

            $roles         = Role::where('id', '>', 2)->count();

            $users         = User::where('profile_id', '!=', 3)->count();

            $user_admin    = User::where('profile_id', 2)->count();

            return view('administration.admin.index', compact('employees', 'roles', 'users', 'cant_profiles', 'user_admin'));
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
            // return the form view with lists
            return view('administration.admin.create')->with(['country' => $this->country, 'isEmployee' => $this->isEmployee, 'profile' => $this->profile, 'reception_center' => $this->reception_center]);
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

            // generate random password
            $password = Helper::generate_random_password(15);

            // build data access credentials
            $credentials = [

                'email'        => $collection['email'],

                'people_id'    => $people->id,

                'profile_id'   => $request->input('profile_id'),

                'reception_id' => $request->input('reception_id'),
            ];

            // create log access credentials
            $employee = User::create($credentials);

            // send email to the customer with your credentials
            $this->send_mail($people->full_name, $employee->email, $password);

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
            // obtain registration of user credentials
            $employee = User::findOrFail($id);

            // obtain registration of personal data
            $people = People::findOrFail($people);

            // return the form view with variables
            return view('administration.admin.edit', compact('employee', 'people'))->with(['country' => $this->country, 'isEmployee' => $this->isEmployee, 'profile' => $this->profile, 'reception_center' => $this->reception_center]);
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

                'reception_id' => $request->input('reception_id'),
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
        return redirect()->route('administrator_home');
    }
}
