<?php

namespace App\Observers;

use App\Jobs\Cabinets\Customer\JobSubscribeTask;
use App\Jobs\Cabinets\Customer\JobUnsubscribeTask;
use App\Jobs\Cabinets\Executor\JobCustomerAcceptExecutor;
use App\Jobs\Cabinets\Executor\JobCustomerRemoveExecutor;
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
        dispatch(new JobSubscribeTask($subscribeTask))->onQueue('sending')
            ->afterResponse();
    }

    /**
     * Handle the SubscribeTask "updated" event.
     *
     * @param  \App\Models\SubscribeTask  $subscribeTask
     * @return void
     */
    public function updated(SubscribeTask $subscribeTask)
    {
        $taskTitle       = $subscribeTask->task->title;
        $customerUser    = $subscribeTask->task->user->username;
        $userSend        = $subscribeTask->user;

        if ($subscribeTask->wasChanged('status')) :
            dispatch(new JobCustomerAcceptExecutor($userSend, $taskTitle, $customerUser))->onQueue('sending')
                ->afterResponse();
        endif;
    }

    /**
     * Handle the SubscribeTask "deleted" event.
     *
     * @param  \App\Models\SubscribeTask  $subscribeTask
     * @return void
     */
    public function deleted(SubscribeTask $subscribeTask)
    {
        if (auth()->user()->can('customer')) :

            $taskTitle       = $subscribeTask->task->title;
            $customerUser    = $subscribeTask->task->user->username;
            $userSend        = $subscribeTask->user;

            dispatch(new JobCustomerRemoveExecutor($userSend, $taskTitle, $customerUser))->onQueue('sending')
                ->afterResponse();

        else:

            $taskTitle       = $subscribeTask->task->title;
            $unsubscribeUser = $subscribeTask->user->username;
            $customer        = $subscribeTask->task->user;

            dispatch(new JobUnsubscribeTask($customer, $taskTitle, $unsubscribeUser))->onQueue('sending')
                ->afterResponse();

        endif;
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
