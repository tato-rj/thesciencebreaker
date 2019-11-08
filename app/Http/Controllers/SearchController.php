<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Author;

class SearchController extends Controller
{
    public function index(Request $request)
    {

    	$input = $request->for;
        $sort = ($request->sort) ? $request->sort : 'created_at';
        $order = ($sort == 'title') ? 'ASC' : 'DESC';
        $show = ($request->show) ? $request->show : 5;
       
    	$articles = Article::search($input)->orderBy($sort, $order)->paginate($show);
 dd($request->all());
    	return view("pages/search", ['articles' => $articles, 'input' => $input]);
    }

    public function authors(Request $request)
    {
        if ($request->input != '') {
            $results = Author::where('first_name', 'LIKE', '%'.$request->input.'%')
            			->orWhere('last_name', 'LIKE', '%'.$request->input.'%')
            			->take(10)
            			->get();

            foreach ($results as $result) {
                $result->url = $result->paths()->route();
                $result->admin = '/admin/breakers/'.$result->slug.'/edit';
            }

            return $results;
        }        
    }

    public function articles(Request $request)
    {
        if ($request->input != '') {
            $results = Article::where('title', 'LIKE', '%'.$request->input.'%')
            			->take(10)
            			->get();

            foreach ($results as $result) {
                $result->url = $result->paths()->route();
                $result->admin = '/admin/breaks/'.$result->slug.'/edit';
            }

            return $results;
        }        
    }
}
