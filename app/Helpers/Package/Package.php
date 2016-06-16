<?php

namespace App\Helpers\Package;

use App\Http\Controllers\Controller;
use App\Models\Credentials\People;
use App\Models\Credentials\User;
use Carbon\Carbon;

use App\Models\System\Package as PackageModel;

class Package extends Controller
{
    public static function make_wr_code()
    {
        $id = self::next_id();

        // Construct code id

        if(strlen($id) == 1)
        {
            $code_id = '000'.$id;

        } elseif (strlen($id) == 2){

            $code_id = '00'.$id;

        } elseif (strlen($id) == 3){

            $code_id = '0'.$id;

        } elseif (strlen($id) > 3){

            $code_id = $id;
        }

        // Capture date

        $date = new Carbon();

        $date = $date->format('dmY');

        // Construct WR code

        return 'WR-'.$date.'-'.$code_id;
    }


    private static function next_id()
    {
        $package = PackageModel::all();

        $count = count($package);

        $id = 1;

        if($count > 0)
        {
            $id = $package->last()->id + 1;
        }

        return $id;
    }


    public static function validate_client($dni)
    {
        $client = People::where('dni', $dni)->get();

        $count = count($client);

        $validate = false;

        if($count == 1)
        {
            foreach($client as $data)
            {
                $validate = $data->id;
            }
        }

        return $validate;
    }

}