<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $table = 'box';

    protected $fillable = ['box', 'dimensions', 'maximum_poundage', 'cost_extra_pound', 'cost_standard', 'cost_express', 'coin_id', 'status'];

    public function coin()
    {
        return $this->hasOne('App\Models\Administration\Coin', 'id', 'coin_id');
    }

    public function getFullBoxAttribute()
    {
        return $this->full_box = 'CAJA: ' . $this->box . ' - DIMENSIONES: ' . $this->dimensions;
    }
}
