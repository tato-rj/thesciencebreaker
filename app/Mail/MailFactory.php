<?php

namespace App\Mail;

use Mail;
use Illuminate\Http\Request;
use App\Mail\BreakerNewBreak;
use App\Mail\EditorNewBreak;
use App\Mail\Welcome;
use App\Mail\Contact\BreakInquiry;
use App\Mail\Contact\Question;
use App\Mail\Contact\Submit;
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

    public static function breakInquiry(Request $request)
    {
        Mail::to(config('app.email'))->send(new BreakInquiry($request));
    }

    public static function question(Request $request)
    {
        Mail::to(config('app.email'))->send(new Question($request));
    }

    public static function submit(Request $request)
    {
        $file = $request->file('break')->storeAs('breaks', "$request->institution_email.doc", 'public');
        Mail::to(config('app.email'))->send(new Submit($request, $file));
    }
}