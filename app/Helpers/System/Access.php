<?php

namespace App\Helpers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Security\Role;
use App\Models\Security\Relations;
use Illuminate\Support\Facades\Auth;
use Styde\Html\Facades\Alert;

class Access extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function allow($role)
    {
        $exists = self::validate_role($role);

        return $exists;
    }

    public static function redirectDefault()
    {
        Alert::message(trans('messages.errors.access_denied'), 'danger');

        return redirect()->back();
    }

    private static function validate_role($role)
    {
        $profile = self::profile();

        $role_id = self::role($role);

        $data = Relations::where('role_id', $role_id)->where('profile_id', $profile)->get();

        $count = count($data);

        $validate = false;

        if($count == 1)
        {
            $validate = true;
        }

        return $validate;
    }


    private static function profile()
    {
        return Auth::user()->profile_id;
    }

    private static function role($role)
    {
        $data = Role::where('name', $role)->get();

        $count = count($data);

        $id_role = null;

        if($count > 0)
        {
            foreach($data as $data_role)
            {
                $id_role = $data_role->id;
            }
        }

        return $id_role;
    }
}
