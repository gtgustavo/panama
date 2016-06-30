<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Administration\ReceptionCenterRequest;
use App\Models\Administration\ReceptionCenter;
use App\Models\Security\Profile;
use App\Models\Security\Role;
use App\Models\Credentials\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class ReceptionCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Access::allow('view-reception-center'))
        {
            $reception_center = ReceptionCenter::all();

            $cant_profiles    = count(Profile::where('id', '!=', '3')->get());

            $roles            = count(Role::where('id', '>', 2)->get());

            $users            = count(User::where('profile_id', '!=', 3)->get());

            return view('administration.reception_center.index', compact('reception_center', 'roles', 'users', 'cant_profiles'));
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
        if(Access::allow('create-reception-center'))
        {
            return view('administration.reception_center.create');
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReceptionCenterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceptionCenterRequest $request)
    {
        if(Access::allow('create-reception-center'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $reception = ReceptionCenter::create($collection->all());

            Alert::message(trans('messages.reception_center.create', ['center' => $reception->name]), 'success');

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
        if(Access::allow('edit-reception-center'))
        {
            $reception_center = ReceptionCenter::findOrFail($id);

            return view('administration.reception_center.edit', compact('reception_center'));
        }

        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReceptionCenterRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReceptionCenterRequest $request, $id)
    {
        if(Access::allow('edit-reception-center'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $reception  = ReceptionCenter::findOrFail($id);

            $reception->update($collection->all());

            Alert::message(trans('messages.reception_center.update', ['center' => $reception->name]), 'info');

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
        if(Access::allow('delete-reception-center'))
        {
            $reception = ReceptionCenter::findOrFail($id);

            if($id != 1)
            {
                ReceptionCenter::destroy($id);

                Alert::message(trans('messages.reception_center.delete', ['center' => $reception->name]), 'warning');

            } else {

                Alert::message(trans('messages.reception_center.danger', ['center' => $reception->name]), 'danger');
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
        return redirect()->route('reception_center_home');
    }
}
