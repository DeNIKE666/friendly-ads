<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinets\Customer\addBalance;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * @return Application|Factory|View
     */

    public function formAddBalance()
    {
        return view('cabinets.customer.finance.addBalance');
    }

    /**
     * @param addBalance $request
     * @return RedirectResponse
     */

    public function addBalance(addBalance $request)
    {
        auth()->user()->increment('balance', $request->input('amount'));

        auth()->user()->orders()->create([
            'title'      => 'Пополнение баланса',
            'order'      => Str::uuid()->toString(),
            'pay_system' => 'FreeKassa',
            'amount'     => $request->input('amount'),
            'action_pay' => 'add-balance',
            'status' => 1
        ]);

        return redirect()->back();
    }


    /**
     * @param Task $task
     */

    public function orderTaskWork(Task $task)
    {
        $order = auth()->user()->orders()->create([
            'title'      => 'Пополнение баланса для заказа - ' . $task->title,
            'order'      => Str::uuid()->toString(),
            'pay_system' => 'FreeKassa',
            'amount'     => $task->sum_pay,
            'action_pay' => 'pay-order',
            'task_id'    => $task->id,
            'status'     => 0
        ]);

        $task->update(['isPay' => 1]);

        return redirect()->back();
    }

    public function history()
    {
        $histories = auth()->user()->orders()->get();

        return view('cabinets.customer.finance.history', compact('histories'));
    }
}
