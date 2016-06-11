<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Consigning extends Model
{
    protected $table = 'consigning';

    protected $fillable = ['user_id', 'country', 'province', 'city', 'postal_code', 'address', 'reference_point'];

    public function client()
    {
        return $this->hasMany('App\Models\User', 'id', 'user_id');
    }

    public function getConsignAttribute()
    {
        return $this->consign = $this->country . ' - ' . $this->province . ' - ' . $this->city . ' - ' . $this->postal_code . ' - ' . $this->reference_point;
    }
}
