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
        $packages      = Package::with('client')->with('consigning')->with('latestStatus')->paginate();

        $cant_packages = Package::all()->count();

        return view('dashboard.admin.index', compact('packages', 'cant_packages'));
    }

    public function client()
    {
        return view('dashboard.client.index');
    }
}
