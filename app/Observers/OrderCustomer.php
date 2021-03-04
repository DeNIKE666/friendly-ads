<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Task;

class OrderCustomer
{
    /**
     * Handle the Order "created" event.
     *
     * @param Order $order
     * @return void
     */
    public function created(Order $order)
    {
        if ($order->action_pay == 'pay-order') :
            $order->task->subscribe->where('status', 1)->each(function () {
                info('тут рассылаем все подписанным с активированным статусом');
            });
        endif;
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param Order $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param Order $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param Order $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
