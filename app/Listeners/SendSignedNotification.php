<?php

namespace App\Listeners;

use App\Notifications\SignedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class SendSignatureNotification
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
        $user =  User::where('id', $event->transaction->userID)->get();

        Notification::send($user, new SignedNotification($event->transaction));
    }
}