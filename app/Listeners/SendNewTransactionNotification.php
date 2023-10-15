<?php

namespace App\Listeners;

use App\Notifications\NewRequestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class SendNewTransactionNotification
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
        $secretary =  User::where('userLevel', 'Barangay Secretary')->get();

        Notification::send($secretary, new NewRequestNotification($event->transaction));
    }
}
