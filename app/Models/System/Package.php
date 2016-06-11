<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';

    protected $fillable = ['user_id', 'wr', 'consigning_id', 'type', 'note', 'cost'];

    public function client()
    {
        return $this->hasMany('App\Models\User', 'id', 'user_id');
    }

    public function consigning()
    {
        return $this->hasMany('App\Models\System\Consigning', 'id', 'consigning_id');
    }
}
