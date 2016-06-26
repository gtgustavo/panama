<?php

namespace App\Http\Controllers\System;

use App\Models\System\ChangeStatus;
use App\Models\System\Package;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatusPackageController extends Controller
{

    public function change_status(Request $request)
    {
        $packages   = $request->input('package_id');

        $new_status = $request->input('change_status');

        foreach($packages as $package)
        {
            $register = Package::findOrFail($package);

            $status = [

                'status' => $new_status,
            ];

            $register->update($status);

            ChangeStatus::create([

                'package_id' => $package,

                'status'     => $register->status
            ]);
        }

        $message = trans('messages.package.change', ['status' => $new_status]);

        if ($request->ajax())
        {
            return $message;
        }

        return 'EL REQUEST NO ES AJAX';
    }

}
