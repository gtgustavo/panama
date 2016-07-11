<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            ->where('status', 'ENTREGADO EN CENTRO')
            ->groupBy('reception_id');
    }

    public static function receptions($country)
    {
        return DB::table('reception')
            ->join('province', function ($join) use ($country) {
                $join->on('reception.province_id', '=', 'province.id')
                ->where('province.country_id', '=', $country)
                ->where('reception.id', '>', 1);
            })
            ->lists('reception.name', 'reception.id');
    }

    public static function FilterAndPaginate($reception, $profile)
    {
        return ReceptionCenter::center($reception, $profile)
            ->orderBy('id', 'ASC')
            ->get();
    }

    public function scopeCenter($query, $reception, $profile)
    {
        if($profile == 1)
        {
            $query->where('id', '!=', 0);

        } else {

            $query->where('id', $reception);
        }
    }

    public static function getList()
    {
        return ReceptionCenter::where('id', '>', 1)->lists('name', 'id');
    }
}
