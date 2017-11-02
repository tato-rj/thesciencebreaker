<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Category;
use App\Manager;
use App\Tag;
use App\Mail\MailFactory;
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
        Manager::generateSlugs();
        return view('pages.welcome');
    }

    // CREATE
    public function create()
    {
        $editors = Manager::editors();
        $tags = Tag::orderBy('name')->get();
        $authors = Author::orderBy('first_name')->get();
        return view('admin/pages/breaks/add', compact(['editors', 'authors', 'tags']));
    }

    public function store(Request $request)
    {
        ValidateBreak::createCheck($request);
        $break = Article::createFrom($request);
        MailFactory::sendNotificationsTo($request->authors, $request->editor_id, $break);
        return redirect()->back()->with('db_feedback', 'The Break has been successfully added!');
    }

    // READ
    public function show($category, Article $article)
    {
        $more_from = $article->similar();
        $article->increment('views');
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
        $authors = Author::orderBy('first_name')->get();
        $tags = Tag::orderBy('name')->get();
        $editors = Manager::editors();
        return view('admin/pages/breaks/edit', compact(['editors', 'article', 'authors', 'tags']));
    }

    public function update(Request $request, Article $article)
    {
        ValidateBreak::editCheck($request);
        $article->updateFrom($request);
        return redirect()->back()->with('db_feedback', 'The Break has been updated');
    }

    public function setTags(Request $request, Article $article)
    {
        $article->tags()->sync($request->tags);
    }

    // DELETE
    public function selectDelete()
    {
        $breaks = Article::orderBy('title')->get();
        return view('admin/pages/breaks/selectDelete', compact(['breaks']));   
    }

    public function destroy(Article $article)
    {
        $article->authors()->detach();
        $article->delete();
        return redirect()->back()->with('db_feedback', 'The Break has been deleted');
    }

}
