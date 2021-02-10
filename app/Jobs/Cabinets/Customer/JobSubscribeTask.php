<?php

namespace App\Jobs\Cabinets\Customer;

use App\Models\SubscribeTask;
use App\Notifications\Cabinets\Customer\subscribeTaskForCustomer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class JobSubscribeTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscribe;

    public function __construct(SubscribeTask $subscribeTask)
    {
        $this->subscribe = $subscribeTask;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::send($this->subscribe->task->user, new subscribeTaskForCustomer(
            $this->subscribe->task,  // задание
            $this->subscribe->user->username // пользователь который подписался
            )
        );
    }
}
