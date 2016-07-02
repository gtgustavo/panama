<?php

namespace App\Http\Controllers\Support;

use App\Helpers\Helper;
use App\Http\Requests\Support\SupportRequest;
use App\Models\Credentials\User;
use App\Models\Support\Support;
use App\Models\Support\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Styde\Html\Facades\Alert;

class SupportController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user   = User::findOrFail(Auth::user()->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $help = Support::where('user_id', $this->user->id)->get();

        return view('support.index', compact('help'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $support = Support::where('user_id', $this->user->id)->where('status', 'PENDIENTE')->count();

        if($support == 0)
        {
            $theme = Ticket::lists('theme', 'id');

            return view('support.create', compact('theme'));
        }

        Alert::message(trans('messages.support.close'), 'info');

        return $this->redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SupportRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupportRequest $request)
    {
        $collection = Helper::convert_to_uppercase($request->all());

        $support = new Support($collection->all());

        $support->user_id = $this->user->id;

        $support->save();

        Alert::message(trans('messages.support.create', ['ticket' => $support->ticket->theme]), 'success');

        return $this->redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('support_home');
    }
}
