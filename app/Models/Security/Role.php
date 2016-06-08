<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = ['name', 'display_name'];

    public function profile() {

        return $this->belongsToMany('App\Models\Security\Profile');
    }
}
