<?php

namespace App\Mail;

use Mail;
use App\Mail\BreakerNewBreak;
use App\Mail\EditorNewBreak;
use App\Mail\Welcome;
use App\Manager;
use App\Author;
use App\Article;

class MailFactory
{
    public static function sendWelcomeEmail(Author $breaker)
    {
        Mail::to($breaker->email)->send(new Welcome($breaker));
    }

    public static function sendNotificationsTo($authors, $editor_id, Article $break)
    {
        $editor = Manager::find($editor_id);

        foreach ($authors as $author) {
            $breaker = Author::find($author);
            Mail::to($breaker->email)->send(new BreakerNewBreak($breaker, $break));
        }

        Mail::to($editor->email)->send(new EditorNewBreak($editor, $break));
    }

}