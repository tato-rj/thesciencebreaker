<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\AvailableArticle;
use App\Subscription;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

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

        $breaks_views_excel = Excel::create('breaks_views', function($breaks_views_excel) {

            $breaks_views_excel->sheet('Breaks_views', function($sheet) {
                $sheet->fromModel(Article::setEagerLoads([])->selectRaw('DATE_FORMAT(created_at,"%d/%m/%Y") as Date, title as Title, views as Views')->orderBy('views', 'DESC')->get(), null, 'A1', true);
            });

        })->store('xls', storage_path('app/public/breaks/excel'));

        $breakers_excel = Excel::create('breakers_emails', function($breakers_excel) {

            $breakers_excel->sheet('Breakers', function($sheet) {
                $sheet->fromModel(Author::setEagerLoads([])->select('first_name as Name', 'last_name as Surname', 'position as Position', 'email')->orderBy('first_name')->get(), null, 'A1', true);
            });

        })->store('xls', storage_path('app/public/breakers/excel'));

    	return view('admin/pages/dashboard', compact(['breaks_count', 'authors_count', 'available_count', 'subscription_count', 'total_views']));
    }

    public function download(Request $request)
    {
        return \Storage::disk('public')->download($request->path);
    }
}
