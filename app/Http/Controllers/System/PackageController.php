<?php

namespace App\Http\Controllers\System;

use App\Helpers\Barcode\Barcode;
use App\Helpers\Helper;
use App\Helpers\Package\Package as PackageHelper;
use App\Helpers\System\Access;
use App\Http\Requests\System\PackageRequest;
use App\Models\System\ChangeStatus;
use App\Models\System\Package;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Access::allow('view-package'))
        {
            return redirect()->route('home');
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
        if(Access::allow('create-package'))
        {
            $wr_code = PackageHelper::make_wr_code();

            $barcode = Barcode::BarcodeHTML($wr_code);

            return view('system.package.create', compact('wr_code', 'barcode'));
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PackageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        if(Access::allow('create-package'))
        {
            $client = PackageHelper::validate_client($request->input('dni'));

            if($client != false)
            {
                $collection = Helper::convert_to_uppercase($request->all());

                $package = new Package($collection->all());

                $package->user_id = $client;

                $package->status = 'ENTREGADO EN CENTRO';

                $package->save();

                ChangeStatus::create([
                    'package_id' => $package->id,
                    'status'     => $package->status
                ]);

                Alert::message(trans('messages.package.create', ['package' => $package->wr]), 'success');

            } else {

                Alert::message(trans('messages.package.error_dni', ['dni' => $request->input('dni')]), 'danger');

                return redirect()->back();
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
        if(Access::allow('edit-package'))
        {
            //
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
        if(Access::allow('edit-package'))
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
        if(Access::allow('delete-package'))
        {
            //
        }

        return Access::redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('package_home');
    }
}
