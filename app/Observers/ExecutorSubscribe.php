<?php

namespace App\Observers;

use App\Models\SubscribeTask;
use App\Notifications\Cabinets\Customer\subscribeTaskForCustomer;
use App\Notifications\Cabinets\Customer\unSubscribeTaskForCustomer;
use Illuminate\Support\Facades\Notification;

class ExecutorSubscribe
{
    /**
     * Handle the SubscribeTask "created" event.
     *
     * @param  \App\Models\SubscribeTask  $subscribeTask
     * @return void
     */
    public function created(SubscribeTask $subscribeTask)
    {
        $executor  = $subscribeTask->user->username;

        Notification::send($subscribeTask->task->user, new subscribeTaskForCustomer($subscribeTask->task, $executor));
    }

    /**
     * Handle the SubscribeTask "updated" event.
     *
     * @param  \App\Models\SubscribeTask  $subscribeTask
     * @return void
     */
    public function updated(SubscribeTask $subscribeTask)
    {
        //
    }

    /**
     * Handle the SubscribeTask "deleted" event.
     *
     * @param  \App\Models\SubscribeTask  $subscribeTask
     * @return void
     */
    public function deleted(SubscribeTask $subscribeTask)
    {
        $executor  = $subscribeTask->user->username;

        Notification::send($subscribeTask->task->user, new unSubscribeTaskForCustomer($subscribeTask->task, $executor));
    }

    /**
     * Handle the SubscribeTask "restored" event.
     *
     * @param  \App\Models\SubscribeTask  $subscribeTask
     * @return void
     */
    public function restored(SubscribeTask $subscribeTask)
    {
        //
    }

    /**
     * Handle the SubscribeTask "force deleted" event.
     *
     * @param  \App\Models\SubscribeTask  $subscribeTask
     * @return void
     */
    public function forceDeleted(SubscribeTask $subscribeTask)
    {
        //
    }
}
