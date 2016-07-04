<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\System\Access;
use App\Models\Administration\Country;
use App\Models\Administration\Road;
use App\Models\Credentials\User;
use App\Models\Security\Profile;
use App\Models\Security\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class RoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Access::allow('view-road'))
        {
            $roads = Road::all();

            $cant_profiles = count(Profile::where('id', '!=', '3')->get());

            $roles         = count(Role::where('id', '>', 2)->get());

            $users         = count(User::where('profile_id', '!=', 3)->get());

            return view('administration.road.index', compact('roads', 'roles', 'users', 'cant_profiles'));
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
        if(Access::allow('create-road'))
        {
            $country = Country::lists('name', 'id');

            return view('administration.road.create', compact('country'));
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Access::allow('create-road'))
        {
            $road = Road::create($request->all());

            Alert::message(trans('messages.road.create', ['road' => $road->road]), 'success');

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
        if(Access::allow('edit-road'))
        {
            $road = Road::findOrFail($id);

            $country = Country::lists('name', 'id');

            return view('administration.road.edit', compact('country', 'road'));
        }

        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Access::allow('edit-road'))
        {
            $road = Road::findOrFail($id);

            $road->update($request->all());

            Alert::message(trans('messages.road.update', ['road' => $road->road]), 'info');

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
        if(Access::allow('delete-road'))
        {
            $road = Road::findOrFail($id);

            Road::destroy($id);

            Alert::message(trans('messages.road.delete', ['road' => $road->road]), 'warning');

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('road_home');
    }
}
