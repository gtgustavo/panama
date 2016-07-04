<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $table = 'coin';

    protected $fillable = ['name', 'iso', 'symbol'];
}
