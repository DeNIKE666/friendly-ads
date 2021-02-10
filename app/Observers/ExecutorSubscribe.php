<?php

namespace App\Observers;

use App\Jobs\Cabinets\Customer\jobSubscribeTask;
use App\Jobs\Cabinets\Customer\jobUnsubscribeTask;
use App\Models\SubscribeTask;

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
        dispatch(new jobSubscribeTask($subscribeTask))->onQueue('sending');
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
        $taskTitle       = $subscribeTask->task->title;
        $unsubscribeUser = $subscribeTask->user->username;
        $customer        = $subscribeTask->task->user;

        dispatch(new jobUnsubscribeTask($customer, $taskTitle, $unsubscribeUser))->onQueue('sending');
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
