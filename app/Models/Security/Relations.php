<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class Relations extends Model
{
    protected $table = 'permission_role';

    protected $fillable = ['role_id', 'permission_id'];
}
