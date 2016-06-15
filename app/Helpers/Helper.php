<?php

namespace App\Helpers;

class Helper
{
    public static function convert_to_uppercase($covert)
    {
        $ToUpper = collect($covert)->map(function ($data) {
            return strtoupper($data);
        })
            ->reject(function ($data) {
                return empty($data);
            });

        return $ToUpper;
    }

    public static function generate_random_password($cant)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';

        $disorder   = str_shuffle($characters);

        $password   = substr($disorder, 1, $cant);

        return $password;
    }
}