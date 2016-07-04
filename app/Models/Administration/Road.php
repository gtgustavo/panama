<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    protected $table = 'road';

    protected $fillable = ['origin_id', 'destination_id'];

    public function country_origin()
    {
        return $this->hasOne('App\Models\Administration\Country', 'id', 'origin_id');
    }

    public function country_destination()
    {
        return $this->hasOne('App\Models\Administration\Country', 'id', 'destination_id');
    }

    public function getRoadAttribute()
    {
        return $this->road = $this->country_origin->name . ' -- a -- ' . $this->country_destination->name;
    }
}
