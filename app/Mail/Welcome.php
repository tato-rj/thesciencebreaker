<?php

namespace App\Mail;

use App\Author;
use App\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $breaker;
    // public $categories;

    public function __construct(Author $breaker)
    {
        $this->breaker = $breaker;
        // $this->categories = Category::all();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails/welcome')->subject('Welcome to TheScienceBreaker!');
    }
}
