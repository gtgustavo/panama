<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class Relations extends Model
{
    protected $table = 'profile_role';

    protected $fillable = ['profile_id', 'role_id'];
}
