<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',

    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        $gate->define('super_admin', function ($user)
        {
            return $user->isSuperAdmin();
        });

        $gate->define('admin', function ($user)
        {
            return $user->isAdmin();
        });

        $gate->define('employee', function ($user)
        {
            return $user->isEmployee();
        });

        $gate->define('client', function ($user)
        {
            return $user->isClient();
        });
    }
}
