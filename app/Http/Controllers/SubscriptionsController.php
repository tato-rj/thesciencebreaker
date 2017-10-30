<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:subscriptions']);
        Subscription::create(['email' => $request->email]);
        return redirect()->back()->with('db_feedback', 'The email has been subscribed');
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
}
