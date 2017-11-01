<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Category;
use App\Manager;
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
        return view('pages.welcome');
    }

    // CREATE
    public function create()
    {
        $editors = Manager::editors();
        $authors = Author::orderBy('first_name')->get();
        return view('admin/pages/breaks/add', compact(['editors', 'authors']));
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
        $editors = Manager::editors();
        return view('admin/pages/breaks/edit', compact(['editors', 'article', 'authors']));
    }

    public function update(Request $request, Article $article)
    {
        ValidateBreak::editCheck($request);
        $article->updateFrom($request);
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
        $article->authors()->detach();
        $article->delete();
        return redirect()->back()->with('db_feedback', 'The Break has been deleted');
    }

}
