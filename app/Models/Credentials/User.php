<?php

namespace App\Models\Credentials;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

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
    protected $fillable = ['email', 'password', 'people_id', 'profile_id', 'reception_id', 'file'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function isSuperAdmin()
    {
        return $this->profile_id == 1;
    }

    public function isAdmin()
    {
        return $this->profile_id <= 2;
    }

    public function isEmployee()
    {
        return $this->profile_id != 3;
    }

    public function isClient()
    {
        return $this->profile_id == 3;
    }

    public function myCountry()
    {
        return Auth::user()->people->province->country->id;
    }

    public function people()
    {
        return $this->hasOne('App\Models\Credentials\People', 'id', 'people_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Security\Profile', 'id', 'profile_id');
    }

    public function reception()
    {
        return $this->hasOne('App\Models\Administration\ReceptionCenter', 'id', 'reception_id');
    }

    public function consigning()
    {
        return $this->hasMany('App\Models\System\Consigning');
    }

    public function support()
    {
        return $this->hasMany('App\Models\Support\Support');
    }

    public static function FilterAndPaginate($reception, $profile)
    {
        return User::center($reception, $profile)
            ->where('profile_id', '!=', '3')
            ->where('profile_id', '!=', '1')
            ->orderBy('id', 'ASC')
            ->get();
    }

    public static function FilterAndPaginateClient($reception, $profile)
    {
        return User::center($reception, $profile)
            ->where('profile_id', '3')
            ->orderBy('id', 'DES')
            ->get();
    }

    public static function FilterAndPaginateAdministrator()
    {
        return User::where('profile_id', '2')
            ->orderBy('id', 'DES')
            ->get();
    }


    public function scopeCenter($query, $reception, $profile)
    {
        if($profile == 1)
        {
            $query->where('reception_id', '!=', 0);

        } else {

            $query->where('reception_id', $reception);
        }
    }

}
