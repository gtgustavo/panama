<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    protected $fillable = ['name', 'iso'];
}