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

                $default = 'ENTREGADO';

                return $this->admin($request, $default);

                break;

            case 3:

                $default = 'ENTREGADO EN CENTRO';

                return $this->admin($request, $default);

                break;

            case 4:

                $default = 'RECIBIDO EN CENTRO DE EMBARQUE';

                return $this->admin($request, $default);

                break;

            case 5:

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

        $packages = Package::FilterAndPaginateStatus($search, $request->get('wr'));

        return view('dashboard.admin.index', compact('packages'));
    }

    public function client()
    {
        return view('dashboard.client.index');
    }
}
