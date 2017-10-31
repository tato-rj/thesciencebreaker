<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Author;
use App\AvailableArticle;
use App\Subscription;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$breaks_count = Article::count();
    	$authors_count = Author::count();
    	$available_count = AvailableArticle::count();
    	$subscription_count = Subscription::count();

    	return view('admin/pages/dashboard', compact(['breaks_count', 'authors_count', 'available_count', 'subscription_count']));
    }

    public function graphs()
    {
        $breaks_count = Article::count();
        $authors_count = Author::count();
        $available_count = AvailableArticle::count();
        $subscription_count = Subscription::count();

        $colors = Category::colors();
        $records = Article::records('6 MONTH');

        return view('admin/pages/graphs', compact(['breaks_count', 'authors_count', 'available_count', 'subscription_count', 'colors', 'records']));
    }
}
