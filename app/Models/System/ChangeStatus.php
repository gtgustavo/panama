<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class ChangeStatus extends Model
{
    protected $table = 'package_status';

    protected $fillable = ['package_id', 'status'];

    public function package()
    {
        return $this->hasMany('App\Models\System\Package', 'id', 'package_id');
    }
}
