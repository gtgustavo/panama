<?php

namespace App\Http\Controllers\Support;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Support\AnswerRequest;
use App\Models\Credentials\User;
use App\Models\Support\Support;
use App\Models\Support\Ticket;
use App\Models\System\Shipment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Access::allow('view-support'))
        {
            $help         = Support::FilterAndPaginate($request->get('search'));

            $theme        = Ticket::lists('theme', 'id');

            $cant_clients = User::where('profile_id', 3)->count();

            $pending      = Support::where('status', 'PENDIENTE')->count();

            $wb_open      = Shipment::where('status', 'ABIERTO')->count();

            $wb_close     = Shipment::where('status', 'CERRADO')->count();

            return view('support.admin.index', compact('help', 'theme', 'cant_clients', 'pending', 'wb_open', 'wb_close'));
        }

        return Access::redirectDefault();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if(Access::allow('create-support'))
        {
            $support = Support::findOrFail($id);

            return view('support.admin.create', compact('support'));
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AnswerRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function store(AnswerRequest $request, $id)
    {
        if(Access::allow('create-support'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $support = Support::findOrFail($id);

            $data = [
                'answer' => $collection['answer'],

                'status' => 'RESPONDIDO'
            ];

            $support->update($data);

            Alert::message(trans('messages.support.answer', ['ticket' => $support->ticket->theme]), 'success');

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('answer_home');
    }
}
