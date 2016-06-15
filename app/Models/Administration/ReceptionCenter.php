<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class ReceptionCenter extends Model
{
    protected $table = 'reception';

    protected $fillable = ['name', 'country', 'province', 'city', 'postal_code', 'address'];

}
