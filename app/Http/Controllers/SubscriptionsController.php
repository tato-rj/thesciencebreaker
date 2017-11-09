<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store', 'unsubscribe']]);
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate(['subscription' => 'required|email|unique:subscriptions,email']);
        Subscription::create(['email' => $request->subscription]);
        return redirect()->back()->with('db_feedback', 'The email has been subscribed')->with('subscription', 'Thank you for subscribing!');
    }

    // READ
    public function index()
    {
        $subscriptions = Subscription::orderBy('email')->paginate(40);
        $subscriptions_count = Subscription::count();
        return view('admin/pages/subscriptions', compact(['subscriptions', 'subscriptions_count']));
    }

    // DELETE
    public function destroy(Subscription $email)
    {
        $email->delete();
        return redirect()->back()->with('db_feedback', 'The email has been removed');
    }
    public function unsubscribe(Request $request)
    {
        $subscription = Subscription::where('email', $request->email);
        if ($subscription->exists()) {
            $subscription->delete();
            return back()->with('success', 'You email has been successfully removed');
        } else {
            return back()->with('error', 'This email is not on our list');
        }
    }
}
