<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$input = $request->for;
        $sort = ($request->sort) ? $request->sort : 'created_at';
        $order = ($sort == 'title') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 5;
    	$articles = Article::search($input)->orderBy($sort, $order)->paginate($show);
    	return view("pages/search", compact(['articles', 'input']));
    }
}
