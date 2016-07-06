<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Helpers\System\Access;
use App\Http\Requests\Administration\BoxRequest;
use App\Models\Administration\Box;
use App\Models\Administration\Coin;
use App\Models\Administration\Road;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Access::allow('view-box'))
        {
            $boxes        = Box::all();

            $road         = Road::count();

            $box_enabled  = Box::where('status', 'ACTIVO')->count();

            $box_disabled = Box::where('status', 'OCULTO')->count();

            return view('administration.box.index', compact('boxes', 'road', 'box_enabled', 'box_disabled'));
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
        if(Access::allow('create-box'))
        {
            $coin = Coin::lists('name', 'id');

            return view('administration.box.create', compact('coin'));
        }

        return Access::redirectDefault();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BoxRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoxRequest $request)
    {
        if(Access::allow('create-box'))
        {
            $collection = Helper::convert_to_uppercase($request->all());

            $box = Box::create($collection->all());

            Alert::message(trans('messages.box.create', ['box' => $box->box]), 'success');

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Access::allow('status-box'))
        {
            $box = Box::findOrFail($id);

            if($box->status == 'OCULTO')
            {
                $status = 'ACTIVO';

            } else {
                $status = 'OCULTO';
            }

            $box->status = $status;

            $box->save();

            Alert::message(trans('messages.box.status', ['box' => $box->box, 'status' => $box->status]), 'info');

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
        if(Access::allow('edit-box'))
        {
            $box = Box::findOrFail($id);

            $coin = Coin::lists('name', 'id');

            return view('administration.box.edit', compact('coin', 'box'));
        }

        return Access::redirectDefault();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BoxRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoxRequest $request, $id)
    {
        if(Access::allow('edit-box'))
        {
            $box = Box::findOrFail($id);

            $collection = Helper::convert_to_uppercase($request->all());

            $box->update($collection->all());

            Alert::message(trans('messages.box.update', ['box' => $box->box]), 'info');

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
        if(Access::allow('delete-box'))
        {
            $box = Box::findOrFail($id);

            Box::destroy($id);

            Alert::message(trans('messages.box.delete', ['box' => $box->box]), 'warning');

            return $this->redirectDefault();
        }

        return Access::redirectDefault();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('box_home');
    }
}
