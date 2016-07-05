<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Consigning extends Model
{
    protected $table = 'consigning';

    protected $fillable = ['user_id', 'name', 'phone', 'road_id', 'province_id', 'city', 'postal_code', 'address', 'reference_point'];

    public function client()
    {
        return $this->hasOne('App\Models\Credentials\User', 'id', 'user_id');
    }

    public function road()
    {
        return $this->hasOne('App\Models\Administration\Road', 'id', 'road_id');
    }

    public function province()
    {
        return $this->hasOne('App\Models\Administration\Province', 'id', 'province_id');
    }

    public function getConsignAttribute()
    {
        return $this->consign = ' RUTA: ' . $this->road->road . ' -- BENEFICIARIO: ' .$this->name . ' - ' . $this->city . ' - ' . $this->reference_point;
    }
}
