<?php

namespace App\Models\Credentials;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';

    protected $fillable = ['first_name', 'last_name', 'dni', 'phone_c', 'phone_h', 'country', 'province', 'city', 'postal_code', 'address'];

    public function user()
    {
        return $this->hasMany('App\Models\Credentials\User');
    }

    public function getFullNameAttribute(){

        return $this->full_name = $this->first_name . ' ' . $this->last_name;

    }
}
