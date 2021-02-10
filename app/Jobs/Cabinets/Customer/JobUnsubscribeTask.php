<?php

namespace App\Jobs\Cabinets\Customer;



use App\Notifications\Cabinets\Customer\unSubscribeTaskForCustomer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class JobUnsubscribeTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $customer, $taskTitle, $unsubscribeUser;

    public function __construct($customer, $taskTitle , $unsubscribeUser)
    {
        $this->customer        = $customer;
        $this->taskTitle       = $taskTitle;
        $this->unsubscribeUser = $unsubscribeUser;
    }

    public function handle()
    {
        Notification::send($this->customer, new unSubscribeTaskForCustomer(
                $this->taskTitle,  // задание
                $this->unsubscribeUser // пользователь который подписался
            )
        );
    }
}
