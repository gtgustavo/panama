<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Consigning extends Model
{
    protected $table = 'consigning';

    protected $fillable = ['user_id', 'name', 'phone', 'country', 'province', 'city', 'postal_code', 'address', 'reference_point'];

    public function client()
    {
        return $this->hasOne('App\Models\Credentials\User', 'id', 'user_id');
    }

    public function getConsignAttribute()
    {
        return $this->consign = $this->name . ' - ' . $this->country . ' - ' . $this->province . ' - ' . $this->city . ' - ' . $this->reference_point;
    }
}
