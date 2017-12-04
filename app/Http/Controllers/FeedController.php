<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use Illuminate\Support\Facades\Response;

class FeedController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $articles = Article::orderBy('created_at', 'DESC')->get();
        $content = view('feed', compact(['articles', 'tags']));
        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }
}
