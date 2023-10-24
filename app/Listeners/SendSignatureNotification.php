<?php

namespace App\Listeners;

use App\Notifications\SignatureNotification;
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
        $user =  User::where('userLevel', 'Barangay Captain')->get();

        Notification::send($user, new SignatureNotification($event->transaction));
    }
}
