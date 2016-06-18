<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';

    protected $fillable = ['user_id', 'wr', 'consigning_id', 'type', 'note', 'cost', 'status'];

    public function client()
    {
        return $this->hasOne('App\Models\Credentials\User', 'id', 'user_id');
    }

    public function consigning()
    {
        return $this->hasOne('App\Models\System\Consigning', 'id', 'consigning_id');
    }

    public static function FilterAndPaginateStatus($search)
    {
        return Package::status($search)
            ->orderBy('id', 'ASC')
            ->paginate();
    }

    public function scopeStatus($query, $search)
    {
        if ((trim($search) != ""))
        {
            $query->where('status', $search);
        }
    }
}
