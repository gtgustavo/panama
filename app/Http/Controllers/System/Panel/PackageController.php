<?php

namespace App\Http\Controllers\System\Panel;

use App\Helpers\Barcode\Barcode;
use App\Http\Requests\Panel\PackageClientRequest;
use App\Models\Administration\Box;
use App\Models\Credentials\User;
use App\Models\System\ChangeStatus;
use App\Models\System\Package;
use App\Helpers\Package\Package as PackageHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Styde\Html\Facades\Alert;

class PackageController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = User::findOrFail(Auth::user()->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wr_code = PackageHelper::make_wr_code();

        $barcode = Barcode::BarcodeHTML($wr_code);

        $consign = $this->user->consigning;

        $boxes   = Box::where('status', 'ACTIVO')->get();

        return view('system.package_client.create', compact('wr_code', 'barcode', 'consign', 'boxes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PackageClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageClientRequest $request)
    {
        $package = new Package($request->all());

        $package->user_id = $this->user->id;

        $package->reception_id = $this->user->reception_id;

        $package->save();

        ChangeStatus::create([
            'package_id' => $package->id
        ]);

        Alert::message(trans('messages.package.create', ['package' => $package->wr]), 'success');

        return $this->redirectDefault();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::findOrFail($id);

        if(($package->status == 'PRECHEQUEADO') OR ($package->status == 'ENTREGADO EN CENTRO'))
        {
            $wr_code = $package->wr;

            $barcode = Barcode::BarcodeHTML($wr_code);

            $consign = $this->user->consigning;

            $boxes   = Box::where('status', 'ACTIVO')->get();

            return view('system.package_client.edit', compact('package', 'wr_code', 'barcode', 'consign', 'boxes'));
        }
        elseif($package->status == 'ANULADO')
        {
            Alert::message(trans('messages.package.null', ['package' => $package->wr]), 'info');
        }
        else
        {
            Alert::message(trans('messages.package.not_action', ['package' => $package->wr]), 'info');
        }

        return $this->redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PackageClientRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageClientRequest $request, $id)
    {
        $package = Package::findOrFail($id);

        $package->update($request->all());

        Alert::message(trans('messages.package.update', ['package' => $package->wr]), 'info');

        return $this->redirectDefault();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);

        if(($package->status == 'PRECHEQUEADO') OR ($package->status == 'ENTREGADO EN CENTRO'))
        {
            $package->status = 'ANULADO';

            $package->save();

            ChangeStatus::create([

                'package_id' => $package->id,

                'status'     => 'ANULADO'
            ]);

            Alert::message(trans('messages.package.annular', ['package' => $package->wr]), 'warning');
        }
        elseif($package->status == 'ANULADO')
        {
            Alert::message(trans('messages.package.null', ['package' => $package->wr]), 'info');
        }
        else
        {
            Alert::message(trans('messages.package.not_action', ['package' => $package->wr]), 'info');
        }

        return $this->redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('my_package_home');
    }
}
