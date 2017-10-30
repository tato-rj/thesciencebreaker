<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailFactory;
use App\Http\Controllers\Validators\ValidateBreakInquiry;
use App\Http\Controllers\Validators\ValidateQuestion;
use App\Http\Controllers\Validators\ValidateBreakSubmission;

class ContactsController extends Controller
{
    public function inquiry(Request $request)
    {
    	ValidateBreakInquiry::createCheck($request);
    	MailFactory::breakInquiry($request);
    	return redirect()->back()->with('contact', 'Your inquiry has been sent');
    }

    public function question(Request $request)
    {
    	ValidateQuestion::createCheck($request);
    	MailFactory::question($request);
    	return redirect()->back()->with('contact', 'Your message has been sent, thank you for your contact!');
    }

    public function submit(Request $request)
    {
        ValidateBreakSubmission::createCheck($request);
        MailFactory::submit($request);
        return redirect()->back()->with('contact', 'Your Break has been submitted');
    }
}
