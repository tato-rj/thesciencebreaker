<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Manager;
use App\Http\Controllers\Validators\ValidateBreak;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return view('pages.welcome');
    }

    // CREATE
    public function create()
    {
        $editors = Manager::editors();
        return view('admin/pages/breaks/add', compact(['editors']));
    }

    public function store(Request $request)
    {
        ValidateBreak::check($request);
        Article::create([
            'title' => $request->title,
            'slug' => str_slug($request->title, '-'),
            'content' => $request->content,
            'reading_time' => $request->reading_time,
            'original_article' => $request->original_article,
            'category_id' => $request->category_id,
            'editor_id' => $request->editor_id,
            'doi' => Article::createDoi(),
            'editor_pick' => $request->editor_pick
        ]);

        return redirect()->back()->with('db_feedback', 'The Break has been successfully added!');
    }

    // READ
    public function show($category, Article $article)
    {
        $more_from = $article->similar();
        return view('pages.article', compact(['article', 'more_from']));
    }

    // UPDATE
    public function selectEdit()
    {
        $breaks = Article::orderBy('title')->get();
        return view('admin/pages/breaks/selectEdit', compact(['breaks']));
    }

    public function edit(Article $article)
    {
        $editors = Manager::editors();
        return view('admin/pages/breaks/edit', compact(['editors', 'article']));
    }

    public function update(Request $request, Article $article)
    {
        $request->offsetUnset('pdf');
        $article->update($request->all());
        return redirect()->back()->with('db_feedback', 'The Break has been updated');
    }

    // DELETE
    public function selectDelete()
    {
        $breaks = Article::orderBy('title')->get();
        return view('admin/pages/breaks/selectDelete', compact(['breaks']));   
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with('db_feedback', 'The Break has been deleted');
    }
}
