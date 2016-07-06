<?php

namespace App\Http\Controllers\Super;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Security\ProfileRequest;
use App\Http\Requests\Security\RelationsRequest;
use App\Models\Security\Profile;
use App\Models\Security\Relations;
use App\Models\Security\Role;
use App\Models\Credentials\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Access::allow('view-profiles'))
        {
            $profiles      = Profile::with('roles')->with('users')->where('id', '!=', '3')->get();

            $cant_profiles = Profile::where('id', '!=', '3')->count();

            $roles         = Role::where('id', '>', 2)->count();

            $users         = User::where('profile_id', '!=', 3)->count();

            return view('administration.profile.index', compact('profiles', 'roles', 'users', 'cant_profiles'));
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
        if(Access::allow('create-profiles'))
        {
            return view('administration.profile.create');
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        if(Access::allow('create-profiles'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $profile = Profile::create($collection->all());

            Alert::message(trans('messages.system.profile_create', ['profile' => $profile->name]), 'success');

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Access::allow('permissions-profiles'))
        {
            $profile = Profile::findOrFail($id);

            if($id > 3) // Protection profile administration
            {
                $profile_role = Profile::findOrFail($id)->roles()->lists('role_id')->toArray();

                $roles = Role::where('id', '>', 32)->lists('display_name', 'id');

                return view('administration.profile.role', compact('profile', 'profile_role', 'roles'));
            }

            Alert::message(trans('messages.system.profile_danger', ['profile' => $profile->name]), 'danger');

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    public function assign($id, RelationsRequest $request)
    {
        if(Access::allow('permissions-profiles'))
        {
            $profile = Profile::findOrFail($id);

            if($id > 3) // Protection profile administration
            {
                Relations::where('profile_id', $id)->delete();

                $roles = $request->input('role_id');

                foreach ($roles as $role)
                {
                    Relations::create([
                        'profile_id' => $id,
                        'role_id'    => $role
                    ]);
                }

                Alert::message(trans('messages.system.profile_assign', ['profile' => $profile->name]), 'success');

                return $this->redirectDefault();
            }

            Alert::message(trans('messages.system.profile_danger', ['profile' => $profile->name]), 'danger');

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
        if(Access::allow('edit-profiles'))
        {
            $profile = Profile::findOrFail($id);

            return view('administration.profile.edit', compact('profile'));
        }

        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        if(Access::allow('edit-profiles'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $profile = Profile::findOrFail($id);

            $profile->update($collection->all());

            Alert::message(trans('messages.system.profile_update', ['profile' => $profile->name]), 'info');

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
        if(Access::allow('delete-profiles'))
        {
            $profile = Profile::findOrFail($id);

            if($id > 6) // Protection profile administration
            {
                Profile::destroy($id);

                Alert::message(trans('messages.system.profile_delete', ['profile' => $profile->name]), 'warning');

            } else {

                Alert::message(trans('messages.system.profile_danger', ['profile' => $profile->name]), 'danger');
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
        return redirect()->route('profile_home');
    }
}
