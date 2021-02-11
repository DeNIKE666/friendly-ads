<?php

namespace App\Jobs\Cabinets\Executor;

use App\Notifications\Cabinets\Executor\customerAcceptExecutor;
use App\Notifications\Cabinets\Executor\customerRemoveExecutor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class JobCustomerAcceptExecutor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userSend, $taskTitle, $customerUser;

    public function __construct($userSend, $taskTitle , $customerUser)
    {
        $this->userSend        = $userSend;
        $this->taskTitle       = $taskTitle;
        $this->customerUser    = $customerUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::send($this->userSend, new customerAcceptExecutor(
                $this->taskTitle,  // задание
                $this->customerUser // пользователь который подписался
            )
        );
    }
}
