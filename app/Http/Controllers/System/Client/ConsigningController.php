<?php

namespace App\Http\Controllers\System\Client;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\System\ConsigningRequest;
use App\Models\Administration\Road;
use App\Models\System\Consigning;
use App\Models\Credentials\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class ConsigningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $client
     * @return \Illuminate\Http\Response
     */
    public function index($client)
    {
        if(Access::allow('view-consigning'))
        {
            $consigning = Consigning::where('user_id', $client)->get();

            $client     = User::findOrFail($client);

            return view('system.consigning.index', compact('consigning', 'client'));
        }

        return Access::redirectDefault();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $client
     * @return \Illuminate\Http\Response
     */
    public function create($client)
    {
        if(Access::allow('create-consigning'))
        {
            $client = User::findOrFail($client);

            $road = Road::where('origin_id', $client->people->province->country->id)->get();

            return view('system.consigning.create', compact('client', 'road'));
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ConsigningRequest $request
     * @param $client
     * @return \Illuminate\Http\Response
     */
    public function store(ConsigningRequest $request, $client)
    {
        if(Access::allow('create-consigning'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $consigning = new Consigning($collection->all());

            $consigning->user_id = $client;

            $consigning->save();

            Alert::message(trans('messages.consigning.create', ['consign' => $consigning->road->road]), 'success');

            return $this->redirectDefault($client);
        }

        return Access::redirectDefault();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param $client
     * @return \Illuminate\Http\Response
     */
    public function edit($client, $id)
    {
        if(Access::allow('edit-consigning'))
        {
            $consigning = Consigning::findOrFail($id);

            $client     = User::findOrFail($client);

            $road = Road::where('origin_id', $client->people->province->country->id)->get();

            return view('system.consigning.edit', compact('consigning', 'client', 'road'));
        }

        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ConsigningRequest $request
     * @param  int $id
     * @param $client
     * @return \Illuminate\Http\Response
     */
    public function update(ConsigningRequest $request, $client, $id)
    {
        if(Access::allow('edit-consigning'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $consigning = Consigning::findOrFail($id);

            $consigning->update($collection->all());

            Alert::message(trans('messages.consigning.update', ['consign' => $consigning->road->road]), 'info');

            return $this->redirectDefault($client);
        }

        return Access::redirectDefault();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $client
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client, $id)
    {
        if(Access::allow('delete-consigning'))
        {
            $consigning = Consigning::findOrFail($id);

            Consigning::destroy($id);

            Alert::message(trans('messages.consigning.delete', ['consign' => $consigning->road->road]), 'warning');

            return $this->redirectDefault($client);
        }

        return Access::redirectDefault();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault($id)
    {
        return redirect()->route('consigning_home', [$id]);
    }
}
