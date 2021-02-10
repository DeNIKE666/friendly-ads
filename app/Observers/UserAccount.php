<?php

namespace App\Observers;

use App\Jobs\Cabinets\JobCreateAccount;
use App\Jobs\Cabinets\JobUpdateAccount;
use App\Models\User;
use App\Notifications\Cabinets\userCreateAccount;
use App\Notifications\Cabinets\userUpdateAccount;
use Illuminate\Support\Facades\Notification;

class UserAccount
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        dispatch(new JobCreateAccount($user))->onQueue('sending');
    }


    /**
     * @param User $user
     */

    public function updated(User $user)
    {
        if (! $user->wasChanged(['remember_token' , 'type_account'])) :
            dispatch(new JobUpdateAccount($user))
                ->onQueue('sending')
                ->afterResponse();
        endif;
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
