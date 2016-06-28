<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table = 'shipment';

    protected $fillable = ['wb', 'magaya', 'departure_date', 'status'];

    public function getDates()
    {
        return array('created_at', 'updated_at', 'departure_date');
    }

    public function packages()
    {
        return $this->hasMany('App\Models\System\Package');
    }
}
