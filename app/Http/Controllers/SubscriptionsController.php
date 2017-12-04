<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
    public function index(Request $request)
    {
        $sort = ($request->sort) ? $request->sort : 'created_at';
        $order = ($sort == 'email') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 20;

        $subscriptions = Subscription::orderBy($sort, $order)->paginate($show);
        $subscriptions_count = Subscription::count();

        $excel = Excel::create('subscriptions', function($excel) use ($subscriptions) {

            $excel->sheet('Subscriptions', function($sheet) use ($subscriptions) {
                $sheet->fromModel(Subscription::select('email as Email', 'created_at as Date')->orderBy('created_at')->get(), null, 'A1', true);
            });

        })->store('xls', storage_path('app/subscriptions/excel'));

        $csv = Excel::create('subscriptions', function($excel) use ($subscriptions) {

            $excel->sheet('Subscriptions', function($sheet) use ($subscriptions) {
                $sheet->fromModel(Subscription::select('email')->orderBy('created_at')->get(), null, 'A1', true);
            });

        })->store('csv', storage_path('app/subscriptions/csv'));

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
