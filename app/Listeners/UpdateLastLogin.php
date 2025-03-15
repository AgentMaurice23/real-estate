<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Carbon\Carbon;

class UpdateLastLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Authenticated  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        $event->user->last_login = Carbon::now();
        $event->user->save();
    }
}
