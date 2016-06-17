<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = ['name', 'description'];

    public function packages()
    {
        return $this->belongsToMany('App\Models\System\Package');
    }
}
