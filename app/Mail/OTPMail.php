<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OTPMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->otp = DB::table('otps')->where([
            'identifier' => $user->email,
            'valid' => 1,
        ])->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('dbarangaypob@gmail.com')
        //->greeting('Verification Code')
        ->to($this->user->email)
        ->subject('Your two factor code.')
        //->line('This code will expire in 10 minutes')
        //->line('If you have not tried to login, please change your password immediately.')
        ->markdown('emails.otpmail');
    }
}
