<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Manager;
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

    public function create()
    {
        $categories = Category::all();
        $editors = Manager::editors();
        return view('admin/pages/breaks/add', compact(['categories', 'editors']));
    }

    public function delete()
    {
        $breaks = Article::orderBy('title')->get();
        return view('admin/pages/breaks/delete', compact(['breaks']));   
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|max:255',
            'content' => 'required',
            'reading_time' => 'required',
            'original_article' => 'required',
            'category_id' => 'required',
            'editor_id' => 'required'
        ]);

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

        return redirect()->back()->with('break_feedback', 'The Break has been successfully added!');
    }

    public function show($category, Article $article)
    {
        $more_from = $article->similar();
        return view('pages.article', compact(['article', 'more_from']));
    }

    public function choose()
    {
        $breaks = Article::orderBy('title')->get();
        return view('admin/pages/breaks/choose', compact(['breaks']));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $editors = Manager::editors();
        return view('admin/pages/breaks/edit', compact(['categories', 'editors', 'article']));
    }

    public function update(Request $request, Article $article)
    {
        $request->offsetUnset('pdf');
        $article->update($request->all());
        return redirect()->back()->with('break_feedback', 'The Break has been updated');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with('break_feedback', 'The Break has been deleted');
    }
}
