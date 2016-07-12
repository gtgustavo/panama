<?php

namespace App\Http\Controllers\System\Package;

use App\Models\System\ChangeStatus;
use App\Models\System\Package;
use App\Models\System\Shipment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatusPackageController extends Controller
{
    public function status(Request $request)
    {
        $profile = Auth::user()->profile_id;

        $packages   = $request->input('package_id');

        $new_status = $request->input('change_status');

        switch ($profile)
        {
            case 4:

                $message = $this->reception_center($packages, $new_status);

                break;

            case 5:

                $message = $this->reception_shipment($packages, $new_status);

                break;

            case 6:

                $message = $this->reception_received($packages, $new_status);

                break;

            default:

                $message = $this->admin($packages, $new_status);

        }

        if ($request->ajax())
        {
            echo $message;
        }
    }

    // Status employee reception center
    private function reception_center($data_package, $data_status)
    {
        foreach($data_package as $package)
        {
            $register = Package::findOrFail($package);

            if($data_status == 'ANULADO')
            {
                if($register->status == 'PRECHEQUEADO' || $register->status == 'ENTREGADO EN CENTRO')
                {
                    $this->new_status($register->id, $data_status);
                }
            }
            elseif($data_status == 'ENVIADO A CENTRO DE EMBARQUE')
            {
                if($register->status == 'ENTREGADO EN CENTRO')
                {
                    $this->new_status($register->id, $data_status);
                }
            }
            elseif($data_status == 'ENTREGADO')
            {
                if($register->status == 'RECIBIDO EN CENTRO PAÍS DESTINO')
                {
                    $this->new_status($register->id, $data_status);
                }
            }
        }

        $message = trans('messages.package.change', ['status' => $data_status]);

        return $message;
    }

    // Status employee reception shipment
    private function reception_shipment($data_package, $data_status)
    {
        $shipment = Shipment::where('status', 'ABIERTO')->first();

        if(count($shipment) > 0)
        {
            foreach($data_package as $package)
            {
                $register = Package::findOrFail($package);

                if($data_status == 'RECIBIDO EN CENTRO DE EMBARQUE')
                {
                    if($register->status == 'ENVIADO A CENTRO DE EMBARQUE')
                    {
                        $this->new_status($register->id, $data_status);
                    }
                }
                elseif($data_status == 'EMBARCADO')
                {
                    if($register->status == 'RECIBIDO EN CENTRO DE EMBARQUE')
                    {
                        $this->new_status_shipment($register->id, $data_status, $shipment->id);
                    }
                }
            }

            $message = trans('messages.package.change', ['status' => $data_status]);

        } else {

            $message = "Debe crear una guía de embarque";
        }

        return $message;
    }

    // Status employee reception received
    private function reception_received($data_package, $data_status)
    {
        $message = 'test received';

        return $message;
    }


    private function admin($data_package, $data_status)
    {
        $packages   = $data_package;

        $new_status = $data_status;

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

        return $message;
    }


    // Register new status of package
    private function new_status($package, $data_status)
    {
        $register = Package::findOrFail($package);

        $status = [

            'status' => $data_status,
        ];

        $register->update($status);

        ChangeStatus::create([

            'package_id' => $package,

            'status'     => $register->status
        ]);
    }

    private function new_status_shipment($package, $data_status, $shipment)
    {
        $register = Package::findOrFail($package);

        $status = [

            'status'      => $data_status,

            'shipment_id' => $shipment,

        ];

        $register->update($status);

        ChangeStatus::create([

            'package_id' => $package,

            'status'     => $register->status
        ]);
    }
}
