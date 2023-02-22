<?php

namespace App\Observers;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class UserObserver
{
    /**
     * Handle the Review "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
    {
    }
}
