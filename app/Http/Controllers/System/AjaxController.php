<?php

namespace App\Http\Controllers\System;

use App\Models\Administration\Province;
use App\Models\Administration\Road;
use App\Models\Credentials\People;
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

            $client = People::where('dni', $dni)->get();

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

            $client = People::where('dni', $dni)->get();

            $count = count($client);

            if($count > 0)
            {
                foreach($client as $data)
                {
                    foreach($data->user as $user)
                    {
                        foreach($user->consigning as $consigning)
                        {
                            $view = '<option value="'.$consigning->id.'">'.$consigning->consign.'</option>';

                            echo $view;
                        }
                    }
                }

            } else {

                $option = '<option value="">'. trans('front.form.element.not_consigning') .'</option>';

                echo $option;
            }
        }
    }


    public function province_country(Request $request)
    {
        if($request->ajax())
        {
            $country = $request->input('country');

            $province = Province::where('country_id', $country)->get();

            $count = count($province);

            if($count > 0)
            {
                foreach($province as $data)
                {
                    $option = '<option value="'.$data->id.'">'.$data->name.'</option>';

                    echo $option;
                }

            } else {

                $option = '<option value="">'. trans('front.form.element.not_country') .'</option>';

                echo $option;
            }
        }
    }


    public function road_consigning(Request $request)
    {
        if($request->ajax())
        {
            $country_o = $request->input('origin');

            $country_d = $request->input('country');

            $road = Road::where('origin_id', $country_o)->where('destination_id', $country_d)->get();

            $count = count($road);

            if($count > 0)
            {
                foreach($road as $data)
                {
                    echo $data->id;
                }

            } else {

                echo trans('front.form.element.not_country');
            }
        }
    }

}
