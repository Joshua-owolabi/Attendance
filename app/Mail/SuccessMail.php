<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuccessMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cronjob-success-mail')
            ->subject('Sanctuary Mail Resend')
            ->with([
                'sur_name'   => $this->user['sur_name'],
                'first_name' => $this->user['first_name'],
                'last_name'  => $this->user['last_name'],
                'email'      => $this->user['email'],
            ]);
    }
}
