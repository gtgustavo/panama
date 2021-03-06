<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\System\Package;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'client']);
    }

    public function index(Request $request)
    {
        $profile = Auth::user()->profile_id;

        switch ($profile)
        {
            case 1:

                $default = '';

                return $this->admin($request, $default);

                break;

            case 2:

                $default = '';

                return $this->admin($request, $default);

                break;

            case 4:

                $default = 'ENTREGADO EN CENTRO';

                return $this->admin($request, $default);

                break;

            case 5:

                $default = 'RECIBIDO EN CENTRO DE EMBARQUE';

                return $this->admin($request, $default);

                break;

            case 6:

                $default = 'RECIBIDO EN CENTRO PAÍS DESTINO';

                return $this->admin($request, $default);

                break;

            default:

               return "UNKNOWN PROFILE";
        }
    }

    private function packages(Request $request, $default)
    {
        if($request->get('status') == null)
        {
            $search = $default;

        } else {

            $search = $request->get('status');
        }

        return $search;
    }

    public function admin(Request $request, $default)
    {
        $search = $this->packages($request, $default);

        $packages = Package::FilterAndPaginateStatus($search, Auth::user()->reception_id, Auth::user()->profile_id);

        $web = true;

        $wed_check_in      = Package::where('status', 'PRECHEQUEADO')->count();

        $reception_center  = Package::where('status', 'ENTREGADO EN CENTRO')->count();

        $sent_shipping     = Package::where('status', 'ENVIADO A CENTRO DE EMBARQUE')->count();

        $received_shipping = Package::where('status', 'RECIBIDO EN CENTRO DE EMBARQUE')->count();

        $shipment          = Package::where('status', 'EMBARCADO')->count();

        $received          = Package::where('status', 'ENTREGADO')->count();

        return view('dashboard.admin.index', compact('web', 'packages', 'wed_check_in', 'reception_center', 'sent_shipping', 'received_shipping', 'shipment', 'received'));
    }

    public function client(Request $request)
    {
        $web = false;

        $packages = Package::FilterAndPaginateStatusClient($request->get('status'), Auth::user()->id);

        return view('dashboard.client.index', compact('packages', 'web'));
    }
}
