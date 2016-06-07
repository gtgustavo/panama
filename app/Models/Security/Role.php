<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = ['name', 'description'];

    public function permissions() {

        return $this->belongsToMany('App\Models\Security\Permission');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
