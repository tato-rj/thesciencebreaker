<?php

namespace App\Http\Controllers;

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
        $total_views = Article::sum('views');
    	$breaks_count = Article::count();
    	$authors_count = Author::count();
    	$available_count = AvailableArticle::count();
    	$subscription_count = Subscription::count();

    	return view('admin/pages/dashboard', compact(['breaks_count', 'authors_count', 'available_count', 'subscription_count', 'total_views']));
    }
}
