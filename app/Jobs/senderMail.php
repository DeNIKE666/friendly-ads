<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\Admin\createUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class senderMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user, $password;

    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }


    public function handle()
    {
       $this->user->notify(
           (new createUser($this->user, $this->password))
       );
    }
}
