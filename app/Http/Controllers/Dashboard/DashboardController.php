<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\System\Package;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'client']);
    }

    public function index()
    {
        return redirect()->route('home');
    }

    public function admin()
    {
        $packages      = Package::with('client')->with('consigning')->paginate();

        $cant_packages = count(Package::all());

        return view('dashboard.admin.index', compact('packages', 'cant_packages'));
    }

    public function client()
    {

        return 'View Clients';

    }
}
