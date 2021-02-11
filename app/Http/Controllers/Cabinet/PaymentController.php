<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * @param Task $task
     * @param Request $request
     */

    public function payBalanceFromCreateTask(Task $task, Request $request)
    {
        $order = auth()->user()->orders()->create([
            'title'      => 'Пополнение баланса для заказа - ' . $task->title,
            'order'      => Str::uuid()->toString(),
            'pay_system' => 'FreeKassa',
            'amount'     => $task->amount,
            'params'     => json_encode([
                'type' => 'pay_order',
                'id'   => $task->id,
            ]),
            'status' => 1
        ]);

        return $order;
    }
}
