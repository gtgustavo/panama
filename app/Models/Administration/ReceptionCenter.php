<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class ReceptionCenter extends Model
{
    protected $table = 'reception';

    protected $fillable = ['name', 'country', 'province', 'city', 'postal_code', 'address'];

    public function users()
    {
        return $this->hasMany('App\Models\Credentials\User', 'reception_id');
    }
}
