<?php

namespace App\Http\Controllers\System;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\System\ClientsRequest;
use App\Models\Credentials\People;
use App\Models\Credentials\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Styde\Html\Facades\Alert;

class ClientController extends Controller
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
        if(Access::allow('view-client'))
        {
            $clients      = User::FilterAndPaginateClient($request->get('search'), $request->get('type'));

            $cant_clients = count(User::where('profile_id', 2)->get());

            return view('system.client.index', compact('clients', 'cant_clients'));
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
        if(Access::allow('create-client'))
        {
            // return the form view
            return view('system.client.create');
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsRequest $request)
    {
        // validate if you have permission to perform this action
        if(Access::allow('create-client'))
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

                'profile_id'   => 2,

                'reception_id' => Auth::user()->reception_id,
            ];

            // create log access credentials
            $client = User::create($credentials);

            // send email to the customer with your credentials
            $this->send_mail($people->full_name, $client->email, $password);

            // build message operation
            Alert::message(trans('messages.client.create', ['client' => $client->people->full_name]), 'success');

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
        if(Access::allow('edit-client'))
        {
            // obtain registration of user credentials
            $client = User::findOrFail($id);

            // obtain registration of personal data
            $people = People::findOrFail($people);

            // return the form view with variables
            return view('system.client.edit', compact('client', 'people'));
        }

        // if you do not have permission to perform this option, we return to the previous page with a default message
        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientsRequest $request
     * @param  int $id
     * @param  int $people
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsRequest $request, $id, $people)
    {
        // validate if you have permission to perform this action
        if(Access::allow('edit-client'))
        {
            // transform all data received to capital letter
            $collection = Helper::convert_to_uppercase($request->all());

            // obtain registration of user credentials
            $client = User::findOrFail($id);

            // obtain registration of personal data
            $people = People::findOrFail($people);

            // update give you personal
            $people->update($collection->all());

            // build data access credentials
            $credentials = [

                'email'     => $collection['email'],
            ];

            // update access credentials
            $client->update($credentials);

            // build message operation
            Alert::message(trans('messages.client.update', ['client' => $client->people->full_name]), 'info');

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
        if(Access::allow('delete-client'))
        {
            // obtain registration of user credentials
            $client = User::findOrFail($id);

            // Get name people
            $name = $client->people->full_name;

            // delete record
            People::destroy($people);

            // build message operation
            Alert::message(trans('messages.client.delete', ['client' => $name]), 'warning');

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
        return redirect()->route('client_home');
    }
}
