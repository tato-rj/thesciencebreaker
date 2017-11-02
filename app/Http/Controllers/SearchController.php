<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$input = $request->for;
    	$results = Article::search($input)->paginate(6);
    	return view("pages/search", compact(['results', 'input']));
    }
}
