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
        $packages = $request->input('package_id');


        foreach($packages as $package)
        {
            $register = Package::findOrFail($package);

            $status = [

                'status' => 'ENVIADO A CENTRO DE EMBARQUE',
            ];

            $register->update($status);

            ChangeStatus::create([

                'package_id' => $package,

                'status'     => $register->status
            ]);

            $message = 'CAMBIO EXITOSO';

            if ($request->ajax()) {

                return $message;

            }
        }



    }

}
