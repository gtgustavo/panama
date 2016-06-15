<?php

namespace App\Http\Controllers\System;

use App\Models\Credentials\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function validate_client(Request $request)
    {
        if ($request->ajax())
        {
            $dni = $request->input('dni');

            $client = User::where('dni', $dni)->get();

            $count = count($client);

            if($count == 0)
            {
                $view = '
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-warning fa-1x" aria-hidden="true"></i>
                        <span class="sr-only"></span>
                        ' . trans('messages.package.error_dni', ['dni' => $request->input('dni')]) . '
                    </div>
                ';

            } else {

                foreach($client as $data)
                {
                    $view = '
                   <div class="alert alert-success" role="alert">
                        <i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>
                        <span class="sr-only"></span>
                        ' . trans('messages.package.success_dni', ['client' => $data->full_name]) . '
                    </div>
                ';
                }
            }
        }

        return $view;
    }

    public function consigning_client(Request $request)
    {
        if($request->ajax())
        {
            $dni = $request->input('dni');

            $client = User::where('dni', $dni)->get();

            $count = count($client);

            if($count > 0)
            {
                foreach($client as $data)
                {
                    foreach($data->consigning as $consigning)
                    {
                        $view = '<option value="'.$consigning->id.'">'.$consigning->consign.'</option>';

                        echo $view;
                    }
                }

            } else {

                return null;
            }
        }
    }

}
