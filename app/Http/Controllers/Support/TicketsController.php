<?php

namespace App\Http\Controllers\Support;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Support\TicketRequest;
use App\Models\Administration\ReceptionCenter;
use App\Models\Support\Support;
use App\Models\Support\Ticket;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Access::allow('view-tickets'))
        {
            $tickets   = Ticket::all();

            $reception = ReceptionCenter::count();

            $ticket    = Ticket::count();

            $pending   = Support::where('status', 'PENDIENTE')->count();

            $responded = Support::where('status', 'RESPONDIDO')->count();

            return view('administration.ticket.index', compact('tickets', 'reception', 'ticket', 'pending', 'responded'));
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
        if(Access::allow('create-tickets'))
        {
            return view('administration.ticket.create');
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TicketRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        if(Access::allow('create-tickets'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $ticket = Ticket::create($collection->all());

            Alert::message(trans('messages.ticket.create', ['ticket' => $ticket->theme]), 'success');

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
        if(Access::allow('edit-tickets'))
        {
            $ticket = Ticket::findOrFail($id);

            return view('administration.ticket.edit', compact('ticket'));
        }

        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TicketRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, $id)
    {
        if(Access::allow('edit-tickets'))
        {
            $ticket = Ticket::findOrFail($id);

            $collection = Helper::convert_to_uppercase($request->all());

            $ticket->update($collection->all());

            Alert::message(trans('messages.ticket.update', ['ticket' => $ticket->theme]), 'info');

            return $this->redirectDefault();
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
        if(Access::allow('delete-tickets'))
        {
            $ticket = Ticket::findOrFail($id);

            Ticket::destroy($id);

            Alert::message(trans('messages.ticket.delete', ['ticket' => $ticket->theme]), 'warning');

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('ticket_home');
    }
}
