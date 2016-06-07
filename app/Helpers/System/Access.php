<?php

namespace App\Helpers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Security\Permission;
use App\Models\Security\Relations;
use Illuminate\Support\Facades\Auth;
use Styde\Html\Facades\Alert;

class Access extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function allow($permission)
    {
        $exists = self::validate_permission($permission);

        return $exists;
    }

    public static function redirectDefault()
    {
        Alert::message(trans('messages.errors.access_denied'), 'danger');

        return redirect()->back();
    }

    private static function validate_permission($permission)
    {
        $role = self::role();

        $permission_id = self::permission($permission);

        $data = Relations::where('permission_id', $permission_id)->where('role_id', $role)->get();

        $count = count($data);

        $validate = false;

        if($count == 1)
        {
            $validate = true;
        }

        return $validate;
    }


    private static function role()
    {
        return Auth::user()->role_id;
    }

    private static function permission($permission)
    {
        $data = Permission::where('name', $permission)->get();

        $count = count($data);

        $id_permission = null;

        if($count > 0)
        {
            foreach($data as $permission_role)
            {
                $id_permission = $permission_role->id;
            }
        }

        return $id_permission;
    }
}
