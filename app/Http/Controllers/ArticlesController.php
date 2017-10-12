<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index()
    {
        $latest_articles = Article::orderBy('id', 'desc')->take(5)->get();
        return view('pages.welcome', compact(['latest_articles']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($category, Article $article)
    {
        $editor_picks = Article::where('editor_pick', 1)->get();
        $more_from = Article::where('category_id', $article->category_id)->orderBy('id', 'desc')->take(5)->get();
        return view('pages.article', compact(['article', 'editor_picks', 'more_from']));
    }

    public function edit(Article $article)
    {
        //
    }

    public function update(Request $request, Article $article)
    {
        //
    }

    public function destroy(Article $article)
    {
        //
    }
}
