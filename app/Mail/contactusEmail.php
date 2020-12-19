<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactusEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $emailMessageObj;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
      $this->emailMessageObj = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->emailMessageObj->from)
                    ->to($this->emailMessageObj->to)
                    ->subject($this->emailMessageObj->subject)
                    ->view('mails.contactus');
    }
}
