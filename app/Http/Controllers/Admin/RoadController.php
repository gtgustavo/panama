<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\System\Access;
use App\Models\Administration\Box;
use App\Models\Administration\Country;
use App\Models\Administration\Road;
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
            $roads        = Road::all();

            $road         = Road::count();

            $box_enabled  = Box::where('status', 'ACTIVO')->count();

            $box_disabled = Box::where('status', 'OCULTO')->count();

            return view('administration.road.index', compact('roads', 'road', 'box_enabled', 'box_disabled'));
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
