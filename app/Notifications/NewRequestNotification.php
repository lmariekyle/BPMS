<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Payment;
use App\Models\Document;
use App\Models\Resident;
use App\Models\User;
use App\Models\Transaction;

class NewRequestNotification extends Notification
{
    use Queueable;
    public $transaction;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
        $this->user = User::where('id', $this->transaction->userId)->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'document' => Document::where('id', $this->transaction->documentId)->first(),
            'user' => Resident::where('id', $this->user->residentID)->first(),
            'payment' => Payment::where('id', $this->transaction->paymentId)->first(),
            'transaction' => Transaction::where('id', $this->transaction->id)->first(),
        ];
    }
}
