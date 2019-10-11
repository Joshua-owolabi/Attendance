<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable
{
 use Queueable, SerializesModels;
 public $data;
 /**
  * Create a new message instance.
  *
  * @return void
  */
 public function __construct($data)
 {
  //
  $this->data = $data;
 }

 /**
  * Build the message.
  *
  * @return $this
  */
 public function build()
 {
  return $this->view('emails.send-new-password')
   ->subject('Sanctuary Unit Membership Application')
   ->with([
    'sur_name'   => $this->data['sur_name'],
    'first_name' => $this->data['first_name'],
    'last_name'  => $this->data['last_name'],
    'email'      => $this->data['email'],
    'password'   => $this->data['password'],
   ]);
 }
}