<?php

namespace App\Mail;

use App\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EditorNewBreak extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $break;

    public function __construct($user, Article $break)
    {
        $this->user = $user;
        $this->break = $break;
    }
    
    public function build()
    {
        return $this->markdown('emails/editor_new_break');
    }
}
