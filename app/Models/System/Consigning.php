<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Consigning extends Model
{
    protected $table = 'consigning';

    protected $fillable = ['users_id', 'country', 'province', 'city', 'postal_code', 'address', 'reference_point'];

    public function client()
    {
        return $this->hasMany('App\Models\User', 'id', 'users_id');
    }
}
