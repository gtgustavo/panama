<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = ['name', 'description'];

    public function roles() {

        return $this->belongsToMany('App\Models\Security\Role');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
