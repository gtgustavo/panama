<?php

namespace App\Http\Controllers\System;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\System\ClientsRequest;
use App\Models\Credentials\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        if(Access::allow('view-client'))
        {
            $clients      = User::FilterAndPaginateClient($request->get('search'), $request->get('type'));

            $cant_clients = count(User::where('profile_id', 2)->get());

            return view('system.client.index', compact('clients', 'cant_clients'));
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
        if(Access::allow('create-client'))
        {
            return view('system.client.create');
        }

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
        if(Access::allow('create-client'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $client = new User($collection->all());

            $client->profile_id = 2;

            $client->save();

            Alert::message(trans('messages.client.create', ['client' => $client->full_name]), 'success');

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
        if(Access::allow('edit-client'))
        {
            $client = User::findOrFail($id);

            return view('system.client.edit', compact('client'));
        }

        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientsRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsRequest $request, $id)
    {
        if(Access::allow('edit-client'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $client = User::findOrFail($id);

            $client->update($collection->all());

            Alert::message(trans('messages.client.update', ['client' => $client->full_name]), 'info');

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
        if(Access::allow('delete-client'))
        {
            $client = User::findOrFail($id);

            User::destroy($id);

            Alert::message(trans('messages.client.delete', ['client' => $client->full_name]), 'warning');

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('client_home');
    }
}
