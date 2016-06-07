<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'ced_id', 'phone', 'email', 'password', 'status', 'role_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function roles()
    {
        return $this->hasMany('App\Models\Security\Role', 'id', 'role_id');
    }

    public static function FilterAndPaginate($search, $field)
    {
        return User::name($search, $field)
            ->orderBy('id', 'ASC')
            ->paginate();
    }

    public function scopeName($query, $search, $field)
    {
        if ((trim($search) != "") AND (trim($field) != "")){

            $query->where($field, "LIKE", "%$search%");

        }
    }
}
