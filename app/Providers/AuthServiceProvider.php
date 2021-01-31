<?php

namespace App\Providers;

use App\Models\SubscribeTask;
use App\Models\Task;
use App\Models\User;
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

        Gate::define('isMyTask', function (User $user, Task $task) {
            return $user->id == $task->user_id;
        });

        Gate::define('isYourSubscribe', function (User $user, SubscribeTask $subscribeTask) {
            return $user->id == $subscribeTask->subscribe_user_id;
        });
    }
}
