<?php

namespace App\Http\Controllers\System\Package;

use App\Helpers\Package\Package as PackageHelper;
use App\Helpers\System\Access;
use App\Http\Requests\System\ShipmentRequest;
use App\Models\Credentials\User;
use App\Models\Support\Support;
use App\Models\System\ChangeStatus;
use App\Models\System\Package;
use App\Models\System\Shipment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Styde\Html\Facades\Alert;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Access::allow('view-shipment'))
        {
            $shipments = Shipment::with('packages')->get();

            $cant_clients = User::where('profile_id', 3)->count();

            $pending      = Support::where('status', 'PENDIENTE')->count();

            $wb_open      = Shipment::where('status', 'ABIERTO')->count();

            $wb_close     = Shipment::where('status', 'CERRADO')->count();

            return view('system.shipment.index', compact('shipments', 'cant_clients', 'pending', 'wb_open', 'wb_close'));
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
        if(Access::allow('create-shipment'))
        {
            return view('system.shipment.create');
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShipmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShipmentRequest $request)
    {
        if(Access::allow('create-shipment'))
        {
            $shipment = Shipment::where('status', 'ABIERTO')->count();

            if($shipment == 0)
            {
                $wb_code = PackageHelper::make_wb_code();

                $shipment = new Shipment($request->all());

                $shipment->wb = $wb_code;

                $shipment->save();

                Alert::message(trans('messages.shipment.create', ['shipment' => $wb_code]), 'success');

            } else {

                Alert::message(trans('messages.shipment.exist'), 'danger');
            }

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
        if(Access::allow('edit-shipment'))
        {
            $shipment = Shipment::findOrFail($id);

            $new_status_package = 'EMBARQUE EN TRANSITO';

            if($shipment->status == 'ABIERTO')
            {
                $packages = Package::status_shipment('EMBARCADO', $shipment->id);

                if(count($packages) > 0)
                {
                    foreach($packages as $package)
                    {
                        $this->new_status($package->id, $new_status_package, false);
                    }

                    $shipment->status = 'EMBARCADO';

                    $shipment->save();

                    Alert::message(trans('messages.shipment.close', ['shipment' => $shipment->wb]), 'info');
                }
                else
                {
                    Alert::message(trans('messages.shipment.not_package'), 'warning');
                }
            }
            else
            {
                Alert::message(trans('messages.shipment.not_close', ['shipment' => $shipment->wb]), 'warning');
            }

            return $this->redirectDefault();
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
        if(Access::allow('edit-shipment'))
        {
            //
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
        if(Access::allow('received-shipment'))
        {
            $shipment = Shipment::findOrFail($id);

            $new_status_package = 'RECIBIDO EN CENTRO PAÍS DESTINO';

            if($shipment->status == 'EMBARCADO')
            {
                $packages = Package::status_shipment('EMBARQUE EN TRANSITO', $shipment->id);

                foreach($packages as $package)
                {
                    $this->new_status($package->id, $new_status_package, true);
                }

                $shipment->status = 'CERRADO';

                $shipment->save();

                Alert::message(trans('messages.shipment.finish', ['shipment' => $shipment->wb]), 'info');
            }
            else
            {
                Alert::message(trans('messages.shipment.not_received', ['shipment' => $shipment->wb]), 'warning');
            }

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    // Register new status of package
    private function new_status($package, $data_status, $reception)
    {
        $register = Package::findOrFail($package);

        if($reception)
        {
            $status = [

                'reception_id' => Auth::user()->reception_id,

                'status'       => $data_status,
            ];
        }
        else
        {
            $status = [
                'status' => $data_status,
            ];
        }

        $register->update($status);

        ChangeStatus::create([

            'package_id' => $package,

            'status'     => $register->status
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('shipment_home');
    }
}
