<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';

    protected $fillable = ['name', 'display_name'];

    public function roles() {

        return $this->belongsToMany('App\Models\Security\Role');
    }
}
