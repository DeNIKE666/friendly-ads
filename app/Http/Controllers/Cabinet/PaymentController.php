<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinets\Customer\addBalance;
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function formAddBalance()
    {
        return view('cabinets.customer.finance.addBalance');
    }

    /**
     * @param addBalance $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function addBalance(addBalance $request)
    {
        auth()->user()->increment('balance', $request->input('amount'));

        auth()->user()->orders()->create([
            'title'      => 'Пополнение баланса',
            'order'      => Str::uuid()->toString(),
            'pay_system' => 'FreeKassa',
            'amount'     => $request->input('amount'),
            'params'     => json_encode([
                'type'      => 'add-balance',
                'user_id'   => auth()->user()->id
            ]),
            'status' => 1
        ]);

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function history()
    {
        $histories = auth()->user()->orders()->get();

        return view('cabinets.customer.finance.history', compact('histories'));
    }
}
