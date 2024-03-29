<?php

namespace App\Providers;

use App\Listeners\SendNewTransactionNotification;
use App\Listeners\SendProcessingNotification;
use App\Listeners\SendSignatureNotification;
use App\Listeners\SendSignedNotification;
use App\Listeners\SendReleasedNotification;
use App\Listeners\SendDenyNotification;
use App\Listeners\SendAccountUpdateRequestNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            // SendNewTransactionNotification::class,
            // SendProcessingNotification::class,
            // SendSignatureNotification::class,
            // SendSignedNotification::class,
            // SendReleasedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
