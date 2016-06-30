<?php

namespace App\Http\Controllers\System\Package;

use App\Models\System\ChangeStatus;
use App\Models\System\Package;
use App\Models\System\Shipment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatusPackageController extends Controller
{
    public function status(Request $request)
    {
        $packages   = $request->input('package_id');

        $new_status = $request->input('change_status');

        switch ($new_status)
        {
            case 'EMBARCADO':

                $shipment = Shipment::where('status', 'ABIERTO')->get();

                $cant = count($shipment);

                if($cant > 0)
                {

                    foreach($shipment as $data)
                    {
                        $id_s = $data->id;
                    }

                    foreach($packages as $package)
                    {
                        $register = Package::findOrFail($package);

                        $status = [

                            'status' => $new_status,

                            'shipment_id' => $id_s,

                        ];

                        $register->update($status);

                        ChangeStatus::create([

                            'package_id' => $package,

                            'status'     => $register->status
                        ]);
                    }

                    $message = trans('messages.package.change', ['status' => $new_status]);

                } else {

                    $message = "Debe crear una guía de embarque";
                }

                break;

            default:

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
        }


        if ($request->ajax())
        {
            return $message;
        }

        return 'EL REQUEST NO ES AJAX';
    }

}
