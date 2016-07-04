<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';

    protected $fillable = ['user_id', 'shipment_id', 'wr', 'consigning_id', 'box_id', 'magaya', 'shipping_type', 'extra_pounds', 'cost', 'status', 'note'];

    public function client()
    {
        return $this->hasOne('App\Models\Credentials\User', 'id', 'user_id');
    }

    public function consigning()
    {
        return $this->hasOne('App\Models\System\Consigning', 'id', 'consigning_id');
    }

    public function shipment()
    {
        return $this->hasOne('App\Models\System\Shipment', 'id', 'shipment_id');
    }

    public function box()
    {
        return $this->hasOne('App\Models\Administration\Box', 'id', 'box_id');
    }

    public static function FilterAndPaginateStatus($search) //$wr
    {
        return Package::status($search)
            //->wr($wr)
            ->orderBy('id', 'ASC')
            ->get();
    }

    public static function FilterAndPaginateStatusClient($search, $client) //$wr
    {
        return Package::status($search)
            ->where('user_id' ,$client)
            ->orderBy('id', 'ASC')
            ->get();
    }

    public function scopeStatus($query, $search)
    {
        if ((trim($search) != ""))
        {
            $query->where('status', $search);
        }
    }

    /*
    public function scopeWr($query, $wr)
    {
        if (trim($wr) != "")
        {
            $query->where("wr", "LIKE", "%$wr%");
        }
    }
    */
}
