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
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'dni', 'phone_c', 'phone_h', 'email', 'password', 'profile_id'];

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

    public function profile()
    {
        return $this->hasMany('App\Models\Security\Profile', 'id', 'profile_id');
    }

    public function consigning()
    {
        return $this->hasMany('App\Models\System\Consigning');
    }

    public static function FilterAndPaginate($search, $field)
    {
        return User::name($search, $field)
            ->where('profile_id', '!=', '2')
            ->orderBy('id', 'ASC')
            ->paginate();
    }

    public static function FilterAndPaginateClient($search, $field)
    {
        return User::name($search, $field)
            ->where('profile_id', '2')
            ->orderBy('id', 'DES')
            ->paginate();
    }

    public function scopeName($query, $search, $field)
    {
        if ((trim($search) != "") AND (trim($field) != "")){

            $query->where($field, "LIKE", "%$search%");

        }
    }
}
