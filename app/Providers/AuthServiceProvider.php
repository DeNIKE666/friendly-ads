<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('executor', function ($user) {
            return $user->type_account == 3;
        });

        Gate::define('customer', function ($user) {
            return $user->type_account == 2;
        });

        Gate::define('admin', function ($user) {
            return $user->type_account == 1;
        });

      //  Gate::before(function ($user) {
           // return $user->type_account == 1;
       // });
    }
}
