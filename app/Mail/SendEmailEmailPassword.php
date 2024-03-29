<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailEmailPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      /*  return $this->from($this->emailMessageObj->from)
                    ->to($this->emailMessageObj->to)
                    ->subject($this->emailMessageObj->subject)
                    ->view('mails.emailpassword');
                    */
      return $this->view('mails.emailpassword');
    }
}
