<?php

namespace App\Listeners;

use App\Notifications\ProcessingNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class SendProcessingNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user =  User::where('userLevel', $event->transaction->userID)->get();

        Notification::send($user, new ProcessingNotification($event->transaction));
    }
}
