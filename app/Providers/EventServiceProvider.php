<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\SubscribeTask;
use App\Models\User;
use App\Observers\ExecutorSubscribe;
use App\Observers\Ordercustomer;
use App\Observers\UserAccount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        SubscribeTask::observe(ExecutorSubscribe::class);
        User::observe(UserAccount::class);
        Order::observe(OrderCustomer::class);
    }
}
