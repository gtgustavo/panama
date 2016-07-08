<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class ReceptionCenter extends Model
{
    protected $table = 'reception';

    protected $fillable = ['name', 'province_id', 'city', 'postal_code', 'address'];

    public function users()
    {
        return $this->hasMany('App\Models\Credentials\User', 'reception_id');
    }

    public function province()
    {
        return $this->hasOne('App\Models\Administration\Province', 'id', 'province_id');
    }

    public function packages()
    {
        return $this->hasMany('App\Models\System\Package', 'reception_id');
    }

    public function clientCount()
    {
        return $this->users()
            ->selectRaw('reception_id, count(*) as aggregate')
            ->where('profile_id', 3)
            ->groupBy('reception_id');
    }

    public function employeeCount()
    {
        return $this->users()
            ->selectRaw('reception_id, count(*) as aggregate')
            ->where('profile_id', '!=', 3)
            ->groupBy('reception_id');
    }

    public function packageCount()
    {
        return $this->packages()
            ->selectRaw('reception_id, count(*) as aggregate')
            ->groupBy('reception_id');
    }
}
