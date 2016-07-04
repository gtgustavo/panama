<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';

    protected $fillable = ['name', 'country_id'];

    public function country()
    {
        return $this->hasOne('App\Models\Administration\Country', 'id', 'country_id');
    }
}
