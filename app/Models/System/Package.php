<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';

    protected $fillable = ['users_id', 'wr', 'type', 'note', 'cost'];

    public function client()
    {
        return $this->hasMany('App\Models\User', 'id', 'users_id');
    }
}
