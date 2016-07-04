<?php

namespace App\Models\Credentials;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';

    protected $fillable = ['first_name', 'last_name', 'dni', 'phone_c', 'phone_h', 'province_id', 'city', 'postal_code', 'address'];

    public function user()
    {
        return $this->hasMany('App\Models\Credentials\User');
    }

    public function province()
    {
        return $this->hasOne('App\Models\Administration\Province', 'id', 'province_id');
    }

    public function getFullNameAttribute()
    {
        return $this->full_name = $this->first_name . ' ' . $this->last_name;
    }
}
