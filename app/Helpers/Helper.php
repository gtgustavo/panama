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

}