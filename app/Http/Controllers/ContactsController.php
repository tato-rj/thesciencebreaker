<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\MailFactory;
use App\Subscription;
use App\Http\Controllers\Validators\ValidateBreakInquiry;
use App\Http\Controllers\Validators\ValidateQuestion;
use App\Http\Controllers\Validators\ValidateBreakSubmission;

class ContactsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('throttle:4');
    }

    public function question(Request $request)
    {
        if (app()->environment() != 'testing') {
            if (Carbon::parse($request->time)->addSeconds(10)->gt(Carbon::now()) || ! empty($request->my_name))
                return response('Humans only please.', 403);
        }

        ValidateQuestion::createCheck($request);
        MailFactory::question($request);
        if ($request->subscribe_me) Subscription::createOrIgnore($request->email);

        return redirect()->back()->with('contact', 'Your message has been sent, thank you for your contact!');
    }

    public function inquiry(Request $request)
    {
        if (app()->environment() != 'testing') {
            if (Carbon::parse($request->time)->addSeconds(10)->gt(Carbon::now()) || ! empty($request->my_name))
                return response('Humans only please.', 403);
        }

    	ValidateBreakInquiry::createCheck($request);
    	MailFactory::breakInquiry($request);
        if ($request->subscribe_me) Subscription::createOrIgnore($request->email);

    	return redirect()->back()->with('contact', 'Your inquiry has been sent');
    }

    public function submit(Request $request)
    {
        if (app()->environment() != 'testing') {
            if (Carbon::parse($request->time)->addSeconds(10)->gt(Carbon::now()) || ! empty($request->my_name))
                return response('Humans only please.', 403);
        }
// return $request->file('file');
        ValidateBreakSubmission::createCheck($request);
        MailFactory::submit($request);
        if ($request->subscribe_me) Subscription::createOrIgnore($request->institution_email);

        return redirect()->back()->with('contact', 'Your Break has been submitted');
    }
}
