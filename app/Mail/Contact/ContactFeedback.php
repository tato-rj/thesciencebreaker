<?php

namespace App\Mail\Contact;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFeedback extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $message;

    public function __construct($request, $message)
    {
        $this->request = $request;
        $this->message = $message;
    }

    public function build()
    {
        return $this->markdown('emails/contact/contact_feedback')->subject($this->message['subject']);
    }
}
